<div>
    <h1>Hi {{$user->name}} !</h1>
    @forelse ($user->buses as $data)
        <h2>{{$data->bus_name}}</h2>
        <p>{{$data->pivot->book_seat}}</p>
        <small>{{Number::currency($data->pivot->total_price, 'IDR', 'id')}}</small>
    @empty
        
    @endforelse
</div>
