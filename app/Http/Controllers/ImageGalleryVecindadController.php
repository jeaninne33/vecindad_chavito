<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageGalleryVecindad;
class ImageGalleryVecindadController extends Controller
{
    public function index()
    {
        $images = ImageGalleryVecindad::get();
        return view('vecindad_chavo.index', compact('images'));
    }
    public function create()
    {
        return view('vecindad_chavo.create');
    }
    public function edit($id)
    {
        $image = ImageGalleryVecindad::find($id);
        return view('vecindad_chavo.edit',  compact( 'image'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo'=> 'required',
            'nombre' => 'required',
            'apodo' => 'required',
            'apartamento' => 'nullable|max:50',
            'descripcion' => 'nullable|max:800',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $input= $request->all();
        $input['image'] = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);
        ImageGalleryVecindad::create($input);
        return back()
            ->with('success', 'Image Uploaded successfully.');
    }
   
    public function destroy($id)
    {
        ImageGalleryVecindad::find($id)->delete();
        return back()
            ->with('success', 'Image removed successfully.');
    }

}
