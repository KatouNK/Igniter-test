<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\EventModel;
use App\Models\PendaftaranEventModel;

class EventController extends Controller
{
    protected $eventModel;
    protected $pendaftaranEventModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->pendaftaranEventModel = new PendaftaranEventModel();
    }

    /**
     * Display the event registration form for users.
     */
    public function pendaftaran_kegiatan()
    {
        // Fetch all events for users to select from
        $data['events'] = $this->eventModel->findAll();

        // Display the event registration form for users
        return view('pendaftaran_kegiatan', $data);
    }

    /**
     * Store the event registration details submitted by the user.
     */
    public function store()
    {
        // Validation rules for user registration
        $rules = [
            'username' => 'required|min_length[3]',
            'event'    => 'required|numeric',
            'email'    => 'required|valid_email',
            'nim'      => 'required|min_length[8]',
            'telpon'   => 'required|min_length[10]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save registration data
        $data = [
            'event_id' => $this->request->getPost('event'),
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'nim'      => $this->request->getPost('nim'),
            'telpon'   => $this->request->getPost('telpon') // Make sure 'telpon' matches the form field name
        ];

        $this->pendaftaranEventModel->insert($data);

        // Display a "Registration Successful" page
        return view('pendaftaran_berhasil');
    }

    /**
     * Display the form for the admin to create a new event.
     */
    public function createEvent()
    {
        // This view should contain the form to add a new event
        return view('admin/add_event');
    }

    /**
     * Store the new event created by the admin.
     */
    public function storeEvent()
    {
        // Validation rules for adding an event
        $rules = [
            'title'       => 'required|min_length[3]',
            'description' => 'required|min_length[10]',
            'image_path'  => 'required',
            'status'      => 'required|in_list[selesai,ongoing,segera hadir,pendaftaran dibuka]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Gather the data from the form
        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'image_path'  => $this->request->getPost('image_path'),
            'status'      => $this->request->getPost('status'),
        ];

        // Insert the event using the model
        if ($this->eventModel->insert($data)) {
            return redirect()->to('/admin/dashboard')->with('success', 'Event added successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to add event.');
        }
    }
}
