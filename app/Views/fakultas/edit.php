<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Fakultas</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item ">Fakultas</li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row justify-content-center">
      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Fakultas</h5>
            <!-- Table with stripped rows -->
            <form action="<?= base_url('/admin/fakultas/edit/proses') ?>" method="post">
              <div class="form-group py-2">
                <label class="mb-1">Kode Fakultas</label>
                <input type="text" name="old_kode_fakultas" class="form-control" placeholder="FT" value="<?= $fakultas['kode_fakultas'] ?>" hidden>
                <input type="text" name="kode_fakultas" class="form-control" placeholder="FT" value="<?= $fakultas['kode_fakultas'] ?>">
              </div>
              <div class="form-group py-2">
                <label class="mb-1">Nama Fakultas</label>
                <input type="text" name="nama_fakultas" class="form-control" placeholder="Fakultas Teknik" value="<?= $fakultas['nama_fakultas'] ?>">
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