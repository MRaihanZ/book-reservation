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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('book_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->enum('status', [
                'menunggu',
                'disetujui',
                'ditolak',
                'dikembalikan',
                'hilang',
                'dibatalkan'
            ])->default('menunggu');

            $table->date('reservation_date');

            $table->date('due_date');

            $table->date('returned_at')
                ->nullable();

            $table->foreignId('approved_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('approved_at')
                ->nullable();

            $table->text('notes')
                ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
