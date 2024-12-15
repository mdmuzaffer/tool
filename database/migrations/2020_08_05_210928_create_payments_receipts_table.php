<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments_receipts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vehicleno')->nullable();
            $table->string('chassisno')->nullable();
            $table->string('ownername')->nullable();
            $table->string('mobile')->nullable();
            $table->string('from_state')->nullable();
            $table->string('VehicleType')->nullable();
            $table->string('VehicleClass')->nullable();
            $table->string('seating_c')->nullable();
            $table->string('txt_sleeper_cap')->nullable();
            $table->string('ServiceType')->nullable();
            $table->string('TaxMode')->nullable();
            $table->string('border_entry')->nullable();
            $table->string('tax_from')->nullable();
            $table->string('tax_upto')->nullable();
            $table->string('PermitType')->nullable();
            $table->string('permit_upto')->nullable();
            $table->string('permit_no')->nullable();
            $table->decimal('total_tax_amount', 65, 2)->nullable();

            $table->integer('bank_ref_no')->nullable();
            $table->string('bank_ref_no_gen')->nullable();
            $table->integer('receipt_no')->nullable();
            $table->string('receipt_no_gen')->nullable();

            $table->string('payment_mode')->nullable()->default('ONLINE');
            $table->string('fitness_validity')->nullable()->default('NA');
            $table->string('capacity_unit')->nullable();
            $table->integer('admin_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->boolean('sms_sent')->nullable()->default(false);
            $table->boolean('is_archived')->nullable()->default(false);

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
        Schema::dropIfExists('payments_receipts');
    }
}
