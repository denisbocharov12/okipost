<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_models', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('track');
            $table->float('price')->nullable();
            $table->string('currency')->default('USD');
            $table->longText('comment')->nullable();
            $table->string('url')->nullable();
            $table->enum('type',['web','personal']);
            $table->longText('additional_services')->nullable();
            $table->longText('info')->nullable();
            $table->string('details')->nullable();
            $table->string('delivery_method');

            $table->string('addressid')->nullable();

            $table->string('address1')->nullable();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('phone')->nullable();
            $table->string('passport')->nullable();
            $table->string('city')->nullable();

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
        Schema::dropIfExists('package_models');
    }
}
