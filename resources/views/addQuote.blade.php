@extends('layout')

@section('content')

    <body class="flex flex-col gap-64 h-screen justify-center items-center">

        <x-arrow></x-arrow>

        <form method="POST" action="/add/quote" enctype="multipart/form-data" class="flex items-center w-2/12">
            @csrf
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
                        id="thumbnail" required>
                    @error('thumbnail')
                        <p class="text-red-500 text-lg mt-1 absolute bottom-0 left-0 translate-y-full">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="bg-white text-black uppercase font-bold text-2xl py-2 px-10 rounded-2xl hover:bg-gray-500 hover:text-white w-1/2 self-center mt-12 shadow-md">{{ __('translate.add_quote') }}</button>
            </div>


        </form>

        <div class="flex flex-col h-1/3 w-1/3 overflow-scroll scrollHide rounded-lg">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                {{-- @dd(
                                $allMovie->get(1)->first()->quote->first()->quote,
                            ) --}}

                                @foreach ($quotes as $quote)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex gap-8 items-center">
                                                <div class="flex-shrink-0 h-12 w-12">
                                                    <div class="rounded-full h-12 w-12 bck"
                                                        style="background-image: url('/storage/{{ $quote->thumbnail }}')">

                                                    </div>
                                                </div>

                                                <div class="text-2xl font-xl text-gray-900">

                                                    <a href="/posts/{{ $quote->movie->name }}">
                                                        {{ $quote->movie->name }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-2xl font-xl text-gray-900">

                                                    <a href="/posts/{{ $quote->quote }}">
                                                        "{{ $quote->quote }}""
                                                    </a>
                                                </div>
                                            </div>
                                        </td>


                                        <td class="px-6 py-4 whitespace-nowrap text-right text-2xl font-xl">
                                            <a href="/admin/quotes/{{ $quote->id }}/edit"
                                                class="text-blue-500 hover:text-blue-600">{{ __('translate.edit') }}</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-2xl font-xl">
                                            <form method="POST" action="/admin/quotes/{{ $quote->id }}">
                                                @csrf
                                                @method('DELETE')

                                                <button class="text-2xl text-red-400">{{ __('translate.delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>




        <x-languages></x-languages>

        <x-success></x-success>
    </body>
@endsection
