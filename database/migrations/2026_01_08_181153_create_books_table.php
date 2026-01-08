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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
        
            $table->foreignId('members_id')
                ->constrained('members')
                ->onDelete('cascade');
            $table->string('title', 100);
            $table->string('author', 100);
            $table->string('isbn', 100)->unique();
            $table->integer('publication_year');
            $table->integer('copies_available')->default(0);



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
