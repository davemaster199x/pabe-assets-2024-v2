<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('event_id');
            $table->bigInteger('assets_id')->nullable();
            $table->date('event_date')->nullable();
            $table->text('event_type')->nullable();
            $table->bigInteger('person_id')->nullable();
            $table->bigInteger('location_id')->nullable();
            $table->bigInteger('site_id')->nullable();
            $table->text('notes')->nullable();
            $table->text('due_date')->nullable();
            $table->string('expires', 255)->nullable();
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
        Schema::dropIfExists('events');
    }
}
