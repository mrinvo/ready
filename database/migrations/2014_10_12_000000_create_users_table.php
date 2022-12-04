<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->enum('user_type',[1,2])->nullable();
            $table->string('driving_lic_front')->nullable();
            $table->string('driving_lic_back')->nullable();
            $table->string('car_lic_front')->nullable();
            $table->string('car_lic_back')->nullable();
            $table->string('photo_front')->nullable();
            $table->string('photo_back')->nullable();
            $table->string('personal_id_photo_front')->nullable();
            $table->string('personal_id_photo_back')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('verified',[0,1,2])->default(0);
            // $table->string('password');
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
};
