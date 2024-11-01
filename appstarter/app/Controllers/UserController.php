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

    /**
     * Display the user dashboard with a list of registered events.
     */
    public function dashboard()
    {
        $user = session()->get('user');

        if (!$user || $user['role'] !== 'user') {
            return redirect()->to('/login')->with('fail', 'Please login as a user.');
        }

        // Fetch events that the user has registered for, based on NIM
        $data['registeredEvents'] = $this->pendaftaranEventModel->where('nim', $user['nim'])->findAll();

        return view('Views/dashboard', $data);
    }
}
