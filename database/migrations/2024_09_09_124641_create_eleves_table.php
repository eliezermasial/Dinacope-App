<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('classe');
            $table->date('date_naissance');
            $table->foreignId('ecole_id')->constrained('ecoles')->onDelete('cascade');//nullable est temporaire
            $table->foreignId('annee_scolaire_id')->nullable()->constrained('annees_scolaires')->onDelete('cascade');//nullable est temporaire
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eleves');
    }
};
