<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArsipsuratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsipsurat', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat', 100);
            $table->string('kategori', 100);
            $table->string('judul_surat', 100);
            $table->string('document', 100);
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
        Schema::dropIfExists('arsipsurat');
    }
}
