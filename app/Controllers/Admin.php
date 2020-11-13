<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\MemberModel;

class Admin extends BaseController
{
    public function __construct()
    {

        $this->AdminModel = new AdminModel();
        $this->MemberModel = new MemberModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Halaman Index',
            'event' => $this->AdminModel->findAll()

        ];
        return view('admin/index', $data);
    }

    public function tes_aja()
    {
        $jenis_event = ['belum mulai', 'sedang berjalan', 'telah selesai'];
        $acak_event  = rand(0, 2);
        $jenis_event[$acak_event];
    }
    //--------------------------------------------------------------------

    public function event_manage()
    {
        $data = [
            'title' => 'Halaman Atur Event',
            'event' => $this->AdminModel->findAll(),


        ];

        return view('admin/event_manage', $data);
    }

    public function event_add()
    {
        $data = [
            'title' => 'Halaman Tambah Event',
            'validation' => \Config\Services::validation()

        ];

        return view('admin/event_add', $data);
    }

    public function event_edit($id)
    {
        $data = [
            'title' => 'Halaman Edit Event',
            'event' => $this->AdminModel->where(['event_id' => $id])->first(),
            'validation' => \Config\Services::validation()

        ];


        return view('admin/event_edit', $data);
    }

    public function event_simpan()
    {

        //validasi input
        if (!$this->validate([
            'event_nama' => [
                'rules' => 'required|is_unique[event_table.event_nama]',
                'errors' => [
                    'required' => '{field} nama event harus diisi.',
                    'is_unique' => '{field} nama event sudah ada',
                ],
            ],
            'event_penyelenggara' => 'required',
            'event_deskripsi' => 'required',
            'event_tanggal' => 'required',
            'event_tempat' => 'required',
            'event_peserta' => 'required',
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/admin/event_add')->withInput();
        }

        // dd($this->request->getVar());
        $data = [
            'event_nama' => $this->request->getVar('event_nama'),
            'event_penyelenggara' => $this->request->getVar('event_penyelenggara'),
            'event_deskripsi' => $this->request->getVar('event_deskripsi'),
            'event_tanggal' => $this->request->getVar('event_tanggal'),
            'event_tempat' => $this->request->getVar('event_tempat'),
            'event_peserta' => $this->request->getVar('event_peserta'),
            'event_status' => 'pending',
            'event_peserta_isi' => '0',

        ];

        // dd($data);

        $this->AdminModel->save($data);
        session()->setflashdata('pesan', 'Data berhasil ditambah.');
        return redirect()->to(base_url() . '/admin/event_manage');
    }

    public function event_hapus($id)
    {
        $this->AdminModel->delete($id);
        session()->setflashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to(base_url() . '/admin/event_manage');
    }

    public function event_update($id)
    {
        if (!$this->validate([
            'event_nama' => [
                'rules' => 'required|is_unique[event_table.event_nama,event_id,' . $id . ']',
                'errors' => [
                    'required' => 'event harus diisi.',
                    'is_unique' => 'event sudah ada',
                ],
            ],
            'event_penyelenggara' => 'required',
            'event_deskripsi' => 'required',
            'event_tanggal' => 'required',
            'event_tempat' => 'required',
            'event_peserta' => 'required',
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/edit/' . $this->request->getPost('slug'))->withInput()->with('validation', $validation);
            return redirect()->to('/admin/event_edit/' . $id)->withInput();
        }

        $data = [

            'event_id' => $id,
            'event_nama' => $this->request->getVar('event_nama'),
            'event_penyelenggara' => $this->request->getVar('event_penyelenggara'),
            'event_deskripsi' => $this->request->getVar('event_deskripsi'),
            'event_tanggal' => $this->request->getVar('event_tanggal'),
            'event_tempat' => $this->request->getVar('event_tempat'),
            'event_peserta' => $this->request->getVar('event_peserta'),

        ];

        // dd($data);

        $this->AdminModel->save($data);
        session()->setflashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to(base_url() . '/admin/event_manage');
    }

    public function member_manage()
    {

        $data = [
            'title' => 'Halaman Atur Member',
            'member' => $this->MemberModel->findAll()

        ];

        return view('admin/member_manage', $data);
    }
}
