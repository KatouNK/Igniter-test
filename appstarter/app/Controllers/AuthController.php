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
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];
        $model->save($data);
        return redirect()->to('/login');
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
        session()->set('user', $user); // Set session dengan key 'user'
        return redirect()->to('/home'); 
    } else {
        return redirect()->back()->with('fail', 'NIM or Password is incorrect');
    }
}

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function registerUser()
    {
        $model = new UserModel();
        $data = [
            'nim'      => $this->request->getPost('nim'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];
        

        // Validasi data
        if (!$this->validate([
            'nim'      => 'required|min_length[8]|max_length[10]',
            'password' => 'required|min_length[8]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data pengguna
        $model->save($data);
        // Set session
        $user = $model->where('nim', $data['nim'])->first();
        session()->set('loggedUser', $user['id']);
        
        return redirect()->to('/login')->with('success', 'Registration successful. Please login.');
    
    }
}
