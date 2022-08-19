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
        Schema::create('real_estates', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('user_id')->constrained('users');
            $table->string('country');
            $table->string('slug')->unique();
            $table->string('city');
            $table->string('address');
            $table->double('price')->nullable();
            $table->string('currency')->nullable();
            $table->string('interface')->nullable();
            $table->string('bedrooms')->nullable();
            $table->string('halls')->nullable();
            $table->string('bathrooms')->nullable();
            $table->string('street_width')->nullable();
            $table->string('floor')->nullable();
            $table->string('age')->nullable();
            $table->string('kitchen')->nullable();
            $table->string('elevator')->nullable();
            $table->string('car')->nullable();
            $table->double('space')->nullable();
            $table->enum('payment_method',['كاش','تقسيط']);
            $table->double('phone');
            $table->string('facebook')->nullable();
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
        Schema::dropIfExists('real_estates');
    }
};
