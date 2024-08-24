<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_insurances', function (Blueprint $table) {
            $table->id('insurance_id'); // Primary key with auto-increment
            $table->string('description', 255)->nullable();
            $table->string('insurance_co', 255)->nullable();
            $table->string('contact_person', 100)->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('policy_no', 255)->nullable();
            $table->string('coverage', 255)->nullable();
            $table->string('limits', 255)->nullable();
            $table->string('deductible', 255)->nullable();
            $table->string('premium', 255)->nullable();
            $table->char('active', 1)->default('1');
            $table->char('delete', 1)->default('0');
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
        Schema::dropIfExists('insurances');
    }
}
