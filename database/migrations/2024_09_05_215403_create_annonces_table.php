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
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->enum('type_annonce', ['location', 'vente'])
                    ->default('location');
            $table->text('description');
            $table->enum('statut', ['disponible', 'indisponible'])
            ->default('disponible');
            $table->float('prix');
            $table->string('image');
            $table->foreignId('bien_immobilier_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annonces');
    }
};
