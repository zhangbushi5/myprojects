@extends('layout')

@section('content')

       
<div class="banner-head">
    <div class="banner-1"> </div>
        <div class="container">
            <h1>有什么建议和意见，欢迎发送至我们的邮箱！</h1>    
        </div>
</div>
<!--content-->
<div class="container">
    <div class="contact">
            <div class="contact-form">
                <div class="col-md-8 contact-grid">
                   <form role="form"  >
                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           <input hidden value="{{ url('/auth/send_mail') }}" id="url">
                        <input type="text" name="username" id="username" placeholder="邮箱账号">
                        <input type="password" name="password" id="password" placeholder="邮箱密码">
                        <input type="text" name="subject" id="subject" placeholder="邮件主题">
                        <textarea placeholder="邮件内容" name="msg" id="msg" required=""></textarea>
                        <div class="send">
                            <input type="submit" value="发送" id="send_mail">
                        </div>
                    </form>
                </div>
                <div class="col-md-4 contact-in">
                      
                        <p>有什么建议和意见，欢迎发送至我们的邮箱</p>
                        <div class="address-grid">
                            <h5>地址</h5>
                            <p><b>上海浦东新区毕昇路339弄</b></p>
                            <p>电话 15821067958</p>
                            <a href="mailto:mail@example.com">841643923@qq.com</a>
                    
                      </div>
                </div>
                
                <div class="clearfix"> </div>
            </div>
            
        </div>
    </div>
<!--footer-->
<script type="text/javascript">
   $("#send_mail").click(function(){

    // var name = $("#form-username").val();
    // var password = $("#form-password").val();
    // var url = $("#url").val();


    // if(name=="" || password==""){
    // document.getElementById("sign").innerHTML="用户名或密码不能为空";
    // $("#form-username").focus();
    // return false;
    // }

    $.ajax({
    type:"POST",
    url:$("#url").val(),
   headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType:'json',
    data:{username:$("#username").val(),password:$("#password").val(),subject:$("#subject").val(),msg:$("#msg").val()},
    success:function(data)
    {
        
        // var str1=$.trim(html);
        // var str2=$.trim("success");
        if(data.state==1)
            {
             alert("发送成功谢谢");
            }
        else
            {
            
            alert("发送失败谢谢");
            }
            
 
                
    }
    });
    }); 
    </script>
@endsection