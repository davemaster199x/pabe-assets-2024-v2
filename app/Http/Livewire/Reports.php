<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Asset;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class Reports extends Component
{
    public $dateRangefrom = '';
    public $dateRangeto = '';

    public function generate_report()
    {
        if ($this->dateRangefrom > $this->dateRangeto || $this->dateRangefrom == '' && $this->dateRangeto == '' ) {
            $this->emit('invalid_date');
        } else {
            $assets = Asset::whereBetween('created_at', [$this->dateRangefrom, $this->dateRangeto])
                           ->with(['site', 'location', 'category', 'department', 'status', 'person', 'insurance'])
                           ->get();

            $pdf = PDF::loadView('pdfs.asset-report', ['assets' => $assets, 'from' => $this->dateRangefrom, 'to' => $this->dateRangeto]);

            $pdf->setPaper('a4', 'landscape');
            
            $filename = 'asset_report_' . now()->format('YmdHis') . '.pdf';
            Storage::put('public/reports/' . $filename, $pdf->output());

            $this->emit('reportGenerated', [
                'filename' => $filename,
                'url' => Storage::url('reports/' . $filename)
            ]);

            $this->reset([
                'dateRangefrom', 
                'dateRangeto'
            ]);
        }
    }
    
    public function render()
    {
        return view('livewire.reports');
    }
}