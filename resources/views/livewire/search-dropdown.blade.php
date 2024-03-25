<div class="relative mt-3 md:mt-0">
    <input wire:model.live="search" type="text"
        class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:shadow-outline" placeholder="Buscar ">
    <div class="absolute top-0">
        <svg class="fill-current w-4 text-gray-500 mt-1.5 ml-1" viewBox="0 0 24 24">
            <path class="heroicon-ui"
                d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z" />
        </svg>
    </div>

    <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>

    @if (strlen($search) >= 2)
    <div class="absolute bg-gray-800 text-sm rounded w-64 mt-4">
        @if ($resultadosBuscar->count() > 0)
        <ul>
            @foreach ($resultadosBuscar as $resultado)
                <li class="border-b border-gray-700">
                    <a href="{{ route('filmes.show', $resultado['id'])}}" class="block hover:bg-gray-700 px-3 py-4 flex items-center">
                        <img src="{{'https://image.tmdb.org/t/p/w92/'.$resultado['poster_path']}}" alt="poster" class="w-12">
                        <span class="m-4">{{ $resultado['title'] }}</span>
                    </a>
                </li>
            @endforeach

        </ul>
        @else
        <div class="px-3 py-3">Sem resultado para "{{$search}}"</div>
        @endif  
    </div>
    @endif
</div>
