<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Users extends Model {

	//
	function get_user($username,$password)
	{
		$user = DB::table('users')->where('name', $username)->where('password',md5($password))->get();
		return $user;
	}

	function insert_user($username,$password)
	{
		$user = DB::table('users')->insert(array('name'=>$username,'password'=>md5($password)));
	}
	function check_username($username)
	{
	$user = DB::table('users')->where('name', $username)->get();
	return $user;
	}
}
