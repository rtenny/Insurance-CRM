<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Shield\Auth; // If using Shield for authentication

class DashboardController extends Controller
{
    public function __construct()
    {
        helper(['url', 'session']);
    }

    public function index()
    {

        // Check if user is logged in
        $session = session();
        if (!$session->has('user_id')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to access the dashboard.');
        }

        return view('dashboard');
    }
}
