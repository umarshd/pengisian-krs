<?php

namespace App\Controllers;

class Admin extends BaseController
{
  public function dashboard()
  {
    $data = [
      'title' => 'Dashboard Admin'
    ];

    return view('admin/dashboard', $data);
  }
}
