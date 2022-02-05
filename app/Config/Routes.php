<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');

$routes->get('/', 'Auth::login');
$routes->post('/login/proses', 'Auth::prosesLogin');

$routes->group('/', ['filter' => 'authFilter'], function ($routes) {
    $routes->get('dashboard', 'Mahasiswa::dashboard');
    $routes->get('mahasiswa/(:segment)/edit', 'Mahasiswa::editMahasiswaByMahasiswa/$1');
    $routes->post('mahasiswa/edit/proses', 'Mahasiswa::prosesEditMahasiswaByMahasiswa');

    $routes->get('/mahasiswa/krs', 'Mahasiswa::krs');
    $routes->post('/mahasiswa/krs/proses', 'Mahasiswa::prosesKrs');
});


$routes->get('/admin/login', 'AuthAdmin::login');
$routes->get('/admin/logout', 'AuthAdmin::logout');
$routes->post('/admin/login/proses', 'AuthAdmin::prosesLogin');

$routes->group('admin', ['filter' => 'authAdmin'], function ($routes) {
    $routes->get('dashboard', 'Admin::dashboard');

    $routes->get('fakultas', 'Fakultas::listFakultas');
    $routes->get('fakultas/tambah', 'Fakultas::tambahFakultas');
    $routes->get('fakultas/edit/(:segment)', 'Fakultas::editFakultas/$1');
    $routes->get('fakultas/delete/(:segment)', 'Fakultas::deleteFakultas/$1');
    $routes->post('fakultas/tambah/proses', 'Fakultas::prosesTambahFakultas');
    $routes->post('fakultas/edit/proses', 'Fakultas::prosesEditFakultas');

    $routes->get('jurusan', 'Jurusan::listJurusan');
    $routes->get('jurusan/tambah', 'Jurusan::tambahJurusan');
    $routes->get('jurusan/edit/(:segment)', 'Jurusan::editJurusan/$1');
    $routes->get('jurusan/delete/(:segment)', 'Jurusan::deleteJurusan/$1');
    $routes->post('jurusan/tambah/proses', 'Jurusan::prosesTambahJurusan');
    $routes->post('jurusan/edit/proses', 'Jurusan::prosesEditJurusan');

    $routes->get('semester', 'Semester::listSemester');
    $routes->get('semester/tambah', 'Semester::tambahSemester');
    $routes->get('semester/edit/(:segment)', 'Semester::editSemester/$1');
    $routes->get('semester/delete/(:segment)', 'Semester::deleteSemester/$1');
    $routes->post('semester/tambah/proses', 'Semester::prosesTambahSemester');
    $routes->post('semester/edit/proses', 'Semester::prosesEditSemester');

    $routes->get('matakuliah', 'MataKuliah::listMataKuliah');
    $routes->get('matakuliah/tambah', 'MataKuliah::tambahMataKuliah');
    $routes->get('matakuliah/edit/(:segment)', 'MataKuliah::editMataKuliah/$1');
    $routes->get('matakuliah/delete/(:segment)', 'MataKuliah::deleteMataKuliah/$1');
    $routes->post('matakuliah/tambah/proses', 'MataKuliah::prosesTambahMataKuliah');
    $routes->post('matakuliah/edit/proses', 'MataKuliah::prosesEditMataKuliah');

    $routes->get('mahasiswa', 'Mahasiswa::listMahasiswa');
    $routes->get('mahasiswa/tambah', 'Mahasiswa::tambahMahasiswa');
    $routes->get('mahasiswa/edit/(:segment)', 'Mahasiswa::editMahasiswa/$1');
    $routes->get('mahasiswa/delete/(:segment)', 'Mahasiswa::deleteMahasiswa/$1');
    $routes->post('mahasiswa/tambah/proses', 'Mahasiswa::prosesTambahMahasiswa');
    $routes->post('mahasiswa/edit/proses', 'Mahasiswa::prosesEditMahasiswa');
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
