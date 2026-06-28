@extends('main.layouts.app')

@section('title', 'validasi pembayaran')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 p-6 gap-2">
        <div class="max-w-lg bg-violet-700 flex flex-col items-center justify-center p-6 gap-3 rounded-lg">

            <a href="{{ route('main.showBooking', $Bus->id) }}"
                class="text-sm font-medium text-white hover:text-gray-700 transition-colors duration-200 flex items-start gap-1">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" pt-1>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg> back
            </a>

            <h2 class="text-3xl font-bold text-white mb-3 border-b pb-4">Konfirmasi Pesanan</h2>

            <h3 class="font-sans font-bold text-lg uppercase text-white">{{ $Bus->bus_name }}</h3>
            <small class="font-sans font-small text-md text-white">Harga per Kursi : </small>

            <h5 class="font-sans font-bold text-md text-white">
                {{ Number::currency($Bus->price, 'IDR', 'id', precision: 0) }}
            </h5>
            <small class="font-sans font-small text-md text-white">Jumlah Kursi dipesan : </small>
            <h5 class="font-sans font-bold text-md text-white">{{ $requestSeat }}</h5>

            <small class="text-white">Jumlah Yang harus dibayar : </small>
            <h3 class="text-lg font-bold text-white font-sans">
                {{ Number::currency($totalPayment, 'IDR', 'id', precision: 0) }}</h3>

            <form action="{{ route('main.booking', $Bus->id) }}" method="POST">
                @csrf
                <input type="hidden" name="book_seat" value="{{ $requestSeat }}">
                <button type="submit"
                    class="p-5 bg-white text-violet-700 hover:bg-violet-700 hover:text-white hover:border border-white font-extrabold text-sm uppercase rounded py-2.5 transition shadow-sm">Konfirmasi
                    & Bayar Sekarang</button>
            </form>
        </div>
    </div>
@endsection
