<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\UserModel;

class HomepageController extends Controller {
  public  $username;
  public  $password;
  public  $user_id=0;

 function __construct() 
 {
    parent::__construct();
     $this->userModel=new UserModel();
     
     
 }
 public function index()
  {
    // if(isset($_GET['username'])&&isset($_GET['password']))
    // {
    //   $this->username=$_GET['username'];
    //   $this->password=$_GET['password'];
    //   $result=$this->userModel->SelectUsername($_GET['username']);
    //   $user_id=$result[0]['user_id'];

    //    $_SESSION['logined']=1;   //判断是否已经登录的依据。张阳 2016年11月27日12:36:06
    // $_SESSION['user_id']=$user_id;
      
    // }
    // $_SESSION['user_id']=$user_id;
    // $_SESSION['user_id']=$user_id;
    if(isset($_SESSION['user_id']))

{
  $_SESSION['logined']=1;

}    

$this->display("home");
  }

 public function news()
  {
if(isset($_SESSION['logined']) && $_SESSION['logined']){
   //$_SESSION['logined']有设置，并且值为真，表示已经登录
   $this->user_id=$_SESSION['user_id'];

}
    if(isset($_GET['user_id']))
    {
       $this->assign("user_id",$user_id);
    }
   $this->display();
    //echo header("Access-Control-Allow-Origin:*");
    //header("Content-Type:text/html; charset=utf-8");
    // if($_POST)
    // {
      
    //   //  file_put_contents($file, "53454",FILE_APPEND);
    //   if(isset($_POST['username'])&&isset($_POST['password']))
    //      {  
    //        $result=$this->userModel->SelectUser($_POST['username'],$_POST['password']);
    //         if(count($result)>0)
    //           { 
    //             echo "success";
    //           }
    //         else
    //           {
    //             echo "error";
    //           } 
    //       }
    // }
  }

  public function upload()
  {
       $this->user_id=$_SESSION['user_id'];

    //如果点击到上传按钮，则直接进入到上传页面，而不是上传页面上传文件之后的操作，张阳 2016年11月25日14:04:46
   $result=$this->userModel->SelectTypeinfo();
   $type_name=$result[0]['type_name'];
   
   
   $this->assign("data",$result);
      $this->display();
    
    
    

  }

