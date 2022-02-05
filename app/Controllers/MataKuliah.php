<?php

namespace App\Controllers;

use App\Models\MataKuliahModel;
use App\Models\JurusanModel;
use App\Models\SemesterModel;

class MataKuliah extends BaseController
{

  protected $MataKuliahModel;
  protected $JurusanModel;
  protected $SemesterModel;

  public function __construct()
  {
    $this->MataKuliahModel  = new MataKuliahModel();
    $this->JurusanModel     = new JurusanModel();
    $this->SemesterModel    = new SemesterModel();
  }

  public function listMataKuliah()
  {
    $data = [
      'title' => 'Mata Kuliah',
      'dataMataKuliah'  => $this->MataKuliahModel->findAll(),
    ];
    return view('matakuliah/index', $data);
  }

  public function tambahMataKuliah()
  {
    $data = [
      'title' => 'Tambah Mata Kuliah',
      'dataJurusan' => $this->JurusanModel->findAll(),
      'dataSemester'  => $this->SemesterModel->findAll(),
    ];

    return view('matakuliah/tambah', $data);
  }

  public function editMataKuliah($kode_mata_kuliah)
  {
    $data = [
      'title' => 'Edit Mata Kuliah',
      'matakuliah' => $this->MataKuliahModel->where('kode_mata_kuliah', $kode_mata_kuliah)->first(),
      'dataJurusan' => $this->JurusanModel->findAll(),
      'dataSemester'  => $this->SemesterModel->findAll(),
    ];

    return view('matakuliah/edit', $data);
  }

  public function deleteMataKuliah($kode_mata_kuliah)
  {
    $this->MataKuliahModel->delete($kode_mata_kuliah);
    return redirect()->to('admin/matakuliah');
  }

  public function prosesTambahMataKuliah()
  {
    $rules = $this->validate([
      'kode_mata_kuliah' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Kode Mata Kuliah harus di isi'
        ]
      ],
      'nama_mata_kuliah' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'nama Mata Kuliah harus di isi'
        ]
      ],
      'sks_mata_kuliah' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'SKS Mata Kuliah harus di isi'
        ]
      ],
      'pilihJenisMK' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Jenis Mata Kuliah harus di isi'
        ]
      ],
      'pilihJurusan' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Jurusan harus di isi'
        ]
      ],
      'pilihSemester' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Semester harus di isi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $data = [
      'kode_mata_kuliah'    => $this->request->getVar('kode_mata_kuliah'),
      'nama_mata_kuliah'    => $this->request->getVar('nama_mata_kuliah'),
      'sks_mata_kuliah'     => $this->request->getVar('sks_mata_kuliah'),
      'jenis_mata_kuliah'   => $this->request->getVar('pilihJenisMK'),
      'kode_jurusan'        => $this->request->getVar('pilihJurusan'),
      'kode_semester'       => $this->request->getVar('pilihSemester'),
    ];

    $this->MataKuliahModel->insert($data);
    return redirect()->to('admin/matakuliah');
  }

  public function prosesEditMataKuliah()
  {
    $rules = $this->validate([
      'kode_mata_kuliah' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Kode Mata Kuliah harus di isi'
        ]
      ],
      'nama_mata_kuliah' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'nama Mata Kuliah harus di isi'
        ]
      ],
      'sks_mata_kuliah' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'SKS Mata Kuliah harus di isi'
        ]
      ],
      'pilihJenisMK' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Jenis Mata Kuliah harus di isi'
        ]
      ],
      'pilihJurusan' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Jurusan harus di isi'
        ]
      ],
      'pilihSemester' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Semester harus di isi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $id = $this->request->getVar('old_kode_mata_kuliah');

    $data = [
      'kode_mata_kuliah'    => $this->request->getVar('kode_mata_kuliah'),
      'nama_mata_kuliah'    => $this->request->getVar('nama_mata_kuliah'),
      'sks_mata_kuliah'     => $this->request->getVar('sks_mata_kuliah'),
      'jenis_mata_kuliah'   => $this->request->getVar('pilihJenisMK'),
      'kode_jurusan'        => $this->request->getVar('pilihJurusan'),
      'kode_semester'       => $this->request->getVar('pilihSemester'),
    ];

    $this->MataKuliahModel->update($id, $data);
    return redirect()->to('admin/matakuliah');
  }
}
