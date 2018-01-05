<?php
/**
 * Created by PhpStorm.
 * User: hanyun
 * Date: 2018/1/5
 * Time: 11:53
 */

namespace App\Http\Controllers\v1;


use App\Http\Controllers\Controller;
use App\Repositories\v1\SchoolRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
	private $schoolRepository;
	
	/**
	 * RegisterController constructor.
	 *
	 * @param $schoolRepository
	 */
	public function __construct( SchoolRepository $schoolRepository ) {
		$this->schoolRepository = $schoolRepository;
	}
	
	public function doReg( Request $request ) {
		$userName  = $request->get( 'userName' );
		$password  = $request->get( 'password' );
		$messages  = [
			'userName.required' => '用户名不可以为空',
			'password.required' => '密码不可以为空',
			'password.min'      => '密码长度至少6位',
		];
		$validator = Validator::make( $request->all(), [
			'userName' => 'required',
			'password' => 'required|min:6'
		], $messages );
		if ( $validator->fails() ) {
			return $this->success( $validator->errors()->toArray(), 'success', 1 );
		} else {
			return $this->success();
		}
	}
	
	public function schoolList() {
		return $this->success( $this->schoolRepository->getSchoolList() );
	}
}