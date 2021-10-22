<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIurClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iur_clients', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['SRL','II'])->default('SRL');
            $table->string('IDNO');
            $table->string('address')->nullable();
            $table->string('company_person')->nullable();

            $table->string('requisit_address');
            $table->string('requisit_IDNO');
            $table->string('requisit_nds');
            $table->string('requisit_IBAN');
            $table->string('requisit_BANK');
            $table->string('requisit_CODE');

            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('service_id');
            $table->enum('status', ['active','inactive'])->default('active');
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
        Schema::dropIfExists('iur_clients');
    }
}
