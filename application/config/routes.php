<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'main';
$route['404_override'] = '';

/**
 * redirect admincp to backend directory
 */

// default backend controller
$route[ADMINPATH] = 'backend/dashboard';

// language and phrase routing
$route[ADMINPATH . '/language'] = 'backend/language/language';
$route[ADMINPATH . '/language/(.*?)'] = 'backend/language/language/$1';

// category and category_type routing
$route[ADMINPATH . '/(categories|category)'] = 'backend/category/category';
$route[ADMINPATH . '/category/category_type'] = 'backend/category/category_type';
$route[ADMINPATH . '/category/category_type/(.*?)'] = 'backend/category/category_type/$1';
$route[ADMINPATH . '/category/(.*?)'] = 'backend/category/category/$1';

// user and user_group routing
$route[ADMINPATH . '/(users|user)'] = 'backend/user/user';
$route[ADMINPATH . '/user/user_group'] = 'backend/user/user_group';
$route[ADMINPATH . '/user/user_group/(.*?)'] = 'backend/user/user_group/$1';
$route[ADMINPATH . '/user/(.*?)'] = 'backend/user/user/$1';

// topic routing
$route[ADMINPATH . '/topic'] = 'backend/topic/topic';
$route[ADMINPATH . '/topic/(.*?)'] = 'backend/topic/topic/$1';

// general backend rounting
$route[ADMINPATH . '/(.*?)'] = 'backend/$1';

/**
 * redirect any uri to frontend directory
 */
$route['(:any)'] = 'frontend/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */