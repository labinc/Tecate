<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('batch_id')
             ->nullable()
             ->constrained()
             ->onDelete('SET NULL');
            $table->foreignId('question_id')
             ->nullable()
             ->constrained()
             ->onDelete('SET NULL');
            $table->foreignId('answer_id')
             ->nullable()
             ->constrained()
             ->onDelete('SET NULL');
            $table->integer('score');
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
        Schema::dropIfExists('results');
    }
}
