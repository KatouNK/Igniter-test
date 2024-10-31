<?php

namespace App\Controllers;

use App\Models\FeedbackModel;
use CodeIgniter\Controller;

class feedback extends Controller
{
    public function feedback()
    {
        return view('feedback-form');
    }

    public function submitFeedback()
{
    $model = new FeedbackModel();
    $data = [
        'email'  => $this->request->getPost('email'),
        'comments' => $this->request->getPost('comments'),
    ];

    if ($model->insert($data)) {
        session()->setFlashdata('success', 'Data Terkirim');
    } else {
        session()->setFlashdata('error', 'error bro');
    }

    return redirect()->to('/feedback');
}

    public function tampilfeedback()
    {
        $feedbackModel = new FeedbackModel();
        $data['feedbacks'] = $feedbackModel->findAll();
        
        return view('feedback-table', $data);
    }
    
}