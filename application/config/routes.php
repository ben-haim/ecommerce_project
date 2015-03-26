<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "items";
$route['404_override'] = '';

// ITEMS CONTROLLER
$route['placeOrder'] = "items/placeOrder";
$route['cart'] = "items/cart";
$route['success'] = "items/success";
$route['addToCart'] = "items/addToCart";
$route['getAllItems'] = "items/getAllItems";
$route['removeFromCart'] = "items/removeFromCart";
$route['show/item/(:num)/(:any)'] = "/items/showItem/$1/$2";
$route['show/items/category/(:any)'] = "/items/getItemsByCategory/$1";
$route['search_items'] = "items/search_items";

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
$route['home'] = "admins/index";
$route['products'] = "admins/products";
$route['edit'] = "admins/edit";
$route['editProduct'] = "admins/updateItem";
$route['addProduct'] = "admins/addItem";
$route['createNew'] = "admins/createNew";
$route['delete/(:num)'] = "admins/delete/$1";
$route['search_products'] = "admins/search_products";
$route['search_orders'] = "admins/search_orders";
$route['status'] = "admins/status";

// PHOTOS CONTROLLER
$route['upload'] = "admins/upload";
$route['upload_photo'] = "admins/upload_photo";

//end of routes.php