@extends('layout')

@section('content')

    <body class="flex h-screen justify-center">
        <x-arrow></x-arrow>
        <div class="w-2/5 flex justify-start flex-col gap-12 mt-4 overflow-scroll scrollHide">
            <h2 class="text-7xl text-white mt-16 self-start mb-12 pt-12 pl-1 pr-6 pb-12">{{ $slug }}</h2>

            @foreach ($movies->where('name', $slug)->first()->quote as $movie)
                <div class="self-start w-full h-fit rounded-tr-xl rounded-tl-xl rounded-br-xl rounded-bl-xl grid mb-14">
                    <div class="w-full h-full rounded-tr-xl rounded-tl-xl bck"
                        style="background-image: url('/storage/{{ $movie->thumbnail }}')">

                    </div>
                    <p class="text-5xl text-start pt-12 pl-6 pr-6 pb-12 bg-white text-black rounded-br-xl rounded-bl-xl">
                        "{{ $movie->quote }}"</p>
                </div>
            @endforeach


        </div>
        <x-languages></x-languages>
    </body>
@endsection
