<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController {
	//
	public function success( array $data = [], $msg = 'success', $code = 0 ) {
		return [ 'code' => $code, 'msg' => $msg, 'data' => changeArrayKey( $data ) ];
	}
	
	public function error( $msg = 'error', $code = 1 ) {
		return [ 'code' => $code, 'msg' => $msg ];
	}
}
