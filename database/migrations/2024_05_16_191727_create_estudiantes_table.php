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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('codigo', 70)->nullable(false); 
            $table->string('nombres', 70);
            $table->string('apellidos', 70);
            $table->unsignedTinyInteger('edad'); 
            $table->decimal('promedio', 5, 2); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
