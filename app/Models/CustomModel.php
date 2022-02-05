<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomModel extends Model
{
  public function getMKSemester1($kode_semester, $jurusan)
  {

    $rules = [
      'kode_semester' => $kode_semester,
      'kode_jurusan'  => $jurusan,
    ];

    $dbMataKuliah = $this->db->table('mata_kuliah');
    $dbMataKuliah->where($rules);

    return $dbMataKuliah->get()->getResultArray();
  }
  public function getMKSemester2($kode_semester)
  {
    $dbMataKuliah = $this->db->table('mata_kuliah');
    $dbMataKuliah->where('kode_semester', $kode_semester);

    return $dbMataKuliah->get()->getResultArray();
  }
  public function getMKSemester3($kode_semester)
  {
    $dbMataKuliah = $this->db->table('mata_kuliah');
    $dbMataKuliah->where('kode_semester', $kode_semester);

    return $dbMataKuliah->get()->getResultArray();
  }
  public function getMKSemester4($kode_semester)
  {
    $dbMataKuliah = $this->db->table('mata_kuliah');
    $dbMataKuliah->where('kode_semester', $kode_semester);

    return $dbMataKuliah->get()->getResultArray();
  }
  public function getMKSemester5($kode_semester)
  {
    $dbMataKuliah = $this->db->table('mata_kuliah');
    $dbMataKuliah->where('kode_semester', $kode_semester);

    return $dbMataKuliah->get()->getResultArray();
  }
  public function getMKSemester6($kode_semester)
  {
    $dbMataKuliah = $this->db->table('mata_kuliah');
    $dbMataKuliah->where('kode_semester', $kode_semester);

    return $dbMataKuliah->get()->getResultArray();
  }
  public function getMKSemester7($kode_semester)
  {
    $dbMataKuliah = $this->db->table('mata_kuliah');
    $dbMataKuliah->where('kode_semester', $kode_semester);

    return $dbMataKuliah->get()->getResultArray();
  }
  public function getMKSemester8($kode_semester)
  {
    $dbMataKuliah = $this->db->table('mata_kuliah');
    $dbMataKuliah->where('kode_semester', $kode_semester);

    return $dbMataKuliah->get()->getResultArray();
  }

  public function getKrsByIdMhs($nim)
  {
    $dbKRS = $this->db->table('krs');
    $dbKRS->where('nim_mahasiswa', $nim);
    $dbKRS->join('mata_kuliah', 'mata_kuliah.kode_mata_kuliah=krs.kode_mata_kuliah')->select('mata_kuliah.*, krs.nim_mahasiswa,krs.tahun_akademik_krs');

    return $dbKRS->get()->getResultArray();
  }
}
