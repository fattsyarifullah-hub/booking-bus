<div>
    <h1>Hi {{$user->name}} !</h1>
    @forelse ($user->buses as $bus)
        @php
            $namaUser = $user->name;
            $namaBus = $bus->bus_name;
            $tanggal = $bus->departure_time;
            $booking = $bus->pivot->book_seat;
            $ticketId = "TXT - " . rand(1000, 9999);

            $ticketString = "TICKET : {$ticketId} | USER : {$namaUser} | BUS : {$namaBus} | BOOKING : {$booking} | KEBERANGKATAN : {$tanggal} |";

            $qrCode = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" . urlencode($ticketString);
        @endphp

        <img src="{{ $qrCode }}" alt="">
        <h3>nama Bus : {{ $namaBus }}</h3>
        <h3>nama User : {{ $namaUser }}</h3>
        <h3>tanggal : {{ $tanggal }}</h3>
        <h3>booking : {{ $booking }}</h3>
    @empty
        <h1>Belum ada riwayat pesanan</h1>
    @endforelse
</div>
