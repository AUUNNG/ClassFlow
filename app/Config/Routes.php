<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

$routes->get('/', 'IndexController::index');

$routes->get('/rolecheck', 'RoleController::rolecheck');

$routes->get('logout', 'AuthController::logout');

$routes->get('/login', 'AuthController::loginForm', ['filter' => 'noauth']);
$routes->post('/login', 'AuthController::login');

$routes->group('student', ['filter' => 'student'], function ($routes) {
    $routes->get('/', 'StudentController::index');
    $routes->post('/(:any)', 'StudentController::root/$1');
});

$routes->group('teacher', ['filter' => 'teacher'], function ($routes) {
    $routes->get('/', 'TeacherController::index');
    $routes->post('/(:any)', 'TeacherController::root/$1');
});

$routes->group('teacher/profile', ['filter' => 'teacher'], function ($routes) {
    $routes->get('/', 'ProfileController::index');
    $routes->post('/(:any)', 'ProfileController::root/$1');
});

$routes->get('teacher/register', 'TeacherController::registerForm', ['filter' => 'noauth']);
$routes->post('teacher/register', 'TeacherController::register/$1');

// $routes->group('student', ['filter' => 'student'], function ($routes) {
//     $routes->get('/', 'StudentController::index');
//     $routes->post('/(:any)', 'StudentController::root/$1');
// });

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
