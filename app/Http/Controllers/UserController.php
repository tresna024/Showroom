<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        $mobils = Mobil::paginate(6);
        return view('user.home', compact('mobils'));
    }

    public function contact()
    {
        return view('user.contact_us');
    }

    public function about()
    {
        return view('user.about');
    }

    public function show_mobil(string $id): View
    {
        //get mobil by ID
        $mobil = Mobil::findOrFail($id);

        //render view with mobil
        return view('user.show_mobil', compact('mobil'));
    }

    public function booking(string $id)
    {
        $mobil = Mobil::findOrFail($id);
        $user = auth()->user();
        return view('user.booking', compact('user', 'mobil'));
    }

    public function checkout(Request $request, $id)
    {
        $mobil = Mobil::findOrFail($id);

        if ($mobil->stock > 0) {
            $mobil->stock -= 1; // Kurangi stok
            $mobil->save();

            return redirect()->route('home')->with('success', 'Checkout berhasil! Stok mobil telah diperbarui.');
        } else {
            return redirect()->route('home')->with('error', 'Stok mobil tidak mencukupi.');
        }
    }
}
