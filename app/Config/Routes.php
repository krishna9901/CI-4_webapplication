<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');

// $routes->resource('employee');


//restapi Crud //
$routes->get('api/employees', 'EmployeeController::index');

$routes->get('api/employees/(:num)', 'EmployeeController::show/$1');
$routes->post('api/employees', 'EmployeeController::create');
$routes->put('api/employees/(:num)', 'EmployeeController::update/$1');
$routes->delete('api/employees/(:num)', 'EmployeeController::delete/$1');


//end rest crud api//

$routes->get('api/employeeslist', 'EmployeeController::list');
$routes->get('api/employees/delete/(:num)', 'EmployeeController::destroy/$1');
$routes->get('api/employees/edit/(:num)', 'EmployeeController::editform/$1');
$routes->get('api/employee/create', 'EmployeeController::storeform');
$routes->post('api/employee/update/(:num)','EmployeeController::updatedata/$1');

$routes->match(['get', 'post'], '/', 'UserController::login', ["filter" => "noauth"]);
$routes->match(['get', 'post'], 'login', 'UserController::login', ["filter" => "noauth"]);
// Admin routes
$routes->group("admin", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "AdminController::index");
    $routes->get('settings', 'SettingsController::index', ['as' => 'admin.dashboard.index']);
    $routes->get('settings/create', 'SettingsController::create', ['as' => 'admin.dashboard.create']);
    $routes->post('settings', 'SettingsController::store', ['as' => 'admin.dashboard.store']);
    $routes->get('settings/edit/(:num)', 'SettingsController::edit/$1', ['as' => 'admin.dashboard.edit']);
    $routes->put('settings/update/(:num)', 'SettingsController::update/$1', ['as' => 'admin.dashboard.update']);
    $routes->delete('settings/destroy/(:num)', 'SettingsController::destroy/$1', ['as' => 'admin.dashboard.destroy']);


    $routes->setDefaultController('GColumnChartController');
     // Define the route for 'gchart' within the admin group
     $routes->match(['get', 'post'], 'gchart', 'GColumnChartController::initChart', ['as' => 'admin.gchart']);

     $routes->get('products', 'ProductController::index', ['as' => 'admin.product.index']); // Route to display product list
     $routes->get('products/create', 'ProductController::create',['as' => 'admin.product.create']); // Route to display product creation form
     $routes->post('products/store', 'ProductController::store');
     $routes->get('admin/product_list', 'ProductController::index');
     $routes->get('products/edit/(:num)', 'ProductController::edit/$1', ['as' => 'admin.product.edit']);
     $routes->put('products/update/(:num)', 'ProductController::update/$1', ['as' => 'admin.product.update']);
     $routes->delete('products/destroy/(:num)', 'ProductController::destroy/$1', ['as' => 'admin.product.destroy']);
 

     $routes->get('api/employeeslist', 'EmployeeController::list',['as' => 'admin.employee.list']);
$routes->get('api/employees/delete/(:num)', 'EmployeeController::destroy/$1');
$routes->get('api/employees/edit/(:num)', 'EmployeeController::editform/$1');
$routes->get('api/employee/create', 'EmployeeController::storeform' ,['as' => 'admin.employee.create']);
$routes->post('api/employee/update/(:num)','EmployeeController::updatedata/$1', ['as' => 'admin.employee.update']);
     

// $routes->get('api/employees', 'EmployeeController::index');

// $routes->get('api/employees/(:num)', 'EmployeeController::show/$1');
// $routes->post('api/employees', 'EmployeeController::create');
// $routes->put('api/employees/(:num)', 'EmployeeController::update/$1');
// $routes->delete('api/employees/(:num)', 'EmployeeController::delete/$1');



});
// Editor routes
$routes->group("client", ["filter" => "auth"], function ($routes) {
    $routes->get("/", "QuestionnaireController::index");
    $routes->get('questionnaire', 'QuestionnaireController::index');
    $routes->post('questionnaire/store', 'QuestionnaireController::storeQuestionnaire',['as' => 'client.questionnaire.store']);
    $routes->get('questionnaire_view', 'QuestionnaireController::fetchQuestionnaire');
    //$routes->get('upload', 'Upload::index');          // Add this line.
    $routes->post('upload/upload', 'QuestionnaireController::upload');
    $routes->match(['get', 'post'], 'gchart', 'GColumnChartController::clientinitChart', ['as' => 'client.gchart']);

});
$routes->get('logout', 'UserController::logout');

$routes->get('/register', 'RegisterController::index');
$routes->match(['get', 'post'], 'Register/store', 'RegisterController::store');

// $routes->group('admin', ["filter" => "auth"], function ($routes) {
//     $routes->get('settings', 'SettingsController::index');
//     $routes->post('settings/saveQuestion', 'SettingsController::saveQuestion');
//     $routes->post('settings/editQuestion/(:num)', 'SettingsController::editQuestion/$1');
//     $routes->post('settings/deleteQuestion/(:num)', 'SettingsController::deleteQuestion/$1');
// });