<div>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <h3>Tiket Pembayaran Anda</h3>
    <p>Scan Barcode dibawah ini untuk melakukan pembayaran pada transaksi anda</p>

    @if (session('total_payment'))
        <p>{{ Number::currency(session('total_payment'), 'IDR','id') }}</p>
    @endif

    @if (session('qr_code'))
        <img src="{{ session('qr_code') }}" alt="Barcode untuk payment">
        <p>Ini adalah barcode simulasi, tidak digunakan untuk pembayaran asli</p>
    @endif

    <a href="{{ route('main.index') }}">Kembali ke halaman utama</a>
</div>
