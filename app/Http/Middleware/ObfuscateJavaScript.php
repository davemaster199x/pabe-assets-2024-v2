<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\File;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ObfuscateJavaScript
{
    public function handle($request, Closure $next)
    {
        // Define the path to your JavaScript files
        $sourcePath = public_path('js'); // Adjust this path as needed
        $outputPath = public_path('js/obfuscated'); // Adjust this path as needed

        if (!is_dir($outputPath)) {
            mkdir($outputPath, 0755, true);
        }

        $files = glob("$sourcePath/*.js");

        foreach ($files as $file) {
            $filename = basename($file);
            $outputFile = "$outputPath/$filename";

            // Check if the obfuscated file already exists and is up to date
            if (!File::exists($outputFile) || File::lastModified($file) > File::lastModified($outputFile)) {
                $process = new Process(['npx', 'javascript-obfuscator', $file, '--output', $outputFile]);
                $process->run();

                if (!$process->isSuccessful()) {
                    throw new ProcessFailedException($process);
                }
            }
        }

        return $next($request);
    }
}
