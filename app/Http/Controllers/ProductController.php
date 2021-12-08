<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\State;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('cliente/products-index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // $product = Product::findOrFail($product->id);
        $product = Product::join('raffles', 'products.id', '=', 'raffles.idProducto')
            ->where('products.id', '=', $product->id)
            ->select('products.*', 'raffles.precioTicket', 'raffles.cantidadPart')
            ->first();

        $cantPartActual = Product::join('raffles', 'products.id', '=', 'raffles.idProducto')
            ->join('tickets', 'raffles.id', '=', 'tickets.idRifa')
            ->where('products.id', '=', $product->id)
            ->select('tickets.idRifa')
            ->get()
            ->count();

        return view('cliente.products-show', compact('product', 'cantPartActual'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }



    public function index_admi(){
        $products = Product::all();

        return view('administracion/products-index', compact('products'));
    } 

    public function create_admi(){

        $categories = Category::all();
        $states = State::all();

        return view('administracion/products-create', compact('categories','states'));
    }

    public function store_admi(Request $request){
        $product = new Product;
        $product->nombre = $request->nombre;
        $product->descripcion = $request->descripcion;
        $product->marca = $request->marca;        
        if($request->hasFile('imagen')){
            $product->imagen = $request->file('imagen')->store('images','public');
        }
        $product->detalle = $request->detalle;
        $product->precio = $request->precio;
        $product->idEstado = $request->estado;
        $product->idCategoria = $request->categoria;
        $product->save();

        return redirect('dashboard/products');
    }

    public function edit_admi($id){
        $product = Product::findOrFail($id);
        
        return view('administracion/product-edit', compact('product'));
    }

    public function update_admi(Request $request, Product $product){
        $product = Product::findOrFail($product->id);

        $product->nombre = $request->nombre;
        $product->descripcion = $request->descripcion;
        $product->marca = $request->marca;
        $product->detalle = $request->detalle;
        $product->precio = $request->precio;
        $product->idEstado = $request->estado;
        $product->idCategoria = $request->categoria;
        $product->update();

        return redirect('dashboard/products');
    }

    public function delete_admi(){
        
    }
}
