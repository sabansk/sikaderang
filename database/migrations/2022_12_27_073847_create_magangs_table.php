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
        Schema::create('magangs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("nama_peserta"); // bisakah ini lgsg ditarik dari database saja?
            $table->string("asal_instansi"); // ini juga, jd duaji ini yg diambil dari database baru auto-input(?) kyk timestamp
            $table->string("dinas_magang");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('magangs');
    }
};
