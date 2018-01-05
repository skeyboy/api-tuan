<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->group( [ 'namespace' => 'v1', 'prefix' => 'api/v1' ], function () use ( $router ) {
	//注册
	$router->post( '/register/doReg', 'RegisterController@doReg' );
	//注册第二步，选择高校，注册时候可选
	$router->get( '/register/schoolList', 'RegisterController@schoolList' );
	$router->get( '/', 'IndexController@index' );
	$router->group( [ 'middleware' => 'auth' ], function () use ( $router ) {
		$router->post( '/tuan/create', 'TuanController@create' );
		
		//相册
		//创建一个相册
		$router->post( '/album/create', 'AlbumController@createAlbumByUser' );
	} );
} );