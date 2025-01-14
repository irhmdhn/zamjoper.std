<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Menangani pengiriman pesanan.
     */
    public function submitOrder(Request $request)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:500',
            'order_details' => 'required|string',
        ]);

        // Simpan pesanan ke database
        Order::create($validated);

        // Redirect ke halaman konfirmasi setelah pesanan disubmit
        return redirect()->route('orderacc'); // Menggunakan nama rute
    }

    /**
     * Menampilkan halaman konfirmasi setelah pesanan berhasil dibuat.
     */
    public function showConfirmation()
    {
        // Pastikan view orderacc.blade.php ada
        return view('orderacc');
    }
}
