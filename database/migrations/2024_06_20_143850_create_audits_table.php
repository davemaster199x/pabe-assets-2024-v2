<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audits', function (Blueprint $table) {
            $table->id('audit_id');
            $table->text('audit_name')->nullable();
            $table->text('last_audited_by')->nullable();
            $table->date('audit_date')->nullable();
            $table->bigInteger('site_id')->nullable();
            $table->bigInteger('location_id')->nullable();
            $table->text('notes')->nullable();
            $table->text('map')->nullable();
            $table->text('action')->nullable();
            $table->timestamp('date_created')->default(DB::raw('CURRENT_TIMESTAMP'))->useCurrentOnUpdate();
            $table->string('delete', 1)->default('0')->nullable();
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
        Schema::dropIfExists('audits');
    }
}
