<div>
    @guest
    <p><a href="/login">ini login</a></p>
    <p><a href="/register">ini register</a></p>
    @endguest
    @auth
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    @endauth
    
    @foreach ($allBus as $data)
        <p><a href="{{ route('main.booking', $data->id) }}">{{$data->bus_name}}</a></p>
    @endforeach
</div>
