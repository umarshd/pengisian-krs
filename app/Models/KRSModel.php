<?php

namespace App\Models;

use CodeIgniter\Model;

class KRSModel extends Model
{
  protected $table = 'krs';
  protected $primaryKey = 'id_krs';
  protected $returnType = 'array';
  protected $allowedFields = [
    'nim_mahasiswa',
    'kode_mata_kuliah',
    'tahun_akademik_krs'
  ];
}
