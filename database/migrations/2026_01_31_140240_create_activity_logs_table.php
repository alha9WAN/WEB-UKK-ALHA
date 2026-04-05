<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('activity_logs', function (Blueprint $table) {
        $table->id();

        // siapa yang melakukan
        $table->foreignId('user_id')->nullable()
              ->constrained()
              ->nullOnDelete();

        // jenis aktivitas
        $table->string('activity_type'); // login, logout, create, update, delete

        // penjelasan aktivitas
        $table->text('description');

        // peran user (admin / resepsionis)
        $table->string('role')->nullable();

        // waktu
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
