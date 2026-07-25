@extends('dashboard.management.layouts.app')

@section('title', 'Management Bus')

@section('content')
<div class="max-w-7xl mx-auto my-8 p-4">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-100 pb-5 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Bus Management</h1>
            <p class="text-sm text-slate-500 mt-1">Kelola data armada bus, rute, dan harga tiket di sini.</p>
        </div>
        
        <a href="{{ route('dashboard.management.bus.create') }}" class="inline-flex items-center justify-center gap-2 bg-violet-700 hover:bg-violet-800 text-white font-medium px-5 py-2.5 rounded-xl text-sm shadow-sm transition-all duration-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Bus Baru
        </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($allBus as $item)
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden flex flex-col justify-between group hover:shadow-md transition-shadow  transition-duration-700 ease-in-out hover:-translate-y-1">
                
                <div class="aspect-video w-full bg-slate-50 relative overflow-hidden border-b border-slate-50">
                    @if($item->image)
                        <img src="{{ asset('storage/image/' . $item->image) }}" alt="{{ $item->bus_name }}" class="w-full h-full object-cover group-hover:scale-102 transition-transform duration-300">
                    @else
                        <div class="absolute inset-0 flex items-center justify-center text-slate-400 text-xs font-medium">
                            Tidak ada gambar
                        </div>
                    @endif
                </div>

                <div class="p-5 flex-1 flex flex-col justify-between">
                    <div class="mb-5">
                        <h2 class="text-lg font-bold text-slate-800 line-clamp-1 mb-1">
                            {{ $item->bus_name }}
                        </h2>
                    </div>

                    <div class="grid grid-cols-3 gap-2 pt-4 border-t border-slate-50 text-center">
                        <a href="{{ route('dashboard.management.bus.show', $item->id) }}" class="text-xs font-semibold text-violet-700 bg-violet-50 hover:bg-violet-700 hover:text-violet-50 py-2 rounded-lg transition-colors">
                            Detail
                        </a>
                        
                        <a href="{{ route('dashboard.management.bus.edit', $item->id) }}" class="text-xs font-semibold text-slate-600 bg-slate-50 hover:bg-slate-600 hover:text-slate-50 py-2 rounded-lg transition-colors">
                            Edit
                        </a>

                        <form action="{{ route('dashboard.management.bus.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data bus ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full text-xs font-semibold text-red-600 bg-red-50 hover:bg-red-600 hover:text-red-50 py-2 rounded-lg transition-colors">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection