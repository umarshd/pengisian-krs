<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use App\Models\SemesterModel;
use App\Models\JurusanModel;
use App\Models\CustomModel;
use App\Models\KRSModel;

class Mahasiswa extends BaseController
{

  protected $MahasiswaModel;
  protected $SemesterModel;
  protected $JurusanModel;
  protected $CustomModel;
  protected $KRSModel;

  public function __construct()
  {
    $this->MahasiswaModel   = new MahasiswaModel();
    $this->JurusanModel     = new JurusanModel();
    $this->SemesterModel    = new SemesterModel();
    $this->CustomModel      = new CustomModel();
    $this->KRSModel         = new KRSModel();
  }

  public function dashboard()
  {
    $data = [
      'title' => 'Dashboard Mahasiswa',
      'user'  => $this->MahasiswaModel->where('nim_mahasiswa', session()->get('nim'))->first(),
      'dataKrs' => $this->CustomModel->getKrsByIdMhs(session()->get('nim')),
    ];
    return view('mahasiswa/dashboard', $data);
  }

  public function listMahasiswa()
  {
    $data = [
      'title' => 'Mahasiswa',
      'dataMahasiswa'  => $this->MahasiswaModel->findAll(),
    ];
    return view('mahasiswa/index', $data);
  }

  public function tambahMahasiswa()
  {
    $data = [
      'title' => 'Tambah Mahasiswa',
      'dataJurusan' => $this->JurusanModel->findAll(),
      'dataSemester'  => $this->SemesterModel->findAll(),
    ];

    return view('mahasiswa/tambah', $data);
  }

  public function editMahasiswa($nim_mahasiswa)
  {
    $data = [
      'title' => 'Edit Mahasiswa',
      'mahasiswa' => $this->MahasiswaModel->where('nim_mahasiswa', $nim_mahasiswa)->first(),
      'dataJurusan' => $this->JurusanModel->findAll(),
      'dataSemester'  => $this->SemesterModel->findAll(),
    ];

    return view('mahasiswa/edit', $data);
  }

  public function editMahasiswaByMahasiswa($nim_mahasiswa)
  {
    $data = [
      'title' => 'Edit Mahasiswa',
      'mahasiswa' => $this->MahasiswaModel->where('nim_mahasiswa', $nim_mahasiswa)->first(),
      'dataJurusan' => $this->JurusanModel->findAll(),
      'dataSemester'  => $this->SemesterModel->findAll(),
      'user'  => $this->MahasiswaModel->where('nim_mahasiswa', session()->get('nim'))->first(),

    ];

    return view('mahasiswa/edit_mahasiswa', $data);
  }

  public function deleteMahasiswa($nim_mahasiswa)
  {
    $this->MahasiswaModel->delete($nim_mahasiswa);
    return redirect()->to('admin/fakultas');
  }

