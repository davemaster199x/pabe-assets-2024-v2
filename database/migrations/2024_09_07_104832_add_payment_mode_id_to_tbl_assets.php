<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentModeIdToTblAssets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_assets', function (Blueprint $table) {
            $table->bigInteger('payment_mode_id')->nullable()->after('amount_debited');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_assets', function (Blueprint $table) {
            $table->dropColumn('payment_mode_id');
        });
    }
}
