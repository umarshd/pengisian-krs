<?php

namespace App\Controllers;

use App\Models\AuthAdminModel;

class AuthAdmin extends BaseController
{

  protected $AuthAdminModel;

  public function __construct()
  {
    $this->AuthAdminModel = new AuthAdminModel();
  }

  public function login()
  {
    return view('auth/loginadmin');
  }

  public function prosesLogin()
  {
    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');

    $checkEmail = $this->AuthAdminModel->where('email_user', $email)->first();

    if (!$checkEmail) {
      session()->setFlashdata('error', 'Email tidak terdaftar');
      return redirect()->back();
    }

    $checkPassword = password_verify($password, $checkEmail['password_user']);

    if (!$checkPassword) {
      session()->setFlashdata('error', 'Password anda salah');
      return redirect()->back();
    }

    session()->set([
      'is_login' => true,
      'is_admin' => true,
      'email' => $checkEmail['email_user'],
    ]);

    return redirect()->to('admin/dashboard');
  }

  public function logout()
  {
    session()->destroy();
    return redirect()->to('/admin/login');
  }
}
