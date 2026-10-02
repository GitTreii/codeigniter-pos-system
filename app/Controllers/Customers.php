<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $data['customers'] = [
            [
                'name' => 'Scott Summers',
                'email' => 'scott.summers@example.com',
                'phone' => '555-0101'
            ],
            [
                'name' => 'Jean Grey',
                'email' => 'jean.grey@example.com',
                'phone' => '555-0202'
            ],
            [
                'name' => 'Logan Howlett',
                'email' => 'logan.howlett@example.com',
                'phone' => '555-0303'
            ],
            [
                'name' => 'Ororo Munroe',
                'email' => 'ororo.munroe@example.com',
                'phone' => '555-0404'
            ],
            [
                'name' => 'Hank McCoy',
                'email' => 'hank.mccoy@example.com',
                'phone' => '555-0505'
            ]
        ];

        return view('customers/index', $data);
    }
}