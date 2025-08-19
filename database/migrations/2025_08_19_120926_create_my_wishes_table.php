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
        Schema::create('my_wishes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(
                table: 'users',
                indexName: 'user_my_wish_index',
            )->onDelete('cascade');
            $table->foreignId('wallet_id')->nullable()->constrained(
                table: 'wallets',
                indexName: 'wallet_my_wish_index',
            )->nullOnDelete();
            $table->string('item_name');
            $table->double('estimated_price');
            $table->double('your_saving')->nullable();
            $table->date('purchase_date')->nullable();
            $table->enum('status', ['pending', 'purchased', 'cancelled'])->default('pending');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_wishes');
    }
};
