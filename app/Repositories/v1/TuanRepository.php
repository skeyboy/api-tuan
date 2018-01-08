<?php
/**
 * Created by PhpStorm.
 * User: hanyun
 * Date: 2018/1/5
 * Time: 11:44
 */

namespace App\Repositories\v1;


use App\Models\TuanAlbumModel;
use App\Models\TuanCategoryModel;
use App\Models\TuanModel;
use App\Models\TuanUserModel;

class TuanRepository {
	public function create( $uid, $data ) {
		$data['add_time'] = time();
		$data['user_id']  = $uid;
		
		return TuanModel::insert( $data );
	}
	
	public function getTuanByName( $name ) {
		return TuanModel::where( 'name', $name )->first();
	}
	
	public function getTuanCategoryList() {
		return TuanCategoryModel::paginate( 15 )->toArray();
	}
	
	public function getTuanCategoryById( $category_id ) {
		return TuanCategoryModel::where( 'id', $category_id )->first();
	}
	
	public function getTuanList() {
		return TuanModel::orderby( 'id', 'desc' )->paginate( 15 )->toArray();
	}
	
	public function createTuanAlbum( $tuanId, $data ) {
		$data['add_time'] = time();
		$data['tuan_id']  = $tuanId;
		
		return TuanAlbumModel::insert( $data );
	}
	
	public function changeCover( $albumId, $data ) {
		$data['update_time'] = time();
		
		return TuanAlbumModel::where( 'id', $albumId )
		                     ->update( $data );
	}
	
	public function getTuanAlbumById( $id ) {
		return TuanAlbumModel::where( 'id', $id )->first();
	}
	
	public function getTuanByUserId( $uid ) {
		return TuanModel::where( 'user_id', $uid )->first();
	}
	
	public function getTuanAlbumList() {
		return TuanAlbumModel::orderby( 'id', 'desc' )->paginate( 15 )->toArray();
	}
}