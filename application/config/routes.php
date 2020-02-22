<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//memberships
$route['memberships'] = 'memberships/index';

//payments
$route['payments'] = 'payments/index';

//users
$route['users'] = 'users/index';
$route['login'] = 'users/login';

//pages
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';

//error
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
