@extends('dashboard.management.layouts.app')

@section('title', 'Form Edit Bus')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 flex justify-center items-center">
    <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8 border border-gray-100">
        
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-violet-700">Edit Data Bus</h2>
            <p class="text-sm text-gray-500 mt-1">Silakan isi formulir di bawah ini dengan lengkap.</p>
        </div>

        <form action="{{ route('dashboard.management.bus.update', $editBus->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label for="bus_name" class="block text-sm font-semibold text-gray-700 mb-1">Nama Bus</label>
                <input type="text" name="bus_name" id="bus_name" placeholder="Masukkan nama Bus"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-violet-700 focus:border-violet-700 outline-none transition duration-200" value="{{ old('bus_name', $editBus->bus_name) }}">
            </div>

            <div>
                <label for="image" class="block text-sm font-semibold text-gray-700 mb-1">Foto Bus</label>
                <input type="file" name="image" id="image"
                    class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100 border border-gray-300 rounded-lg p-1 cursor-pointer focus:outline-none focus:ring-2 focus:ring-violet-700" value="{{ old('image', $editBus->image) }}">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="rute_from" class="block text-sm font-semibold text-gray-700 mb-1">Rute Asal</label>
                    <input type="text" name="rute_from" id="rute_from" placeholder="Dari mana"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-violet-700 focus:border-violet-700 outline-none transition duration-200" value="{{ old('rute_from', $editBus->rute_from) }}">
                </div>
                <div>
                    <label for="rute_to" class="block text-sm font-semibold text-gray-700 mb-1">Rute Tujuan</label>
                    <input type="text" name="rute_to" id="rute_to" placeholder="Ke mana"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-violet-700 focus:border-violet-700 outline-none transition duration-200" value="{{ old('rute_to', $editBus->rute_to) }}">
                </div>
            </div>

            <div>
                <label for="price" class="block text-sm font-semibold text-gray-700 mb-1">Harga Tiket</label>
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 sm:text-sm">Rp</span>
                    </div>
                    <input type="number" name="price" id="price" placeholder="Harga"
                        class="w-full pl-9 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-violet-700 focus:border-violet-700 outline-none transition duration-200" value="{{ old('price', $editBus->price) }}">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="total_seat" class="block text-sm font-semibold text-gray-700 mb-1">Total Kursi</label>
                    <input type="number" name="total_seat" id="total_seat" placeholder="Total kursi"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-violet-700 focus:border-violet-700 outline-none transition duration-200" value="{{ old('total_seat', $editBus->total_seat) }}">
                </div>
                <div>
                    <label for="available_seat" class="block text-sm font-semibold text-gray-700 mb-1">Kursi Tersedia</label>
                    <input type="number" name="available_seat" id="available_seat" placeholder="Kursi kosong"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-violet-700 focus:border-violet-700 outline-none transition duration-200" value="{{ old('available_seat', $editBus->available_seat) }}">
                </div>
            </div>

            <div>
                <label for="departure_time" class="block text-sm font-semibold text-gray-700 mb-1">Tanggal Keberangkatan</label>
                <input type="date" name="departure_time" id="departure_time"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-violet-700 focus:border-violet-700 outline-none transition duration-200 text-gray-700" value="{{ old('departure_time', $editBus->departure_time) }}">
            </div>

            <div class="pt-2">
                <button type="submit" 
                    class="w-full bg-violet-700 hover:bg-violet-800 text-white font-semibold py-2.5 px-4 rounded-lg shadow-md transition duration-200 ease-in-out transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-violet-500 focus:ring-offset-2">
                    Update Data Bus
                </button>
            </div>
        </form>
    </div>
</div>
@endsection