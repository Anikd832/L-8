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
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('username', 191)->unique('username');
            $table->string('email', 191)->unique();
            $table->dateTime('email_verified_at')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('password');
            $table->longText('address')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0=inactive,1=active');
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
