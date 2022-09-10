<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitioController extends Controller
{
    public function landingpage()
    {
        return view('landingpage');
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
