<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Booking;
use Illuminate\Http\Request;


class BookingController extends Controller
{
    public function simpan_booking(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'mobil' => 'required|string|max:255',
            'harga' => 'required|numeric',
        ]);

        // Simpan data ke tabel booking
        Booking::create([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'mobil' => $request->mobil,
            'harga' => $request->harga,
        ]);

        // Kurangi stok mobil
        $mobil = Mobil::where('title', $request->mobil)->first(); // Cari mobil berdasarkan nama
        if ($mobil && $mobil->stock > 0) {
            $mobil->decrement('stock'); // Kurangi stok sebesar 1
        } else {
            return redirect()->back()->withErrors('Stok mobil tidak tersedia!');
        }

        return redirect()->route('home')->with('success', 'Booking berhasil tunggu Konfimasi dari Admin Kami, Terima Kasih Telah Order!');
    }
}
