<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['login'] = 'login';
$route['reset-password'] = 'login/reset_password';
$route['cek-login'] = 'login/ceklogin';
$route['default_controller'] = 'Home';
$route['admin'] = 'admin';
$route['agenda']= 'agenda';
$route['buat-agenda'] = 'agenda/buat_agd';
$route['ubah-agenda/(:any)'] = 'agenda/edit_agd/$1';
$route['naskah-agenda/(:any)'] = 'agenda/detail_nsk/$1';
$route['profil']= 'profil';
$route['404_override'] = '';

$route['api/agenda-hari-ini'] = 'Api/agendaToday';
$route['api/agenda-besok'] = 'Api/agendaTomorrow';
$route['api/riwayat-agenda'] = 'Api/agendaRiwayat';

$route['translate_uri_dashes'] = FALSE;