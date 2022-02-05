<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Mahasiswa</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item ">Mahasiswa</li>
        <li class="breadcrumb-item active">Tambah</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row justify-content-center">
      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Tambah Mahasiswa</h5>
            <!-- Table with stripped rows -->
            <form action="<?= base_url('/admin/mahasiswa/tambah/proses') ?>" method="post">
              <div class="form-group py-2">
                <label class="mb-1">NIM</label>
                <input type="text" name="nim_mahasiswa" class="form-control" placeholder="123321">
              </div>
              <div class="form-group py-2">
                <label class="mb-1">Nama</label>
                <input type="text" name="nama_mahasiswa" class="form-control" placeholder="Ahmad Budianto">
              </div>
              <div class="form-group py-2">
                <label class="mb-1">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir_mahasiswa" class="form-control">
              </div>
              <div class="form-group py-2">
                <label class="mb-1">Semester</label>
                <select name="pilihSemester" class="form-control">
                  <option disabled selected> Pilih Semester</option>
                  <?php foreach ($dataSemester as $semester) : ?>
                    <option value="<?= $semester['kode_semester'] ?>"><?= $semester['nama_semester'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group py-2">
                <label class="mb-1">Jurusan</label>
                <select name="pilihJurusan" class="form-control">
                  <option disabled selected> Pilih Jurusan</option>
                  <?php foreach ($dataJurusan as $jurusan) : ?>
                    <option value="<?= $jurusan['kode_jurusan'] ?>"><?= $jurusan['nama_jurusan'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group py-2">
                <label class="mb-1">Password</label>
                <input type="password" name="password_mahasiswa" class="form-control" placeholder="****">
              </div>
              <div class="text-end">
                <button class="btn btn-primary mt-3">Tambah</button>
              </div>
            </form>

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
<?= $this->endSection() ?>