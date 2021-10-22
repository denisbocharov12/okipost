<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('code');
            $table->string('email')->unique(); // login
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('status', ['active','inactive'])->default('active'); // 0 to 1 flag
            $table->string('birthday')->nullable();
            $table->string('regdate')->nullable();
            $table->enum('gender', ['male','female'])->nullable();
            $table->string('last_ip')->nullable();
            //$table->bigInteger('IDNP')->unique(); // number
            $table->string('photo')->nullable();
            $table->text('info')->nullable();
            $table->float('money')->nullable()->default(0); // bonuses
            $table->float('blocked')->nullable()->default(0);
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('first_name_en')->nullable();
            $table->string('last_name_en')->nullable();
            $table->string('token')->nullable();
            $table->string('country');
            $table->string('city');
            $table->enum('type', ['fizical','iurid']);
            $table->string('user_id')->nullable();
            $table->string('bonus_code')->nullable();

            $table->string('orgname')->nullable();
            $table->string('orgid')->nullable();
            $table->string('orgmobile')->nullable();
            //
            $table->string('password');
            //
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
        Schema::dropIfExists('users');
    }
}
