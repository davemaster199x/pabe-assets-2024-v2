<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEventCheckinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_event_checkin', function (Blueprint $table) {
            $table->bigIncrements('checkin_id');
            $table->bigInteger('event_id')->nullable();
            $table->timestamp('return_date')->nullable();
            $table->bigInteger('site_id')->nullable();
            $table->bigInteger('location_id')->nullable();
            $table->bigInteger('department_id')->nullable();
            $table->text('checkin_notes')->nullable();
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
        Schema::dropIfExists('tbl_event_checkin');
    }
}
