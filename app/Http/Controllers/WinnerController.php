<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Winner;

class WinnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $winners = Winner::join('users','winners.idUsuario', '=', 'users.id')
            ->select('users.*','winners.*')        
            ->get();
        return view('administracion/winners-index', compact('winners'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $winner = new Winner;
        $winner->idUsuario = $request->idUsuario;
        $winner->idRifa = $request->idRifa;
        $winner->nroTicket = $request->nroTicket;
        $winner->save();

        return redirect('winners');
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
