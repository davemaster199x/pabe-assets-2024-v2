<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_details', function (Blueprint $table) {
            $table->id(); // Creates 'id' as the primary key with auto-increment
            $table->integer('asset_id')->nullable();
            $table->date('date')->nullable(); // Payment date, nullable
            $table->string('check_no', 50)->nullable(); // Check number, nullable, max length of 50
            $table->string('description', 255)->nullable(); // Description of the check, nullable, max length of 255
            $table->string('amount', 255)->nullable(); // Amount as a string (varchar), nullable
            $table->date('due_date')->nullable(); // Due date, nullable
            $table->string('status', 255)->nullable(); // Status of the check, nullable, max length of 255
            $table->string('bank', 255)->nullable(); // Bank name, nullable, max length of 255
            $table->timestamps(); // Adds 'created_at' and 'updated_at' timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_details');
    }
}
