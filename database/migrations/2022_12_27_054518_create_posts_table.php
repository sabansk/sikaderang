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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id");
            // $table->string("nama_peserta"); // bisakah ini lgsg ditarik dari database saja?
            // $table->string("asal_instansi"); // ini juga, jd duaji ini yg diambil dari database baru auto-input(?) kyk timestamp
            // $table->string("dinas_magang");
            $table->string("jenis_absen");
            $table->timestamp("jam");
            $table->text("foto_absensi");
            $table->string("geoloc");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
