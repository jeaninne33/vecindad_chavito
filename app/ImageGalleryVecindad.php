<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageGalleryVecindad extends Model
{
    protected $table = 'image_gallery_vecindad';
    protected $fillable = [ 'titulo','nombre','apodo', 'apartamento','descripcion', 'image'];
}
