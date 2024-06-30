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
            $table->string('person_name', 150)->nullable();
            $table->string('person_type', 20)->nullable();
            $table->string('person_contact', 20)->nullable();
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
