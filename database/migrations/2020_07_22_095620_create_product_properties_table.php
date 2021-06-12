<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->string('value');
            $table->string('sub_value')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price',20,0)->nullable();
            $table->decimal('sale',20,0)->nullable();
            $table->integer('qty')->default(0);
            $table->timestamps();

            $table->foreign('property_id')
            ->references('id')->on('properties')
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
        Schema::dropIfExists('product_properties');
    }
}
