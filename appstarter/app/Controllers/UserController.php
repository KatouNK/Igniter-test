<?php

namespace App\Controllers;

use App\Models\EventModel;
use App\Models\PendaftaranEventModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    protected $eventModel;
    protected $pendaftaranEventModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->pendaftaranEventModel = new PendaftaranEventModel();
    }

    public function dashboard()
    {
        $nim = session()->get('user')['nim']; // Ambil NIM dari user yang login

        // Ambil data event berdasarkan pendaftaran yang dilakukan oleh user (menggabungkan tabel events dan pendaftaran_event)
        $events = $this->pendaftaranEventModel
            ->select('events.title, events.description, events.status')
            ->join('events', 'pendaftaran_event.event_id = events.id')
            ->where('pendaftaran_event.nim', $nim)
            ->findAll();

        return view('Views/dashboard', ['events' => $events]);
    }
}
