<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Mahasiswa</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item active">Mahasiswa</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Mahasiswah</h5>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">NIM</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Jurusan</th>
                  <th scope="col">Semester</th>
                  <th scope="col">Aksi</th>
              </thead>
              <tbody>
                <?php $i = 1 ?>
                <?php foreach ($dataMahasiswa as $mahasiswa) : ?>
                  <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $mahasiswa['nim_mahasiswa'] ?></td>
                    <td><?= $mahasiswa['nama_mahasiswa'] ?></td>
                    <td><?= $mahasiswa['jurusan_mahasiswa'] ?></td>
                    <td><?= $mahasiswa['semester_mahasiswa'] ?></td>
                    <td>
                      <a href="<?= base_url('/admin/mahasiswa/edit/' . $mahasiswa['nim_mahasiswa']) ?>" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></a>
                      <a href="<?= base_url('/admin/mahasiswa/delete/' . $mahasiswa['nim_mahasiswa']) ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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