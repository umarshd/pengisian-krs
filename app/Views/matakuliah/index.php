<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Mata Kuliah</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item active">Mata Kuliah</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Mata Kuliah</h5>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Kode Mata Kuliah</th>
                  <th scope="col">Nama Mata Kuliah</th>
                  <th scope="col">Jurusan</th>
                  <th scope="col">Semester</th>
                  <th scope="col">Aksi</th>
              </thead>
              <tbody>
                <?php $i = 1 ?>
                <?php foreach ($dataMataKuliah as $matakuliah) : ?>
                  <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $matakuliah['kode_mata_kuliah'] ?></td>
                    <td><?= $matakuliah['nama_mata_kuliah'] ?></td>
                    <td><?= $matakuliah['kode_jurusan'] ?></td>
                    <td><?= $matakuliah['kode_semester'] ?></td>
                    <td>
                      <a href="<?= base_url('/admin/matakuliah/edit/' . $matakuliah['kode_mata_kuliah']) ?>" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></a>
                      <a href="<?= base_url('/admin/matakuliah/delete/' . $matakuliah['kode_mata_kuliah']) ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
<?= $this->endSection() ?>