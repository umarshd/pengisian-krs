<?= $this->extend('layouts/mahasiswa_layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Mahasiswa</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item ">Mahasiswa</li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row justify-content-center">
      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Mahasiswa</h5>
            <!-- Table with stripped rows -->
            <form action="<?= base_url('/mahasiswa/edit/proses') ?>" method="post" enctype="multipart/form-data">
              <div class="form-group py-2">
                <label class="mb-1">NIM</label>
                <input type="text" name="old_nim_mahasiswa" class="form-control" value="<?= $mahasiswa['nim_mahasiswa'] ?>" hidden>
                <input type="text" name="nim_mahasiswa" class="form-control" value="<?= $mahasiswa['nim_mahasiswa'] ?>">
              </div>
              <div class="form-group py-2">
                <label class="mb-1">Nama</label>
                <input type="text" name="nama_mahasiswa" class="form-control" value="<?= $mahasiswa['nama_mahasiswa'] ?>">
              </div>
              <div class="form-group py-2">
                <label class="mb-1">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir_mahasiswa" class="form-control" value="<?= $mahasiswa['tanggal_lahir_mahasiswa'] ?>">
              </div>
              <div class="form-group py-2">
                <label class="mb-1">Semester</label>
                <select name="pilihSemester" class="form-control">
                  <option disabled selected> Pilih Semester</option>
                  <?php foreach ($dataSemester as $semester) : ?>
                    <?php if ($semester['kode_semester'] == $mahasiswa['semester_mahasiswa']) : ?>
                      <option value="<?= $semester['kode_semester'] ?>" selected><?= $semester['nama_semester'] ?></option>
                    <?php endif ?>
                    <option value="<?= $semester['kode_semester'] ?>"><?= $semester['nama_semester'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group py-2">
                <label class="mb-1">Jurusan</label>
                <select name="pilihJurusan" class="form-control">
                  <option disabled selected> Pilih Jurusan</option>
                  <?php foreach ($dataJurusan as $jurusan) : ?>
                    <?php if ($jurusan['kode_jurusan'] == $mahasiswa['jurusan_mahasiswa']) : ?>
                      <option value="<?= $jurusan['kode_jurusan'] ?>" selected><?= $jurusan['nama_jurusan'] ?></option>
                    <?php endif ?>
                    <option value="<?= $jurusan['kode_jurusan'] ?>"><?= $jurusan['nama_jurusan'] ?></option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="form-group py-2">
                <label class="mb-1">Password</label>
                <input type="password" name="password_mahasiswa" class="form-control" placeholder="****">
              </div>
              <div class="form-group py-2">
                <label class="mb-1">Foto</label>
                <input type="text" name="old_foto_mahasiswa" class="form-control" value="<?= $user['foto_mahasiswa'] ?>" hidden>
                <div>
                  <img src="<?= base_url('/assets/img/uploads/' . $user['foto_mahasiswa']) ?>" alt="" height="200">
                </div>
                <input type="file" name="foto_mahasiswa" class="form-control mt-2">
              </div>
              <div class="text-end">
                <button class="btn btn-primary mt-3">Edit</button>
              </div>
            </form>

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
<?= $this->endSection() ?>