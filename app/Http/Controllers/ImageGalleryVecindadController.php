<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageGalleryVecindad;
class ImageGalleryVecindadController extends Controller
{
    public function index( Request $request)
    {
        $search = ''; //se inicializa la cadena de busqueda
        if (isset($request['data']) && !empty($request['data'])) { //si existe una cadena de busqueda
           
            $search = preg_replace("/[\r\n|\n|\r]+/", " ", $request['data']); //se eliminan los saltos de linea de la cadena de busqueda
            $images = ImageGalleryVecindad::where(function ($query) use ($search) { //se hace la busqueda por cualqueira de estos campos de la vista
                $query->where('titulo', 'like', "%{$search}%")
                    ->orWhere('apodo', 'like', "%{$search}%")
                    ->orWhere('nombre', 'like', "%{$search}%");
            })->paginate(3);
        }else{
            if(isset($request['NomOrder']) && !empty($request['NomOrder'])){
                $images = ImageGalleryVecindad::OrderBy('nombre', 'ASC')->paginate(3);
            }elseif(isset($request['ApoOrder']) && !empty($request['ApoOrder'])){
                $images = ImageGalleryVecindad::OrderBy('apodo', 'ASC')->paginate(3);
            }else{
                $images = ImageGalleryVecindad:: paginate(3);
            }
        }
        if ($request->ajax()) {
            return view( 'vecindad_chavo.image')->with([ 'images'=> $images,'search' => $search])->render();
        }  
       
        return view('vecindad_chavo.index')->with(['images' => $images, 'search' => $search]);
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
        return response()->json(['msj' => 'El actor se ha almacenado exitosamente'], 200);
    }
    public function update( $id, Request $request)
    {
        $reglas=[
            'titulo' => 'required',
            'nombre' => 'required',
            'apodo' => 'required',
            'apartamento' => 'nullable|max:50',
            'descripcion' => 'nullable|max:800',
        ];
        if(isset($request->image)){
            $reglas['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }
        $this->validate($request,$reglas);
        $input = $request->all();
        if (isset($request->image)) {
            $input['image'] = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $input['image']);
        }
        $image= ImageGalleryVecindad::find($id);
        $image->fill($input);
        $image->save($input);
        return response()->json(['msj' => 'El actor se ha editado exitosamente'], 200);
    }
   
    public function destroy($id)
    {
        ImageGalleryVecindad::find($id)->delete();
        return back()
            ->with('success', 'Image removed successfully.');
    }

}
