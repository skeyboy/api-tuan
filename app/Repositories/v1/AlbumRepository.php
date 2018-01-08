<?php
/**
 * Created by PhpStorm.
 * User: hanyun
 * Date: 2018/1/5
 * Time: 16:39
 */

namespace App\Repositories\v1;


use App\Models\AlbumModel;
use App\Models\UserAlbumPicModel;

class AlbumRepository {
	public function createAlbumByUid( $albumName, $uid, $private = 0 ) {
		return AlbumModel::insert( [ 'name' => $albumName, 'user_id' => $uid, 'private' => $private ] );
	}
	
	public function addPicToUserAlbum( $data ) {
		$data['add_time'] = time();
		return UserAlbumPicModel::insert( $data );
	}
	
	public function getAlbumListByUid( $uid ) {
		return AlbumModel::where( 'user_id', $uid )->paginate( 15 )->toArray();
	}
	
	public function getAlbumList() {
		return AlbumModel::where( 'private', 0 )->paginate( 15 )->toArray();
	}
	
	public function changeCover( $albumId, $cover, $uid ) {
		$data['cover'] = $cover;
		$data['update_time'] = time();
		return AlbumModel::where( 'id', $albumId )
		                 ->where( 'user_id', $uid )
		                 ->update( $data );
	}
}