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
        Schema::create('presences', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('presence_status', ['Hadir', 'Tidak Dapat Hadir']);
            $table->integer('guest_estimates')->nullable();
            $table->text('wishes')->nullable();
            $table->foreignId('wedding_id')->constrained('weddings')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presences');
    }
};
