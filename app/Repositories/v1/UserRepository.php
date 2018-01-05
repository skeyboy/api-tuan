<?php
/**
 * Created by PhpStorm.
 * User: hanyun
 * Date: 2018/1/5
 * Time: 11:29
 */

namespace App\Repositories\v1;


use App\User;

class UserRepository {
	public function getUserByName( $userName ) {
		return User::where( 'user_name', $userName )->first();
	}
	
	public function addUser( $userName, $password ) {
		return User::insert( [
			'user_name' => $userName,
			'password'  => $password,
			'api_token' => $this->generateToken()
		] );
	}
	
	public function getUserById( $uid ) {
		return User::where( 'id', $uid )->first()->toArray();
	}
	
	public function generateToken() {
		$str = join( '', range( 'a', 'z' ) ) . join( '', range( 'A', 'Z' ) ) . join( '', range( 0, 9 ) );
		
		return md5( str_shuffle( $str ) );
	}
}