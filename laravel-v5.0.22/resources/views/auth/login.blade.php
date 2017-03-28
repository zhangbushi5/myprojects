@extends('app')

@section('content')
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            
                          
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			
                            		<p>请输入用户名和密码：</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                     <form role="form"  id="login-form"  class="login-form">
			                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">用户名</label>
                                        <input type="text" name="form-username" placeholder="用户名..." class="form-username form-control" id="form-username" >
                                        <input hidden value="{{ url('/auth/login') }}" id="url">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">密码</label>
                                        <input type="password" name="form-password" placeholder="密码..." class="form-password form-control" id="form-password">
                                    </div>
                                    <span id="sign" style="color:red">
                                    </span>
                                    <div>
                                    <button  type="button"  class="btn" id="login" >登陆</button>
                                </div>
                            </br>
                                <div>
                                    <button  type="button" class="btn" id="regist">注册</button>
                                </div>
                                </form>
		                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<h3>使用其他方式登录</h3>
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
        
       
        
        <script>

    $(document).ready(function(){
        $.backstretch("{{asset('/assets/img/backgrounds/2.jpg')}}");
    
    /*
        Form validation
    */
    $('.login-form input[type="text"], .login-form input[type="password"], .login-form textarea').on('focus', function() {
        $(this).removeClass('input-error');
    });
    
    $('.login-form').on('submit', function(e) {
        
        $(this).find('input[type="text"], input[type="password"], textarea').each(function(){
            if( $(this).val() == "" ) {
                e.preventDefault();
                $(this).addClass('input-error');
            }
            else {
                $(this).removeClass('input-error');
            }
        });
        
    });
 $("#login").click(function(){
    var name = $("#form-username").val();
    var password = $("#form-password").val();
    var url = $("#url").val();


    if(name=="" || password==""){
    document.getElementById("sign").innerHTML="用户名或密码不能为空";
    $("#form-username").focus();
    return false;
    }

    $.ajax({
    type:"POST",
    url:$("#url").val(),
   headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType:'json',
    data:{username:$("#form-username").val(),password:$("#form-password").val()},
    success:function(data)
    {
        
        // var str1=$.trim(html);
        // var str2=$.trim("success");
        if(data.msg==1)
            {
             var url="auth/welcome";
        window.location.href=(url);
            }
        else
            {
            
             document.getElementById("sign").innerHTML="用户名或密码错误";
            }
            
 
                
    }
    });
    }); 
     $("#regist").click(function(){

        
        var url="auth/regest";
        window.location.href=(url);
     });
 });
        </script>

@endsection