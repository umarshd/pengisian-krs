<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Mata Kuliah</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item ">Mata Kuliah</li>
        <li class="breadcrumb-item active">Tambah</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row justify-content-center">
      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Tambah Mata Kuliah</h5>
            <!-- Table with stripped rows -->
            <form action="<?= base_url('/admin/matakuliah/tambah/proses') ?>" method="post">
              <div class="form-group py-2">
                <label class="mb-1">Kode Mata Kuliah</label>
                <input type="text" name="kode_mata_kuliah" class="form-control" placeholder="MTKS1">
              </div>
              <div class="form-group py-2">
                <label class="mb-1">Nama Mata Kuliah</label>
                <input type="text" name="nama_mata_kuliah" class="form-control" placeholder="Matematika">
              </div>
              <div class="form-group py-2">
                <label class="mb-1">SKS Mata Kuliah</label>
                <input type="text" name="sks_mata_kuliah" class="form-control" placeholder="3">
              </div>
              <div class="form-group py-2">
                <label class="mb-1">Jenis Mata Kuliah</label>
                <select name="pilihJenisMK" class="form-control">
                  <option disabled selected> Pilih Jenis Mata Kuliah</option>
                  <option value="teori">Teori</option>
                  <option value="prakter">Praktek</option>
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
                <label class="mb-1">Semester</label>
                <select name="pilihSemester" class="form-control">
                  <option disabled selected> Pilih Semester</option>
                  <?php foreach ($dataSemester as $semester) : ?>
                    <option value="<?= $semester['kode_semester'] ?>"><?= $semester['nama_semester'] ?></option>
                  <?php endforeach ?>
                </select>
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