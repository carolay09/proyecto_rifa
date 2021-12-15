<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::join('states','categories.idEstado', '=', 'states.id')
           ->select('categories.*','states.nombre as nombreEstado')
            ->get();
        return view('administracion/categories-index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administracion/categories-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'imagen' => 'required|image|mimes:jpg,jpeg,png,svg|max:1024',
        ]);
        $category = new Category;
        $category->nombre = $request->nombre;
        if($request->hasFile('imagen')){
            $category->imagen = $request->file('imagen')->store('images','public');
        }
        $category->idEstado = '12';
        $category->save();

        return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('administrcaion/category-edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        
        $category = Category::findOrFail($category->id);
        $request -> validate([
            'imagen' => 'image|mimes:jpg,jpeg,png,svg|max:1024',
        ]);

        $category->nombre = $request->nombre;
        if($request->hasFile('imagen')){
            Storage::delete('public/'.$category->imagen);
            $category->imagen = $request->file('imagen')->store('images','public');
        }
        $category->update();

        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
    }

    public function update_state(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        if($request->nombreEstado == 'bloqueado'){
            $category->idEstado = '13';
        }
        else if($request->idEstado = 'desbloqueado'){
            $category->idEstado = '12';
        }
        $category->update();
        
        return redirect('categories');
    }

    public function cliente_index(){
        $categories = Category::all();

        return view('cliente.home', compact('categories'));
    }
}
