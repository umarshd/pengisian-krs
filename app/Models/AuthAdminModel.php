<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthAdminModel extends Model
{
  protected $table = 'user';
  protected $primaryKey = 'id_user';
  protected $returnType = 'array';
  protected $allowedFields = [
    'nama_user',
    'email_user',
    'password_user',
    'alamat_user',
    'foto_user',
  ];
}
