<?php

namespace App\Controllers;

use App\Models\ContactModel;
use CodeIgniter\Controller;

class ContactsController extends Controller
{
    public function __construct()
    {
    
        $this->contactModel = new ContactModel();
    }

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

    public function create()
    {
        return view('contacts/create');
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

    public function edit($id)
    {
        $data['contact'] = $this->contactModel->find($id);
        
        if (!$data['contact']) {
            return redirect()->to('/contacts')->with('error', 'Contact not found');
        }
    
        return view('contacts/edit', $data);
    }
    
    public function update($id)
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
    
        $this->contactModel->update($id, [
            'name'     => $this->request->getPost('name'),
            'surname'  => $this->request->getPost('surname'),
            'street'   => $this->request->getPost('street'),
            'postcode' => $this->request->getPost('postcode'),
            'town'     => $this->request->getPost('town'),
            'age'      => $this->request->getPost('age'),
        ]);
    
        return redirect()->to('/contacts')->with('success', 'Contact updated successfully');
    }


}
