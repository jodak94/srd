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
        DB::statement('ALTER TABLE documentos ALTER COLUMN nro_registro DROP DEFAULT');
        DB::statement('ALTER TABLE documentos ALTER COLUMN nro_registro TYPE VARCHAR(20) USING nro_registro::VARCHAR');
    }

    public function down()
    {
        DB::statement('ALTER TABLE documentos ALTER COLUMN nro_registro TYPE INTEGER USING nro_registro::INTEGER');
    }
};
