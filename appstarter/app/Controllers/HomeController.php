<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class HomeController extends Controller
{
    public function index()
    {
        // Cek apakah user sudah login
        if (!session()->get('user')) {
            return redirect()->to('/login');
        }
        
        // Data yang akan dikirim ke view
        $data = [
            'nim' => session()->get('nim')
        ];
        
        return view('home', $data);
    }

    public function logout()
    {
        // Hapus data session user
        session()->remove('user');

        // Arahkan kembali ke halaman login
        return redirect()->to('/auth/login');
    }
}
