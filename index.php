<?php 
	require_once __DIR__ . '/config/appConfig.php';
	require_once __DIR__ . '/application/autoload.php';
	require_once __DIR__ . '/application/helperFunction.php';

	use Core\Application;
	$app = new Application();
	
	$app->addRoute('/','Controller\ContactController', 'index');
	$app->addRoute('contact', 'Controller\ContactController', 'index');
	$app->addRoute('contact/add', 'Controller\ContactController', 'add');
	$app->addRoute('contact/view', 'Controller\ContactController', 'view');
	$app->addRoute('contact/edit', 'Controller\ContactController', 'edit');
	$app->addRoute('contact/delete', 'Controller\ContactController', 'delete');
	$app->addRoute('contact/exportInXml',  'Controller\ContactController', 'exportInXml');
	$app->addRoute('contact/exportInJson', 'Controller\ContactController', 'exportInJson');		

	$app->run();

?>