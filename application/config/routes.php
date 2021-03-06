<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'navigation';


$route['dashboard'] = 'welcome/dashboard';
$route['auth'] = 'welcome/check_login';
$route['login'] = 'welcome/login';
$route['register'] = 'welcome/register';
$route['logout'] = 'welcome/logout';
$route['save_user'] = 'welcome/save_user';
$route['member/edit'] = 'navigation/edit_member';
$route['member/edit/detail'] = 'navigation/edit_member_detail';
$route['member/update'] = 'process/update_member';
$route['member/verify'] = 'process/verify_member';
$route['member/performance/save'] = 'process/save_performance';
$route['members'] = 'navigation/member_list';
$route['member/performance/add'] = 'navigation/add_performance';
$route['member/performance'] = 'navigation/performance';
$route['performance'] = 'navigation/performance_list';
$route['races'] = 'navigation/races';
$route['race/add'] = 'navigation/add_race';
$route['race/save'] = 'process/save_race';
$route['race/performance/add'] = 'navigation/add_race_performance';
$route['race/performance/save'] = 'process/save_race_performance';
$route['race/performance/list'] = 'navigation/view_race_performance';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
