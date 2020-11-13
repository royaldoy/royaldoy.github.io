<?php

namespace App\Controllers;


use App\Models\MemberModel;

class Member extends BaseController
{
    public function __construct()
    {

        // $this->AdminModel = new AdminModel();
        $this->MemberModel = new MemberModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Halaman Member',


        ];

        return view('member/index', $data);
    }
}
