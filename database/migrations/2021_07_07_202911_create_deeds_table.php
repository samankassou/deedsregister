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
            $table->string('client_code')->nullable();
            $table->string('notary')->nullable();
            $table->string('correspondent_of_the_notary')->nullable();
            $table->string('purpose_of_the_credit');
            $table->string('reference_of_credit_decision');
            $table->date('date_of_receipt_of_the_request')->nullable();
            $table->string('tax_notice_reference')->nullable();
            $table->string('debit_advice_notified', 10)->nullable();
            //writting infos
            $table->date('writting_end_date')->nullable();
            $table->date('signature_date')->nullable();
            $table->date('writting_completion_date')->nullable();
            //registration infos
            $table->date('registration_sending_date')->nullable();
            $table->date('registration_return_date')->nullable();
            $table->unsignedInteger('registration_amount')->nullable();
            //inscription infos
            $table->date('file_completion_date')->nullable();
            $table->date('filing_date')->nullable(); //date de depot du dossier
            $table->date('file_withdrawal_date')->nullable();
            $table->date('date_of_transmission_to_the_BO')->nullable();
            $table->unsignedInteger('inscription_amount')->nullable();
            //foreign ids
            $table->foreignId('pole_id');
            $table->foreignId('warranty_id');
            $table->foreignId('agency_id');
            $table->foreignId('created_by')->nullable();
            $table->foreignId('updated_by')->nullable();
            $table->foreignId('deleted_by')->nullable();

            $table->text('documentation')->nullable();

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
