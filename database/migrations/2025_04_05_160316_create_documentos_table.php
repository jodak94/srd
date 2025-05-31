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
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->integer('nro_registro');
            $table->integer('anho')->nullable();
            $table->integer('semestre')->nullable();
            $table->string('cic')->nullable();
            $table->string('nombre_apellido')->nullable();
            $table->string('nombre_curso')->nullable();
            $table->string('carga_horaria')->nullable();
            $table->string('edicion')->nullable();
            $table->string('numero_resolucion')->nullable();
            $table->date('fecha_resolucion')->nullable();
            $table->string('sexo')->nullable();
            $table->string('resolucion_path')->nullable();
            $table->string('certificado_path')->nullable();

            $table->foreignId('tipo_curso_id')->constrained('tipo_cursos')->onDelete('cascade');
            $table->foreignId('dependencia_id')->constrained('dependencias')->onDelete('cascade');
            $table->foreignId('grado_academico_id')->constrained('grado_academicos')->onDelete('cascade');
            $table->foreignId('calidad_participante_id')->constrained('calidad_participantes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
