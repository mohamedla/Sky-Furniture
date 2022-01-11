<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('item_id');
            $table->char('item_code',100)->unique();
            $table->string('model',255);
            $table->bigInteger('brand_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->double('width', 6, 2);
            $table->double('height', 6, 2);
            $table->double('depth', 6, 2);
            $table->double('price', 8, 2);
            $table->double('discount', 8, 2)->default(0);
            $table->string('main_img',255);
            $table->double('rating', 3, 2)->default(5);
            $table->text('description');
            $table->text('materials');
            $table->integer('views')->default(0);
            $table->integer('purchased')->default(0);
            $table->timestamps();

            $table->foreign('brand_id')->references('brand_id')->on('brands');
            $table->foreign('category_id')->references('category_id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
