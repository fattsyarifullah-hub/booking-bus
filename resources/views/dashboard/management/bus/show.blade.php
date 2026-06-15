<div>
    <h1>{{$showBus->bus_name}}</h1>
    <h3>{{$showBus->rute_from}} -> {{$showBus->rute_to}}</h3>
    <h5>{{Number::currency($showBus->price, 'IDR', 'id')}}</h5>
    <p>Available seat : {{$showBus->available_seat}}</p>
    <p>Departure Time : {{$showBus->departure_time}}</p>
    @forelse ($showBus->users as $item)
        <p>{{$item->name}}</p>
        {{-- mengambil data dari table pivot bukan dari table relasi yang bersebrangan --}}
        <p>{{$item->pivot->book_seat}}</p>
        <p>{{$item->pivot->total_price }}</p>
    @empty
        <p>belum ada pemesan untuk bis ini</p>
    @endforelse
</div>
