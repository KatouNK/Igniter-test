<?php

namespace App\Controllers;

use App\Models\EventModel;

class AdminController extends BaseController
{
    protected $eventModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
    }

    /**
     * Display the admin dashboard with a list of events
     */
    public function dashboard()
    {
        $data['events'] = $this->eventModel->findAll(); // Fetch all events
        return view('admin/dashboard', $data); // Pass events to the dashboard view
    }

    /**
     * Display details for a specific event
     * 
     * @param int $id Event ID
     */
    public function viewEvent($id)
    {
        $data['event'] = $this->eventModel->getEvent($id);
        return view('admin/event_detail', $data);
    }

    /**
     * Show the form to create a new event
     */
    public function createEvent()
    {
        return view('admin/add_event'); // Load the form view for adding a new event
    }

    /**
     * Store a new event in the database
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

        // Prepare the event data
        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'image_path'  => $this->request->getPost('image_path'),
            'status'      => $this->request->getPost('status'),
        ];

        // Insert the event into the database
        if ($this->eventModel->addEvent($data)) {
            return redirect()->to('/admin/dashboard')->with('success', 'Event added successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to add event.');
        }
    }

    /**
     * Show the form to edit an existing event
     * 
     * @param int $id Event ID
     */
    public function editEvent($id)
    {
        $data['event'] = $this->eventModel->getEvent($id);
        return view('admin/edit_event', $data); // Load the form view for editing the event
    }

    /**
     * Update an existing event in the database
     * 
     * @param int $id Event ID
     */
    public function updateEvent($id)
    {
        // Validation rules for updating an event
        $rules = [
            'title'       => 'required|min_length[3]',
            'description' => 'required|min_length[10]',
            'image_path'  => 'required',
            'status'      => 'required|in_list[selesai,ongoing,segera hadir,pendaftaran dibuka]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Prepare the updated event data
        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'image_path'  => $this->request->getPost('image_path'),
            'status'      => $this->request->getPost('status'),
        ];

        // Update the event in the database
        if ($this->eventModel->updateEvent($id, $data)) {
            return redirect()->to('/admin/dashboard')->with('success', 'Event updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update event.');
        }
    }

    /**
     * Delete an event from the database
     * 
     * @param int $id Event ID
     */
    public function deleteEvent($id)
    {
        if ($this->eventModel->deleteEvent($id)) {
            return redirect()->to('/admin/dashboard')->with('success', 'Event deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to delete event.');
        }
    }
}
