<div>
    <h1>halaman management index</h1>
        @auth
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    @endauth
    <h3><a href="{{ route('dashboard.management.bus.index') }}">ini ke bus</a></h3>
</div>
