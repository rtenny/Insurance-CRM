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
    
    public function store()
{
    $validation = \Config\Services::validation();
    $validation->setRules([
        'name'     => 'required',
        'surname'  => 'required',
        'street'   => 'required',
        'postcode' => 'required',
        'town'     => 'required',
        'age'      => 'required|integer',
    ]);

    if (!$this->validate($validation->getRules())) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

    $this->contactModel->save([
        'name'     => $this->request->getPost('name'),
        'surname'  => $this->request->getPost('surname'),
        'street'   => $this->request->getPost('street'),
        'postcode' => $this->request->getPost('postcode'),
        'town'     => $this->request->getPost('town'),
        'age'      => $this->request->getPost('age'),
    ]);

    return redirect()->to('/contacts')->with('success', 'Contact added successfully');
}

}
