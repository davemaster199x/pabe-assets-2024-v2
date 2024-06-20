<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id('assets_id');
            $table->text('description')->nullable();
            $table->bigInteger('assets_tag_id')->nullable();
            $table->text('purchased_from')->nullable();
            $table->timestamp('purchase_date')->nullable();
            $table->text('brand')->nullable();
            $table->double('cost')->nullable();
            $table->text('model')->nullable();
            $table->text('serial_no')->nullable();
            $table->bigInteger('site_id')->nullable();
            $table->bigInteger('location_id')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('department_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->timestamp('date_created')->default(DB::raw('CURRENT_TIMESTAMP'))->useCurrentOnUpdate();
            $table->string('delete', 1)->default('0')->nullable();
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
        Schema::dropIfExists('assets');
    }
}
