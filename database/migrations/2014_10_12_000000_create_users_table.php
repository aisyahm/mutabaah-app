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
            // ngadi
            $table->foreignId("submission_id")->nullable();
            $table->string('name');
            // $table->string('username')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at');
            $table->string('password')->nullable();
            $table->string('avatar')->default("3");
            $table->string('no_telp')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string("gender")->nullable();
            $table->boolean('is_mentor')->default(false);
            
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
