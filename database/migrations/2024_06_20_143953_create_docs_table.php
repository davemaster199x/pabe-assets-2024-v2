<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docs', function (Blueprint $table) {
            $table->bigIncrements('docs_id');
            $table->bigInteger('assets_id')->nullable();
            $table->text('description')->nullable();
            $table->text('file_name')->nullable();
            $table->timestamp('uploaded_date')->nullable();
            $table->bigInteger('user_id')->nullable();
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
        Schema::dropIfExists('docs');
    }
}
