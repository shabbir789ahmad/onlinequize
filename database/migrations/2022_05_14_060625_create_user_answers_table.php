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
        Schema::create('user_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quize_id');
            $table->foreign('quize_id')->references('id')->on('quizes')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')->references('id')->on('questions')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('question_option_id')->nullable();
            $table->foreign('question_option_id')->references('id')->on('question_options')->onUpdate('cascade')->onDelete('cascade');
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
           
            $table->string('status');
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
        Schema::dropIfExists('user_answers');
    }
};
