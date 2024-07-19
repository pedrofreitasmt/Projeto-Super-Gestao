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
        Schema::table('produto_detalhes', function(Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produto_detalhes', function(Blueprint $table) {
            // Removendo a FK
            $table->dropForeign('produto_detalhes_unidade_id_foreign'); //[table]_[coluna]_foreign

            // Removendo a coluna unidade_id
            $table->dropColumn('unidade_id');
        });
    }
};
