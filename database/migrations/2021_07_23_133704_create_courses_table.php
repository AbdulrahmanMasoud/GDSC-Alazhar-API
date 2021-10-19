<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('bio')->nullable();
            $table->string('cover')->nullable();
            $table->unsignedBigInteger('track_id')->nullable();
            $table->unsignedBigInteger('instractor_id')->nullable();
            $table->foreign('track_id')->references('id')->on('tracks')->onDelete('cascade');
            $table->foreign('instractor_id')->references('id')->on('users');
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
        Schema::dropIfExists('courses');
    }
}
