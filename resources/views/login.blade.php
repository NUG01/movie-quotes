@extends('layout')

@section('content')

    <body class="flex h-screen justify-center">
        @if(Request::url() === '/')
    <x-arrow></x-arrow>
@endif

        <form method="POST" action="/login" class="flex items-center w-[21%]">
            @csrf
            <div class="flex flex-col gap-8 w-full bg-gray-400 p-12 rounded-xl drop-shadow-2xl">
                <div class="flex flex-col relative">
                    <label for="username"
                        class="block mb-2 uppercase font-semibold text-2xl text-gray-800">{{ __('translate.username') }}</label>
                    <input type="text" name="username" id="username"
                        class="p-2 w-full rounded-lg h-16 font-semibold text-xl" required>
                    @error('username')
                        <p class="text-red-500 text-lg mt-1 absolute bottom-0 left-0 translate-y-full">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col relative">
                    <label for="password"
                        class="block mb-2 uppercase font-semibold text-2xl text-gray-800">{{ __('translate.password') }}</label>
                    <input type="password" name="password" id="password"
                        class="p-2 w-full rounded-lg h-16 max-h-32 font-semibold text-xl" required>
                    @error('password')
                        <p class="text-red-500 text-lg mt-1 absolute bottom-0 left-0 translate-y-full">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-white flex items-center justify-center text-gray-800 uppercase font-bold text-3xl py-4 px-12 rounded-2xl hover:bg-gray-500 hover:text-white w-1/2 self-center mt-12 shadow-md">{{ __('translate.Log_in') }}</button>
            </div>


        </form>



        <x-languages></x-languages>

        <x-success></x-success>
    </body>
@endsection
