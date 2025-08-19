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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['income', 'expense', 'savings', 'my wish', 'deps', 'receivable'])->default('expense');
            $table->foreignId('user_id')->constrained(
                table: 'users',
                indexName: 'user_transaction_index',
            )->onDelete('cascade');
            $table->foreignId('wallet_id')->nullable()->constrained(
                table: 'wallets',
                indexName: 'wallet_transaction_index',
            )->nullOnDelete();
            $table->foreignId('budget_setting_id')->nullable()->constrained(
                table: 'budget_settings',
                indexName: 'budget_setting_transaction_index',
            )->nullOnDelete();
            $table->foreignId('saving_id')->nullable()->constrained(
                table: 'savings',
                indexName: 'saving_transaction_index',
            )->nullOnDelete();
            $table->foreignId('my_wish_id')->nullable()->constrained(
                table: 'my_wishes',
                indexName: 'my_wish_transaction_index',
            )->nullOnDelete();
            $table->foreignId('debs_id')->nullable()->constrained(
                table: 'debs',
                indexName: 'debs_transaction_index',
            )->nullOnDelete();
            $table->foreignId('category_id')->constrained(
                table: 'categories',
                indexName: 'category_transaction_index',
            )->nullOnDelete();
            $table->string('name')->nullable();
            $table->double('amount');
            $table->date('transaction_date')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
