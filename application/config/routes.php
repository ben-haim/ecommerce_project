<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "items";


$route['placeOrder'] = "items/placeOrder";
$route['signIn'] = "items/signIn";
$route['logOut'] = "items/logOut";

$route['cart'] = "items/cart";
$route['addToCart'] = "items/addToCart";
$route['removeFromCart'] = "items/removeFromCart";

$route['show/item/(:num)'] = "/items/showItem/$1";
$route['show/items/category/(:any)'] = "/items/getItemsByCategory/$1";

$route['404_override'] = '';



$route['admin'] = 'admins';

$route['login'] = "admins/login";


// admin routes

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
$route['search'] = "admins/search";
$route['search_order'] = "admins/search_order";
$route['status'] = "admins/status";



//end of routes.php