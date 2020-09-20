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
            $table->string('name')->collation('utf8_general_ci');
            $table->string('role')->default('user');
            $table->string('sheba')->nullable()->collation('utf8_general_ci');
            $table->tinyInteger('verified')->default('0')->collation('utf8_general_ci');
            $table->string('user_mode')->default('normal')->collation('utf8_general_ci');
            $table->string('mobile')->unique();
            $table->string('email')->collation('utf8_general_ci')->nullable();
            $table->string('status')->default('active')->collation('utf8_general_ci');;
            $table->timestamp('email_verified_at')->collation('utf8_general_ci')->nullable();
            $table->string('password')->collation('utf8_general_ci');
            $table->bigInteger('credit')->default('0')->collation('utf8_general_ci');
            $table->rememberToken();
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->dateTime('deleted_at');
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