  public function prosesTambahMahasiswa()
  {
    $rules = $this->validate([
      'nim_mahasiswa' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Nim harus di isi'
        ]
      ],
      'nama_mahasiswa' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Nama harus di isi'
        ]
      ],
      'tanggal_lahir_mahasiswa' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Nama harus di isi'
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
      'password_mahasiswa' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Password harus di isi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $passwordHas = $this->request->getVar('password_mahasiswa');
    $resultHasPassword = password_hash($passwordHas, PASSWORD_BCRYPT);

    $data = [
      'nim_mahasiswa'             => $this->request->getVar('nim_mahasiswa'),
      'nama_mahasiswa'            => $this->request->getVar('nama_mahasiswa'),
      'tanggal_lahir_mahasiswa'   => $this->request->getVar('tanggal_lahir_mahasiswa'),
      'semester_mahasiswa'        => $this->request->getVar('pilihSemester'),
      'jurusan_mahasiswa'         => $this->request->getVar('pilihJurusan'),
      'password_mahasiswa'        => $resultHasPassword,
      'foto_mahasiswa'            => 'default.jgp',
    ];

    $this->MahasiswaModel->insert($data);
    return redirect()->to('admin/mahasiswa');
  }

  public function prosesEditMahasiswa()
  {
    $rules = $this->validate([
      'nim_mahasiswa' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Nim harus di isi'
        ]
      ],
      'nama_mahasiswa' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Nama harus di isi'
        ]
      ],
      'tanggal_lahir_mahasiswa' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Nama harus di isi'
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

    $id = $this->request->getVar('old_nim_mahasiswa');
    $passwordHas = $this->request->getVar('password_mahasiswa');
    $resultHasPassword = password_hash($passwordHas, PASSWORD_BCRYPT);

    $data = [
      'nim_mahasiswa'             => $this->request->getVar('nim_mahasiswa'),
      'nama_mahasiswa'            => $this->request->getVar('nama_mahasiswa'),
      'tanggal_lahir_mahasiswa'   => $this->request->getVar('tanggal_lahir_mahasiswa'),
      'semester_mahasiswa'        => $this->request->getVar('pilihSemester'),
      'jurusan_mahasiswa'         => $this->request->getVar('pilihJurusan'),
      'password_mahasiswa'        => $resultHasPassword,
    ];

    $this->MahasiswaModel->update($id, $data);
    return redirect()->to('admin/mahasiswa');
  }

  public function prosesEditMahasiswaByMahasiswa()
  {
    $rules = $this->validate([
      'nim_mahasiswa' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Nim harus di isi'
        ]
      ],
      'nama_mahasiswa' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Nama harus di isi'
        ]
      ],
      'tanggal_lahir_mahasiswa' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Nama harus di isi'
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

    $rulesImage = $this->validate([
      'foto_mahasiswa' => [
        'rules' => 'is_image[foto_mahasiswa]',
        'errors' => [
          'is_image' => 'File yang di upload bukan gambar'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $image = $_FILES['foto_mahasiswa']['name'];

    if (!$image) {

      $passwordHas = $this->request->getVar('password_mahasiswa');
      $resultHasPassword = password_hash($passwordHas, PASSWORD_BCRYPT);

      if (!$passwordHas) {

        $id = $this->request->getVar('old_nim_mahasiswa');
        $data = [
          'nim_mahasiswa'             => $this->request->getVar('nim_mahasiswa'),
          'nama_mahasiswa'            => $this->request->getVar('nama_mahasiswa'),
          'tanggal_lahir_mahasiswa'   => $this->request->getVar('tanggal_lahir_mahasiswa'),
          'semester_mahasiswa'        => $this->request->getVar('pilihSemester'),
          'jurusan_mahasiswa'         => $this->request->getVar('pilihJurusan'),
        ];

        $this->MahasiswaModel->update($id, $data);
        return redirect()->to('/dashboard');
      }

      $id = $this->request->getVar('old_nim_mahasiswa');

      $data = [
        'nim_mahasiswa'             => $this->request->getVar('nim_mahasiswa'),
        'nama_mahasiswa'            => $this->request->getVar('nama_mahasiswa'),
        'tanggal_lahir_mahasiswa'   => $this->request->getVar('tanggal_lahir_mahasiswa'),
        'semester_mahasiswa'        => $this->request->getVar('pilihSemester'),
        'jurusan_mahasiswa'         => $this->request->getVar('pilihJurusan'),
        'password_mahasiswa'        => $resultHasPassword,
      ];

      $this->MahasiswaModel->update($id, $data);
      return redirect()->to('/dashboard');
    }

    if (!$rulesImage) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $oldImage = $this->request->getvar('old_foto_mahasiswa');

    if ($oldImage != 'default.png') {
      unlink(FCPATH . 'assets/img/uploads/' . $oldImage);
    }


    $newNameImage = $this->request->getVar('nim_mahasiswa');
    $newImage = $this->request->getFile('foto_mahasiswa');
    $newImage->move('assets/img/uploads/', $newNameImage . '.jpg');

    $passwordHas = $this->request->getVar('password_mahasiswa');
    $resultHasPassword = password_hash($passwordHas, PASSWORD_BCRYPT);

    if (!$passwordHas) {
      $id = $this->request->getVar('old_nim_mahasiswa');

      $data = [
        'nim_mahasiswa'             => $this->request->getVar('nim_mahasiswa'),
        'nama_mahasiswa'            => $this->request->getVar('nama_mahasiswa'),
        'tanggal_lahir_mahasiswa'   => $this->request->getVar('tanggal_lahir_mahasiswa'),
        'semester_mahasiswa'        => $this->request->getVar('pilihSemester'),
        'jurusan_mahasiswa'         => $this->request->getVar('pilihJurusan'),
        'foto_mahasiswa'            => $newNameImage . '.jpg',
      ];

      $this->MahasiswaModel->update($id, $data);
      return redirect()->to('/dashboard');
    }

    $id = $this->request->getVar('old_nim_mahasiswa');


    $data = [
      'nim_mahasiswa'             => $this->request->getVar('nim_mahasiswa'),
      'nama_mahasiswa'            => $this->request->getVar('nama_mahasiswa'),
      'tanggal_lahir_mahasiswa'   => $this->request->getVar('tanggal_lahir_mahasiswa'),
      'semester_mahasiswa'        => $this->request->getVar('pilihSemester'),
      'jurusan_mahasiswa'         => $this->request->getVar('pilihJurusan'),
      'password_mahasiswa'        => $resultHasPassword,
      'foto_mahasiswa'            => $newNameImage . '.jpg',
    ];

    $this->MahasiswaModel->update($id, $data);
    return redirect()->to('/dashboard');
  }

  public function krs()
  {
    $dataUser  = $this->MahasiswaModel->where('nim_mahasiswa', session()->get('nim'))->first();

    $jurusanUser = $dataUser['jurusan_mahasiswa'];
    $data = [
      'title' => 'KRS',
      'user'  => $this->MahasiswaModel->where('nim_mahasiswa', session()->get('nim'))->first(),
      'dataMataKuliahS1' => $this->CustomModel->getMKSemester1('SMTR1', $jurusanUser),
      'dataMataKuliahS2' => $this->CustomModel->getMKSemester2('SMTR2', $jurusanUser),
      'dataMataKuliahS3' => $this->CustomModel->getMKSemester2('SMTR3', $jurusanUser),
      'dataMataKuliahS4' => $this->CustomModel->getMKSemester2('SMTR4', $jurusanUser),
      'dataMataKuliahS5' => $this->CustomModel->getMKSemester2('SMTR5', $jurusanUser),
      'dataMataKuliahS6' => $this->CustomModel->getMKSemester2('SMTR6', $jurusanUser),
      'dataMataKuliahS7' => $this->CustomModel->getMKSemester2('SMTR7', $jurusanUser),
      'dataMataKuliahS8' => $this->CustomModel->getMKSemester2('SMTR8', $jurusanUser),
    ];
    return view('krs/index', $data);
  }

  public function prosesKrs()
  {
    $rules = $this->validate([
      'nim_mahasiswa' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Nim harus di isi'
        ]
      ],
      'pilihTahunAkademik' => [
        'rules' => 'required',
        'errors' => [
          'required'  => 'Tahun harus di isi'
        ]
      ],
    ]);

    if (!$rules) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back();
    }

    $dataMK = $this->request->getVar('mk');

    for ($i = 0; $i < count($dataMK); $i++) {

      $nim = $this->request->getVar('nim_mahasiswa');
      $tahun = $this->request->getVar('pilihTahunAkademik');
      $mk = $dataMK[$i];
      $this->KRSModel->insert([
        'nim_mahasiswa' => $nim,
        'tahun_akademik_krs'  => $tahun,
        'kode_mata_kuliah'    => $mk
      ]);
    }
    return redirect()->to('/dashboard');
  }
}
