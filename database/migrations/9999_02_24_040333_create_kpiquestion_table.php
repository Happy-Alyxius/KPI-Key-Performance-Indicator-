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
        Schema::create('kpiquestions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kpi');
            $table->string("kpi");
            $table->string("target");
            $table->string("bobot");
            $table->string("keterangan");
            $table->timestamps();

            $table->foreign('id_kpi')
                   ->references('id')
                   ->on('kpireqs')
                   ->onDelete('cascade')
                   ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kpiscores');
    }
};
