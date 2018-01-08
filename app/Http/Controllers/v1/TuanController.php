<?php
/**
 * Created by PhpStorm.
 * User: hanyun
 * Date: 2018/1/5
 * Time: 11:45
 */

namespace App\Http\Controllers\v1;


use App\Http\Controllers\Controller;
use App\Repositories\v1\TuanRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TuanController extends Controller {
	private $tuanRepository;
	
	public function __construct( TuanRepository $tuanRepository ) {
		$this->tuanRepository = $tuanRepository;
	}
	
	public function index() {
		return [
			1,
		];
	}
	
	//创建社团
	public function create( Request $request ) {
		$user = Auth::user();
		if ( ! $user->school_id ) {
			return $this->error( '请先完善学校信息认证！' );
		}
		$name        = $request->get( 'name' );
		$logo        = $request->get( 'logo' );
		$category_id = $request->get( 'category_id' );
		$description = $request->get( 'description' );
		if ( ! $name ) {
			return $this->error( '社团名称不可以为空！' );
		}
		$tuan = $this->tuanRepository->getTuanByName( $name );
		if ( $tuan && ( $tuan->school_id == $user->school_id ) ) {
			return $this->error( '该院校社团已经存在！换个名称试试！' );
		}
		if ( ! $logo ) {
			return $this->error( '社团logo不可为空！' );
		}
		if ( ! $category_id ) {
			return $this->error( '请选择分类！' );
		}
		if ( ! $user->school_id ) {
			return $this->error( '请先完善用户信息！' );
		}
		$data['name']        = $name;
		$data['logo']        = $logo;
		$data['category_id'] = $category_id;
		$data['description'] = $description;
		$data['school_id']   = $user->school_id;
		$res                 = $this->tuanRepository->create( $user->id, $data );
		if ( $res ) {
			return $this->success();
		}
		
		return $this->error();
	}
}