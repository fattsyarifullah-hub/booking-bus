<div>
    <form action="{{ route('dashboard.management.bus.update', $editBus->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="bus_name">bus name</label><br>
        <input type="text" name="bus_name" id="bus_name" placeholder="Masukkan nama Bus" value="{{ old('bus_name', $editBus->bus_name) }}"><br><br>
        <label for="image">image</label><br>
        <input type="file" name="image" id="image" value="{{ old('image', $editBus->image) }}"><br><br>
        <label for="rute_from">rute from</label><br>
        <input type="text" name="rute_from" id="rute_from" placeholder="Rute Bus dari mana" value="{{ old('rute_from', $editBus->rute_from) }}"><br><br>
        <label for="rute_to">rute to</label><br>
        <input type="text" name="rute_to" id="rute_to" placeholder="Rute Bus kemana" value="{{ old('rute_to', $editBus->rute_to) }}"><br><br>
        <label for="price">price</label><br>
        <input type="number" name="price" placeholder="harga" value="{{ old('price', $editBus->price) }}"><br><br>
        <label for="total_seat">total seat</label><br>
        <input type="number" name="total_seat" placeholder="total seat" value="{{ old('total_seat', $editBus->total_seat) }}"><br><br>
        <label for="available_seat">available seat</label><br>
        <input type="number" name="available_seat" placeholder="seat yang tersedia" value="{{ old('available_seat', $editBus->available_seat) }}"><br><br>
        <label for="departure_time">departure time</label><br>
        <input type="date" name="departure_time" placeholder="tanggal keberangkatan" value="{{ old('departure_time', $editBus->departure_time) }}"><br><br>
        <button type="submit">Submit</button>
    </form>
</div>
