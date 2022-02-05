<?php

namespace App\Controllers;

use App\Models\FakultasModel;

class Fakultas extends BaseController
{

  protected $FakultasModel;

  public function __construct()
  {
    $this->FakultasModel = new FakultasModel();
  }

  public function listFakultas()
  {
    $data = [
      'title' => 'Fakultas',
      'dataFakultas'  => $this->FakultasModel->findAll(),
    ];
    return view('fakultas/index', $data);
  }

  public function tambahFakultas()
  {
    $data = [
      'title' => 'Tambah Fakultas'
    ];

    return view('fakultas/tambah', $data);
  }

  public function editFakultas($kode_fakultas)
  {
    $data = [
      'title' => 'Edit Fakultas',
      'fakultas' => $this->FakultasModel->where('kode_fakultas', $kode_fakultas)->first(),
    ];

    return view('fakultas/edit', $data);
  }

  public function deleteFakultas($kode_fakultas)
  {
    $this->FakultasModel->delete($kode_fakultas);
    return redirect()->to('admin/fakultas');
  }

  public function prosesTambahFakultas()
  {
    $rules = $this->validate([
      'kode_fakultas' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Kode Fakultas harus di isi'
        ]
      ],
      'nama_fakultas' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Nama Fakultas harus di isi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $data = [
      'kode_fakultas'   => $this->request->getVar('kode_fakultas'),
      'nama_fakultas'   => $this->request->getVar('nama_fakultas'),
    ];

    $this->FakultasModel->insert($data);
    return redirect()->to('admin/fakultas');
  }

  public function prosesEditFakultas()
  {
    $rules = $this->validate([
      'kode_fakultas' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Kode Fakultas harus di isi'
        ]
      ],
      'nama_fakultas' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Nama Fakultas harus di isi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $id = $this->request->getVar('old_kode_fakultas');

    $data = [
      'kode_fakultas'   => $this->request->getVar('kode_fakultas'),
      'nama_fakultas'   => $this->request->getVar('nama_fakultas'),
    ];

    $this->FakultasModel->update($id, $data);
    return redirect()->to('admin/fakultas');
  }
}
