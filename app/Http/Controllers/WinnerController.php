<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Winner;

class WinnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only('index');
    }

    public function index()
    {
        $winners = Winner::join('users','winners.idUsuario', '=', 'users.id')
        ->select('categories.*','users.dni as dniU','users.nombre as nombreU','users.apellido as apellidoU','users.telefono as telefonoU','users.direccion as direccionU','users.email as emailU','users.dni as dniU','users.dni as dniU')
      
            
                
                // <td>{{$winner->rifaU}}</td>
                // <td>{{$winner->ticketU}}</td>
         ->get();
        return view('administracion/winners-index', compact('winners'));

    }

    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Winner  $winner
     * @return \Illuminate\Http\Response
     */
    public function show(Winner $winner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Winner  $winner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Winner  $winner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Winner $winner)
    {
            
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
        
    }

}
