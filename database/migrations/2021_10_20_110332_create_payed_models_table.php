<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayedModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payed_models', function (Blueprint $table) {
            $table->id();
            $table->integer('code')->nullable();
            $table->longText('track')->nullable();
            $table->string('currency')->nullable();
            $table->float('needed_sum')->nullable();
            $table->enum('payed',['yes','no'])->nullable()->default('no');
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
        Schema::dropIfExists('payed_models');
    }
}
