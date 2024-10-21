<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medico', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id');
            $table->unsignedBigInteger('especialidade_id');
            $table->string('nome', 100);
            $table->timestamps();

            $table->foreign('hospital_id')->references('id')->on('hospital')->onDelete('cascade');
            $table->foreign('especialidade_id')->references('id')->on('especialidade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        // Schema::dropIfExists('medico');
    }
};
