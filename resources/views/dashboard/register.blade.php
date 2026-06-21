@extends('main.layouts.app')

@section('title', 'form register')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-violet-700 p-15 rounded-2xl pt-7">
            <h1 class="text-center font-extrabold text-4xl text-white font-sans mb-4">REGISTER</h1>
            <form action="/register" method="POST">
                @csrf
                <label for="name" class="text-white text-xs font-bold uppercase mb-1">Name</label><br>
                <input type="text" name="name" placeholder="Username" size="30"
                    class="w-full bg-violet-100/90 text-gray-800 placeholder-gray-400 text-sm rounded px-3 py-2.5 focus:outline-none"><br><br>
                <label for="email" class="text-white text-xs font-bold uppercase mb-1">Email</label><br>
                <input type="email" name="email" placeholder="Email" size="30"
                    class="w-full bg-violet-100/90 text-gray-800 placeholder-gray-400 text-sm rounded px-3 py-2.5 focus:outline-none"><br><br>
                <label for="password" class="text-white text-xs font-bold uppercase mb-1">Password</label><br>
                <input type="password" name="password" placeholder="Password" size="30"
                    class="w-full bg-violet-100/90 text-gray-800 placeholder-gray-400 text-sm rounded px-3 py-2.5 focus:outline-none"><br><br>
                <div class="flex justify-center">
                    <button type="submit" name="submit"
                        class="p-5 bg-white text-violet-700 hover:bg-violet-700 hover:text-white hover:border border-white font-extrabold text-sm uppercase rounded py-2.5 transition shadow-sm">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection
