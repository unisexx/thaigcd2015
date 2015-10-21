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
| 	example.com/class/method/id/
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
| There is one reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
*/

$route['default_controller'] = "home/first_page";
$route['blogs/admin/blogs'] = "blogs/admin/blogs/index";
$route['blogs/newblog'] = "blogs/newblog";
$route['blogs/newentry'] = "blogs/newentry";
$route['blogs/post_index'] = "blogs/post_index";
$route['blogs/comment'] = "blogs/comment";
$route['blogs/tag/([^/]+)'] = "blogs/tag/$1";
$route['blogs/favourite/([^/]+)'] = "blogs/favourite/$1";
$route['blogs/alert/([^/]+)'] = "blogs/alert/$1";
$route['blogs/comment/([^/]+)'] = "blogs/comment/$1";
$route['blogs/delete/([^/]+)'] = "blogs/delete/$1";
$route['blogs/commentdel/([^/]+)'] = "blogs/commentdel/$1";
$route['blogs/setting'] = "blogs/setting";
$route['blogs/post'] = "blogs/post";
$route['blogs/post/([^/]+)'] = "blogs/post/$1";
$route['blogs/([^/]+)'] = "blogs/index/$1";
$route['blogs/([^/]+)/([^/]+)'] = "blogs/index/$1/$2";

// $route['executives/([^/]+)'] = "executives/index/$1";
// $route['executives/view/([^/]+)'] = "executives/view/$1";

$route['knowledges/([^/]+)'] = "knowledges/index/$1";
$route['knowledges/view/([^/]+)'] = "knowledges/view/$1";

$route['pages/([^/]+)'] = "pages/index/$1";

$route['admin'] = "users/admin/auth";

$route['articles/admin/articles/save'] = "articles/admin/articles/save";
$route['articles/admin/articles/([^/]+)'] = "articles/admin/articles/index/$1";
$route['articles/admin/articles/form'] = "articles/admin/articles/form";
$route['articles/admin/articles/form/([^/]+)'] = "articles/admin/articles/form/$1";

$route['galleries/admin/galleries/([^/]+)/form'] = "galleries/admin/galleries/form/$1";
$route['galleries/admin/galleries/([^/]+)/form/([^/]+)'] = "galleries/admin/galleries/form/$1/$2";

$route['categories/admin/categories/save'] = "categories/admin/categories/save";
$route['categories/admin/categories/form'] = "categories/admin/categories/form";
$route['categories/admin/categories/delete'] = "categories/admin/categories/delete";
$route['categories/admin/categories/([^/]+)'] = "categories/admin/categories/index/$1";
$route['categories/admin/categories/([^/]+)/form'] = "categories/admin/categories/form/$1";
$route['categories/admin/categories/([^/]+)/form/([^/]+)'] = "categories/admin/categories/form/$1/$2";
/* End of file routes.php */
/* Location: ./application/config/routes.php */