<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class pokemonController extends Controller
{
    /**
     * Display all pokemon
     */
    public function index()
    {
        $data = Http::get("https://pokeapi.co/api/v2/pokemon/ditto")->json();
        // dd($data['sprites']['front_default']);
                return view('pokemon', ['data' => $data]);
    }
}
