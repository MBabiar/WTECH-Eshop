<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_phone');
            $table->string('transportation');
            $table->string('payment_method');
            $table->string('user_country');
            $table->string('user_city');
            $table->string('user_zip');
            $table->string('user_street');
            $table->integer('user_house_number');
            $table->float('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
