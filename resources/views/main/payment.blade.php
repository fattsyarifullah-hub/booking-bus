<div>
    <h3>Konfirmasi Pesanan Bus: {{$Bus->bus_name}}</h3>
    <p>Harga per Kursi : {{Number::currency($Bus->price, 'IDR','id')}}</p>
    <p>Jumlah Kursi dipesan : {{$requestSeat}}</p>

    <h4>Jumlah Yang harus dibayar : {{$totalPayment}}</h4>

    <form action="{{ route('main.booking', $Bus->id) }}" method="POST">
        @csrf
        <input type="hidden" name="book_seat" value="{{ $requestSeat }}">
        <button type="submit">Konfirmasi & Bayar Sekarang</button>
    </form>
</div>