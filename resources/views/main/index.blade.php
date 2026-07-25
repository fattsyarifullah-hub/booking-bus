@extends('main.layouts.app')

@section('title', 'BERANDA')

@section('content')
    <div>
        <nav class="sticky top-0 w-full z-50 flex justify-between p-2.5 mb-2.5 bg-white">
            <div class="flex items-center gap-2 text-violet-700 font-bold text-lg ml-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bus-front"
                    viewBox="0 0 16 16">
                    <path
                        d="M5 11a1 1 0 1 1-2 0 1 1 0 0 1 2 0m8 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-6-1a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2zm1-6c-1.876 0-3.426.109-4.552.226A.5.5 0 0 0 3 4.723v3.554a.5.5 0 0 0 .448.497C4.574 8.891 6.124 9 8 9s3.426-.109 4.552-.226A.5.5 0 0 0 13 8.277V4.723a.5.5 0 0 0-.448-.497A44 44 0 0 0 8 4m0-1c-1.837 0-3.353.107-4.448.22a.5.5 0 1 1-.104-.994A44 44 0 0 1 8 2c1.876 0 3.426.109 4.552.226a.5.5 0 1 1-.104.994A43 43 0 0 0 8 3" />
                    <path
                        d="M15 8a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1V2.64c0-1.188-.845-2.232-2.064-2.372A44 44 0 0 0 8 0C5.9 0 4.208.136 3.064.268 1.845.408 1 1.452 1 2.64V4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1v3.5c0 .818.393 1.544 1 2v2a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5V14h6v1.5a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-2c.607-.456 1-1.182 1-2zM8 1c2.056 0 3.71.134 4.822.261.676.078 1.178.66 1.178 1.379v8.86a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 11.5V2.64c0-.72.502-1.301 1.178-1.379A43 43 0 0 1 8 1" />
                </svg>
                <span>BusTicket</span>
            </div>
            <div class="flex">
                @guest
                    <p class="pr-6 font-sans text-violet-700 font-bold"><a href="/login">Login</a></p>
                    <p class="pr-3 font-sans text-violet-700 font-bold"><a href="/register">Register</a></p>
                @endguest

                @auth
                    <p class="pr-6 pt-1 font-sans text-violet-700 font-bold text-shadow-sm">
                        <a href="{{ route('main.account') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </a>
                    </p>
                    <form action="/logout" method="POST"
                        class="bg-violet-700 text-white
                    font-bold px-2.5 py-1 rounded transition hover:bg-violet-400">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                @endauth
            </div>
        </nav>

        <header>
            <div class="relative w-full h-100 md:h-125 bg-cover bg-center flex flex-col justify-content items-center px-4"
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
                                <img src="{{ asset('storage/image/' . $data->image) }}" alt="{{ $data->bus_name }}"
                                    class="w-full h-full object-cover">
                            </div>

                            <div class="p-5 grow flex flex-col justify-between">

                                <div>
                                    <h3 class="text-lg font-bold text-gray-900 mb-1 tracking-tight">
                                        {{ $data->bus_name }}
                                    </h3>

                                    <p class="text-sm text-gray-500 mb-4 font-medium uppercase tracking-wider">
                                        {{ $data->rute_from }} → {{ $data->rute_to }}
                                    </p>

                                    <small class="text-sm text-gray-500 mb-4 font-medium uppercase tracking-wider">
                                        {{ Number::currency($data->price, 'IDR', 'id', precision: 0) }}
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

            {{-- Testimonial Section --}}
            <x-testi-container>

            </x-testi-container>
        </main>

        <footer class="bg-violet-700 border-t border-slate-100 mt-10">
            <div class="max-w-7xl mx-auto px-4 py-8">
                <!-- Grid Konten Utama -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start mb-8">

                    <!-- Kolom 1: Branding Singkat -->
                    <div>
                        <div class="flex items-center gap-2 text-white font-bold text-lg mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-bus-front" viewBox="0 0 16 16">
                                <path
                                    d="M5 11a1 1 0 1 1-2 0 1 1 0 0 1 2 0m8 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m-6-1a1 1 0 1 0 0 2h2a1 1 0 1 0 0-2zm1-6c-1.876 0-3.426.109-4.552.226A.5.5 0 0 0 3 4.723v3.554a.5.5 0 0 0 .448.497C4.574 8.891 6.124 9 8 9s3.426-.109 4.552-.226A.5.5 0 0 0 13 8.277V4.723a.5.5 0 0 0-.448-.497A44 44 0 0 0 8 4m0-1c-1.837 0-3.353.107-4.448.22a.5.5 0 1 1-.104-.994A44 44 0 0 1 8 2c1.876 0 3.426.109 4.552.226a.5.5 0 1 1-.104.994A43 43 0 0 0 8 3" />
                                <path
                                    d="M15 8a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1V2.64c0-1.188-.845-2.232-2.064-2.372A44 44 0 0 0 8 0C5.9 0 4.208.136 3.064.268 1.845.408 1 1.452 1 2.64V4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1v3.5c0 .818.393 1.544 1 2v2a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5V14h6v1.5a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-2c.607-.456 1-1.182 1-2zM8 1c2.056 0 3.71.134 4.822.261.676.078 1.178.66 1.178 1.379v8.86a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 11.5V2.64c0-.72.502-1.301 1.178-1.379A43 43 0 0 1 8 1" />
                            </svg>
                            <span>BusTicket</span>
                        </div>
                        <p class="text-xs text-white leading-relaxed max-w-xs">
                            Sistem manajemen dan pemesanan tiket bus online cepat, aman, dan terpercaya.
                        </p>
                    </div>

                    <!-- Kolom 2: Kontak Hubungi Kami -->
                    <div>
                        <h4 class="text-xs font-semibold text-white uppercase tracking-wider mb-3">Hubungi Kami</h4>
                        <ul class="space-y-2 text-xs text-white">
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.94.725l.548 2.2a1 1 0 01-.321.988l-1.305.98a10.582 10.582 0 004.872 4.872l.98-1.305a1 1 0 01.988-.321l2.2.548a1 1 0 01.725.94V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                    </path>
                                </svg>
                                <span>+62 831-2337-0477</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span>Syarifullahfathan@gmail.com</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Garis Pembatas & Hak Cipta -->
                <div class="border-t border-slate-50 pt-6 flex flex-col sm:flex-row items-center justify-center gap-4">
                    <p class="text-xs text-white">
                        &copy; 2026 BusTicket. All Rights Reserved.
                    </p>
                </div>
            </div>
        </footer>
    </div>
@endsection
