<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{Lib::asset('public/css/style.css')}}">
</head>
<body>
    <section class="login-block">
        <div class="container dv_container">
            <div class="row" style="margin-top: 80px;"> 
                <div class="col-md-8 banner-sec">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img class="d-block img-fluid" src="{{Lib::asset('public/images/1.jpg')}}" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2>This is First Slide</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="{{Lib::asset('public/images/2.jpg')}}" alt="Second slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2>This is Second Slide</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block img-fluid" src="{{Lib::asset('public/images/3.jpg')}}" alt="Third slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <div class="banner-text">
                                        <h2>This is Heaven</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-md-4 login-sec">
                    <form class="login-form" id="login-form" action="{{Lib::asset('/get-login')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="dv_login_form">
							<h2 class="text-center"><img src="{{Lib::asset('public/images/logo.png')}}" alt=""> <br> Login Now </h2>
							<div class="form-group">
								<label for="exampleInputEmail1" class="text-uppercase">Email ID </label>
								<input type="text" class="form-control dv_input_field" placeholder="" data-validation="required" name="email" id="login-email">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1" class="text-uppercase">Password </label>
								<input type="password" class="form-control  dv_input_field" placeholder="" data-validation="required" name="password" id="login-password">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-login btn-block float-right">Submit</button>
							</div>
							<div class="dv_register">
								Don't have account <a href="#!">Register</a> here
							</div>
						</div>
						</form>
                        <form class="login-form" id="register-form" action="{{Lib::asset('/save-register')}}" method="post">
                             <input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="dv_register_form" style="display: none;">
							<h2 class="text-center"><img src="{{Lib::asset('public/images/logo.png')}}" alt=""> <br> Register Now </h2>
							<div class="form-group">
								<label for="exampleInputEmail1" class="text-uppercase">Email ID </label>
								<input type="text" class="form-control dv_input_field" placeholder="" data-validation="required" name="email" id="register-email">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1" class="text-uppercase">Password </label>
								<input type="password" class="form-control  dv_input_field" placeholder="" data-validation="required" name="password" id="register-password">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-login btn-block float-right">Submit</button>
							</div>
							<div class="dv_login">
								have account <a href="#!">Login</a> here
							</div>
						</div>
	                   </form>
                </div>
            </div>
		</div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
        <script type="text/javascript">
        $.validate({
            validateOnBlur : false, 
            modules : 'file',
            scrollToTopOnError : false
          });
        </script>
        		<script>
        			$(document).ready(function(){
        				$(".dv_register > a").click(function(){
        					$(".dv_login_form").css({"display":"none"});
        					$(".dv_register_form").css({"display":"block"});
        				})
        				$(".dv_login > a").click(function(){
        					$(".dv_register_form").css({"display":"none"});
        					$(".dv_login_form").css({"display":"block"});
        				}) 
        			});
        		</script>
                <script type="text/javascript">

                $(document).on('submit','#login-form',function(event) {
                    event.preventDefault();
                     $('#login-email').css({'border':'1px solid #ced4da;'});
                      $('#login-password').css({'border':'1px solid #ced4da;'});
                     var post_url = $(this).attr("action");
                        var request_method = $(this).attr("method"); 
                        var form_data = new FormData(this); 
                        $.ajax({
                            url : post_url,
                            type: request_method,
                            data : form_data,
                            contentType: false,
                            cache: false,
                            processData:false,
                        success:function(response){
                            if(response.status == 2){
                                $('#login-email').css({'border':'1px solid red'});
                            }else if(response.status == 1){
                                 $('#login-password').css({'border':'1px solid red'});
                            }else{
                                window.location.href = "{{Lib::asset('/')}}";  
                            }
                                  
                        }

                    });
                });
        </script>
        <script type="text/javascript">

                $(document).on('submit','#register-form',function(event) {
                    event.preventDefault();
                     $('#register-email').css({'border':'1px solid #ced4da;'});
                     $('#register-email').parent().children('span').remove();
                     var post_url = $(this).attr("action");
                        var request_method = $(this).attr("method"); 
                        var form_data = new FormData(this); 
                        $.ajax({
                            url : post_url,
                            type: request_method,
                            data : form_data,
                            contentType: false,
                            cache: false,
                            processData:false,
                        success:function(response){
                            if(response.status == 2){
                                $('#register-email').css({'border':'1px solid red'});
                                $('#register-email').after('<span style="color: red;font-size: 12px;">'+response.message+'</span>');
                            }else{
                                window.location.reload();
                            }
                              
                        }

                    });
                });
        </script>
</body>

</html>