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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->foreignId('client_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('group_id')->nullable()->constrained('groups')->onDelete('cascade');
            $table->foreignId('agent_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('provider_id')->constrained('providers')->onDelete('cascade');
            $table->string('booking_platform');
            $table->string('booking_number');
            $table->date('departure_date');
            $table->date('return_date');
            $table->string('origin');
            $table->string('destination');
            $table->string('details')->nullable();
            $table->integer('amount');
            $table->integer('deposit_amount');
            $table->integer('balance_amount');
            $table->date('balance_due_date');
            $table->string('receipt_number');
            $table->string('currency')->default('CAD');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
