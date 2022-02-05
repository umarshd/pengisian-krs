<?php

namespace App\Models;

use CodeIgniter\Model;

class MataKuliahModel extends Model
{
  protected $table = 'mata_kuliah';
  protected $primaryKey = 'kode_mata_kuliah';
  protected $returnType = 'array';
  protected $allowedFields = [
    'kode_mata_kuliah',
    'nama_mata_kuliah',
    'sks_mata_kuliah',
    'jenis_mata_kuliah',
    'kode_jurusan',
    'kode_semester'
  ];
}
