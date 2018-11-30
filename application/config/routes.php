<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'users';
$route['feed'] = 'posts/index';
$route['profile/(:any)'] = 'users/profile/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
