@extends('main.layouts.app')

@section('title', 'Account User')

@section('content')
    <div class="min-h-screen bg-gray-50 py-10 px-4 md:px-8">
        <div class="max-w-6xl mx-auto">

            <div class="bg-violet-700 rounded-2xl p-6 md:p-8 text-white shadow-lg mb-8 flex items-center justify-between">
                <div>
                    <a href="{{ route('main.index') }}"
                        class="text-sm font-medium text-white hover:text-gray-700 transition-colors duration-200 flex items-start mb-2.5">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg> back
                    </a>

                    <span class="text-violet-200 text-xs font-bold uppercase tracking-widest block mb-1">Selamat Datang
                        Kembali</span>

                    <h1 class="text-2xl md:text-4xl font-black tracking-tight">
                        Hi, {{ $user->name }}!
                    </h1>
                </div>
            </div>

            <h2 class="text-lg font-bold text-gray-800 mb-4 px-1">Riwayat Pemesanan Tiket</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse ($user->buses as $bus)
                    @php
                        $namaUser = $user->name;
                        $namaBus = $bus->bus_name;
                        $tanggal = $bus->departure_time;
                        $booking = $bus->pivot->book_seat;
                        $ticketId = 'TXT - ' . rand(1000, 9999);

                        $ticketString = "TICKET : {$ticketId} | USER : {$namaUser} | BUS : {$namaBus} | BOOKING : {$booking} | KEBERANGKATAN : {$tanggal} |";
                        $qrCode =
                            'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' . urlencode($ticketString);
                    @endphp

                    <div
                        class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 flex flex-col sm:flex-row items-center justify-between gap-5 transition hover:shadow-md">

                        <div class="w-full flex-grow space-y-2">
                            <div>
                                <span class="text-[10px] uppercase font-bold text-gray-400 block">Nama Bus</span>
                                <span class="text-base font-bold text-gray-900">{{ $namaBus }}</span>
                            </div>

                            <div class="grid grid-cols-2 gap-2 pt-1">
                                <div>
                                    <span class="text-[10px] uppercase font-bold text-gray-400 block">Nama Penumpang</span>
                                    <span class="text-xs font-semibold text-gray-700">{{ $namaUser }}</span>
                                </div>
                                <div>
                                    <span class="text-[10px] uppercase font-bold text-gray-400 block">Jumlah Kursi</span>
                                    <span class="text-xs font-semibold text-gray-700">{{ $booking }} Kursi</span>
                                </div>
                            </div>

                            <div class="pt-2 border-t border-gray-100/70">
                                <span class="text-[10px] uppercase font-bold text-gray-400 block">Jadwal
                                    Keberangkatan</span>
                                <span class="text-xs font-medium text-violet-700">
                                    {{ \Carbon\Carbon::parse($tanggal)->format('d M Y') }} WIB
                                </span>
                            </div>
                        </div>

                        <div
                            class="flex flex-col items-center justify-center p-3 bg-gray-50 border border-gray-100 rounded-xl w-36 shrink-0">
                            <img src="{{ $qrCode }}" alt="QR Code Tiket"
                                class="w-28 h-28 object-contain bg-white p-1 rounded-md shadow-inner">
                            <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-2">Scan
                                Tiket</span>
                        </div>

                    </div>
                @empty
                    <div
                        class="col-span-1 md:col-span-2 bg-white rounded-2xl p-12 text-center border border-gray-100 shadow-sm">
                        <div class="text-gray-300 mb-3 flex justify-center">
                        </div>
                        <h3 class="text-base font-bold text-gray-800">Belum Ada Riwayat Pesanan</h3>
                        <p class="text-xs text-gray-400 mt-1">Tiket perjalanan bus yang kamu pesan nantinya akan muncul di
                            sini.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
@endsection
