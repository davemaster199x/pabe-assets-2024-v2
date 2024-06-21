<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance', function (Blueprint $table) {
            $table->bigIncrements('maintenance_id');
            $table->bigInteger('assets_id')->nullable();
            $table->text('title')->nullable();
            $table->text('details')->nullable();
            $table->date('due_date')->nullable();
            $table->text('maintenance_by')->nullable();
            $table->text('maintenance_status')->nullable();
            $table->date('date_completed')->nullable();
            $table->double('maintenance_cost')->nullable();
            $table->string('repeating', 1)->nullable();
            $table->text('frequency')->nullable();
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
        Schema::dropIfExists('maintenance');
    }
}
