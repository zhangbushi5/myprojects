<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\UserModel;
class IndexController extends Controller {
    public function index(){
       header("Content-Type:text/html; charset=utf-8");
 $userModel=new UserModel();
      $result=$userModel->createUser( );
     // $result_d=$result->result();
    // var_dump($result);
 $this->assign('data',$result);
    

$this->display('Application\Home\View\login_boot.php');
 	
    }


}
