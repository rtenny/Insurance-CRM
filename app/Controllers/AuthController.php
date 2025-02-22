<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    // Show registration form OR process registration
    public function register()
    {

        helper(['form']); // Enable form helper (for set_value() etc.)
        $data = [];

        if ($this->request->getMethod() === 'POST') {            
            // Define validation rules
            $rules = [
                'username' => 'required|min_length[3]|max_length[20]',
                'email'    => 'required|valid_email',
                'password' => 'required|min_length[6]',
                'password_confirm' => 'required|matches[password]',
            ];
            
            if (!$this->validate($rules)) {
                // Validation failed
                $data['validation'] = $this->validator;
            } else {
                // Validation passed, create new user
                
                $userModel = new UserModel();
                $newUserData = [
                    'username'      => $this->request->getPost('username'),
                    'email'         => $this->request->getPost('email'),
                    // We'll temporarily put the plain text password in 'password_hash'.
                    // Our model's 'beforeInsert' will hash it automatically.
                    'password_hash' => $this->request->getPost('password'),
                ];
                $userModel->save($newUserData);

                // Optionally, redirect to login with a success message
                return redirect()->to('/login')->with('success', 'Registration successful! You can now log in.');
            }
        }

        return view('auth/register', $data);
    }

    // Show login form OR process login
    public function login()
    {
        helper(['form']);
        $data = [];

        if ($this->request->getMethod() === 'POST') {
            // Define validation rules
            $rules = [
                'email'    => 'required|valid_email',
                'password' => 'required',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $userModel = new UserModel();
                $user = $userModel->where('email', $this->request->getPost('email'))
                                  ->first();

                if ($user) {
                    // Verify the plain text password against the hashed one
                    $pass = $this->request->getPost('password');
                    if (password_verify($pass, $user['password_hash'])) {
                        // Password correct, set up session
                        $this->setUserSession($user);
                        return redirect()->to('/dashboard')->with('success', 'Welcome back!');
                    } else {
                        $data['error'] = 'Invalid password.';
                    }
                } else {
                    $data['error'] = 'User not found.';
                }
            }
        }

        return view('auth/login', $data);
    }

    private function setUserSession(array $user)
    {
        $data = [
            'id'       => $user['id'],
            'username' => $user['username'],
            'email'    => $user['email'],
            'loggedIn' => true, // Flag to check user is logged in
        ];
        session()->set($data);
        return true;
    }

    // Destroy session and log user out
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
