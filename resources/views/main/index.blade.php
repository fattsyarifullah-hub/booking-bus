@extends('main.layouts.app')

@section('title', 'BERANDA')

@section('content')
    <div>
        <nav class="sticky top-0 w-full z-50 flex justify-end p-2.5 mb-2.5 bg-white">
            @guest
                <p class="pr-6 font-sans text-violet-700 font-bold"><a href="/login">Login</a></p>
                <p class="pr-3 font-sans text-violet-700 font-bold"><a href="/register">Register</a></p>
            @endguest

            @auth
                <p class="pr-6 pt-1 font-sans text-violet-700 font-bold text-shadow-sm"><a href="{{ route('main.account') }}">Your
                        Account</a></p>
                <form action="/logout" method="POST"
                    class="bg-violet-700 text-white
                    font-bold px-2.5 py-1 rounded transition hover:bg-violet-400">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @endauth
        </nav>

        <header>
            <div class="relative w-full h-[400px] md:h-[500px] bg-cover bg-center flex flex-col justify-content items-center px-4"
                style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?q=80&w=2000');">

                <div class="text-center text-white mt-12 md:mt-20 z-10">
                    <h1 class="text-3xl md:text-5xl font-extrabold tracking-wide drop-shadow-md">
                        Book Ticket Bus Platform
                    </h1>
                    <p class="text-violet-300 font-semibold text-sm md:text-lg mt-2 tracking-wider">
                        Need Bus For Your Trip? Book Though Us !
                    </p>
                </div>
            </div>


            <div class="w-full bg-violet-700 p-4 rounded-lg shadow-md">

                <form action="{{ route('main.search') }}" method="GET"
                    class="grid grid-cols-1 md:grid-cols-12 gap-3 items-end w-full">

                    <div class="flex flex-col md:col-span-3">
                        <label class="text-white text-xs font-bold uppercase mb-1">Bus Name</label>
                        <input type="text" name="bus_name" value="{{ $busNameSearch ?? '' }}"
                            placeholder="e.g. Citra Harapan"
                            class="w-full bg-violet-100/90 text-gray-800 placeholder-gray-400 text-sm rounded px-3 py-2.5 focus:outline-none">
                    </div>

                    <div class="flex flex-col md:col-span-3">
                        <label class="text-white text-xs font-bold uppercase mb-1">Rute From</label>
                        <input type="text" name="rute_from" value="{{ $ruteFromSearch ?? '' }}"
                            placeholder="City Of Departure"
                            class="w-full bg-violet-100/90 text-gray-800 placeholder-gray-400 text-sm rounded px-3 py-2.5 focus:outline-none">
                    </div>

                    <div class="flex flex-col md:col-span-3">
                        <label class="text-white text-xs font-bold uppercase mb-1">Rute To</label>
                        <input type="text" name="rute_to" value="{{ $ruteToSearch ?? '' }}"
                            placeholder="Destination City"
                            class="w-full bg-violet-100/90 text-gray-800 placeholder-gray-400 text-sm rounded px-3 py-2.5 focus:outline-none">
                    </div>

                    <div class="md:col-span-2">
                        <button type="submit"
                            class="w-full bg-white text-violet-700 hover:bg-violet-700 hover:text-white hover:border border-white font-extrabold text-sm uppercase rounded py-2.5 transition shadow-sm">
                            Search
                        </button>
                    </div>

                    <div class="md:col-span-1">
                        <a href="{{ route('main.index') }}"
                            class="w-full block text-center bg-transparent border border-white text-white hover:bg-white hover:text-violet-700 font-bold text-sm uppercase rounded py-2.5 transition">
                            Reset
                        </a>
                    </div>
                </form>
            </div>
        </header>

        <main>
            <div class="container mx-auto px-4 py-8">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    @foreach ($allBus as $data)
                        <div
                            class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden flex flex-col justify-between transition-all duration-300 hover:shadow-lg hover:-translate-y-1">

                            <div class="relative h-48 w-full bg-gray-100">
                                <img src="{{ asset('storage/image/' . $data->image) }}"
                                    alt="{{ $data->bus_name }}" class="w-full h-full object-cover">
                            </div>

                            <div class="p-5 flex-grow flex flex-col justify-between">

                                <div>
                                    <h3 class="text-lg font-bold text-gray-900 mb-1 tracking-tight">
                                        {{ $data->bus_name }}
                                    </h3>

                                    <p class="text-sm text-gray-500 mb-4 font-medium uppercase tracking-wider">
                                        {{ $data->rute_from }} → {{ $data->rute_to }}
                                    </p>

                                    <small class="text-sm text-gray-500 mb-4 font-medium uppercase tracking-wider">
                                        {{ Number::currency($data->price, 'IDR', 'id', precision:0 ) }}
                                    </small><br>

                                    <small class="text-xs text-gray-500 mb-4 font-medium uppercase tracking-wider">
                                        Keberangkatan : {{ \Carbon\Carbon::parse($data->departure_time)->format('d M Y') }}
                                    </small>
                                </div>

                                <div class="mt-2">
                                    <a href="{{ route('main.showBooking', $data->id) }}"
                                        class="block w-full text-center bg-violet-700 hover:bg-violet-400 text-white font-semibold text-sm py-2.5 px-4 rounded-lg transition-colors duration-200 shadow-sm">
                                        Lihat Detail Bus
                                    </a>
                                </div>

                            </div>

                        </div>
                    @endforeach

                </div>
            </div>
            <div class="flex justify-center items-center">
                {{ $allBus->links() }}
            </div>
        </main>

        <footer>

        </footer>
    </div>
@endsection
