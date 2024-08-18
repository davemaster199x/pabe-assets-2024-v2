<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_assets', function (Blueprint $table) {
            $table->bigIncrements('asset_id');
            $table->text('description')->nullable();
            $table->string('assets_tag_id', 150)->nullable();
            $table->date('purchase_date')->nullable();
            $table->double('cost')->nullable();
            $table->string('purchase_from', 150)->nullable();
            $table->string('brand', 150)->nullable();
            $table->string('model', 150)->nullable();
            $table->string('serial_no', 150)->nullable();
            $table->bigInteger('person_id')->nullable();
            $table->bigInteger('site_id')->nullable();
            $table->bigInteger('location_id')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('department_id')->nullable();
            $table->text('asset_photo_file')->nullable();
            $table->integer('depreciable_asset')->nullable()->comment('1 = Yes | 0 = No');
            $table->double('depreciable_cost')->nullable();
            $table->double('salvage_value')->nullable();
            $table->string('assets_life', 50)->nullable();
            $table->string('depreciation_method', 100)->nullable();
            $table->date('date_acquired')->nullable();
            $table->string('funding_source', 100)->nullable();
            $table->double('amount_debited')->nullable();
            $table->bigInteger('status_id')->nullable();
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
        Schema::dropIfExists('tbl_assets');
    }
}
