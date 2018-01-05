<?php
/**
 * Created by PhpStorm.
 * User: hanyun
 * Date: 2018/1/5
 * Time: 15:53
 */

namespace App\Http\Controllers\v1;


use App\Http\Controllers\Controller;
use App\Repositories\v1\AlbumRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller {
	private $albumRepository;
	
	public function __construct( AlbumRepository $albumRepository ) {
		$this->albumRepository = $albumRepository;
	}
	
	//获得所有公开的相册
	public function getAlbumList() {
	
	}
	
	//获得用户的相册
	public function getAlbumListByUid( Request $request ) {
	
	}
	
	//创建一个相册
	public function createAlbumByUser( Request $request ) {
		$albumName = $request->get( 'albumName', '新建相册' );
		$private   = $request->get( 'private', 1 );
		if ( ! $albumName ) {
			return $this->error( '相册名称不可以为空' );
		}
		$res = $this->albumRepository->createAlbumByUid( $albumName, Auth::user()->id, $private );
		if ( $res ) {
			return $this->success();
		}
		return $this->error( '创建失败！稍后重试！' );
	}
	
	//获得相册照片
	public function getAlbumPic( Request $request ) {
	
	}
	
	//为相册添加照片
	public function addPicToAlbum( Request $request ) {
	
	}
}