<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taliasih', function (Blueprint $table) {
            $table->id();
            $table->string('unit', 100);
            $table->integer('jumlah_anggota');
            $table->date('tanggal');
            $table->integer('total');
            $table->string('foto', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taliasih');
    }
};
