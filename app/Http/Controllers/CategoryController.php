<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only('create', 'store', 'edit', 'update');

    }

    public function index()
    {
        $categories = Category::join('states','categories.idEstado', '=', 'states.id')
           ->select('categories.*','states.nombre as nombreEstado')
            ->get();
        return view('administracion/categories-index', compact('categories'));
    }

    public function create()
    {
        return view('administracion/categories-create');
    }

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

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('administracion/category-edit', compact('category'));
    }

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
