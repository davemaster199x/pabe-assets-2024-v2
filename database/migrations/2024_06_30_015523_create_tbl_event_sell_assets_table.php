<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEventSellAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_event_sell_assets', function (Blueprint $table) {
            $table->bigIncrements('sell_asset_id');
            $table->bigInteger('event_id')->nullable();
            $table->date('sale_date')->nullable();
            $table->string('sold_to', 50)->nullable();
            $table->double('sale_amount')->nullable();
            $table->text('sell_notes')->nullable();
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
        Schema::dropIfExists('tbl_event_sell_assets');
    }
}
