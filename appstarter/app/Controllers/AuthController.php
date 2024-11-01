<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function storeUser()
    {
        $model = new UserModel();
        $data = [
            'nim'      => $this->request->getPost('nim'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => $this->request->getPost('role') ?? 'user' // Default to 'user' role
        ];

        // Validate data
        if (!$this->validate([
            'nim'      => 'required|min_length[8]|max_length[10]',
            'password' => 'required|min_length[8]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save user data
        $model->save($data);

        return redirect()->to('/login')->with('success', 'Registration successful. Please login.');
    }

    public function login()
    {
        return view('login');
    }

    public function loginUser()
    {
        $model = new UserModel();
        $nim = $this->request->getPost('nim');
        $password = $this->request->getPost('password');
        $user = $model->where('nim', $nim)->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set('user', $user); // Set session with user data

            // Redirect based on role
            if ($user['role'] === 'admin') {
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->to('/home');
            }
        } else {
            return redirect()->back()->with('fail', 'NIM or Password is incorrect');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
