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
        Schema::table('agendamento', function (Blueprint $table) {
            $table->dropColumn('status'); // remove a coluna existente se necessário
        });

        DB::statement("ALTER TABLE agendamento ADD COLUMN status ENUM('Sim', 'Não') NOT NULL");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agendamento', function (Blueprint $table) {
            $table->string('status')->default('Sim');
        });

    }
};
