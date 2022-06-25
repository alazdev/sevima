<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moduls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('status_id')->constrained('statuses');
            $table->bigInteger('kelas_id')->nullable()->unsigned('kelas')->default(NULL);
            $table->bigInteger('mata_pelajaran_id')->nullable()->unsigned('mata_pelajarans')->default(NULL);
            $table->bigInteger('kategori_id')->nullable()->unsigned('kategoris')->default(NULL);
            $table->string('judul');
            $table->string('sampul');
            $table->foreignId('user_id')->constrained('users');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('moduls');
    }
}
