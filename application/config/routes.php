<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//logs
$route['logging'] = 'logs/get_logs';

//messages
$route['inbox'] = 'messages/inbox';
$route['sent'] = 'messages/sent';
$route['create'] = 'messages/create';
$route['message/(:any)'] = 'messages/view/$1';

//memberships
$route['memberships'] = 'memberships/index';
$route['assign/(:any)'] = 'memberships/assign/$1';

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
$route['shared'] = 'workouts/shared_workouts';

//users
$route['users'] = 'users/index';
$route['admins'] = 'users/get_admins';
$route['trainers'] = 'users/get_trainers';
$route['members'] = 'users/get_members';
$route['assigned'] = 'users/get_assigned_trainees';
$route['login'] = 'users/login';
$route['view/(:any)'] = 'users/view/$1';
$route['edit/(:any)'] = 'users/edit/$1';

//checkins
$route['check'] = 'checkins/check';
$route['all_checkins'] = 'checkins/all_checkins';

//pages
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';

//error
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


