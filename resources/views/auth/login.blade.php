<!DOCTYPE html>
<html lang="en-gb">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <meta name="author" content="" />


  <title>Welcome Aadhunik Tailors</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:900|Anonymous+Pro:400,700|Arimo:400,700"
    rel="stylesheet" />

  <link rel="stylesheet" href="{{url('css/app.css')}}" />
  <style>
    .form-bg-image{
      background-image: url(images/2.jpg);
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }
    .auth-card{
        margin-left: auto;
        margin-right: 15%;
    }
  </style>
</head>

<body>
  <svg width="24" height="24" viewBox="0 0 24 24" style="display:none">
    <g id="logo-icon" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" fill="none"
      fill-rule="evenodd">
      <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
    </g>
  </svg>
                                           

  <div class="page">
    <div class="position-relative d-flex flex-row flex-fill page-wrapper">
      <div class="position-relative d-flex flex-column flex-fill page-content" style="min-width:0">
        <div class="d-flex flex-column justify-content-center align-items-center px-3 bg-white min-vh-100 form-bg-image">
          <div class="w-100 auth-card">
            <div class="card shadow-none">
              <div class="card-body">
                <div class="text-center mb-5">
                  <svg width="24" height="24" class="d-block m-auto">
                    <use xlink:href="#logo-icon"></use>
                  </svg>
                  <h4 class="mb-0 mt-3">Hello User, please log in</h4>
                  <p class="text-muted">to continue using your account</p>
                </div>
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  @if (session('error'))
                    <div class="alert alert-danger alert-dismissible show"> {{ session('error') }} </div>
                  @endif
                  <div class="mb-4 form-group">
                    <label for="email" class="">Admin ID</label>
                    <input type="text" name="user_id" id="user_id" placeholder="Enter Admin Id" 
                                 class="form-control {{ $errors->has('user_id') ? 'is-invalid' : '' }}" />
                        @if ($errors->has('user_id'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('user_id') }}</strong>
                              </span>
                        @endif
                  </div>
                  <div class="mb-4 form-group">
                    <label for="password" class="d-flex">
                      <span class="mr-auto">Password</span>
                    </label>
                    <input  placeholder="Enter Password" id="password" name="password" type="password" class="form-control  {{ $errors->has('password') ? 'is-invalid' : '' }}" />
                        @if ($errors->has('password'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                        @endif
                  </div>
                  <button class="mb-3 btn btn-primary btn-lg btn-block">
                    Login
                  </button>
                  <div class="text-center">
                   
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{url('vendor/jquery-3.4.1.slim.min.js')}}"></script>
  <script src="{{url('vendor/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('vendor/lottie.js')}}"></script>
</body>

</html>