@extends('main.layouts.app')

@section('title', 'validasi pembayaran')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen bg-gray-100 p-6 gap-2">
        <div class="max-w-lg bg-violet-700 flex flex-col items-center justify-center p-6 gap-3 rounded-lg">
            <h2 class="text-3xl font-bold text-white mb-3 border-b pb-4">Konfirmasi Pesanan</h2>

            <h3 class="font-sans font-bold text-lg uppercase text-white">{{ $Bus->bus_name }}</h3>
            <small class="font-sans font-small text-md text-white">Harga per Kursi : </small>

            <h5 class="font-sans font-bold text-md text-white">{{ Number::currency($Bus->price, 'IDR', 'id', precision: 0) }}
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
