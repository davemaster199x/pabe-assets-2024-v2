<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_docs', function (Blueprint $table) {
            $table->bigIncrements('docs_id');
            $table->bigInteger('asset_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('description', 100)->nullable();
            $table->string('file_type', 20)->nullable();
            $table->text('file_name')->nullable();
            $table->string('file_path')->nullable(); 
            $table->binary('file_hash')->nullable(); // This should be binary or blob
            $table->string('delete', 1)->default('0');
            $table->timestamps();
        });
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_docs');
    }
}
