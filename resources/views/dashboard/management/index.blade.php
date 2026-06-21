@extends('main.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div>
    <h1>halaman management index</h1>
    @auth
        <form action="/logout" method="POST"
            class="bg-violet-700 text-white
                    font-bold px-2.5 py-1 rounded transition hover:bg-violet-400">
            @csrf
            <button type="submit">Logout</button>
        </form>
    @endauth
    <h3><a href="{{ route('dashboard.management.bus.index') }}">ini ke bus</a></h3>
</div>
@endsection