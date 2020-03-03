<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//memberships
$route['memberships'] = 'memberships/index';

//calendar
$route['calendar'] = 'calendar/index';

//payments
$route['payments'] = 'payments/index';

//exercises
$route['exercises'] = 'exercises/index';

//workouts
$route['workouts'] = 'workouts/index';
$route['my_workouts'] = 'workouts/my_workouts';
$route['public'] = 'workouts/public_workouts';
$route['share/(:any)'] = 'workouts/share/$1';

//users
$route['users'] = 'users/index';
$route['login'] = 'users/login';
$route['check'] = 'users/check';

//pages
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';

//error
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
