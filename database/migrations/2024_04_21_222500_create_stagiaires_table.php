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
        Schema::create('stagiaires', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('lastname');
        $table->string('cef');
        $table->string('num_inscription');
        $table->date('date_naissance');
        $table->string('groupe');
        $table->date('date_inscription');
        $table->string('image')->nullable();
        $table->timestamps();
        });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stagiaires');
    }
};
