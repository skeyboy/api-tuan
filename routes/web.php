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
	//相册相关
	//获得所有的公开相册
	$router->get( '/album/getAlbumList', 'AlbumController@getAlbumList' );
	//社团
	//社团分类列表
	$router->get( '/tuan/categoryList', 'TuanController@getTuanCategoryList' );
	//社团列表
	$router->get( '/tuan/list', 'TuanController@tuanList' );
	//社团相册列表
	$router->get( '/tuan/album/list', 'TuanController@getTuanAlbumList' );
	
	$router->group( [ 'middleware' => 'auth' ], function () use ( $router ) {
		//社团相关
		//创建社团
		$router->post( '/tuan/create', 'TuanController@create' );
		//创建社团相册
		$router->post( '/tuan/album/create', 'TuanController@createAlbum' );
		//为社团相册设置封面
		$router->post( '/tuan/album/cover', 'TuanController@changeCover' );
		//相册
		//创建一个相册
		$router->post( '/album/create', 'AlbumController@createAlbumByUser' );
		$router->post( '/album/addPicToAlbum', 'AlbumController@addPicToAlbum' );
		//获得用户相册列表
		$router->get( '/album/userAlbum', 'AlbumController@getAlbumListByUid' );
		//修改相册封面
		$router->post( '/album/changeCover', 'AlbumController@changeCover' );
	} );
} );