<?= $this->extend('layouts/mahasiswa_layout') ?>
<?= $this->section('content') ?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>KRS</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">KRS</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data KRS</h5>
            <h6>NIM : <?= $user['nim_mahasiswa'] ?></h6>
            <form action="<?= base_url('/mahasiswa/krs/proses') ?>" method="post">
              <input type="text" value="<?= $user['nim_mahasiswa'] ?>" name="nim_mahasiswa" hidden>
              <div class="form-group">
                <label>Tahun Akademik</label>
                <select name="pilihTahunAkademik" class="form-control">
                  <option selected disabled>Pilih Tahun</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                </select>
              </div>
              <div class="from-group mt-3">
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Semester 1
                      </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <?php foreach ($dataMataKuliahS1 as $mk) : ?>
                          <div class="mt-2">
                            <div class="d-flex justify-content-between align-items-center py-1 px-3 rounded" style="background-color: #bdc3c7;">
                              <div>
                                <h5><?= $mk['nama_mata_kuliah'] ?></h5>
                                <p class="mb-0">sks : <?= $mk['sks_mata_kuliah'] ?> / jenis : <?= $mk['jenis_mata_kuliah'] ?></p>
                              </div>
                              <div>
                                <input type="checkbox" name="mk[]" value="<?= $mk['kode_mata_kuliah'] ?>">
                              </div>
                            </div>
                          </div>
                        <?php endforeach ?>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Semester 2
                      </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <?php foreach ($dataMataKuliahS2 as $mk) : ?>
                          <div class="mt-2">
                            <div class="d-flex justify-content-between align-items-center py-1 px-3 rounded" style="background-color: #bdc3c7;">
                              <div>
                                <h5><?= $mk['nama_mata_kuliah'] ?></h5>
                                <p class="mb-0">sks : <?= $mk['sks_mata_kuliah'] ?> / jenis : <?= $mk['jenis_mata_kuliah'] ?></p>
                              </div>
                              <div>
                                <input type="checkbox" name="mk[]" value="<?= $mk['kode_mata_kuliah'] ?>">
                              </div>
                            </div>
                          </div>
                        <?php endforeach ?>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo3" aria-expanded="false" aria-controls="collapseTwo">
                        Semester 3
                      </button>
                    </h2>
                    <div id="collapseTwo3" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <?php foreach ($dataMataKuliahS3 as $mk) : ?>
                          <div class="mt-2">
                            <div class="d-flex justify-content-between align-items-center py-1 px-3 rounded" style="background-color: #bdc3c7;">
                              <div>
                                <h5><?= $mk['nama_mata_kuliah'] ?></h5>
                                <p class="mb-0">sks : <?= $mk['sks_mata_kuliah'] ?> / jenis : <?= $mk['jenis_mata_kuliah'] ?></p>
                              </div>
                              <div>
                                <input type="checkbox" name="mk[]" value="<?= $mk['kode_mata_kuliah'] ?>">
                              </div>
                            </div>
                          </div>
                        <?php endforeach ?>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo4" aria-expanded="false" aria-controls="collapseTwo">
                        Semester 4
                      </button>
                    </h2>
                    <div id="collapseTwo4" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <?php foreach ($dataMataKuliahS4 as $mk) : ?>
                          <div class="mt-2">
                            <div class="d-flex justify-content-between align-items-center py-1 px-3 rounded" style="background-color: #bdc3c7;">
                              <div>
                                <h5><?= $mk['nama_mata_kuliah'] ?></h5>
                                <p class="mb-0">sks : <?= $mk['sks_mata_kuliah'] ?> / jenis : <?= $mk['jenis_mata_kuliah'] ?></p>
                              </div>
                              <div>
                                <input type="checkbox" name="mk[]" value="<?= $mk['kode_mata_kuliah'] ?>">
                              </div>
                            </div>
                          </div>
                        <?php endforeach ?>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo5" aria-expanded="false" aria-controls="collapseTwo">
                        Semester 5
                      </button>
                    </h2>
                    <div id="collapseTwo5" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <?php foreach ($dataMataKuliahS5 as $mk) : ?>
                          <div class="mt-2">
                            <div class="d-flex justify-content-between align-items-center py-1 px-3 rounded" style="background-color: #bdc3c7;">
                              <div>
                                <h5><?= $mk['nama_mata_kuliah'] ?></h5>
                                <p class="mb-0">sks : <?= $mk['sks_mata_kuliah'] ?> / jenis : <?= $mk['jenis_mata_kuliah'] ?></p>
                              </div>
                              <div>
                                <input type="checkbox" name="mk[]" value="<?= $mk['kode_mata_kuliah'] ?>">
                              </div>
                            </div>
                          </div>
                        <?php endforeach ?>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo6" aria-expanded="false" aria-controls="collapseTwo">
                        Semester 6
                      </button>
                    </h2>
                    <div id="collapseTwo6" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <?php foreach ($dataMataKuliahS6 as $mk) : ?>
                          <div class="mt-2">
                            <div class="d-flex justify-content-between align-items-center py-1 px-3 rounded" style="background-color: #bdc3c7;">
                              <div>
                                <h5><?= $mk['nama_mata_kuliah'] ?></h5>
                                <p class="mb-0">sks : <?= $mk['sks_mata_kuliah'] ?> / jenis : <?= $mk['jenis_mata_kuliah'] ?></p>
                              </div>
                              <div>
                                <input type="checkbox" name="mk[]" value="<?= $mk['kode_mata_kuliah'] ?>">
                              </div>
                            </div>
                          </div>
                        <?php endforeach ?>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo7" aria-expanded="false" aria-controls="collapseTwo">
                        Semester 7
                      </button>
                    </h2>
                    <div id="collapseTwo7" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <?php foreach ($dataMataKuliahS7 as $mk) : ?>
                          <div class="mt-2">
                            <div class="d-flex justify-content-between align-items-center py-1 px-3 rounded" style="background-color: #bdc3c7;">
                              <div>
                                <h5><?= $mk['nama_mata_kuliah'] ?></h5>
                                <p class="mb-0">sks : <?= $mk['sks_mata_kuliah'] ?> / jenis : <?= $mk['jenis_mata_kuliah'] ?></p>
                              </div>
                              <div>
                                <input type="checkbox" name="mk[]" value="<?= $mk['kode_mata_kuliah'] ?>">
                              </div>
                            </div>
                          </div>
                        <?php endforeach ?>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo8" aria-expanded="false" aria-controls="collapseTwo">
                        Semester 8
                      </button>
                    </h2>
                    <div id="collapseTwo8" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <?php foreach ($dataMataKuliahS8 as $mk) : ?>
                          <div class="mt-2">
                            <div class="d-flex justify-content-between align-items-center py-1 px-3 rounded" style="background-color: #bdc3c7;">
                              <div>
                                <h5><?= $mk['nama_mata_kuliah'] ?></h5>
                                <p class="mb-0">sks : <?= $mk['sks_mata_kuliah'] ?> / jenis : <?= $mk['jenis_mata_kuliah'] ?></p>
                              </div>
                              <div>
                                <input type="checkbox" name="mk[]" value="<?= $mk['kode_mata_kuliah'] ?>">
                              </div>
                            </div>
                          </div>
                        <?php endforeach ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <button class="btn btn-primary mt-3">kirim</button>

            </form>

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
<?= $this->endSection() ?>