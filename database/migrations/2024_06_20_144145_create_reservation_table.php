<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {
            $table->bigIncrements('reservation_id');
            $table->bigInteger('assets_id')->nullable();
            $table->date('schedule_from')->nullable();
            $table->date('schedule_to')->nullable();
            $table->text('reserve_for')->nullable();
            $table->bigInteger('person_id')->nullable();
            $table->bigInteger('site_id')->nullable();
            $table->bigInteger('location_id')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('reservation');
    }
}
