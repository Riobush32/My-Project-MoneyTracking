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
        Schema::create('debs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(
                table: 'users',
                indexName: 'user_deb_index',
            )->onDelete('cascade');
            $table->foreignId('wallet_id')->constrained(
                table: 'wallets',
                indexName: 'wallet_deb_index',
            )->onDelete('cascade');
            $table->string('partner_name');
            $table->double('amount');
            $table->enum('type', ['debt', 'receivable'])->default('debt');
            $table->date('start_date')->nullable();
            $table->date('due_date')->nullable();
            $table->enum('status', ['pending', 'paid', 'overdue'])->default('pending');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debs');
    }
};
