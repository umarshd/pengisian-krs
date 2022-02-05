<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Auth extends BaseController
{

  protected $MahasiswaModel;

  public function __construct()
  {
    $this->MahasiswaModel = new MahasiswaModel();
  }

  public function login()
  {
    return view('auth/login');
  }

  public function prosesLogin()
  {
    $nim = $this->request->getVar('nim_mahasiswa');
    $password = $this->request->getVar('password');

    $checkNIM = $this->MahasiswaModel->where('nim_mahasiswa', $nim)->first();

    if (!$checkNIM) {
      session()->setFlashdata('error', 'NIM tidak terdaftar');
      return redirect()->back();
    }

    $checkPassword = password_verify($password, $checkNIM['password_mahasiswa']);

    if (!$checkPassword) {
      session()->setFlashdata('error', 'Password anda salah');
      return redirect()->back();
    }

    session()->set([
      'is_login' => true,
      'nim' => $checkNIM['nim_mahasiswa'],
    ]);

    return redirect()->to('/dashboard');
  }
}
