<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblWarrantyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_warranty', function (Blueprint $table) {
            $table->bigIncrements('warranty_id');
            $table->bigInteger('asset_id')->nullable();
            $table->integer('length')->nullable();
            $table->date('expiration_date')->nullable();
            $table->text('warranty_notes')->nullable();
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
        Schema::dropIfExists('tbl_warranty');
    }
}
