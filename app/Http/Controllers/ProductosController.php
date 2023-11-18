<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class ProductosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$productos=Producto::all();
        //$productos=Producto::paginate(5);
        $productos=Producto::with('categoria:id,nombre')->paginate(5);
        return view('productos.index',['productos'=>$productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias=Categoria::all();
        //
        return view('productos.create',['categorias'=>$categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre'=>'required|min:5|max:30',
            'descripcion'=>'required|min:5|max:100',
            'precio'=>'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'categoria'=>'required|exists:categorias,id'
        ]);

        $producto=Producto::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion,
            'precio'=>$request->precio,
            'categoria_id'=>$request->categoria
        ]);

        session()->flash('status','Se guardo el producto '.$producto->nombre);

        return to_route('productos');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $producto=Producto::find($id);

        return view('productos.edit',['producto'=>$producto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'nombre'=>'required|min:5|max:30',
            'descripcion'=>'required|min:5|max:100',
            'precio'=>'required|numeric|regex:/^\d+(\.\d{1,2})?$/'
        ]);

        $producto=Producto::find($id);

        if($producto){
            $producto->nombre=$request->input('nombre');
            $producto->descripcion=$request->input('descripcion');
            $producto->precio=$request->input('precio');

            $producto->save();
        }

        session()->flash('status','Se actualizo correctamente el producto '.$producto->nombre);

        return to_route('productos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $producto=Producto::find($id);
        if($producto){
            $producto->delete();
        }

        session()->flash('status','Se elimino el producto '.$producto->nombre);

        return to_route('productos');
    }
}
