<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
  protected $table = 'mahasiswa';
  protected $primaryKey = 'nim_mahasiswa';
  protected $returnType = 'array';
  protected $allowedFields = [
    'nim_mahasiswa',
    'nama_mahasiswa',
    'tanggal_lahir_mahasiswa',
    'semester_mahasiswa',
    'jurusan_mahasiswa',
    'password_mahasiswa',
    'foto_mahasiswa'
  ];
}
