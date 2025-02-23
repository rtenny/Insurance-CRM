<?php

namespace App\Controllers;

use App\Models\ContactModel;
use CodeIgniter\Controller;

class ContactsController extends Controller
{
    public function index()
    {
        // Check if user is logged in
        $session = session();
        if (!$session->has('user_id')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to access the dashboard.');
        }
        
        $model = new ContactModel();
        $data['contacts'] = $model->findAll();

        return view('contacts/index', $data);
    }
}
