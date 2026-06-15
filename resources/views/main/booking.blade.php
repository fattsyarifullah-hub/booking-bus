<div>
    <img src="{{ asset('storage/image/' . $Bus->image) }}" alt="">
    <h1>{{$Bus->bus_name}}</h1>
    <h3>{{$Bus->rute_from}} -> {{$Bus->rute_to}}</h3>
    <h5>{{Number::currency($Bus->price, 'IDR', 'id')}}</h5>
    <p>Available seat : {{$Bus->available_seat}}</p>
    <p>Departure Time : {{$Bus->departure_time}}</p>

    <form action="{{ route('main.payment', $Bus->id) }}" method="GET">
        <label for="book_seat">Jumlah Kursi yang ingin dipesan</label>
        <input type="number" name="book_seat" min="1" max="{{ $Bus->available_seat }}" required>
        <button type="submit">Lanjut Ke Pembayaran</button>
    </form>
</div>
