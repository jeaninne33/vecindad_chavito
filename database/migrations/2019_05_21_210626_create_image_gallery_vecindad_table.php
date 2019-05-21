<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageGalleryVecindadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_gallery_vecindad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->string('nombre');
            $table->string('apodo');
            $table->string('apartamento');
            $table->string('descripcion');
            $table->string('image');
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
        Schema::dropIfExists('image_gallery_vecindad');
    }
}
