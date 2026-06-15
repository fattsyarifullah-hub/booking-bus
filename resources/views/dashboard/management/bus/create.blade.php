<div>
    <form action="{{ route('dashboard.management.bus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="bus_name">bus name</label><br>
        <input type="text" name="bus_name" id="bus_name" placeholder="Masukkan nama Bus" required><br><br>
        <label for="image">image</label><br>
        <input type="file" name="image" id="image" required><br><br>
        <label for="rute_from">rute from</label><br>
        <input type="text" name="rute_from" id="rute_from" placeholder="Rute Bus dari mana" required><br><br>
        <label for="rute_to">rute to</label><br>
        <input type="text" name="rute_to" id="rute_to" placeholder="Rute Bus kemana" required><br><br>
        <label for="price">price</label><br>
        <input type="number" name="price" placeholder="harga" required><br><br>
        <label for="total_seat">total seat</label><br>
        <input type="number" name="total_seat" placeholder="total seat" required><br><br>
        <label for="available_seat">available seat</label><br>
        <input type="number" name="available_seat" placeholder="seat yang tersedia" required><br><br>
        <label for="departure_time">departure time</label><br>
        <input type="date" name="departure_time" placeholder="tanggal keberangkatan" required><br><br>
        <button type="submit">Submit</button>
    </form>
</div>
