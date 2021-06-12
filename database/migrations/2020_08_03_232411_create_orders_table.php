<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->text('note')->nullable();
            $table->decimal('subTotal',20,0)->nullable();
            $table->decimal('ship',20,0)->nullable();
            $table->integer('payment')->default(1);
            $table->integer('status')->default(1);
            $table->string('method')->nullable();
            $table->string('vnp_BankCode')->nullable();
            $table->string('vnp_BankTranNo')->nullable();
            $table->string('vnp_CardType')->nullable();
            $table->string('vnp_TransactionNo')->nullable();
            $table->string('vnp_ResponseCode')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
