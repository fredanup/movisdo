<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('viewLogin');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


////
//Login & Logout
$routes->get('/','Login::viewLogin');//cargar
$routes->get('logout','Login::logout');//cargar
$routes->post('loginAuthentication', 'Login::authentication');
//Tabs de Menú
$routes->get('coordinadorTab', 'Coordinador::viewCoordinadores');//cargar
$routes->get('promotorTab','Promotor::viewPromotores');//cargar
$routes->get('encuestadoTab', 'Encuestado::viewEncuestados');//cargar
$routes->get('gestanteTab', 'Gestacion::viewGestaciones');//cargar

$routes->get('visitaGestanteTab', 'VisitaGestante::viewVisitasOfGestantes');//cargar
$routes->get('respuestaOfVisitaOfGestanteTab', 'RespuestaGestante::viewRespuestasOfGestantes');//cargar
$routes->get('respuestaOfVisitaOfInfanteTab', 'RespuestaInfante::viewRespuestasOfInfantes');//cargar
$routes->get('reporteTab', 'Reporte::viewReportes');//cargar



$routes->get('preguntaTab', 'Pregunta::read');//cargar
$routes->get('reporteTab', 'Reporte::read');//cargar

//Tab dentro de TabGestante
$routes->get('infanteTab', 'Infante::view');//cargar
$routes->get('respuesta_infante', 'RespuestaInfante::read');//cargar

//tab dentro de TabVisitas
$routes->get('visitaInfanteTab', 'VisitaInfante::viewVisitasOfInfantes');//Revisar

//Rutas dentro de los forms
$routes->get('viewPromotoresByCoordinadorId/(:num)', 'Promotor::viewPromotoresByCoordinadorId/$1');//cargar
$routes->get('viewEncuestadosByPromotorId/(:num)', 'Encuestado::viewEncuestadosByPromotorId/$1');//cargar
$routes->get('viewGestacionesByEncuestadoId/(:num)', 'Gestacion::viewGestacionesByEncuestadoId/$1');//cargar
$routes->get('viewInfantesByEncuestadoId/(:num)', 'Infante::viewInfantesByEncuestadoId/$1');//cargar
$routes->get('viewVisitasOfInfanteByInfanteId/(:num)', 'VisitaInfante::viewVisitasOfInfanteByInfanteId/$1');//cargar
$routes->get('viewVisitasOfGestantesByGestanteId/(:num)', 'VisitaGestante::viewVisitasOfGestantesByGestanteId/$1');//cargar
$routes->get('viewRespuestasByVisitaOfGestanteId/(:num)', 'RespuestaGestante::viewRespuestasByVisitaOfGestanteId/$1');//cargar
$routes->get('viewRespuestasByVisitaOfInfanteId/(:num)', 'RespuestaInfante::viewRespuestasByVisitaOfInfanteId/$1');//cargar
$routes->get('viewLlamadasByVisitaOfInfanteId/(:num)', 'LlamadaVisitaInfante::viewLlamadasByVisitaOfInfanteId/$1');//cargar
$routes->get('viewLlamadasByVisitaOfGestanteId/(:num)', 'LlamadaVisitaGestante::viewLlamadasByVisitaOfGestanteId/$1');//cargar



//
$routes->get('reporte_gestante', 'VisitaGestante::read');//cargar
$routes->get('reporte_infante', 'VisitaInfante::read');//cargar
$routes->get('reporte_excel', 'ReporteExcel::');//cargar
$routes->get('reporte_pdf', 'ReportePdf::read');//cargar
$routes->get('read_alternativa_pregunta/(:num)', 'Alternativa::read/$1');//cargar
$routes->get('read_respuesta_gestante/(:num)', 'RespuestaGestante::read/$1');//cargar
$routes->get('read_respuesta_infante/(:num)', 'RespuestaInfante::read/$1');//cargar
$routes->get('read_respuesta_gestante', 'RespuestaGestante::read');//cargar
$routes->get('read_respuesta_infante', 'RespuestaInfante::read');//cargar
$routes->get('select_encuestados_promotor/(:num)', 'Encuestado::read_single/$1');//cargar


//Creamos reportes
$routes->get('createReporteOfGestantes', 'RespuestaGestante::createReporteOfGestantes');
$routes->get('createReporteOfInfantes', 'RespuestaInfante::createReporteOfInfantes');

$routes->get('createPrimerReporte', 'Reporte::createReporteOfGestantes');
$routes->get('createSegundoReporte', 'Reporte::createReporteOfInfantesRecienNacidos');
$routes->get('createTercerReporte', 'Reporte::createReporteOfInfantesMenorDe6Meses');
$routes->get('createCuartoReporte', 'Reporte::createReporteOfInfantesDe6A11Meses');
$routes->get('createQuintoReporte', 'Reporte::createReporteOfInfantesDe1A3Años');



$routes->match(['get', 'post'], 'create_promotor', 'Promotor::create');
$routes->match(['get', 'post'], 'create_pregunta', 'Pregunta::create');

$routes->match(['get', 'post'], 'create_alternativa', 'Alternativa::create');
$routes->match(['get', 'post'], 'create_gestacion', 'Gestacion::create');
$routes->match(['get', 'post'], 'create_infante', 'Infante::create');

$routes->match(['get', 'post'], 'create_coordinador', 'Coordinador::create');
$routes->match(['get', 'post'], 'create_encuestado', 'Encuestado::create');
$routes->match(['get', 'post'], 'create_reporte', 'Reporte::create');

////
$routes->get('select_one_promotor/(:num)', 'Promotor::select_one/$1');
$routes->post('update_promotor', 'Promotor::update');

$routes->get('select_one_pregunta/(:num)', 'Pregunta::select_one/$1');
$routes->post('update_pregunta', 'Pregunta::update');

$routes->get('create_gestacion_encuestado/(:num)', 'Gestacion::select_many/$1');
$routes->get('select_one_gestacion/(:num)', 'Gestacion::select_one/$1');
$routes->post('update_gestacion', 'Gestacion::update');

$routes->get('create_infante_encuestado/(:num)', 'Infante::select_many/$1');
$routes->get('select_one_infante/(:num)', 'Infante::select_one/$1');
$routes->post('update_infante', 'Infante::update');

$routes->get('create_alternativa_pregunta/(:num)', 'Alternativa::select_many/$1');
$routes->get('select_one_alternativa/(:num)', 'Alternativa::select_one/$1');
$routes->post('update_alternativa', 'Alternativa::update');

$routes->get('select_one_coordinador/(:num)', 'Coordinador::select_one/$1');
$routes->post('update_coordinador', 'Coordinador::update');

$routes->get('select_one_encuestado/(:num)', 'Encuestado::select_one/$1');
$routes->post('update_encuestado', 'Encuestado::update');

$routes->get('select_one_reporte/(:num)', 'Reporte::select_one/$1');
$routes->post('update_reporte', 'Reporte::update');

////
$routes->get('delete_one_pregunta/(:num)', 'Pregunta::delete_one/$1');
$routes->get('delete_one_promotor/(:num)', 'Promotor::delete_one/$1');
$routes->get('delete_one_coordinador/(:num)', 'Coordinador::delete_one/$1');
$routes->get('delete_one_encuestado/(:num)', 'Encuestado::delete_one/$1');
$routes->get('delete_one_reporte/(:num)', 'Reporte::delete_one/$1');
$routes->get('delete_one_alternativa/(:num)', 'Alternativa::delete_one/$1');
$routes->get('delete_one_gestacion/(:num)', 'Gestacion::delete_one/$1');
$routes->get('delete_one_infante/(:num)', 'Infante::delete_one/$1');


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
