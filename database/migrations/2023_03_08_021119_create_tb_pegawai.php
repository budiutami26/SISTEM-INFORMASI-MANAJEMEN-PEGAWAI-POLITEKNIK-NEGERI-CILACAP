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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('nip', 100)->unique();
            $table->string('nama', 100);
            $table->string('tempat_lahir', 100);
            $table->date('tgl_lahir');
            $table->string('alamat',100);
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan']);
            $table->enum('Agama',['Islam','Khatolik','Kristen','Budha','Hindu','Khongucu']);
            $table->enum('Pendidikan',['SD','SMP','SMA/SMK','D3','D4/S1','S2','Lainya']);
            $table->enum('Jabatan',['Dosen','Staff','Pekerja','Satpam','Teknisi']);
            $table->string('email', 50);
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
        Schema::dropIfExists('pegawai');
    }
};
