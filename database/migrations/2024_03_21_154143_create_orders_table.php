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
            $table->decimal('total',10,2);
            $table->string('route')->nullable();
            $table->unsignedBigInteger('customers_id');
            $table->dateTime('dateOrder');
            $table->string('status')->nullable();
            $table->string('registerby')->nullable();
            $table->timestamps();
            $table->foreign('customers_id')
            ->references('id')->on('customers');
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
