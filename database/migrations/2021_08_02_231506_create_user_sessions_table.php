<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_sessions', function (Blueprint $table) {
            $table->id();
            $table->integer('code');
            $table->string('login'); // login
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('status', [1,2])->default(1); // 0 to 1 flag
            $table->string('dob')->nullable();
            $table->string('regdate');
            $table->enum('gender', [1,2]);
            $table->string('last_ip')->nullable();
            $table->string('number')->unique(); // number - не нужен
            $table->string('photo')->nullable();
            $table->text('info')->nullable();
            $table->float('bonuses')->nullable(); // bonuses
            $table->float('blocked')->nullable()->default(0);
            $table->string('name');
            $table->string('surname');
            $table->string('fname')->nullable();
            $table->string('mobile');
            $table->string('adress')->nullable();
            $table->string('name_en')->nullable();
            $table->string('surname_en')->nullable();
            $table->string('token')->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('userid')->nullable();
            $table->string('bonus_code')->nullable();
            $table->string('orgname')->nullable();
            $table->string('orgnumber')->nullable();
            $table->string('orgid')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('user_sessions');
    }
}
