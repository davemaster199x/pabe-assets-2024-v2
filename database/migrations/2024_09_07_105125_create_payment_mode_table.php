<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentModeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_mode', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing primary key called 'id'
            $table->string('payment_name'); // Creates a 'payment_name' column of type string
            $table->boolean('delete')->default(0); // Creates a 'delete' column of type boolean with default value of 0
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
        Schema::dropIfExists('payment_mode');
    }
}
