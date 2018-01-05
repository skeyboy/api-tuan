<?php
/**
 * Created by PhpStorm.
 * User: hanyun
 * Date: 2018/1/5
 * Time: 13:49
 */

namespace App\Repositories\v1;


use App\Models\DistrictModel;
use App\Models\SchoolModel;

class SchoolRepository {
	public function getSchoolList() {
		$districts = DistrictModel::where( 'level', 1 )->get()->toArray();
		$schools   = SchoolModel::all()->toArray();
		$schoolMap = [];
		foreach ( $schools as $school ) {
			$schoolMap[ $school['district_id'] ][] = $school;
		}
		foreach ( $districts as $key => $district ) {
			if ( isset( $schoolMap[ $district['id'] ] ) ) {
				$districts[ $key ]['schoolList'] = $schoolMap[ $district['id'] ];
			} else {
				$districts[ $key ]['schoolList'] = [];
			}
		}
		return $districts;
	}
}