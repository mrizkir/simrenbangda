<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');            
            $table->string('username')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();  
            $table->string('SOrgID',19)->nullable();  
            $table->string('SOrgNm')->nullable();  
            $table->year('TA')->nullable();       
            $table->string('theme')->default('default');
            $table->string('foto')->default('storage/images/users/no_photo.png');
            $table->boolean('active')->default(1);
            $table->boolean('isdeleted')->default(1);
            $table->string('token')->nullable();;
            $table->rememberToken();
            $table->timestamps();

            $table->index('SOrgID');                    
            $table->index('TA');
            
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
