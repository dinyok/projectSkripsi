<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
     <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
     <link rel="stylesheet" href="{{ asset('css/templatemo-digital-trend.css') }}">
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login #01</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Sign In</h3>
						<form action="/login" class="login-form">
						{{ csrf_field() }}
						@if(session('errors'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Something it's wrong:
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                            </ul>
								</div>
							@endif
							@if (Session::has('success'))
								<div class="alert alert-success">
									{{ Session::get('success') }}
								</div>
							@endif
							@if (Session::has('error'))
								<div class="alert alert-danger">
									{{ Session::get('error') }}
								</div>
							@endif
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" placeholder="Username" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" class="form-control rounded-left" placeholder="Password" required>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
									<p class="text-center">Belum punya akun? <a href="/register">Register</a> sekarang!</p>
								</div>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
     <script src="{{ asset('js/app.js') }}"></script>
     <script src="{{ asset('js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('js/aos.js') }}"></script>
     <script src="{{ asset('js/smoothscroll.js') }}"></script>
     <script src="{{ asset('js/custom.js') }}"></script>
	</body>
</html>

