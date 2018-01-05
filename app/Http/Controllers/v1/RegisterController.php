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
use App\Repositories\v1\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
	private $schoolRepository;
	private $userRepository;
	
	/**
	 * RegisterController constructor.
	 *
	 * @param $schoolRepository
	 */
	public function __construct( SchoolRepository $schoolRepository, UserRepository $userRepository ) {
		$this->schoolRepository = $schoolRepository;
		$this->userRepository   = $userRepository;
	}
	
	public function doReg( Request $request ) {
		$userName  = $request->get( 'userName' );
		$password  = $request->get( 'password' );
		$user = $this->userRepository->getUserByName( $userName );
		if ($user) {
			return $this->error( '用户已经存在！' );
		}
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
			return $this->error( '用户名或者密码不符合要求' );
		} else {
			$res=$this->userRepository->addUser( $userName, $password );
			if ($res) {
				return $this->success();
			}
			return $this->error( '失败了，稍后重试！' );
		}
	}
	
	public function schoolList() {
		return $this->success( $this->schoolRepository->getSchoolList() );
	}
}