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
            $table->longText('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('profile_img')->nullable();
            $table->string('cover_img')->nullable();
            $table->string('date_of_birth');
            $table->string('address')->nullable();
            $table->longText('bio')->nullable();
            $table->string('profession')->nullable();
            $table->string('workplace')->nullable();
            $table->string('education')->nullable();
            $table->string('verified')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_verified')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->softDeletes();
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
