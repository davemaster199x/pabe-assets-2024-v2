<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_persons', function (Blueprint $table) {
            $table->bigIncrements('person_id');
            $table->string('full_name', 50)->nullable();
            $table->string('emp_id', 50)->nullable();
            $table->string('title', 50)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->unsignedBigInteger('site_id')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->text('notes')->nullable();

            $table->index('site_id');
            $table->index('location_id');
            $table->index('department_id');
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
        Schema::dropIfExists('tbl_persons');
    }
}
