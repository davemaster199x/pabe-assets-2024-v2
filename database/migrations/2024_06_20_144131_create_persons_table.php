<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->bigIncrements('person_id');
            $table->text('full_name')->nullable();
            $table->text('employee_id')->nullable();
            $table->text('title')->nullable();
            $table->text('phone')->nullable();
            $table->text('email')->nullable();
            $table->bigInteger('site_id')->nullable();
            $table->bigInteger('location_id')->nullable();
            $table->bigInteger('department_id')->nullable();
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
        Schema::dropIfExists('persons');
    }
}
