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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->nullable()->constrained('bookings')->onDelete('cascade');
            $table->foreignId('dossier_id')->nullable()->constrained('dossiers')->onDelete('cascade');
            $table->foreignId('agent_id')->nullable()->constrained('users');
            $table->string('transaction_type');
            $table->string('paiement_method');
            $table->integer('amount');
            $table->integer('paid_amount');
            $table->integer('balance_amount');
            $table->string('confirmation_number');
            $table->string('status');
            $table->string('currency')->default('CAD');
            $table->string('details')->nullable();
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
