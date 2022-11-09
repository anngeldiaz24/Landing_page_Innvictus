<?php

namespace App\Http\Controllers;

//Clase para que funcionen las operaciones en la DB
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class SitioController extends Controller
{
    public function landingpage()
    {
        return view('landingpage');
    }

    public function recibeFormContacto(Request $request)
    {
        //Verifica la informacion que se envia
        //dd($request->all());
        //echo $request;
        //Recibe info
        //Verifica los datos
        //Inserta en la BD
        //Reedirige

        //Validaciones
        $request->validate([
            'name' => 'required|max:255|min:2',
            'email' => ['required', 'email'],
            'telefono' => 'required|digits:10',
            'message' => 'required|max:255',

        ]);

        DB::table('contactos')->insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'telefono'=>$request->telefono,
            'message'=>$request->message,
            'created_at' => now(),
            'updated_at'=> now(),
        ]);

        return redirect('/contacto');
    }

    public function contacto($codigo=null)
    {
        if($codigo == '1234'){
            $nombre = "Angel Díaz";
            $email = "angel_diaz24@gmail.com";
            $telefono = "3349502981";

        }else{
            $nombre = null;
            $email = null;
            $telefono = null;
        }
    
        return view('contacto', compact('codigo', 'nombre', 'email', 'telefono'));
    }

}
