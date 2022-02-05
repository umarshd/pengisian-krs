<?php

namespace App\Controllers;

use App\Models\FakultasModel;
use App\Models\JurusanModel;

class Jurusan extends BaseController
{

  protected $FakultasModel;
  protected $JurusanModel;

  public function __construct()
  {
    $this->FakultasModel  = new FakultasModel();
    $this->JurusanModel   = new JurusanModel();
  }

  public function listJurusan()
  {
    $data = [
      'title' => 'Jurusan',
      'dataJurusan'  => $this->JurusanModel->findAll(),
    ];
    return view('jurusan/index', $data);
  }

  public function tambahJurusan()
  {
    $data = [
      'title' => 'Tambah Jurusan',
      'dataFakultas'  => $this->FakultasModel->findAll()
    ];

    return view('jurusan/tambah', $data);
  }

  public function editJurusan($kode_jurusan)
  {
    $data = [
      'title' => 'Edit Jurusan',
      'dataFakultas' => $this->FakultasModel->findAll(),
      'jurusan' => $this->JurusanModel->where('kode_jurusan', $kode_jurusan)->first(),
    ];

    return view('jurusan/edit', $data);
  }

  public function deleteJurusan($kode_jurusan)
  {
    $this->JurusanModel->delete($kode_jurusan);
    return redirect()->to('admin/jurusan');
  }

  public function prosesTambahJurusan()
  {
    $rules = $this->validate([
      'kode_jurusan' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Kode Jurusan harus di isi'
        ]
      ],
      'nama_jurusan' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Nama Jurusan harus di isi'
        ]
      ],
      'pilihFakultas' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Fakultas harus di isi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $data = [
      'kode_jurusan'   => $this->request->getVar('kode_jurusan'),
      'nama_jurusan'   => $this->request->getVar('nama_jurusan'),
      'kode_fakultas'   => $this->request->getVar('pilihFakultas'),
    ];

    $this->JurusanModel->insert($data);
    return redirect()->to('admin/jurusan');
  }

  public function prosesEditJurusan()
  {
    $rules = $this->validate([
      'kode_jurusan' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Kode Jurusan harus di isi'
        ]
      ],
      'nama_jurusan' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Nama Jurusan harus di isi'
        ]
      ],
      'pilihFakultas' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Fakultas harus di isi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $id = $this->request->getVar('old_kode_jurusan');

    $data = [
      'kode_jurusan'   => $this->request->getVar('kode_jurusan'),
      'nama_jurusan'   => $this->request->getVar('nama_jurusan'),
      'kode_fakultas'   => $this->request->getVar('pilihFakultas'),
    ];

    $this->JurusanModel->update($id, $data);
    return redirect()->to('admin/jurusan');
  }
}
