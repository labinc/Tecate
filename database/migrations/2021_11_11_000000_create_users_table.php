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
        Schema::disableForeignKeyConstraints();

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->bigInteger('identification')->unique();
            $table->string('birthday')->nullable();
            $table->enum('gender', ['Masculino', 'Femenino']);
            $table->bigInteger('phone')->nullable();
            $table->string('email')->unique();
            $table->string('units')->nullable();
            $table->string('password');
            $table->foreignId('rol_id')
             ->nullable()
             ->constrained()
             ->onDelete('SET NULL');
            $table->timestamp('email_verified_at')->nullable();
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
