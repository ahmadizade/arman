<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('gender')->collation('utf8_general_ci')->nullable();
            $table->string('user_id')->collation('utf8_general_ci')->unique();
            $table->string('bank_cart_number')->collation('utf8_general_ci')->unique();
            $table->string('sheba')->nullable()->collation('utf8_general_ci')->unique();
            $table->string('phone')->collation('utf8_general_ci');
            $table->string('city_code')->collation('utf8_general_ci')->nullable();
            $table->string('postal_code')->collation('utf8_general_ci');
            $table->string('national_code')->collation('utf8_general_ci');
            $table->string('address')->collation('utf8_general_ci');
            $table->string('user_mode')->default('normal')->collation('utf8_general_ci');
            $table->string('birthday')->collation('utf8_general_ci');
            $table->string('company')->collation('utf8_general_ci');;
            $table->string('email')->collation('utf8_general_ci')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
