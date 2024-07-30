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
        Schema::table('site_contatos', function(Blueprint $table){
            $table->dropColumn('motivo_contatos_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_contatos', function(Blueprint $table){
            $table->unsignedBigInteger('motivo_contatos_id');
        });
    }
};
