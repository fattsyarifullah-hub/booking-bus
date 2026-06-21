@extends('main.layouts.app')

@section('title', 'Form Login')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-violet-700 p-15 rounded-2xl pt-7">
            <h1 class="text-center font-extrabold text-4xl text-white font-sans mb-4">LOGIN</h1>
            <form action="/" method="POST">
                @csrf
                <label for="name" class="text-white text-xs font-bold uppercase mb-1">name</label>
                <input type="text" name="name" placeholder="username anda" size="15"
                    class="w-full bg-violet-100/90 text-gray-800 placeholder-gray-400 text-sm rounded px-3 py-2.5 focus:outline-none"><br><br>
                <label for="password" class="text-white text-xs font-bold uppercase mb-1">password</label>
                <input type="password" name="password" placeholder="password anda" size="15"
                    class="w-full bg-violet-100/90 text-gray-800 placeholder-gray-400 text-sm rounded px-3 py-2.5 focus:outline-none"><br><br>
                <div class="flex justify-center">
                    <button type="submit" name="submit"
                        class="p-5 bg-white text-violet-700 hover:bg-violet-700 hover:text-white hover:border border-white font-extrabold text-sm uppercase rounded py-2.5 transition shadow-sm">login
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
