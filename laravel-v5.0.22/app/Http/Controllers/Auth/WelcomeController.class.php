<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\UserModel;

class WelcomeController extends Controller {

 function __construct() 
 {
    parent::__construct();
     $this->userModel=new UserModel();
 }
 public function index()
  {

  }

 public function login()
  {
    //echo header("Access-Control-Allow-Origin:*");
    //header("Content-Type:text/html; charset=utf-8");
    if($_POST)
    {
      
      //  file_put_contents($file, "53454",FILE_APPEND);
      if(isset($_POST['username'])&&isset($_POST['password']))
         {  
           $result=$this->userModel->SelectUser($_POST['username'],$_POST['password']);
            if(count($result)>0)
              { 
                 $_SESSION['user_id']=$result[0]['user_id'];
                echo "success";
              }
            else
              {
                echo "error";
              } 
          }
    }
  }

  public function regest()
  {
    if($_POST)
    {
      //判断用户名是否已存在 张阳 2016年11月23日13:47:20 
      //  file_put_contents($file, "53454",FILE_APPEND);
      if(isset($_POST['username'])&&!isset($_POST['password']))
         {  
           $result=$this->userModel->SelectUsername($_POST['username']);
            if(count($result)>0)
              { 
                echo "success";
              }
            else
              {
                echo "error";
              } 
          }
          //注册页面提交 张阳 2016年11月23日13:58:01
      if(isset($_POST['password']))
      {
        $result=$this->userModel->insertUser($_POST['username'],$_POST['password']);
        $url="../Homepage?username=".$_POST['username']."&password=".$_POST['password'];
        //注册后直接进入主页 张阳 2016年11月24日09:40:49
        redirect($url, 2, '页面跳转中...');
        
      }
    }
          else
          {
      $this->display('regest');}
  }
}
        