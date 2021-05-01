<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('qty');
            $table->bigInteger('merks_id')->unsigned();
            $table->bigInteger('kategoris_id')->unsigned();
            $table->integer('harga');
            $table->string('foto')->nullable();
            $table->timestamps();

            $table->foreign('merks_id')->references('id')->on('merks'); 
        $table->foreign('kategoris_id')->references('id')->on('kategoris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
