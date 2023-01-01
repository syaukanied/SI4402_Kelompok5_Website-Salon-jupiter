<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name');
            $table->string('address');
            $table->dateTime('date');
            $table->decimal('price', 16,2)->nullable();
            $table->foreignId('service_id')->nullable()->references('id')->on('services');
            $table->foreignId('service_category_id')->nullable()->references('id')->on('service_categories');
            $table->foreignId('service_sub_category_id')->nullable()->references('id')->on('service_sub_categories');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('barber_id')->references('id')->on('barbers');
            $table->boolean('is_finish')->default(false);
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
};
