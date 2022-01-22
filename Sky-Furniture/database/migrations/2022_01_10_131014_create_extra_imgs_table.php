<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_imgs', function (Blueprint $table) {
            $table->bigIncrements('img_id');
            $table->bigInteger('item_id')->unsigned();
            $table->string('image',255)->unique();
            $table->timestamps();

            $table->foreign('item_id')->references('item_id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('extra_imgs');
    }
}
