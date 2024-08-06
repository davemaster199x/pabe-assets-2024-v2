<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblEventRepairTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_event_repair', function (Blueprint $table) {
            $table->bigIncrements('repair_id');
            $table->bigInteger('event_id')->nullable();
            $table->date('sched_date')->nullable();
            $table->string('assigned_to', 50)->nullable();
            $table->date('date_completed')->nullable();
            $table->double('repair_cost')->nullable();
            $table->text('repair_notes')->nullable();
            $table->string('delete', 1)->default('0');
            $table->text('delete_at')->nullable();
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
        Schema::dropIfExists('tbl_event_repair');
    }
}
