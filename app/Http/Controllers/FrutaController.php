<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fruta;

class FrutaController extends Controller
{
    public function List(Request $request){
        return $fruta = Fruta::all();
    }

    public function Create(Request $request){
        $fruta = new Fruta();
        $fruta -> nombre = $request -> post("nombre");
        $fruta -> tipo = $request -> post("tipo");
        $fruta -> precio = $request -> post("precio");
        $fruta -> gramos = $request -> post("gramos");

        $fruta -> save();

        return $fruta;
    }
}
