<?= $this->extend('layouts/mahasiswa_layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>

  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <h4>Selamat Datang , <?= $user['nama_mahasiswa'] ?></h4>
      <div class="col-lg-6">
        <div class="card p-3">
          <div class="row">
            <div class="col-lg-4">NIM</div>
            <div class="col-lg-8">: <?= $user['nim_mahasiswa'] ?></div>
            <div class="col-lg-4">Nama</div>
            <div class="col-lg-8">: <?= $user['nama_mahasiswa'] ?></div>
            <div class="col-lg-4">Tanggal Lahir :</div>
            <div class="col-lg-8">: <?= $user['tanggal_lahir_mahasiswa'] ?></div>
            <div class="col-lg-4">Jurusan</div>
            <div class="col-lg-8">: <?= $user['jurusan_mahasiswa'] ?></div>
            <div class="col-lg-4">Semester</div>
            <div class="col-lg-8">: <?= $user['semester_mahasiswa'] ?></div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="card p-3">
          <img src="<?= base_url('/assets/img/uploads/' . $user['foto_mahasiswa']) ?>" alt="" height="200">

        </div>
      </div>

      <div class="col-lg-6">
        <div class="card p-3">
          <h5>List KRS</h5>
          <?php foreach ($dataKrs as $krs) : ?>
            <div><?= $krs['nama_mata_kuliah'] . ' ' . $krs['kode_semester'] ?></div>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->
<?= $this->endSection() ?>