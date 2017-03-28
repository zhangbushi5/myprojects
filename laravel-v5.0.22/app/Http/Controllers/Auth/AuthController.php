<?php namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use app\privilegeModel;
use App\Http\Models\Users;
class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	 use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->model=new \App\Http\Models\Users;

		$this->middleware('guest', ['except' => 'getLogout']);
	}
	public function index()
	{
		return view('auth.login');
	}
	public function login(Request $request)
	{
     $username=$_POST["username"];
      $password=$_POST["password"];
      $user=$this->model->get_user($username,$password);
      
      if(!$user){
      // $users = DB::select('select * from users where active = ?', [1]);
				   return response()->json(array('msg'=> 0), 200);
				}
			else{
					return response()->json(array('msg'=> 1), 200);
				}
		
	}
	public function regest()
	{
		return view('auth.regest');
	}

	public function regest_in()
	{
		$username=$_POST["username"];
		$password=$_POST["password"];
		$user=$this->model->insert_user($username,$password);
		return view('auth.welcome');
	}


//查看用户名是否存在 张阳

	public function check()
	{
		 $username=$_POST["username"];
		 $user =$this->model->check_username($username);

		 return response()->json(array('msg'=>count($user)), 200);
		
	}
}
