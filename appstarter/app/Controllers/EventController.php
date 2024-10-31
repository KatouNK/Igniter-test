<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PendaftaranEventModel;

class EventController extends Controller
{
    public function pendaftaran_kegiatan()
    {
        // Tampilkan view pendaftaran kegiatan
        return view('pendaftaran_kegiatan');
    }

    public function store()
    {
        // Validasi input
        $rules = [
            'username' => 'required|min_length[3]',
            'event' => 'required|numeric',
            'email' => 'required|valid_email',
            'nim' => 'required|min_length[8]',
            'telfon' => 'required|min_length[10]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data pendaftaran
        $model = new PendaftaranEventModel();
        $data = [
            'event_id' => $this->request->getPost('event'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'nim' => $this->request->getPost('nim'),
            'telpon' => $this->request->getPost('telfon')
        ];

        $model->insert($data);

    // Tampilkan halaman "Pendaftaran Berhasil"
    return view('pendaftaran_berhasil');
    }
}