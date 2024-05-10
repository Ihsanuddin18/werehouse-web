<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    public function showContact()
    {
        return view('contact');
    }

    // Fungsi untuk menangani pengiriman formulir
    public function submitForm(Request $request)
    {
        // Validasi data yang dikirimkan dari formulir
        $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        // Kirim pesan ke WhatsApp
        $message = "Nama: " . $request->fullName . "\n";
        $message .= "Email: " . $request->email . "\n";
        $message .= "Telepon: " . $request->phone . "\n";
        $message .= "Pesan: " . $request->message;

        // Kirim pesan menggunakan HTTP Client
        $response = Http::post('https://api.whatsapp.com/send', [
            'phone' => '6285230442881', // Nomor WhatsApp tujuan
            'text' => $message,
        ]);

        // Tambahkan log atau tindakan lain sesuai kebutuhan

        // Redirect kembali ke halaman kontak dengan pesan sukses
        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim!');
    }
}
