<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeedTypeOfRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deed_type_of_request', function (Blueprint $table) {
            $table->id();
            $table->foreignId('deed_id')->constrained('deeds');
            $table->foreignId('type_of_request_id')->constrained('type_of_requests');
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
        Schema::dropIfExists('deed_type_of_request');
    }
}
