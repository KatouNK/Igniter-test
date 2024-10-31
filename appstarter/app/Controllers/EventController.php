<?php

namespace App\Controllers;

use App\Models\EventModel;
use CodeIgniter\Controller;


class EventController extends Controller
{
    public function index()
    {
        $eventModel = new EventModel();
        $data['events'] = $eventModel->findAll();
        return view('EventViewer', $data);
    }
}
