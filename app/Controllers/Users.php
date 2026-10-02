<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $data['users'] = [
            [
                'username' => 'professor_x',
                'name' => 'Charles Xavier',
                'role' => 'Administrator'
            ],
            [
                'username' => 'cyclops',
                'name' => 'Scott Summers',
                'role' => 'Manager'
            ],
            [
                'username' => 'storm',
                'name' => 'Ororo Munroe',
                'role' => 'Supervisor'
            ],
            [
                'username' => 'wolverine',
                'name' => 'Logan Howlett',
                'role' => 'Staff'
            ],
            [
                'username' => 'nightcrawler',
                'name' => 'Kurt Wagner',
                'role' => 'Cashier'
            ]
        ];

        return view('users/index', $data);
    }
}