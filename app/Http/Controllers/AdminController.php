<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index() : view
    {
        $mobils = Mobil::latest()->paginate(10);
        return view('admin.index', compact('mobils'));
    }

    public function tambah() : view
    {
        return view('admin.tambah');
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
        return redirect()->route('admin')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function lihat_detail(string $id): View
    {
        //get mobil by ID
        $mobil = Mobil::findOrFail($id);

        //render view with mobil
        return view('admin.lihat_detail', compact('mobil'));
    }

    public function edit(string $id): View
    {
        //get mobil by ID
        $mobil = Mobil::findOrFail($id);

        //render view with mobil
        return view('admin.edit', compact('mobil'));
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
        return redirect()->route('admin')->with(['success' => 'Data Berhasil Diperbarui!']);
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
        return redirect()->route('admin')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}
