<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStateToPaymentsReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments_receipts', function (Blueprint $table) {
            $table->string('receipts_state')->nullable();
            $table->string('txt_no_of_weeks')->nullable();
            $table->string('permit_from')->nullable();
            $table->string('fitdate')->nullable();
            $table->string('districtname')->nullable();
            $table->string('service_amount')->nullable();
            $table->string('civik_amount')->nullable();
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
            $table->dropColumn('receipts_state');
            $table->dropColumn('txt_no_of_weeks');
            $table->dropColumn('permit_from');
            $table->dropColumn('districtname');
            $table->dropColumn('service_amount');
            $table->dropColumn('civik_amount');
            $table->dropColumn('fitdate');

        });
    }
}
