<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $model = new UserModel();

        $data['users'] = $model->findAll();

        return view('users/index', $data);
    }

    public function new()
    {
        return view('users/new');
    }

    public function create()
    {
        $rules = [
            'username'  => 'required|is_unique[users.username]',
            'full_name' => 'required'
        ];

        if (! $this->validateData($this->request->getPost(), $rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();

        $model->insert([
            'username'   => $this->request->getPost('username'),
            'full_name'  => $this->request->getPost('full_name'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/users');
    }

    public function edit($id)
    {
        $model = new UserModel();

        $user = $model->find($id);

        if (! $user) {
            return redirect()->to('/users');
        }

        return view('users/edit', [
            'user' => $user
        ]);
    }

    public function update($id)
    {
        $model = new UserModel();

        $user = $model->find($id);

        if (! $user) {
            return redirect()->to('/users');
        }

        $rules = [
            'username'  => "required|is_unique[users.username,id,{$id}]",
            'full_name' => 'required'
        ];

        if (! $this->validateData($this->request->getPost(), $rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name')
        ];

        $file = $this->request->getFile('avatar');

        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $fileRules = [
                'avatar' => 'ext_in[avatar,jpg,jpeg,png]|mime_in[avatar,image/jpeg,image/png]|max_size[avatar,2048]'
            ];

            if (! $this->validateData([], $fileRules)) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $this->validator->getErrors());
            }

            $uploadPath = FCPATH . 'uploads/';

            if (! is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $extension = strtolower($file->getExtension());
            $filename = $file->getRandomName();
            $filename = pathinfo($filename, PATHINFO_FILENAME) . '.' . $extension;

            $tempPath = $uploadPath . 'temp_' . $filename;

            $file->move($uploadPath, 'temp_' . $filename);

            service('image')
                ->withFile($tempPath)
                ->fit(200, 200, 'center')
                ->save($uploadPath . $filename);

            unlink($tempPath);

            $data['avatar'] = $filename;
        }

        $model->update($id, $data);

        return redirect()->to('/users');
    }
}