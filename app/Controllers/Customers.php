<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index()
    {
        $model = new CustomerModel();

        $data['customers'] = $model->findAll();

        return view('customers/index', $data);
    }

    public function new()
    {
        return view('customers/new');
    }

    public function create()
    {
        $rules = [
            'full_name' => 'required',
            'email'     => 'required|valid_email',
            'phone'     => 'permit_empty'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new CustomerModel();

        $model->insert([
            'full_name'  => $this->request->getPost('full_name'),
            'email'      => $this->request->getPost('email'),
            'phone'      => $this->request->getPost('phone'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/customers');
    }

    public function edit($id)
    {
        $model = new CustomerModel();

        $customer = $model->find($id);

        if (! $customer) {
            return redirect()->to('/customers');
        }

        return view('customers/edit', [
            'customer' => $customer
        ]);
    }

    public function update($id)
    {
        $rules = [
            'full_name' => 'required',
            'email'     => 'required|valid_email',
            'phone'     => 'permit_empty'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new CustomerModel();

        $model->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone')
        ]);

        return redirect()->to('/customers');
    }
}