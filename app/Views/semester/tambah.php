<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Semester</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item ">Semester</li>
        <li class="breadcrumb-item active">Tambah</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row justify-content-center">
      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Tambah Semester</h5>
            <!-- Table with stripped rows -->
            <form action="<?= base_url('/admin/semester/tambah/proses') ?>" method="post">
              <div class="form-group py-2">
                <label class="mb-1">Kode Semester</label>
                <input type="text" name="kode_semester" class="form-control" placeholder="SMTR1">
              </div>
              <div class="form-group py-2">
                <label class="mb-1">Nama Semester</label>
                <input type="text" name="nama_semester" class="form-control" placeholder="Semester 1">
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