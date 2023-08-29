<!doctype html>
<html lang="en">

<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--favicon-->
      <!-- <link rel="icon" href="{{ asset('public/admin/assets/images/favicon-32x32.png')}}" type="image/png" /> -->
      <!--plugins-->
      <link href="{{ asset('public/admin/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
      <link href="{{ asset('public/admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
      <link href="{{ asset('public/admin/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
      <!-- loader-->
      <link href="{{ asset('public/admin/assets/css/pace.min.css')}}" rel="stylesheet" />
      <script src="{{ asset('public/admin/assets/js/pace.min.js')}}"></script>
      <!-- Bootstrap CSS -->
      <link href="{{ asset('public/admin/assets/css/bootstrap.min.css')}}" rel="stylesheet">
      <link href="{{ asset('public/admin/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
      <link href="{{ asset('public/admin/assets/css/app.css')}}" rel="stylesheet">
      <link href="{{ asset('public/admin/assets/css/icons.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <title>White-legals - Admin Sign in</title>
   </head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							<img src="assets/images/logo-img.png" width="180" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Sign in</h3>
										<!-- <p>Don't have an account yet? <a href="authentication-signup.html">Sign up here</a>
										</p> -->
									</div>
				
									<!-- <div class="login-separater text-center mb-4"> <span>OR SIGN IN WITH EMAIL</span>
										<hr/>
									</div> -->
									<div class="form-body">
                                        @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Success!</strong> {{ session('success')}}.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endif
                                        @if(session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Error!</strong> {{ session('error')}}.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        @endif
										<form class="row g-3" method="post" action="{{url('/login')}}">
                                            @csrf
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input type="text" class="form-control" name="username" id="inputEmailAddress" placeholder="Email Address">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Enter Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" name="password" id="inputChoosePassword" value="" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
                                            <!--<div class="col-12 mt-4">-->
                                            <!--    <div class="row">-->
                                            <!--        <label for="inputEmailAddress" class="form-label">Captcha Code</label>-->
                                            <!--        <div class="col-md-6 col-6">-->
                                            <!--            <input type="text" name="captcha" required class="form-control" placeholder="Enter Captcha Code">-->
                                            <!--        </div>-->
                                            <!--        <div class="col-5 col-md-4 mt-1">-->
                                            <!--            <div class="text-white text-center" style="background-color: blue; "><span class="okk" style="font-size: 20px; font-family: Segoe Print;">{{session('rand')}}</span></div>-->
                                            <!--        </div>-->
                                            <!--        <div class="col-1 col-md-2 mt-1 px-0">-->
                                            <!--            <div class="text-white text-center" >-->
                                            <!--                <button type="button" class=" ok" style="border:none; background-color: white; font-size: 20px;"> <i class="fa-solid fa-arrows-rotate"></i></button>-->
                                            <!--            </div>-->
                                            <!--        </div>-->
                                            <!--        <span class="text-danger">-->
                                            <!--        @error('captcha')-->
                                            <!--        {{$message}}-->
                                            <!--        @enderror-->
                                            <!--        </span>-->
                                            <!--    </div>-->
                                            <!--</div>-->
											<!-- <div class="col-md-6">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
													<label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
												</div>
											</div>
											<div class="col-md-6 text-end">	<a href="authentication-forgot-password.html">Forgot Password ?</a>
											</div> -->
											<div class="col-12">
												<div class="d-grid">
													<button class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="{{ asset('public/admin/assets/js/bootstrap.bundle.min.js')}}"></script>
      <!--plugins-->
      <script src="{{ asset('public/admin/assets/js/jquery.min.js')}}"></script>
      <script src="{{ asset('public/admin/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
      <script src="{{ asset('public/admin/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
      <script src="{{ asset('public/admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
      <!--Password show & hide js -->
      <script>
         $(document).ready(function () {
         	$("#show_hide_password a").on('click', function (event) {
         		event.preventDefault();
         		if ($('#show_hide_password input').attr("type") == "text") {
         			$('#show_hide_password input').attr('type', 'password');
         			$('#show_hide_password i').addClass("bx-hide");
         			$('#show_hide_password i').removeClass("bx-show");
         		} else if ($('#show_hide_password input').attr("type") == "password") {
         			$('#show_hide_password input').attr('type', 'text');
         			$('#show_hide_password i').removeClass("bx-hide");
         			$('#show_hide_password i').addClass("bx-show");
         		}
         	});
         });
      </script>
      <script type="text/javascript">
      	$(document).ready(function() {
      		$('.ok').on('click',function() {
                location.reload();
      		});
      	});
      </script>
      <!--app JS-->
      <script src="{{ asset('public/admin/assets/js/app.js')}}"></script>
</body>

</html>