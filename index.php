<?php 
	require_once __DIR__ . '/config/appConfig.php';
	require_once __DIR__ . '/application/autoload.php';
	require_once __DIR__ . '/application/helperFunction.php';

	use Core\Application;
	$app = new Application();
	
	$app->addRoute('/','Controller\ContactController', 'index');
	$app->addRoute('contact', 'Controller\ContactController', 'index');
	$app->addRoute('contact/add', 'Controller\ContactController', 'add');
	$app->addRoute('contact/edit', 'Controller\ContactController', 'edit');
	$app->addRoute('contact/delete', 'Controller\ContactController', 'delete');
	$app->addRoute('contact/exportInXml',  'Controller\ContactController', 'exportInXml');
	$app->addRoute('contact/exportInJson', 'Controller\ContactController', 'exportInJson');	
	$app->addRoute('contact/search', 'Controller\ContactController', 'search');	
	
	$app->addRoute('group', 'Controller\GroupController', 'index');
	$app->addRoute('group/add', 'Controller\GroupController', 'add');
	$app->addRoute('group/edit', 'Controller\GroupController', 'edit');
	$app->addRoute('group/delete', 'Controller\GroupController', 'delete');
	$app->addRoute('group/exportInXml',  'Controller\GroupController', 'exportInXml');
	$app->addRoute('group/exportInJson', 'Controller\GroupController', 'exportInJson');	

	$app->addRoute('tag', 'Controller\TagController', 'index');
	$app->addRoute('tag/add', 'Controller\TagController', 'add');
	$app->addRoute('tag/edit', 'Controller\TagController', 'edit');
	$app->addRoute('tag/delete', 'Controller\TagController', 'delete');
	$app->addRoute('tag/exportInXml',  'Controller\TagController', 'exportInXml');
	$app->addRoute('tag/exportInJson', 'Controller\TagController', 'exportInJson');

	$app->addRoute('city', 'Controller\CityController', 'index');
	$app->addRoute('city/add', 'Controller\CityController', 'add');
	$app->addRoute('city/edit', 'Controller\CityController', 'edit');
	$app->addRoute('city/delete', 'Controller\CityController', 'delete');
	$app->addRoute('city/exportInXml',  'Controller\CityController', 'exportInXml');
	$app->addRoute('city/exportInJson', 'Controller\CityController', 'exportInJson');

	$app->run();

?>