<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<link rel="stylesheet" href="{{asset('/assets/bootstrap/css/bootstrap.min.css')}}">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="{{asset('/assets/js/jquery-1.11.1.min.js')}}"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link rel="stylesheet" href="{{asset('/assets/css/style_welcome.css')}}">
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Fidele Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!---->
<script src="{{asset('/assets/js/menu_jquery.js')}}"></script>
</head>
<body> 
<!--header-->	
<div class="header">
	<div class="container">
		 <div class="logo">
		  	<a href="index.html"><img src="{{asset('/assets/img/logo.jpg')}}" height="120" width="200" alt="" ></a>
	  	 </div>
	   <div class="head-right">
	   	<div class="head-grid">
	   		<ul>
				<!-- <li><div id="loginContainer"><a href="#" id="loginButton"></a>
					<div id="loginBox">                
						  <form id="loginForm">
						           <fieldset id="body">
						              <fieldset>
						                   <label for="email">Email Address</label>
						                     <input type="text" name="email" id="email">
						                </fieldset>
						                 <fieldset>
						                            <label for="password">Password</label>
						                            <input type="password" name="password" id="password">
						                 </fieldset>
						                    <input type="submit" id="login" value="Sign in">
						                	<label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>
						            	</fieldset>
						            <span><a href="#">Forgot your password?</a></span>
							 </form>
				    </div>
				</div>
			</li>	 -->
		</ul>
	</div> 	
	   <div class="top-nav">
			  <span class="menu"><img src="{{asset('/assets/img/menu.png')}}" alt=""> </span>
					<ul>
						 <li class="active"><a href="welcome">主页</a></li>
					   	 <li><a href="about.html">我的</a></li>
					   	 <li><a href="gallery.html">宠物市场</a></li>
					   	 <li><a href="blog.html">宠物点滴</a></li>
					   	 <li><a href="codes.html">分享心得</a></li>
					   	 <li><a href="contact">联系我们</a></li>
						<div class="clearfix"> </div>
					</ul>

					<!--script-->
				<script>
					$("span.menu").click(function(){
						$(".top-nav ul").slideToggle(500, function(){
						});
					});
			</script>
		</div>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
@yield('content')
<!--footer-->
 	<div class="footer ">
 		<div class="footer-1"> </div>
		<div class="container">
		  <div class="footer_top">
		  	<div class="col-md-3 footer-head">
				<!-- <h4>Navigation</h4>
				  <ul class="list1">
				  	 <li><a href="index.html">Home</a></li>
				   	 <li><a href="about.html">About</a></li>
				   	 <li><a href="gallery.html">Gallery</a></li>
				   	 <li><a href="blog.html">Blog</a></li>
				   	 <li><a href="codes.html">Short Codes</a></li>
				   	 <li><a href="contact.html">Contact</a></li>
				  </ul> -->
			</div>
		  	
			<div class="col-md-3 footer-head">
				<h4>Recent News</h4>
			   <div class="footer-new">
			   	<div class="footer-new1">
			   		<a href="single.html"><img src="{{asset('/assets/img/te.jpg')}}" class="img-responsive" alt=""></a>
			   	</div>
			   	<div class="footer-new2">
			   		<p><a href="single.html">Masagni dolores eoquie voluptaquisquam.</a> </p>
			   	</div>
			   	<div class="clearfix"> </div>
			   </div>
			     <div class="footer-new">
			   	<div class="footer-new1">
			   		<a href="single.html"><img src="{{ asset('/assets/img/te2.jpg')}}" class="img-responsive" alt=""></a>
			   	</div>
			   	<div class="footer-new2">
			   		<p><a href="single.html">Masagni dolores eoquie voluptaquisquam.</a> </p>
			   	</div>
			   	<div class="clearfix"> </div>
			   </div>
			     <div class="footer-new">
			   	<div class="footer-new1">
			   		<a href="single.html"><img src="{{asset('/assets/img/te3.jpg')}}" class="img-responsive" alt=""></a>
			   	</div>
			   	<div class="footer-new2">
			   		<p><a href="single.html">Masagni dolores eoquie voluptaquisquam. </a></p>
			   	</div>
			   	<div class="clearfix"> </div>
			   </div>
			</div>
			<div class="col-md-3 footer-head">
				<h4>Follow Us</h4>
			 <ul class="socials">
                 <li><a href="#"><i ></i></a></li>
                 <li><a href="#"><i class="dribbble"></i></a></li>
                  <li><a href="#"><i class="twitter"></i></a></li>
              </ul>
			</div>
			<div class="col-md-3 footer-head1">
			  	<h4>Location</h4>
             	<p><b>Company Name</b></p>
              	<p>Masagni dolores</p>
               <p>+17478895959</p>
			</div>
			<div class="clearfix"> </div>
		   </div>
		   <div class="footer-bottom">
		<p>Copyright &copy; 2015.Company name All rights reserved.More Templates <a href="http://www.cssmoban.com/" target="_blank" title=宠物之家</a> - Collect from <a href="http://www.cssmoban.com/" title="兔宝" target="_blank">兔宝</a></p>
    </div>
	 </div>
</div>
@yield('foot')
 	<!--//footer-->
</body>
</html>