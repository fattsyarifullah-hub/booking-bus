<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    // === FITUR ROUTING KE HALAMAN UTAMA ===
    public function index() {
        $allBus = Bus::all();
        return view('main.index', compact('allBus'));
    }

    // === FITUR UNTUK MELIHAT 1 BUS ===
    public function showBooking(string $id) {
        $Bus = Bus::findOrFail($id);
        return view('main.booking', compact('Bus'));
    }

    // === FITUR UNTUK VALIDASI KETIKA USER MAU BOOKING ===
    public function payment(Request $request, $id) {

        // validasi input user di book seat
        $request->validate([
            'book_seat' => 'required|integer|min:1'
        ]);
        
        // variabel untuk bus dan juga request book seat
        $Bus = Bus::findOrFail($id);
        $requestSeat = $request->book_seat;

        // sebuah kondisi dimana ketersediaan kursi sudah habis
        if ($Bus->available_seat < $requestSeat) {
            return back()->with('error', 'maaf kursi sudah tidak tersedia');
        }

        // menghitung total payment yang harus dibayar oleh user berdasarkan harga bus dan book seat
        $totalPayment = $requestSeat * $Bus->price;

        return view('main.payment', compact('Bus', 'requestSeat', 'totalPayment'));
    }

    // === FITUR UNTUK BOOKING BUS ===
    public function booking(Request $request, $id) {

        // validasi input dari user untuk booking
        $request->validate([
            'book_seat' => 'required|integer|min:1'
        ]);

        // variabel untuk book seat
        $requestSeat = $request->book_seat;
        
        // memasukkan ke dalam database
        try {
            // memulai langkah transaksi ke database
            DB::beginTransaction();

            // variabel untuk mengunci transaksi terlebih dahulu agar tidak ada tumpukan user booking
            $transaction = Bus::lockForUpdate()->findOrFail($id);

            // kondisi ketika ketersediaan kursi sudah habis
            if ($transaction->available_seat < $requestSeat) {

                // mengembalikan ke depan
                DB::rollBack();
                return back('main.showBooking')->with('error', 'maaf kursi tidak terpenuhi');
            }

            // mengurangi ketersediaan kursi dari booking seat user
            $transaction->available_seat = $transaction->available_seat - $requestSeat;

            // mengeksekusi insert ke database
            $transaction->save();

            // jumlah harga yang harus dibayar user
            $totalPayment = $transaction->price * $requestSeat;

            // memasukkan data-data booking user ke database
            $transaction->users()->attach(Auth::id(), [
                'book_seat' => $requestSeat,
                'total_price' => $totalPayment,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // // membuat qrcode dengan string acak 
            // $randomStr = "PAY-" . strtoupper(Str::random(12));
            
            // // mengambil melalui API untuk mengubah menjadi barcode
            // $qrcodeUrl = "https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=" . urlencode($randomStr);

            // menyimpan secara permanen ke database
            DB::commit();

            return redirect()->route('main.success')->with('total_payment', $totalPayment)->with('success', 'berhasil order');
        } catch(\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan sistem');
        }
    }

    public function barcode() {
        return view('main.success');
    }

    // === FITUR UNTUK SEARCH ===
    public function search(Request $request) {
        
        // mengambil input sesuai dengan namenya di blade
        $busNameSearch = $request->input('bus_name');
        $ruteFromSearch = $request->input('rute_from');
        $ruteToSearch = $request->input('rute_to');

        // menangani logika dimana search bisa dijalankan meskipun hanya 1 yang diinput oleh user, misal hanya rute tujuan maka yang tampil adalah bus bus yang memiliki rute tujuan itu
        $allBus = Bus::query()
        ->when($busNameSearch, function ($query, $busNameSearch) {
            return $query->where('bus_name', 'like', '%' . $busNameSearch . '%');
        })->when($ruteFromSearch, function ($query, $ruteFromSearch) {
            return $query->where('rute_from', 'like', '%' . $ruteFromSearch . '%');
        })->when($ruteToSearch, function ($query, $ruteToSearch) {
            return $query->where('rute_to', 'like', '%' . $ruteToSearch . '%');
        })->get();
        return view('main.index', compact('allBus', 'busNameSearch', 'ruteFromSearch', 'ruteToSearch'));
    }
}
