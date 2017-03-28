<?php namespace App\Http\Controllers\Contact;
require_once "email.class.php";
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use DB;
class ContactController extends Controller {

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

	 // use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}
	public function index()
	{
		
	}
	public function send_mail(Request $request)
	{
     $username=$_POST["username"];
      $password=$_POST["password"];
     $smtpserver = "smtp.126.com";//SMTP服务器
	$smtpserverport =25;//SMTP服务器端口
	$smtpusermail = $_POST["username"];//SMTP服务器的用户邮箱
	$smtpemailto = "841643923@qq.com";//发送给谁
	$smtpuser = $_POST["username"];//SMTP服务器的用户帐号(或填写new2008oh@126.com，这项有些邮箱需要完整的)
	$smtppass = $_POST["password"];//SMTP服务器的用户密码
	$mailtitle = $_POST['subject'];//邮件主题
	$mailcontent = "<h1>".$_POST['msg']."</h1>";//邮件内容
	$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
	//************************ 配置信息 ****************************
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
	$smtp->debug = false;//是否显示发送的调试信息
	$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

	
	if($state==""){
		return response()->json(array('state'=> 0), 200);
	}
	else
	{
		return response()->json(array('state'=> 1), 200);
	}
	}
	}
	
}
