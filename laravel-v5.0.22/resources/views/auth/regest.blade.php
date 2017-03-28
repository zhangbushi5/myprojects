@extends('app')

@section('content')
  
   

        <!-- Top content -->
        <div class="top-content">
            
            <div class="inner-bg">
                <div class="container">
                   
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>注册用户</h3>
                                    <p>请输入用户名和密码完成注册</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-key"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form role="form" action="{{ url('/auth/regest_in') }}" method="post" class="login-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username" id="user_name">用户名</label>
                                        <input type="text" name="username" placeholder="用户名..." class="form-username form-control" id="username">
                                        
                                    </div><div class="form-group">
                                        <label class="sr-only" for="form-username">密码</label>
                                        <input type="password" name="password2" placeholder="密码..." class="form-password form-control" id="password2">
                                        <input type="text" hidden id="url" value="{{ url('/auth/check') }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">密码</label>
                                        <input type="password" name="password" placeholder="密码..." class="form-password form-control" id="password">
                                    </div>
                                    <span id="sign" style="color:red">
                                    </span>
                                    <button type="summit" id="regest" class="btn">注册</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                            <h3>其他登录方式</h3>
                            <div class="social-login-buttons">
                                <a class="btn btn-link-1 btn-link-1-facebook" href="#">
                                    <i class="fa fa-facebook"></i> QQ
                                </a>
                                <a class="btn btn-link-1 btn-link-1-twitter" href="#">
                                    <i class="fa fa-twitter"></i> 微信
                                </a>
                                <a class="btn btn-link-1 btn-link-1-google-plus" href="#">
                                    <i class="fa fa-google-plus"></i> 新浪微博
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
       
        <!-- Javascript -->
        
       <script type="text/javascript">

       
           
$(document).ready(function(){
     $.backstretch("{{asset('/assets/img/backgrounds/2.jpg')}}");
      
$("#username").keyup(function(){

    var name = $("#username").val();


    $.ajax({
    type:"POST",
    url:$("#url").val(),
    dataType:'json',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data:{username:$("#username").val()},
    success:function(data)
    {
        
        // var str1=$.trim(html);
        // var str2=$.trim("success");
        if(data.msg==1)
            {
             document.getElementById("sign").innerHTML="用户名已被占用";
             $("#regest").attr({"disabled":"disabled"});
            }
        else
            {
            
             document.getElementById("sign").innerHTML="用户名可以使用";
             $("#regest").removeAttr("disabled");
            }
            

                
    }
    });
    }); 
$("#password").keyup(function(){

    //var name = $("#username").val();
     var password = $("#password").val();
     var password2 = $("#password2").val();
   // //var url = $("#url").val();


    // if(name=="" || password==""||password2==""){
    // document.getElementById("sign").innerHTML="用户名或密码不能为空";
    // $("#form-username").focus();
    // return false;
    // }

    
        var str1=$.trim(password);
        var str2=$.trim(password2);
        if(str1!=str2)
        {
            document.getElementById("sign").innerHTML="两次密码输入必须一致";
            $("#regest").attr({"disabled":"disabled"});
        }
        else
        {
            document.getElementById("sign").innerHTML="";
            $("#regest").removeAttr("disabled");

        }
    }); 
     
$("#password2").keyup(function(){

    //var name = $("#username").val();
     var password = $("#password").val();
     var password2 = $("#password2").val();
   // //var url = $("#url").val();


    // if(name=="" || password==""||password2==""){
    // document.getElementById("sign").innerHTML="用户名或密码不能为空";
    // $("#form-username").focus();
    // return false;
    // }

    
        var str1=$.trim(password);
        var str2=$.trim(password2);
        if(str1!=str2)
        {
            document.getElementById("sign").innerHTML="两次密码输入必须一致";
            $("#regest").attr({"disabled":"disabled"});
        }
        else
        {
            document.getElementById("sign").innerHTML="";
            $("#regest").removeAttr("disabled");

        }
    }); 


 });
       </script>>
        
        <!--[if lt IE 10]>
        
        <![endif]-->

    

@endsection