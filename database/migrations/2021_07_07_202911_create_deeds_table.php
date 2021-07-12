<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deeds', function (Blueprint $table) {
            $table->id();
            $table->string('client');
            $table->string('notary');
            $table->string('correspondent_of_the_notary')->nullable();
            $table->string('purpose_of_the_credit');
            $table->string('reference_of_credit_decision');
            $table->date('date_of_receipt_of_the_request');
            $table->string('tax_notice_reference')->nullable();
            $table->string('debit_advice_notified', 10)->nullable();
            //writting infos
            $table->date('writting_end_date');
            $table->date('signature_date');
            $table->date('writting_completion_date');
            //registration infos
            $table->date('registration_sending_date');
            $table->date('registration_return_date');
            $table->unsignedInteger('registration_amount');
            //inscription infos
            $table->date('file_completion_date');
            $table->date('filing_date'); //date de depot du dossier
            $table->date('file_withdrawal_date');
            $table->date('date_of_transmission_to_the_BO');
            $table->unsignedInteger('inscription_amount');
            //foreign ids
            $table->foreignId('pole_id')->constrained();
            $table->foreignId('warranty_id')->constrained();
            $table->foreignId('agency_id')->constrained();

            $table->softDeletes();
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
        Schema::dropIfExists('deeds');
    }
}
