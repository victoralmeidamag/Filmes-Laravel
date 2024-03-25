<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FilmesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $popular = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/popular?language=pt-Br')
        ->json()['results'];

        $novos = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/now_playing?language=pt-BR')
        ->json()['results'];

        $gerenosArray = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/movie/list?language=pt')
        ->json()['genres'];

        $generos = collect($gerenosArray)->mapWithKeys(function ($genero){
            return [$genero['id'] => $genero['name']];
        });

        return view('index',[
            'FilmesPopulares'=>$popular,
            'generos'=>$generos,
            'FilmesNovos'=>$novos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $filme = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'.$id .'?language=pt-BR')
        ->json();

        $creditos = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'.$id .'/credits?language=pt-BR')
        ->json();
        
        $video = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'.$id .'/videos?language=pt-BR')
        ->json();

        $imagens = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/movie/'.$id .'/images')
        ->json();

        return view('show', [
            'filme' => $filme,
            'creditos'=>$creditos,
            'video'=>$video,
            'imagens'=>$imagens,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
