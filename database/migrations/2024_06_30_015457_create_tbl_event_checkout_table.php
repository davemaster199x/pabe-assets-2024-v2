<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEventCheckoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_event_checkout', function (Blueprint $table) {
            $table->bigIncrements('checkout_id');
            $table->bigInteger('event_id')->nullable();
            $table->timestamp('checkout_date')->nullable();
            $table->bigInteger('person_id')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->bigInteger('site_id')->nullable();
            $table->bigInteger('location_id')->nullable();
            $table->bigInteger('department_id')->nullable();
            $table->text('checkout_notes')->nullable();
            $table->text('concent')->nullable();
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
        Schema::dropIfExists('tbl_event_checkout');
    }
}
