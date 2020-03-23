<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('work_id');
            $table->string('name', 255)->nullable();
            $table->string('alt', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->char('basename', 40);
            $table->string('ext', 5);
            $table->unsignedSmallInteger('pos')->default(0);

            $table->foreign('work_id')->references('id')->on('works')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_images');
    }
}
