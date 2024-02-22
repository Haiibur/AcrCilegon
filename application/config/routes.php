<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Default
$route['default_controller'] = 'Home';

// Menu Login
$route['login']          = 'login';
$route['reset-password'] = 'login/reset_password';
$route['cek-login']      = 'login/ceklogin';

// Menu Level Admin

// Menu Admin
$route['admin'] = 'admin';

// Menu Profil
$route['profil']= 'profil';

// Menu Agenda
$route['agenda']                = 'agenda';
$route['buat-agenda']           = 'agenda/buat_agd';
$route['ubah-agenda/(:any)']    = 'agenda/edit_agd/$1';
$route['naskah-agenda/(:any)']  = 'agenda/detail_nsk/$1';
$route['api/agenda-hari-ini']   = 'Api/agendaToday';
$route['api/agenda-besok']      = 'Api/agendaTomorrow';
$route['api/riwayat-agenda']    = 'Api/agendaRiwayat';

// Menu Agenda Acara
$route['Agenda_Acara']= 'Agenda_Acara';

// Menu Provinsi
$route['Provinsi']= 'Provinsi';

// Menu Kabupaten
$route['Kabupaten']= 'Kabupaten';

// Menu Materi
$route['Materi']= 'Materi';
$route['form_tambah_materi']      = 'Materi/form_tambah_materi';
$route['form_ubah_materi/(:any)'] = 'Materi/edit_materi/$1';

// Menu Galleri
$route['Galleri']= 'Galleri';
$route['form_tambah_galleri']      = 'Galleri/form_tambah_galleri';
$route['form_ubah_galleri/(:any)'] = 'Galleri/edit_galleri/$1';

// Menu Hotel
$route['Hotel']= 'Hotel';

// Menu Lokasi Tujuan
$route['Lokasi_Tujuan']                  = 'Lokasi_Tujuan';
$route['form_tambah_lokasi_tujuan']      = 'Lokasi_Tujuan/form_tambah_lokasi_tujuan';
$route['form_ubah_lokasi_tujuan/(:any)'] = 'Lokasi_Tujuan/edit_lokasi_tujuan/$1';

// Menu Lokasi Vanue
$route['Lokasi_Vanue']                  = 'Lokasi_Vanue';
$route['form_tambah_lokasi_venue']      = 'Lokasi_Vanue/form_tambah_lokasi_venue';
$route['form_ubah_lokasi_venue/(:any)'] = 'Lokasi_Vanue/edit_lokasi_venue/$1';

// Menu Wisata
$route['Wisata']= 'Wisata';

// Menu Level Peserta
$route['Level_Peserta']= 'Level_Peserta';

// Menu Undangan
$route['Undangan']= 'Undangan';

// Menu Pendaftaran
$route['Pendaftaran']= 'Pendaftaran';

// Menu Absen Kehadiran
$route['Absen_Kehadiran']= 'Absen_Kehadiran';

// Notfound
$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;