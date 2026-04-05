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
Schema::create('tools', function (Blueprint $table) {
    $table->id();

    // relasi ke kategori
 $table->foreignId('kategori_id')
      ->constrained('kategoris')
      ->cascadeOnDelete();


    $table->string('code')->unique();  // kode alat unik
    $table->string('name');
    $table->integer('price')->default(0);
    $table->integer('stock')->default(0);

    // belum dipakai
$table->string('condition')->nullable();


    $table->json('features')->nullable();  // fitur multiple
    $table->text('description')->nullable();
    $table->string('image')->nullable();

      // status hanya jaga-jaga
    $table->enum('status', ['tersedia', 'nonaktif'])
          ->default('tersedia');

    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tools');
    }
};