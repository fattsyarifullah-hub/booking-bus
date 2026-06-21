@extends('main.layouts.app')

@section('title', 'Booking')

@section('content')

    <div class="grid grid-cols-2 gap-1.5 p-2 md:gap-3 md:p-3 lg:gap-6 lg:p-4">
        <div class="grid grid-cols-1 gap-4 place-items-center bg-violet-700 p-5 rounded-lg shadow-lg transition-all duration:500 hover:-translate-y-1 hover:shadow-md">
            <img src="{{ asset('storage/image/' . $Bus->image) }}" alt="{{ $Bus->bus_name }}" class="w-full max-h-72 rounded-md">
            <h1 class="font-bold font-sans text-sm sm:text-2xl lg:text-3xl uppercase text-white">{{ $Bus->bus_name }}</h1>
            <h3 class="font-medium font-sans text-sm md:text-md lg:text-lg text-white">{{ $Bus->rute_from }} → {{ $Bus->rute_to }}</h3>
            <h5 class="font-medium font-sans text-sm md:text-md lg:text-lg text-white">{{ Number::currency($Bus->price, 'IDR', 'id', precision: 0) }}</h5>
            <small class="font-small font-sans md:text-sm lg:text-lg text-white">Available seat : {{ $Bus->available_seat }}</small>
            <small class="font-small font-sans md:text-sm lg:text-lg text-white">{{ \Carbon\Carbon::parse($Bus->departure_time)->format('d M Y') }}</small>
        </div>

        <div class="grid grid-cols-1 gap-4 place-items-center p-5 rounded-lg transition-all duration:500 hover:-translate-y-1 hover:shadow-md">
            <form action="{{ route('main.payment', $Bus->id) }}" method="GET" class="grid grid-cols-1 gap-4 place-items-center">
                <label for="book_seat" class="text-violet-700 text-sm md:text-md lg:text-lg font-bold uppercase mb-1">Jumlah Kursi yang ingin dipesan</label>
                <input type="number" name="book_seat" min="1" max="{{ $Bus->available_seat }}"  class="w-full bg-violet-500 text-gray-800 placeholder-gray-900 text-sm rounded px-3 py-2.5 focus:outline-none" required>
                <button type="submit" class="w-full bg-white text-violet-700 hover:bg-violet-700 border-2 border-violet-700 hover:text-white hover:border font-extrabold text-sm md:text-md lg:text-lg uppercase rounded-lg py-2.5 transition shadow-sm">Lanjut Ke Pembayaran</button>
            </form>
        </div>
    </div>
@endsection
