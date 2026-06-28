@extends('dashboard.management.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-4xl mx-auto my-12 p-6">

    <!-- Card Utama Dashboard -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 md:p-8">
        
        <!-- Header & Tombol Logout -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-100 pb-6 mb-8">
            <div>
                <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Management Dashboard</h1>
                <p class="text-sm text-slate-500 mt-1">Selamat datang kembali di panel kendali sistem.</p>
            </div>
            
            @auth
                <!-- Tombol Logout Modern -->
                <form action="/logout" method="POST" class="inline-block">
                    @csrf
                    <button type="submit" class="inline-flex items-center gap-2 bg-violet-700 hover:bg-violet-800 text-white font-medium px-4 py-2 rounded-xl text-sm shadow-sm transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Logout
                    </button>
                </form>
            @endauth
        </div>

        <!-- Menu Navigasi / Link Modul -->
        <div class="max-w-md">
            <h2 class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-3">Menu Manajemen</h2>
            
            <!-- Link ke Bus Modul dalam bentuk Card Kecil -->
            <a href="{{ route('dashboard.management.bus.index') }}" class="group flex items-center justify-between p-4 bg-slate-50 hover:bg-violet-50/50 border border-slate-100 hover:border-violet-200 rounded-xl transition-all duration-200">
                <div class="flex items-center gap-3">
                    <!-- Icon Box Violet -->
                    <div class="w-10 h-10 bg-violet-700 text-white flex items-center justify-center rounded-lg shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                    </div>
                    <div>
                        <span class="block font-bold text-slate-700 group-hover:text-violet-700 transition-colors">Kelola Armada Bus</span>
                        <span class="block text-xs text-slate-400">Lihat data, rute, harga, dan jadwal bus</span>
                    </div>
                </div>
                <!-- Panah Indikator -->
                <svg class="w-5 h-5 text-slate-400 group-hover:text-violet-700 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>

    </div>

</div>
@endsection