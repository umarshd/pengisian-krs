<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Fakultas</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item active">Fakultas</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Fakultas</h5>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Kode Fakultas</th>
                  <th scope="col">Nama Fakultas</th>
                  <th scope="col">Aksi</th>
              </thead>
              <tbody>
                <?php $i = 1 ?>
                <?php foreach ($dataFakultas as $fakultas) : ?>
                  <tr>
                    <td><?= $i++ ?></td>
                    <td>
                      <?= $fakultas['kode_fakultas'] ?>
                    </td>
                    <td>
                      <?= $fakultas['nama_fakultas'] ?>
                    </td>
                    <td>
                      <a href="<?= base_url('/admin/fakultas/edit/' . $fakultas['kode_fakultas']) ?>" class="btn btn-secondary"><i class="bi bi-pencil-square"></i></a>
                      <a href="<?= base_url('/admin/fakultas/delete/' . $fakultas['kode_fakultas']) ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
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