  public function single()
  {
       $this->user_id=$_SESSION['user_id'];

    //如果点击到上传按钮，则直接进入到上传页面，而不是上传页面上传文件之后的操作，张阳 2016年11月25日14:04:46
    if(!isset($_FILES['files']))
    {
      $this->display();
    
    }
    

  }


public function upload_toserver()
{
$this->user_id=$_SESSION['user_id'];


// 传递session值（由于Flash与session不兼容，只能通过参数传递获取）
    if (isset($_POST["PHPSESSID"])) 
    {
        session_id($_POST["PHPSESSID"]);
    } else if (isset($_GET["PHPSESSID"]))
     {
        session_id($_GET["PHPSESSID"]);
    }

    session_start();
    $file  = 'D:\log\log.txt';


// php.ini中设置的上传文件最大值，已经被我改成2000M 张阳 2016年11月27日19:19:09
    $POST_MAX_SIZE = ini_get('post_max_size');
    
      // file_put_contents($file, $POST_MAX_SIZE,FILE_APPEND);
      // file_put_contents($file, "\r\n",FILE_APPEND);
    
    $unit = strtoupper(substr($POST_MAX_SIZE, -1));
    $multiplier = ($unit == 'M' ? 1048576 : ($unit == 'K' ? 1024 : ($unit == 'G' ? 1073741824 : 1)));

    if ((int)$_SERVER['CONTENT_LENGTH'] > $multiplier*(int)$POST_MAX_SIZE && $POST_MAX_SIZE) {
        header("HTTP/1.1 500 Internal Server Error");
        echo "POST exceeded maximum allowed size.";
        exit(0);
    }


    // $save_path = getcwd() . "/file/"; 
    // $save_path="../file/";              　　　　　　　　　　　　
    $upload_name = "Filedata";
    $save_path="../file/";
    $max_file_size_in_bytes=2147483647;
    // $max_file_size_in_bytes = 2147483647;                　　　　　　　　　// 2GB
     // $extension_whitelist = array("doc", "txt", "jpg", "gif", "png","zip");    // 允许文件类型
     $valid_chars_regex = '.A-Z0-9_ !@#$%^&()+={}\[\]\',~`-';            // 文件名规则
    
// 其他变量
    $MAX_FILENAME_LENGTH = 260;
    $file_name = "";
    $file_extension = "";
    $uploadErrors = array(
        0=>"文件上传成功",
        1=>"上传的文件超过了 php.ini 文件中的 upload_max_filesize directive 里的设置",
        2=>"上传的文件超过了 HTML form 文件中的 MAX_FILE_SIZE directive 里的设置",
        3=>"上传的文件仅为部分文件",
        4=>"没有文件上传",
        6=>"缺少临时文件夹"
    );


// 检测文件是否上传正确
    if (!isset($_FILES[$upload_name])) {
        HandleError("No upload found in \$_FILES for " . $upload_name);
        exit(0);
    } else if (isset($_FILES[$upload_name]["error"]) && $_FILES[$upload_name]["error"] != 0) {
        HandleError($uploadErrors[$_FILES[$upload_name]["error"]]);
        exit(0);
    } else if (!isset($_FILES[$upload_name]["tmp_name"]) || !@is_uploaded_file($_FILES[$upload_name]["tmp_name"])) {
        HandleError("Upload failed is_uploaded_file test.");
        exit(0);
    } else if (!isset($_FILES[$upload_name]['name'])) {
        HandleError("File has no name.");
        exit(0);
    }
    // file_put_contents($file, $_FILES[$upload_name]['name'],FILE_APPEND);
    // file_put_contents($file, "\r\n",FILE_APPEND);
    
// 检测文件尺寸
    $file_size = @filesize($_FILES[$upload_name]["tmp_name"]);
    //  file_put_contents($file, $_FILES[$upload_name]["tmp_name"],FILE_APPEND);
    // file_put_contents($file, "\r\n",FILE_APPEND);
    if (!$file_size || $file_size > $max_file_size_in_bytes) {
        HandleError("File exceeds the maximum allowed size");
        exit(0);
    }
    
    if ($file_size <= 0) {
        HandleError("File size outside allowed lower bound");
        exit(0);
    }


// 检测文件名字为空
    $file_name = preg_replace('/[^'.$valid_chars_regex.']|\.+$/i', "", basename($_FILES[$upload_name]['name']));
    if (strlen($file_name) == 0 || strlen($file_name) > $MAX_FILENAME_LENGTH) {
        HandleError("Invalid file name");
        exit(0);
    }


// 检测重名文件
    if (file_exists($save_path . $file_name)) {
        HandleError("File with this name already exists");
        exit(0);
    }


// 检测后缀名
    $path_info = pathinfo($_FILES[$upload_name]['name']);
    $file_extension = $path_info["extension"];
    //文件名字重写为时间，用户ID格式 张阳 2016年11月28日09:58:53
    $file_name=date('ymdhis')."_by_".$this->user_id.".".$file_extension;
    
    file_put_contents($file, $file_name,FILE_APPEND);
    file_put_contents($file, "\r\n",FILE_APPEND);
    $result=$this->userModel->InsertUserupload($this->user_id,$_FILES[$upload_name]['name'],$save_path.$file_name);

    // $is_valid_extension = false;
    // foreach ($extension_whitelist as $extension) {
    //     if (strcasecmp($file_extension, $extension) == 0) {
    //         $is_valid_extension = true;
    //         break;
    //     }
    // }
    // if (!$is_valid_extension) {
    //     HandleError("Invalid file extension");
    //     exit(0);
    // }


// 保存文件
    if (!@move_uploaded_file($_FILES[$upload_name]["tmp_name"], $save_path.$file_name)) {
        HandleError("文件无法保存.");
        exit(0);
    }

// 成功输出

    echo "File Received";
    exit(0);
function HandleError($message) {
    header("HTTP/1.1 500 Internal Server Error");
    echo $message;
}


}

 
//用户注册界面 张阳 2016年11月25日14:01:25
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
        $this->display("../Application/Home/View/film/home.php");
        
      }
    }
       else
     {
      $this->display('regest');}
      }
}
        