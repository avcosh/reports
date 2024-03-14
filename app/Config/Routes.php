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
$routes->setDefaultController('Site');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

$routes->setAutoRoute(false);


$routes->get('/', 'Site::index' , ['as' => 'site.index']);
$routes->post('/', 'Site::index');

$routes->get('dailyreport', 'Dailyreport::index' , ['as' => 'dailyreport.index']);

$routes->get('fot', 'Fot::index' , ['as' => 'fot.index']);
$routes->get('fotreport', 'Fot::report' , ['as' => 'fot.report']);

$routes->get('fotsupervisor', 'Supervisor::index' , ['as' => 'fotsupervisor.index']);
$routes->get('fotsupervisorreport', 'Supervisor::report' , ['as' => 'fotsupervisor.report']);

$routes->get('dealsregion', 'Dealsregion::index' , ['as' => 'dealsregion.index']);
$routes->get('dealsregionreport', 'Dealsregion::report' , ['as' => 'dealsregion.report']); 

$routes->get('refundregion', 'Refundregion::index' , ['as' => 'refundregion.index']);
$routes->get('refundregionreport', 'Refundregion::report' , ['as' => 'refundregion.report']); 

$routes->get('refundmanager', 'Refundmanager::index' , ['as' => 'refundmanager.index']);
$routes->get('refundmanagerreport', 'Refundmanager::report' , ['as' => 'refundmanager.report']);

$routes->get('workedshifts', 'Workedshifts::index' , ['as' => 'workedshifts.index']);
$routes->get('workedshiftsreport', 'Workedshifts::report' , ['as' => 'workedshifts.report']);

$routes->get('workingshiftstatus', 'Workingshif::getWorkingShiftQuantity' , ['as' => 'getWorkingShiftQuantity']);


$routes->match(['get', 'post'], 'login', 'Site::login', ['as' => 'login']);













//$routes->get('test/(:segment)', 'Test::index/$1');
//$routes->get('about/(:alpha)', 'Home::about/$1'); //:alpha string of alphabetic characters

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
