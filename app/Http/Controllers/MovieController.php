<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        try {
            $datas = Http::withHeaders([
                // 'X-RapidAPI-Key' => '52cc3ec3',
                // 'X-RapidAPI-Host' => 'imdb8.p.rapidapi.com',
            ])->get('http://www.omdbapi.com/?apikey=52cc3ec3&s=avengers')->json();
            // $call = $this->client->get('your_url?page=' . $page);
            // $response = json_decode($call->getBody()->getContents(), true);
            if ($datas) {
                return view('movies', ['datas' => $datas]);
            } else {
                // echo "404 found  <br> <h1 st>No Data</h1>";
                return view('404');
            }
        } catch (\Exception $e) {
            // echo "404 found  <br> <h1>No Data</h1>";
            return view('404');
        }



        // $datas = json_decode($response, true);
        // dd($datas[0]);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
