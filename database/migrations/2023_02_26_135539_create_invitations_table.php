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
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('qr_code_link', 455)->unique();
            $table->string('guest_name');
            $table->boolean('is_already_received')->default(false);
            $table->time('time_received')->nullable();
            $table->integer('guest_estimates')->nullable();
            $table->integer('arriving_guest')->nullable();
            $table->foreignId('wedding_id')->constrained('weddings')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
