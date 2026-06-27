@extends('dashboard.management.layouts.app')

@section('title', 'Show Bus Detail')

@section('content')
<div class="max-w-4xl mx-auto my-8 p-4">
    <div class="mb-6">
        <a href="{{ route('dashboard.management.bus.index') }}" class="text-sm font-medium text-violet-700 hover:text-violet-900 transition-colors duration-200 flex items-center gap-1">
            ← Kembali ke Manajemen Bus
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden md:flex">
        
        <div class="md:w-1/2 relative bg-slate-50 min-h-[250px] md:min-h-[350px] flex items-center justify-center">
            @if($showBus->image)
                <img src="{{ asset('storage/image/' . $showBus->image) }}" alt="{{ $showBus->bus_name }}" class="w-full h-full object-cover absolute inset-0">
            @else
                <span class="text-slate-400 text-sm">Tidak ada gambar</span>
            @endif
        </div>

        <div class="p-6 md:p-8 md:w-1/2 flex flex-col justify-between">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-slate-800 tracking-tight mb-2">
                    {{ $showBus->bus_name }}
                </h1>

                <div class="inline-flex items-center gap-2 bg-violet-50 text-violet-700 px-3 py-1.5 rounded-full text-sm font-semibold mb-6">
                    <span>{{ $showBus->rute_from }}</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    <span>{{ $showBus->rute_to }}</span>
                </div>

                <div class="grid grid-cols-2 gap-4 border-t border-b border-slate-100 py-4 mb-6">
                    <div>
                        <p class="text-xs text-slate-400 uppercase tracking-wider font-semibold">Kursi Tersedia</p>
                        <p class="text-base font-bold text-slate-700 mt-0.5">{{ $showBus->available_seat }} Kursi</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 uppercase tracking-wider font-semibold">Jam Keberangkatan</p>
                        <p class="text-base font-bold text-slate-700 mt-0.5">{{ \Carbon\Carbon::parse($showBus->departure_time)->format('d M Y') }}</p>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between pt-2">
                <div>
                    <p class="text-xs text-slate-400 font-medium">Harga Tiket</p>
                    <p class="text-2xl font-extrabold text-violet-700">
                        {{ Number::currency($showBus->price, 'IDR', 'id') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8 bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
        <h2 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
            <span class="w-2 h-5 bg-violet-700 rounded-full"></span>
            Daftar Pemesan Bus
        </h2>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-100 text-xs text-slate-400 uppercase tracking-wider font-semibold">
                        <th class="pb-3">Nama Penumpang</th>
                        <th class="pb-3 text-center">Kursi Dipesan</th>
                        <th class="pb-3 text-right">Total Bayar</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50 text-sm">
                    @forelse ($showBus->users as $item)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="py-4 font-medium text-slate-700">{{ $item->name }}</td>
                            <td class="py-4 text-center text-slate-600 font-semibold">{{ $item->pivot->book_seat }}</td>
                            <td class="py-4 text-right font-bold text-slate-800">{{ Number::currency($item->pivot->total_price, 'IDR', 'id') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-8 text-center text-slate-400 bg-slate-50/50 rounded-xl">
                                <p class="text-sm">Belum ada pemesan untuk bus ini</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection