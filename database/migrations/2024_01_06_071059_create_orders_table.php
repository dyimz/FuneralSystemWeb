<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('address');
            $table->string('contact');
            $table->string('discounted');
            $table->integer('subtotal');
            $table->integer('total_price');
            $table->string('MOP');
            $table->string('POP')->nullable();
            $table->string('type');
            $table->string('status');
            
            $table->string('deceased_id')->nullable();
            $table->string('package_id')->nullable();
            $table->string('message')->nullable();
            $table->string('cascketsize')->nullable();
            $table->string('formalin')->nullable();
            $table->string('memorialproducts')->nullable();
            $table->string('makeup')->nullable();
            $table->string('note')->nullable();
            $table->string('paymentstatus')->nullable();
            $table->string('locationfrom')->nullable();
            $table->string('locationto')->nullable();
            $table->datetime('durationfrom')->nullable();
            $table->datetime('durationto')->nullable();
            
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_product');
    }
};
