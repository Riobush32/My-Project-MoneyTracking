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
        Schema::create('savings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(
                table: 'users',
                indexName: 'user_saving_index'
            )->onDelete('cascade');
            $table->foreignId('wallet_id')->nullable()->constrained(
                table: 'wallets',
                indexName: 'wallet_saving_index'
            )->nullOnDelete();
            $table->double('amount')->nullable();
            $table->enum('type', ['money', 'gold'])->default('money');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('savings');
    }
};
