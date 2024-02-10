<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Default
$route['default_controller'] = 'Home';

// Menu Login
$route['login'] = 'login';
$route['reset-password'] = 'login/reset_password';
$route['cek-login'] = 'login/ceklogin';

// Menu Level Admin

// Menu Admin
$route['admin'] = 'admin';

// Menu Profil
$route['profil']= 'profil';

// Menu Agenda
$route['agenda']= 'agenda';
$route['buat-agenda'] = 'agenda/buat_agd';
$route['ubah-agenda/(:any)'] = 'agenda/edit_agd/$1';
$route['naskah-agenda/(:any)'] = 'agenda/detail_nsk/$1';
$route['api/agenda-hari-ini'] = 'Api/agendaToday';
$route['api/agenda-besok'] = 'Api/agendaTomorrow';
$route['api/riwayat-agenda'] = 'Api/agendaRiwayat';

// Menu Agenda Acara
$route['Agenda_Acara']= 'Agenda_Acara';

// Menu Provinsi
$route['Provinsi']= 'Provinsi';

// Menu Kabupaten
$route['Kabupaten']= 'Kabupaten';

// Menu Materi
$route['Materi']= 'Materi';

// Menu Galleri
$route['Galleri']= 'Galleri';

// Menu Hotel
$route['Hotel']= 'Hotel';

// Menu Lokasi Tujuan
$route['Lokasi_Tujuan']= 'Lokasi_Tujuan';

// Menu Lokasi Vanue
$route['Lokasi_Vanue']= 'Lokasi_Vanue';

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