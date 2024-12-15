<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNameOfGoodsToPaymentsReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments_receipts', function (Blueprint $table) {
            $table->string('name_of_goods')->nullable();
            $table->string('route')->nullable();
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
            $table->dropColumn('name_of_goods');
            $table->dropColumn('route');
        });
    }
}
