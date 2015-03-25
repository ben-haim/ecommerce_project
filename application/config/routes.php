<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "items";
$route['404_override'] = '';

// ITEMS CONTROLLER
$route['placeOrder'] = "items/placeOrder";
$route['cart'] = "items/cart";
$route['success'] = "items/success";
$route['addToCart'] = "items/addToCart";
$route['removeFromCart'] = "items/removeFromCart";
$route['show/item/(:num)'] = "/items/showItem/$1";
$route['show/items/category/(:any)'] = "/items/getItemsByCategory/$1";

// SESSION CONTROLLER
$route['signIn'] = "users/signIn";
$route['register'] = "users/register";
$route['logOut'] = "users/logOut";
$route['update_account/(:num)'] = "users/account/$1";
$route['updateAccount'] = "users/updateAccount";

// ADMINS CONTROLLER
$route['admin'] = 'admins';
$route['login'] = "admins/login";
$route['logoff'] = "admins/logoff";
$route['order'] = "admins/retrieveOneOrder";
$route['dashboard'] = "admins/dashboard";
$route['admins/home'] = "admins/index";
$route['home'] = "admins/index";
$route['products'] = "admins/products";
$route['edit'] = "admins/edit";
$route['editProduct'] = "admins/updateItem";
$route['addProduct'] = "admins/addItem";
$route['createNew'] = "admins/createNew";
$route['delete/(:num)'] = "admins/delete/$1";
$route['search'] = "admins/search";
$route['search_order'] = "admins/search_order";
$route['status'] = "admins/status";

// PHOTOS CONTROLLER
$route['upload'] = "admins/upload";
$route['upload_photo'] = "admins/upload_photo";

//end of routes.php