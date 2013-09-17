<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
date_default_timezone_set('America/New_York');

require 'vendor/Slim/Slim.php';
require 'vendor/custom_view.php';
include 'vendor/NotORM/NotORM.php';
require 'vendor/Facebook/facebook.php';

\Slim\Slim::registerAutoloader();

$view = new custom_view;

$app = new \Slim\Slim(array('log.path'    => 'logs',
                            'log.enabled' => true,
                            'log.level'   => 4,                                
                            'mode'        => 'development',
                            'debug'       => true,
                            'view'        => $view));

/** Definir Layout **/
$view->set_layout('layout/index.php');

/** Config ORM **/
$pdo = new PDO("mysql:host=localhost;dbname=tiemposvelez",'tiemposvelez','uNPfuS4hM5FQVw4uFHye6s1UI');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->exec("SET CHARACTER SET utf8");
$db  = new NotORM($pdo);

/** Facebook **/
$facebook = new Facebook(array(
  'appId'  => '1424024264489838',
  'secret' => '511c741601d990bb23d08018083109b9'
));

$app->hook('slim.before.dispatch', function () use ($app, $view) {
    $view->set_data(array('baseUrl' => $app->request()->getRootUri() ));
});


$app->get('/', function () use ($app, $facebook, $db, $view) {	
	$view->set_layout('layout/index.php', array( 'baseUrl' => $app->request()->getRootUri() , 'style' => 'style="bottom: 38px;"' ));
    $app->render('views/index.php', array('baseUrl' => $app->request()->getRootUri()));    
});

$app->get('/register', function () use ($app, $facebook, $db) {
	
	$id 	= $facebook->getUser();
	$result = $db->tbl_demonstration("strIdFacebook = ?", $id)->fetch();

	if( $result ){
		//$app->response()->redirect($app->request()->getRootUri().'/winner/'.$result['intIdDemostration']);
		$app->response()->redirect($app->request()->getRootUri().'/publish/'.$result['strIdFacebook']);
	}	
	
	//$departamentos = $db->tbl_departamentos(" tbl_paises_intId = ? ", 1);
    $app->render('views/register.php', array('baseUrl' 		 => $app->request()->getRootUri(),	    									 
	    									 'id' 			 => $id ));
});

$app->post('/getcitys', function () use ($app, $db) {    	

	$data = $app->request()->post('data');	
	if( is_numeric($data) && !empty($data) ){
		$result   = array();
		$ciudades = $db->tbl_ciudades(" tbl_departamentos_intId = ? ", $data);		
		foreach ($ciudades as $key => $value) {
			array_push($result, array('intId' =>  $value['intId'], 'strNombre' =>  $value['strNombre']));
		}
		echo json_encode($result);
	}else{
		throw new Exception('Parametro no valido');
	}
});


$app->get('/publish/:id', function ( $id) use ($app, $db) { 	
	$result = $db->tbl_time("intId = ?", '1')->fetch();
	//$messages = $db->tbl_messages();
	$messages_cat1 = $db->tbl_messages("intIdCategory = ?", '1');
	$messages_cat2 = $db->tbl_messages("intIdCategory = ?", '2');
	$messages_cat3 = $db->tbl_messages("intIdCategory = ?", '3');
	$messages_cat4 = $db->tbl_messages("intIdCategory = ?", '4');
    $app->render('views/publish.php', array('baseUrl' => $app->request()->getRootUri(), 
											'num' => $id, 
											'time' => $result['intTime'],
											'messages_cat1' => $messages_cat1,
											'messages_cat2' => $messages_cat2,
											'messages_cat3' => $messages_cat3,
											'messages_cat4' => $messages_cat4)
				);    
});


$app->get('/term', function ( ) use ($view, $app) {
	$view->set_layout('views/term.php');
	$view->set_data(array('baseUrl' => $app->request()->getRootUri()));
    $app->render('views/term.php', array('baseUrl' => $app->request()->getRootUri() ));    
});

$app->post('/save', function ()  use ($app, $db){
	$data 	= $app->request()->post();
	
	$dateBirth = $data['intDay'].'/'.$data['intMonth'].'/'.$data['intYear'];  
	
	$data_array = array(		
		'strIdFacebook' => $data['strIdFacebook'],
		'strName' => $data['strName'],
		'strLastname' => $data['strLastname'],
		'strMail' => $data['strMail'],
		'strIdentification' => $data['strIdentification'],
		'strDepartment' => $data['strDepartment'],
		'dtDateBirth' => $dateBirth,
		'strAddress' => $data['strAddress'],
		'strCity' => $data['strCity'],
		'strPhone' => $data['strPhone'],
		'strTelephone' => $data['strTelephone'],		
		'intTerm' => $data['intTerm']		
	);
	$result = $db->tbl_demonstration()->insert($data_array);
	//echo json_encode( array('n' => $result['intId']) );	
	echo json_encode( array('n' => $result['strIdFacebook']) );	
});

$app->post('/time', function () use ($app, $facebook, $db) { 
	$result = $db->tbl_time("intId = ?", '1')->fetch();
	$current_time = $result['intTime'];
	$id 	= $facebook->getUser();
	$data 	= $app->request()->post();	
	$time_discount = $data['data'];
	$new_time = $current_time - $time_discount;
	
	$db->tbl_time()->insert_update(
		array("intID" => 1), // unique key
		array("intTime" => $new_time) // insert values if the row doesn't exist
	);	
	
	
	$data_array = array(		
		'strIdFacebook' => $id,
		'idMessage' => $data['idMessage'],
		'dtDatePost' => new NotORM_Literal("NOW()"),			
		'strIdFacebookFriend' => $data['strIdFacebookFriend']			
	);
	$result = $db->tbl_posts()->insert($data_array);
	
	echo json_encode( array('n' => $new_time) );
	//$result = $db->tbl_demonstration("strIdFacebook = ?", $id)->fetch();   
});

$app->run();