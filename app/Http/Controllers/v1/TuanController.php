<?php
/**
 * Created by PhpStorm.
 * User: hanyun
 * Date: 2018/1/5
 * Time: 11:45
 */

namespace App\Http\Controllers\v1;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TuanController extends Controller {
	public function index() {
		return [
			1,
		];
	}
	
	public function create(Request $request) {
	
	}
}