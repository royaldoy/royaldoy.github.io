<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Response;
use App\Models\MahasiswaModel;

class BelajarAjax extends BaseController
{

    public function __construct()
    {
        $this->MahasiswaModel = new MahasiswaModel();
    }

    public function index()
    {

        $data1 = [
            'title' => 'halaman home'
        ];

        return view('b_ajax/index', $data1);
    }


    public function ambildata()
    {
        # code...
        $data = [
            'data'   => $this->MahasiswaModel->findAll()
        ];

        $msg = [
            'data' => view('b_ajax/datamahasiswa', $data)
        ];

        //dd(json_decode($msg, true));
        // dd($msg);
        //dd($data);

        echo json_encode($msg);

        // die();
        if ($this->request->isAJAX()) {
        } else {

            exit("tidak dapat diproses");
        }
    }

    public function formtambah()
    {
        $msg = [
            'data' => view('b_ajax/modaltambah')
        ];

        //dd(json_decode($msg, true));
        // dd($msg);
        //dd($data);

        echo json_encode($msg);

        if ($this->request->isAJAX()) {
        } else {

            exit("tidak dapat diproses");
        }
    }

    public function formtambahmulti()
    {


        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('b_ajax/mhs_multiform')
            ];

            echo json_encode($msg);
        } else {

            exit("tidak dapat diproses");
        }
    }
    public function simpandata()
    {
        if ($this->request->isAJAX()) {


            $validation = \Config\Services::validation();

            $valid = $this->validate([
                'mhs_nama' => [
                    'label' => 'nama',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'nama masih kosong',
                    ]
                ],
                'mhs_tempat' => [
                    'label' => 'tempat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'harap isi tempat',
                    ]
                ],
                'mhs_tgl' => [
                    'label' => 'tgl',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'tgl lahir masih kosong',
                    ]
                ],
                'mhs_jk' => [
                    'label' => 'jk',
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'harap pilih jenis kelamin',
                    ]
                ]
            ]);

            if (!$valid) {
                $msg = [
                    'error' => [
                        'nama' => $validation->getError('mhs_nama'),
                        'tempat' => $validation->getError('mhs_tempat'),
                        'tgl' => $validation->getError('mhs_tgl'),
                        'jk' => $validation->getError('mhs_jk')

                    ]
                ];
            } else {
                $simpandata = [
                    'mhs_nama' => $this->request->getVar('mhs_nama'),
                    'mhs_tempat' => $this->request->getVar('mhs_tempat'),
                    'mhs_tgl' => $this->request->getVar('mhs_tgl'),
                    'mhs_jk' => $this->request->getVar('mhs_jk'),
                ];

                $this->MahasiswaModel->save($simpandata);
                // echo "aaaaaaaasss";
                $msg = [
                    'sukses' => "Data berhasil Ditambahkan!"
                ];
                //echo json_encode($msg);
            }
            echo json_encode($msg);
        } else {

            exit("tidak dapat diproses");
        }
    }

    // public function simpandata()
    // {
    //     $simpandata = [
    //         'mhs_nama' => $this->request->getVar('mhs_nama'),
    //         'mhs_tempat' => $this->request->getVar('mhs_tempat'),
    //         'mhs_tanggal' => $this->request->getVar('mhs_tanggal'),
    //         'mhs_jk' => $this->request->getVar('mhs_jk'),
    //     ];

    //     echo json_encode($simpandata);
    // }


    public function form_mhsedit()
    {

        if ($this->request->isAJAX()) {

            $mhs_id = $this->request->getVar('mhs_id');
            $dm = $this->MahasiswaModel->find($mhs_id);

            $data = [
                'mhs_id' => $dm['mhs_id'],
                'mhs_tgl' => $dm['mhs_tgl'],
                'mhs_jk' => $dm['mhs_jk'],
                'mhs_tempat' => $dm['mhs_tempat'],
                'mhs_nama' => $dm['mhs_nama'],


            ];


            $msg = [
                'sukses' => view('b_ajax/modaledit', $data)
            ];

            echo json_encode($msg);
        } else {

            exit("tidak dapat diproses");
        }
    }

    public function updatedata()
    {
        if ($this->request->isAJAX()) {


            // $validation = \Config\Services::validation();

            // $valid = $this->validate([
            //     'mhs_nama' => [
            //         'label' => 'nama',
            //         'rules' => 'required',
            //         'errors' => [
            //             'required' => 'nama masih kosong',
            //         ]
            //     ],
            //     'mhs_tempat' => [
            //         'label' => 'tempat',
            //         'rules' => 'required',
            //         'errors' => [
            //             'required' => 'harap isi tempat',
            //         ]
            //     ],
            //     'mhs_tgl' => [
            //         'label' => 'tgl',
            //         'rules' => 'required',
            //         'errors' => [
            //             'required' => 'tgl lahir masih kosong',
            //         ]
            //     ],
            //     'mhs_jk' => [
            //         'label' => 'jk',
            //         'rules' => 'required',
            //         'errors' => [
            //             'required' => 'harap pilih jenis kelamin',
            //         ]
            //     ]
            // ]);

            // if (!$valid) {
            // $msg = [
            //     'error' => [
            //         'nama' => $validation->getError('mhs_nama'),
            //         'tempat' => $validation->getError('mhs_tempat'),
            //         'tgl' => $validation->getError('mhs_tgl'),
            //         'jk' => $validation->getError('mhs_jk')

            //     ]
            // ];
            // } else {
            $simpandata = [
                'mhs_id' => $this->request->getVar('mhs_id'),
                'mhs_nama' => $this->request->getVar('mhs_nama'),
                'mhs_tempat' => $this->request->getVar('mhs_tempat'),
                'mhs_tgl' => $this->request->getVar('mhs_tgl'),
                'mhs_jk' => $this->request->getVar('mhs_jk'),
            ];

            $this->MahasiswaModel->save($simpandata);
            // echo "aaaaaaaasss";
            $msg = [
                'sukses' => "Data berhasil diupdate!"
            ];
            //echo json_encode($msg);
            // }
            echo json_encode($msg);
        } else {

            exit("tidak dapat diproses");
        }
    }

    public function hapusdata()
    {

        if ($this->request->isAJAX()) {
            $data_hapus = [
                'mhs_id' => $this->request->getVar('mhs_id')
            ];

            $this->MahasiswaModel->delete($data_hapus);

            $msg = [
                'sukses' => "Data berhasil dihapus!"
            ];

            echo json_encode($msg);
        } else {

            exit("tidak dapat diproses");
        }
    }


    public function simpanmulti()
    {
        if ($this->request->isAJAX()) {

            $mhs_nama = $this->request->getVar('mhs_nama');
            $mhs_tempat = $this->request->getVar('mhs_tempat');
            $mhs_tgl = $this->request->getVar('mhs_tgl');
            $mhs_jk = $this->request->getVar('mhs_jk');

            $jml_data =  count($mhs_nama);

            for ($i = 0; $i < $jml_data; $i++) {
                # code...
                $this->MahasiswaModel->save([
                    'mhs_nama' => $mhs_nama[$i],
                    'mhs_tempat' => $mhs_tempat[$i],
                    'mhs_tgl' => $mhs_tgl[$i],
                    'mhs_jk' => $mhs_jk[$i],


                ]);
            }

            $msg = [
                'sukses' => $jml_data . ' Data mahasiswa berhasil disimpan.'
            ];
            // e4:c3:2a:64:32:da
            //e4:c3:2a:64:32:db

            echo json_encode($msg);
        } else {

            exit("tidak dapat diproses");
        }
    }

    public function hapusmulti()
    {
        # code...
        if ($this->request->isAJAX()) {

            $mhs_id = $this->request->getVar('mhs_id');
            $jml_data =  count($mhs_id);

            for ($i = 0; $i < $jml_data; $i++) {
                $this->MahasiswaModel->delete([
                    'mhs_id' => $mhs_id[$i]
                ]);
            }


            $msg = [
                'sukses' => $jml_data . ' Data mahasiswa berhasil dihapus.'
            ];

            echo json_encode($msg);
        } else {

            exit("tidak dapat diproses");
        }
    }

    public function lihatmap()
    {
        # code...

        return view('b_ajax/lihatmap');
    }
    //--------------------------------------------------------------------

}
