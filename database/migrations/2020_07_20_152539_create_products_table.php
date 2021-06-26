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
            $table->unsignedBigInteger('product_category_id');
            $table->string('code');
            $table->string('image')->nullable();
            $table->text('album')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('sort_description')->nullable();
            $table->text('description')->nullable();
            $table->text('information')->nullable();
            $table->decimal('price',20,0)->nullable();
            $table->decimal('sale',20,0)->nullable();
            $table->integer('status')->default(1);
            $table->integer('purchase')->nullable()->default(0);
            $table->integer('qty')->nullable()->default(0);
            $table->float('score',2)->nullable()->default(0);
            $table->integer('votes')->nullable()->default(0);
            $table->string('address')->nullable();
            $table->string('property_category')->nullable()->default('');
            $table->decimal('online',20,0)->nullable()->default(0);
            $table->timestamps();

            $table->foreign('product_category_id')
                ->references('id')->on('product_categories')
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
