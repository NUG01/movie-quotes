@extends('layout')

@section('content')

    <body class="flex flex-col gap-64 h-screen justify-center items-center">

        <a href="/add/quote" class="absolute top-0 left-0 translate-y-1/2 translate-x-full">
            <ion-icon name="arrow-back-outline" class="text-6xl text-white hover:drop-shadow-xl">
            </ion-icon>
        </a>

        <form method="POST" action="/admin/quotes/{{ $quote->id }}" enctype="multipart/form-data"
            class="flex items-center w-2/12">
            @csrf
            @method('PATCH')
            <div class="flex flex-col gap-8 w-full">
                <div class="flex flex-col relative">
                    <label for="movie_id"
                        class="block mb-2 uppercase font-bold text-lg text-white">{{ __('translate.movie') }}</label>
                    <select type="text" name="movie_id" id="movie_id"
                        class="p-2 w-full rounded-lg h-16 max-h-32 font-semibold text-xl" required>
                        @foreach ($allMovie as $movie)
                            <option>{{ $movie->name }}</option>
                        @endforeach

                    </select>
                    @error('movie_id')
                        <p class="text-red-500 text-lg mt-1 absolute bottom-0 left-0 translate-y-full">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col relative">
                    <label for="quote"
                        class="block mb-2 uppercase font-bold text-lg text-white">{{ __('translate.quote') }}</label>
                    <textarea type="text" name="quote" id="quote" class="p-2 w-full rounded-lg h-16 max-h-32 font-semibold text-xl"
                        required></textarea>
                    @error('quote')
                        <p class="text-red-500 text-lg mt-1 absolute bottom-0 left-0 translate-y-full">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col relative">
                    <label for="thumbnail"
                        class="block mb-2 uppercase font-bold text-lg text-white">{{ __('translate.image') }}</label>
                    <input type="file" name="thumbnail" class="border border-gray-400 p-2 w-full rounded-lg"
                        id="thumbnail">
                    @error('thumbnail')
                        <p class="text-red-500 text-lg mt-1 absolute bottom-0 left-0 translate-y-full">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-white text-black uppercase font-bold text-2xl py-2 px-10 rounded-2xl hover:bg-gray-500 hover:text-white w-1/2 self-center mt-12 shadow-md">{{ __('translate.add_quote') }}</button>
            </div>


        </form>



        <x-languages></x-languages>

        <x-success></x-success>
    </body>
@endsection
