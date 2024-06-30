<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEventDisposeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_event_dispose', function (Blueprint $table) {
            $table->bigIncrements('dispose_id');
            $table->bigInteger('asset_id')->nullable();
            $table->date('date_disposed')->nullable();
            $table->string('dispose_to', 50)->nullable();
            $table->text('dispose_notes')->nullable();
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
        Schema::dropIfExists('tbl_event_dispose');
    }
}
