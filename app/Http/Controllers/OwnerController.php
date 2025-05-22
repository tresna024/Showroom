<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Booking;
use App\Models\Laporan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class OwnerController extends Controller
{
    public function home() : view
    {
        $mobils = Mobil::latest()->paginate(10);
        return view('owner.index', compact('mobils'));
    }

    public function tambah() : view
    {
        return view('owner.tambah');
    }

    public function simpan_mobil(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'         => 'required|min:5',
            'description'   => 'required|min:10',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric'
        ]);

        //upload image
        $fotoPath = null;
        if ($request->hasFile('image')) {
            $fotoPath = $request->file('image')->store('foto_mobils', 'public');
        }

        //create mobil
        Mobil::create([
            'image'         => $fotoPath,
            'title'         => $request->title,
            'description'   => $request->description,
            'price'         => $request->price,
            'stock'         => $request->stock
        ]);

        //redirect to index
        return redirect()->route('home_owner')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function lihat_detail(string $id): View
    {
        //get mobil by ID
        $mobil = Mobil::findOrFail($id);

        //render view with mobil
        return view('owner.lihat_detail', compact('mobil'));
    }

    public function edit(string $id): View
    {
        //get mobil by ID
        $mobil = Mobil::findOrFail($id);

        //render view with mobil
        return view('owner.edit', compact('mobil'));
    }

    public function edit_mobil(Request $request, $id): RedirectResponse
    {
        // Temukan data mobil berdasarkan ID
        $mobil = Mobil::findOrFail($id);

        // Validasi input form
        $request->validate([
            'image'         => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'title'         => 'required|min:5',
            'description'   => 'required|min:10',
            'price'         => 'required|numeric',
            'stock'         => 'required|numeric',
        ]);

        // Perbarui gambar jika ada file baru diupload
        $fotoPath = $mobil->image; // Tetap gunakan gambar lama jika tidak ada yang baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($mobil->image && Storage::disk('public')->exists($mobil->image)) {
                Storage::disk('public')->delete($mobil->image);
            }

            // Upload gambar baru
            $fotoPath = $request->file('image')->store('foto_mobils', 'public');
        }

        // Perbarui data mobil
        $mobil->update([
            'image'         => $fotoPath,
            'title'         => $request->title,
            'description'   => $request->description,
            'price'         => $request->price,
            'stock'         => $request->stock,
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('home_owner')->with(['success' => 'Data Berhasil Diperbarui!']);
    }

    public function hapus_mobil($id): RedirectResponse
    {
        // Temukan data mobil berdasarkan ID
        $mobil = Mobil::findOrFail($id);
    
        // Hapus gambar dari penyimpanan jika ada
        if ($mobil->image && Storage::disk('public')->exists($mobil->image)) {
            Storage::disk('public')->delete($mobil->image);
        }
    
        // Hapus data mobil dari database
        $mobil->delete();
    
        // Redirect dengan pesan sukses
        return redirect()->route('home_owner')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function laporan()
    {
        $laporan = Laporan::latest()->paginate(10);
        return view('owner.tambah_laporan', compact('laporan'));
    }

    public function simpan_laporan(Request $request)
    {
        $request->validate([
            'nama_mobil'           => 'required|max:255',
            'nama_penyewa'         => 'required|min:5',
            'harga_mobil'          => 'required|numeric',
            'total'                 => 'required|numeric'
        ]);

        Laporan::create([
            'nama_mobil'           => $request->nama_mobil,
            'nama_penyewa'         => $request->nama_penyewa,
            'harga_mobil'          => $request->harga_mobil,
            'lama_sewa'            => 'null',
            'total'                => $request->total
        ]);

        return redirect()->back()->with('success', 'Data Laporan Berhasil Ditambah!');
    }

    public function edit_laporan(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_mobil'    => 'required|max:255',
            'nama_penyewa'  => 'required|min:5',
            'harga_mobil'   => 'required|numeric',
            'lama_sewa'     => 'nullable|numeric', // Lama sewa sekarang diizinkan null
            'total'         => 'required|numeric',
        ]);

        // Cari laporan berdasarkan ID
        $laporan = Laporan::findOrFail($id);

        // Update data laporan
        $laporan->update([
            'nama_mobil'    => $request->nama_mobil,
            'nama_penyewa'  => $request->nama_penyewa,
            'harga_mobil'   => $request->harga_mobil,
            'lama_sewa'     => 'null', // Bisa null jika tidak diisi
            'total'         => $request->total,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data Laporan Berhasil Diupdate!');
    }

    public function hapus_laporan($id)
    {
        $laporan = Laporan::findOrFail($id); // Cari laporan berdasarkan ID
        $laporan->delete(); // Hapus data laporan

        return redirect()->back()->with('success', 'Data Laporan Berhasil Dihapus!');
    }

    public function data_booking()
    {
        $booking = Booking::latest()->paginate(100);
        return view('owner.booking', compact('booking'));
    }

    public function hapus_booking($id)
    {
        $booking = Booking::findOrFail($id); // Cari laporan berdasarkan ID
        $booking->delete(); // Hapus data laporan

        return redirect()->back()->with('success', 'Data Booking Berhasil Dihapus!');
    }
}
