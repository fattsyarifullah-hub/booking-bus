<div>
    <p>ini halaman bus management index</p>
    <a href="{{ route('dashboard.management.bus.create') }}">Create</a>

    @foreach ($allBus as $item)
        <img src="{{ asset('storage/image/' . $item->image) }}" alt="">
        <h1>{{$item->bus_name}}</h1>
        <a href="{{ route('dashboard.management.bus.show', $item->id) }}">show</a>
        <a href="{{ route('dashboard.management.bus.edit', $item->id) }}">edit</a>
        <form action="{{ route('dashboard.management.bus.destroy', $item->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus data bus</button>
        </form>
    @endforeach
</div>
