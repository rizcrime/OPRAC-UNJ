<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CollectAssign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collect_assign', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assignment')->references('id')->on('assignments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('assessor')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('guider')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('collector')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('file')->nullable();
            $table->string('description')->nullable();
            $table->string('proof')->nullable();
            $table->string('proof_2')->nullable();
            $table->string('score')->nullable();
            $table->string('score_2')->nullable();
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
        Schema::dropIfExists('collect_assign');
    }
}
