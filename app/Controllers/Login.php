<?php

namespace App\Controllers;

use App\Models\Admin2Model;


class Login extends BaseController
{

    public function __construct()
    {
        $this->Admin2Model = new Admin2Model();
    }


    public function index()
    {
        $data = [
            'title' => 'Login Admin',
            //'member' => $this->MemberModel->findAll()

        ];

        return view('admin/login', $data);
    }

    //--------------------------------------------------------------------

    public function login_proses()
    {
        # code...

        $data_req = [
            'admin_email'    => $this->request->getVar('email'),
            'admin_pw'       => $this->request->getVar('password')
        ];

        $data_login = $this->Admin2Model->where(['admin_email' => $data_req['admin_email']])->first();
        if ($data_login) {


            if ($data_login['admin_pass'] == MD5($data_req['admin_pw'])) {
                $session_login = [
                    'admin_nama' =>   $data_login['admin_nama'],
                    'admin_email' =>  $data_login['admin_email'],
                    'admin_pass' =>   $data_login['admin_pass'],
                    'admin_phone' =>  $data_login['admin_phone'],
                    'login' => TRUE

                ];
                session()->set($session_login);
                return redirect()->to('/');
            } else {
                session()->setflashdata('pesan', 'password salah');
            }
        } else {
            session()->setflashdata('pesan', 'data tidak ditemukan');
        }

        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
