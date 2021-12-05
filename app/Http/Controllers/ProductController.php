<?php

namespace App\Http\Controllers;

use App\Models\Product;
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

        return view('products.index', compact('products'));
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
        $product->Product::finOrFail($product->id);

        return view('products.show', compact('product'));
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

        return view('administracion/products-create');
    }

    public function store_admi(Request $request){
        $product = new Product;
        $product->nombre = $request->nombre;
        $product->descripcion = $request->descripcion;
        $product->marca = $request->marca;
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
