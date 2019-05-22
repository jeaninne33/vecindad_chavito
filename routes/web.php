<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { //['as' => 'index']
    return view('welcome');
});
Route::resource( 'image-gallery', 'ImageGalleryVecindadController');
// Route::get('image-gallery', 'ImageGalleryVecindadController@index')->name( 'image.gallery');
// Route::post('image-gallery', 'ImageGalleryVecindadController@upload');
// Route::put( 'image-gallery/{id}', 'ImageGalleryVecindadController@edit');
// Route::delete('image-gallery/{id}', 'ImageGalleryVecindadController@destroy');
