<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CheckMailController extends Controller
{
    /**
     * function help me to use Check ApiEmail
     */
    public function search(Request $request)
    {
        $apiKey = "Q0b2xqmiV0Uya2ISFqPzG5yuNvcEUJ";
        $email = $request->validate([
            'search' => ['required', 'email', 'string']
        ]);
        $data = Http::get('https://app.shakelist.io/api/1.0/check.php?apikey=' . $apiKey . '&email=' . $request->search)->json();
        // dd($data);
        return view('search')->with(['response' => $data]);
    }
}
