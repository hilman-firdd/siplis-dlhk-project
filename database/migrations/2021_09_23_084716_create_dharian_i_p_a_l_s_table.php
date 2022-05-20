<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDharianIPALSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dharian_i_p_a_l_s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('author');
            $table->string('kc'); // Kemarau, Hujan
            $table->string('kaka'); // Kondisi Baik, Kondisi Perlu Perbaikan, Sudah Dalam Penanganan
            $table->string('kaks'); // Kondisi Baik, Kondisi Perlu Perbaikan, Sudah Dalam Penanganan
            $table->bigInteger('jfab'); 
            $table->bigInteger('jsab');
            $table->string('kmb'); // Kondisi Baik, Kondisi Perlu Perbaikan, Sudah Dalam Penanganan, Yang Lainnya
            $table->bigInteger('jbb');
            $table->text('file')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dharian_i_p_a_l_s');
    }
}
