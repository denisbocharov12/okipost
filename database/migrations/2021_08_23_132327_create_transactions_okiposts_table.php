<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsOkipostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions_okiposts', function (Blueprint $table) {
            $table->id();
            $table->integer('done');
            $table->bigInteger('user');
            $table->float('value');
            $table->float('balance_before');
            $table->float('balance_after');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions_okiposts');
    }
}
