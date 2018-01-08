<?php
/**
 * Created by PhpStorm.
 * User: hanyun
 * Date: 2018/1/5
 * Time: 11:44
 */

namespace App\Repositories\v1;


use App\Models\TuanCategoryModel;
use App\Models\TuanModel;

class TuanRepository {
	public function create($uid,$data) {
		$data['add_time'] = time();
		$data['user_id'] = $uid;
		return TuanModel::insert( $data );
	}
	
	public function getTuanByName($name) {
		return TuanModel::where( 'name', $name )->first();
	}
	
	public function getTuanCategoryList() {
	
	}
	
	public function getTuanCategoryById($category_id) {
		return TuanCategoryModel::where( 'id', $category_id )->first();
	}
}