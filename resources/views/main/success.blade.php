@extends('main.layouts.app')

@section('title', 'success payment')

@section('content')
    <div class="min-h-screen bg-gray-50 flex items-center justify-center p-4">

        <div
            class="w-full max-w-md bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden text-center p-6 md:p-8">

            @if (session('success'))
                <div
                    class="inline-flex items-center gap-2 bg-emerald-50 text-emerald-700 text-xs font-bold px-3 py-1.5 rounded-full mb-6">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            <h1 class="text-xl md:text-2xl font-extrabold text-gray-900 tracking-tight">
                Tiket Pembayaran Anda
            </h1>
            <p class="text-sm text-gray-500 mt-2 px-2">
                Silakan pindai QRIS di bawah ini melalui aplikasi pembayaran pilihan Anda untuk menyelesaikan transaksi.
            </p>

            @if (session('total_payment'))
                <div class="my-6 bg-violet-50 rounded-xl p-4 border border-violet-100">
                    <span class="text-xs font-bold text-violet-600 uppercase tracking-wider block mb-1">Total Tagihan</span>
                    <span class="text-2xl md:text-3xl font-black text-violet-700">
                        Rp {{ number_format(session('total_payment'), 0, ',', '.') }}
                    </span>
                </div>
            @endif

            @if (session('qr_code'))
               <div
                    class="relative mx-auto w-64 h-auto bg-white p-4 border-2 border-dashed border-violet-200 rounded-2xl shadow-sm transition hover:border-violet-400">
                    <img src="{{ session('qr_code') }}" alt="QR Code Pembayaran"
                        class="w-full h-auto object-contain rounded-lg">

                    <div
                        class="absolute -left-3 top-1/2 -translate-y-1/2 w-6 h-6 bg-gray-50 rounded-full border-r border-gray-100">
                    </div>
                    <div
                        class="absolute -right-3 top-1/2 -translate-y-1/2 w-6 h-6 bg-gray-50 rounded-full border-l border-gray-100">
                    </div>
                </div>
            @endif
                
            <p class="text-[11px] text-gray-400 font-medium italic mt-4 tracking-wide">
                *Ini adalah barcode simulasi, tidak digunakan untuk pembayaran asli.
            </p>

            <hr class="my-6 border-gray-100">

            <div id="timer-info" class="text-xs font-semibold text-violet-600 bg-violet-50 p-3 rounded-xl mb-2">
                Countdown button back <span id="countdown-text">10</span> detik
            </div>

            <div id="btn-back" class="hidden">

                <a href="{{ route('main.index') }}"
                id="btn-back"
                class="inline-flex items-center justify-center gap-2 w-full bg-violet-700 hover:bg-violet-800 text-white font-bold text-sm py-3 px-4 rounded-xl shadow-md shadow-violet-700/10 transition-all duration-200 active:scale-[0.98]">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0 l7-7m-7 7h18">
                    </path>
                </svg>
                Kembali ke Halaman Utama
            </a>
            
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let time = 20
            const textCountdown = document.getElementById('countdown-text')
            const timerinfo = document.getElementById('timer-info')
            const button = document.getElementById('btn-back')

            const intervaltimer = setInterval(() => {
                time --
                if (textCountdown) {
                    textCountdown.textContent = time
                }

                if (time <= 0) {
                    clearInterval(intervaltimer)
                }
            }, 1000);

            setTimeout(() => {
                timerinfo.classList.add('hidden')

                button.classList.remove('hidden')
            }, 20000);
        })
    </script>
@endsection
