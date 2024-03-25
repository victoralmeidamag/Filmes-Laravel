@extends('layouts.main')

@php
    use Carbon\Carbon;
@endphp

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Filmes Populares</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($FilmesPopulares as $popular)
                <div class="mt-8">
                    <a href="{{route('filmes.show', $popular['id'])}}">
                        <img src="{{'https://image.tmdb.org/t/p/w500/'.$popular['poster_path']}}" alt="POSTER" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="{{route('filmes.show', $popular['id'])}}" class="text-lg mt-2 hover:text-gray:300">{{ $popular['title'] }}</a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24">
                                <g data-name="Layer 2">
                                    <path
                                        d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z"
                                        data-name="star" />
                                </g>
                            </svg>
                            <span class="ml-1">{{ round($popular['vote_average'] * 10) . '%'}}</span>
                            <span class="mx-2">|</span>
                            <span>{{ Carbon::createFromFormat('Y-m-d' , $popular['release_date'])->format('d/m/Y') }}</span>
                        </div>
                        <div class="text-gray-400 text-sm">
                            @foreach ($popular['genre_ids'] as $genero)
                                {{ $generos->get($genero) }}@if(!$loop->last),
                                @endif
                                    
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>

        <div class="now-playing-movies py-24">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Filmes Novos</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($FilmesNovos as $novo)
                <div class="mt-8">
                    <a href="{{route('filmes.show', $novo['id'])}}">
                        <img src="{{'https://image.tmdb.org/t/p/w500/'.$novo['poster_path']}}" alt="filme"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="{{route('filmes.show', $novo['id'])}}" class="text-lg mt-2 hover:text-gray:300">{{ $novo['title'] }}</a>
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24">
                                <g data-name="Layer 2">
                                    <path
                                        d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z"
                                        data-name="star" />
                                </g>
                            </svg>
                            <span class="ml-1">{{ round($novo['vote_average'] * 10) . '%'}}</span>
                            <span class="mx-2">|</span>
                            <span>{{ Carbon::createFromFormat('Y-m-d' , $novo['release_date'])->format('d/m/Y') }}</span>
                        </div>
                        <div class="text-gray-400 text-sm">
                            @foreach ($novo['genre_ids'] as $genero)
                            {{ $generos->get($genero) }}@if(!$loop->last),
                            @endif
                                
                        @endforeach
                        </div>
                    </div>
                </div>    
                @endforeach
                
            </div>
        </div>

    </div>
@endsection
