<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarrantyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warranty', function (Blueprint $table) {
            $table->bigIncrements('warranty_id');
            $table->bigInteger('assets_id')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('company')->nullable();
            $table->text('address')->nullable();
            $table->text('phone')->nullable();
            $table->text('contact')->nullable();
            $table->timestamp('date_created')->useCurrent()->useCurrentOnUpdate();
            $table->string('delete', 1)->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('warranty');
    }
}
