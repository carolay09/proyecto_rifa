<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmailController extends Controller
{
   
    public function index()
    {
        $emails = Email::all();

        return view('administracion/emails-index', compact('emails'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $email = new Email;
        $email->email = $request->correoPublicidad;
        $email->save();

        return redirect('/');
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, Email $email)
    {
               
    }


}
