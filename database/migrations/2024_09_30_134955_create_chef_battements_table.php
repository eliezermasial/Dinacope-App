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
        Schema::create('chef_battements', function (Blueprint $table) {
            $table->id();
            $table->string('nom_chef');
            $table->string('prenom_chef');
            $table->string('email_chef')->nullable();
            $table->foreignId('ecole_id')->constrained('ecoles')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chef_battements');
    }
};
