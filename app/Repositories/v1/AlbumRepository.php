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
	
	public function addPicToUserAlbum($data) {
		return UserAlbumPicModel::insert( $data );
	}
}