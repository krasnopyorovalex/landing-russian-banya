<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guestbooks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 512);
            $table->text('text');
            $table->date('published_at')->default(now());
            $table->enum('is_published',[0,1])->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guestbooks');
    }
}
