<div>
    <form action="{{ route('main.search') }}" method="GET">
        <input type="text" name="bus_name" value="{{ $busNameSearch ?? '' }}" placeholder="cari nama bus...">
        <input type="text" name="rute_from" value="{{ $ruteFromSearch ?? '' }}" placeholder="cari rute keberangkatan...">
        <input type="text" name="rute_to" value="{{ $ruteToSearch ?? '' }}" placeholder="cari rute tujuan...">
        <button type="submit">Cari</button>
        <a href="{{ route('main.search')}}">reset</a>
    </form>

    @guest
    <p><a href="/login">ini login</a></p>
    <p><a href="/register">ini register</a></p>
    @endguest
    @auth
    <p><a href="{{ route('main.account') }}">Your Account</a></p>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    @endauth
    
    @foreach ($allBus as $data)
        <p><a href="{{ route('main.showBooking', $data->id) }}">{{$data->bus_name}}</a></p>
        <small>{{$data->rute_from}} -> {{$data->rute_to}}</small>
    @endforeach
</div>
