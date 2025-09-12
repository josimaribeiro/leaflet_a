<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coordenada;

class MapaController extends Controller
{


    public function index()
    {
        $coordenadas = Coordenada::all();
        return view('coordenadas.index', compact('coordenadas'));
    }

    public function create()
    {
        return view('coordenadas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        Coordenada::create($request->all());

        return redirect()->route('coordenadas.index')
            ->with('success', 'Coordenada cadastrada com sucesso!');
    }

    public function show($id)
    {
        $coordenada = Coordenada::findOrFail($id);
        return view('coordenadas.show', compact('coordenada'));
    }



    public function mapa0()
    {
        $coordenadas = Coordenada::all();
        return view('coordenadas.mapa', compact('coordenadas'));
    }

    public function mapa()
{
    $coordenadas = Coordenada::all();
    $coordenadasJson = json_encode($coordenadas);

    return view('coordenadas.mapa', compact('coordenadas', 'coordenadasJson'));
}


    public function mp1()
    {
        return view('mp1');
    }
    public function mp2()
    {
        return view('mp2');
    }
    public function mp3()
    {
        return view('mp3');
    }
}
