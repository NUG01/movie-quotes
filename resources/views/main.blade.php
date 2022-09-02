@extends('layout')


@section('content')

    <body class="flex h-screen justify-center">

        <a href="/" class="absolute top-0 left-0 translate-y-1/2 translate-x-3/4">
            <ion-icon name="refresh-outline" class="text-7xl text-white hover:drop-shadow-xl">
            </ion-icon>
        </a>

        @auth
            <div class="flex flex-col absolute top-0 right-0 translate-y-2/4 -translate-x-2/4 gap-12">
                <form method="POST" action="/logout" class="order-2">
                    @csrf
                    <button type="submit"
                        class="order-1 flex items-center justify-center bg-gray-500 py-4 px-8 rounded-xl drop-shadow-xl text-5xl text-white hover:drop-shadow-xl hover:text-gray-600 hover:bg-slate-50">{{ __('translate.Log_out') }}</button>
                </form>
                <div class="order-2" x-data="{ show: false }" @click.away="show= false">
                    <button @click="show = ! show"
                        class="flex items-center justify-center bg-gray-500 py-4 px-8 rounded-xl drop-shadow-xl text-5xl text-white hover:drop-shadow-xl hover:text-gray-600 hover:bg-slate-50 w-full">C.R.U.D
                        <span class="absolute -bottom-1/2 left-1/2 -translate-x-1/2 translate-y-px">
                            <ion-icon name="caret-down-outline"></ion-icon>
                        </span>
                    </button>
                    <div x-show="show" class="absolute w-full -bottom-6 translate-y-full right-0 rounded-xl text-4xl"
                        style="display: none">
                        <a href="/add/movie" class="flex items-center justify-center border-b">
                            <p
                                class="rounded-tl-xl rounded-tr-xl w-full px-4 py-2 pb-4 text-center text-gray-700 bg-slate-50 hover:drop-shadow-xl hover:bg-gray-600 hover:text-slate-50">
                                {{ __('translate.movies') }}</p>
                        </a>
                        <a href="/add/quote" class="flex items-center justify-center border-t">
                            <p
                                class="rounded-bl-xl rounded-br-xl w-full px-4 py-2 pb-4 text-center text-gray-700 bg-slate-50 hover:drop-shadow-xl hover:bg-gray-600 hover:text-slate-50">
                                {{ __('translate.quotes') }}</p>
                        </a>
                    </div>


                </div>

            </div>
        @else
            <a href="/login"
                class="absolute top-0 right-0 translate-y-3/4 bg-gray-500 py-4 px-8 rounded-xl drop-shadow-xl -translate-x-1/2 text-5xl text-white hover:drop-shadow-xl hover:text-gray-600 hover:bg-slate-50">
                {{ __('translate.Log_in') }}
            </a>
        @endauth


        <div class="w-1/2 flex items-center justify-center flex-col gap-12 mt-12">


            <div class="w-8/12 h-1/3 rounded-xl background bck"
                @isset($movies->thumbnail) style="background-image: url('/storage/{{ $movies->thumbnail }}')"> @endisset
                </div>
                <p class="text-7xl
            text-white text-center mt-12">"{{ $movies->quote }}"
                </p>
                <h2 class="text-7xl text-white text-center mt-28 underline underline-offset-4"><a
                        href='/quotes/{{ $movies->movie->id }}'>{{ $movies->movie->name }}</a></h2>

            </div>
            <x-languages></x-languages>
            <x-success></x-success>
    </body>
@endsection
