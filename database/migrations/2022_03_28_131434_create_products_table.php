<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('brand_id')->unsigned();
            $table->string('product_name');
            $table->string('product_code');
            $table->string('product_quantity');
            $table->text('product_details');
            $table->string('product_color')->nullable();
            $table->string('product_size')->nullable();
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('images')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
            $table->foreign('category_id')
            ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
