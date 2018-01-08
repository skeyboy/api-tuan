<?php
/**
 * Created by PhpStorm.
 * User: hanyun
 * Date: 2018/1/5
 * Time: 11:45
 */

namespace App\Http\Controllers\v1;


use App\Http\Controllers\Controller;
use App\Repositories\v1\TuanRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TuanController extends Controller {
	private $tuanRepository;
	
	public function __construct( TuanRepository $tuanRepository ) {
		$this->tuanRepository = $tuanRepository;
	}
	
	public function index() {
		return [
			1,
		];
	}
	
	//创建社团
	public function create( Request $request ) {
		$user = Auth::user();
		if ( ! $user->school_id ) {
			return $this->error( '请先完善学校信息认证！' );
		}
		$name        = $request->get( 'name' );
		$logo        = $request->get( 'logo' );
		$category_id = $request->get( 'category_id' );
		$description = $request->get( 'description' );
		if ( ! $name ) {
			return $this->error( '社团名称不可以为空！' );
		}
		$tuan = $this->tuanRepository->getTuanByName( $name );
		if ( $tuan && ( $tuan->school_id == $user->school_id ) ) {
			return $this->error( '该院校社团已经存在！换个名称试试！' );
		}
		if ( ! $logo ) {
			return $this->error( '社团logo不可为空！' );
		}
		if ( ! $category_id ) {
			return $this->error( '请选择分类！' );
		}
		if ( ! $user->school_id ) {
			return $this->error( '请先完善用户信息！' );
		}
		$category = $this->tuanRepository->getTuanCategoryById( $category_id );
		if ( ! $category ) {
			return $this->error( '社团分类不存在！' );
		}
		$data['name']        = $name;
		$data['logo']        = $logo;
		$data['category_id'] = $category_id;
		$data['description'] = $description;
		$data['school_id']   = $user->school_id;
		$res                 = $this->tuanRepository->create( $user->id, $data );
		if ( $res ) {
			return $this->success();
		}
		
		return $this->error();
	}
	
	//社团列表
	public function tuanList() {
		return $this->success( $this->tuanRepository->getTuanList() );
	}
	
	// 社团分类列表
	public function getTuanCategoryList() {
		return $this->success( $this->tuanRepository->getTuanCategoryList() );
	}
	
	//创建社团相册
	public function createAlbum( Request $request ) {
		$user    = Auth::user();
		$tuan    = $this->tuanRepository->getTuanByUserId( $user->id );
		$name    = $request->get( 'name' );
		$private = $request->get( 'private', 0 );
		if ( ! $name ) {
			return $this->error( '相册名称不可以为空！' );
		}
		$data['name']    = $name;
		$data['private'] = $private;
		$res             = $this->tuanRepository->createTuanAlbum( $tuan->tuan_id, $data );
		if ( $res ) {
			return $this->success();
		}
		
		return $this->error();
	}
	
	//为社团相册添加照片
	public function addPicToTuanAlbum( Request $request ) {
	
	}
	
	//为社团相册设置封面
	public function changeCover( Request $request ) {
		$cover = $request->get( 'cover' );
		if ( ! $cover ) {
			return $this->error( '封面不可以为空！' );
		}
		$albumId = $request->get( 'albumId' );
		if ( ! $albumId ) {
			return $this->error( '相册id不可以为空！' );
		}
		$uid  = Auth::user()->id;
		$tuan = $this->tuanRepository->getTuanByUserId( $uid );
		if ( ! $tuan || ( $tuan->user_id != $uid ) ) {
			return $this->error( '你没有这个权限！' );
		}
		$data['cover'] = $cover;
		
		$res = $this->tuanRepository->changeCover( $albumId, $data );
		if ( $res ) {
			return $this->success();
		}
		
		return $this->error();
	}
}