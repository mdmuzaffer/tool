<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserServiceChargeToPaymentsReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments_receipts', function (Blueprint $table) {
            $table->string('user_service_charge')->nullable();
            $table->string('cgst')->nullable();
            $table->string('sgst')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments_receipts', function (Blueprint $table) {
            $table->string('user_service_charge')->nullable();
            $table->string('cgst')->nullable();
            $table->string('sgst')->nullable();
        });
    }
}
