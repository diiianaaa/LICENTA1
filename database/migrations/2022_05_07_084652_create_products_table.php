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
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('product_name_en');
            $table->string('product_name_ger');
            $table->string('product_slug_en');
            $table->string('product_slug_ger');
            $table->string('product_code');
            $table->string('product_quantity');
            $table->string('product_tags_en');
            $table->string('product_tags_ger');     
            $table->string('selling_price');
            $table->string('short_descp_en');
            $table->string('short_descp_ger');
            $table->string('long_descp_en');
            $table->string('long_descp_ger');
            $table->string('product_small');
            $table->integer('featured')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('products');
    }
}


