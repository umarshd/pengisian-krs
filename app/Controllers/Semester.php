<?php

namespace App\Controllers;

use App\Models\SemesterModel;

class Semester extends BaseController
{

  protected $SemesterModel;

  public function __construct()
  {
    $this->SemesterModel = new SemesterModel();
  }

  public function listSemester()
  {
    $data = [
      'title' => 'Semester',
      'dataSemester'  => $this->SemesterModel->findAll(),
    ];
    return view('semester/index', $data);
  }

  public function tambahSemester()
  {
    $data = [
      'title' => 'Tambah Semester'
    ];

    return view('semester/tambah', $data);
  }

  public function editSemester($kode_semester)
  {
    $data = [
      'title' => 'Edit Semester',
      'semester' => $this->SemesterModel->where('kode_semester', $kode_semester)->first(),
    ];

    return view('semester/edit', $data);
  }

  public function deleteSemester($kode_semester)
  {
    $this->SemesterModel->delete($kode_semester);
    return redirect()->to('admin/semester');
  }

  public function prosesTambahSemester()
  {
    $rules = $this->validate([
      'kode_semester' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Kode Semester harus di isi'
        ]
      ],
      'nama_semester' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Nama Semester harus di isi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $data = [
      'kode_semester'   => $this->request->getVar('kode_semester'),
      'nama_semester'   => $this->request->getVar('nama_semester'),
    ];

    $this->SemesterModel->insert($data);
    return redirect()->to('admin/semester');
  }

  public function prosesEditSemester()
  {
    $rules = $this->validate([
      'kode_semester' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Kode Semester harus di isi'
        ]
      ],
      'nama_semester' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Nama Semester harus di isi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $id = $this->request->getVar('old_kode_semester');

    $data = [
      'kode_semester'   => $this->request->getVar('kode_semester'),
      'nama_semester'   => $this->request->getVar('nama_semester'),
    ];

    $this->SemesterModel->update($id, $data);
    return redirect()->to('admin/semester');
  }
}
