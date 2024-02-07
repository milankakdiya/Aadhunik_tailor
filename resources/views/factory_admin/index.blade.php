<!DOCTYPE html>
<html lang="en-gb">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta name="author" content="" />


    <title>Aadhunik Tailors</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:900|Anonymous+Pro:400,700|Arimo:400,700"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('css/app copy.css')}}" />

    <script src="{{asset('vendor/Chart.min.js')}}"></script>
</head>
<style>
    
body {
  padding-bottom: 30px;
  position: relative;
  min-height: 100%;
}

a {
  transition: background 0.2s, color 0.2s;
}
a:hover,
a:focus {
  text-decoration: none;
}

#wrapper {
  padding-left: 0;
  transition: all 0.5s ease;
  position: relative;
}

#sidebar-wrapper {
  z-index: 1000;
  position: fixed;
  left: 250px;
  width: 0;
  height: 100%;
  margin-left: -250px;
  overflow-y: auto;
  overflow-x: hidden;
  background: #222;
  transition: all 0.5s ease;
}

#wrapper.toggled #sidebar-wrapper {
  width: 250px;
}

.sidebar-brand {
  position: absolute;
  top: 0;
  text-align: center;
  padding: 20px 0;
}
.sidebar-brand h2 {
  margin: 0;
  font-weight: 600;
  font-size: 24px;
  color: #fff;
}

.sidebar-nav {
  position: absolute;
  top: 75px;
  width: 250px;
  margin: 0;
  padding: 0;
  list-style: none;
}
.sidebar-nav > li {
  text-indent: 10px;
  line-height: 42px;
}
.sidebar-nav > li a {
  display: block;
  text-decoration: none;
  color: #757575;
  font-weight: 600;
  font-size: 18px;
}
.sidebar-nav > li > a:hover,
.sidebar-nav > li.active > a {
  text-decoration: none;
  color: green;
}
.sidebar-nav > li > a i.fa {
  font-size: 24px;
  width: 60px;
}

#navbar-wrapper {
    width: 100%;
    position: absolute;
    z-index: 2;
}
#wrapper.toggled #navbar-wrapper {
    position: absolute;
    margin-right: -250px;
}
#navbar-wrapper .navbar {
  border-width: 0 0 0 0;
  background-color: #eee;
  font-size: 24px;
  margin-bottom: 0;
  border-radius: 0;
  padding: 0 !important;
}
#navbar-wrapper .navbar a {
  color: #757575;
}
#navbar-wrapper .navbar a:hover {
  color: green;
}

#content-wrapper {
  width: 100%;
  position: absolute;
  padding: 15px;
  top: 100px;
}
#wrapper.toggled #content-wrapper {
  position: absolute;
  margin-right: -250px;
}

    @media (min-width: 992px) {
  #wrapper {
    padding-left: 250px;
  }
  
  #wrapper.toggled {
    padding-left: 50px;
  }

  #sidebar-wrapper {
    width: 250px;
  }
  
  #wrapper.toggled #sidebar-wrapper {
    width: 50px;
  }
  
  #wrapper.toggled #navbar-wrapper {
    position: absolute;
    margin-right: -190px;
}
  
  #wrapper.toggled #content-wrapper {
    position: absolute;
    margin-right: -190px;
  }

  #navbar-wrapper {
    position: relative;
  }

  #wrapper.toggled {
    padding-left: 50px;
  }

  #content-wrapper {
    position: relative;
    top: 0;
  }

  #wrapper.toggled #navbar-wrapper,
  #wrapper.toggled #content-wrapper {
    position: relative;
    margin-right: 60px;
  }
}

@media (min-width: 768px) and (max-width: 991px) {
  #wrapper {
    padding-left: 50px;
  }

  #sidebar-wrapper {
    width: 50px;
  }
  
#wrapper.toggled #navbar-wrapper {
    position: absolute;
    margin-right: -250px;
}
  
  #wrapper.toggled #content-wrapper {
    position: absolute;
    margin-right: -250px;
  }

  #navbar-wrapper {
    position: relative;
  }

  #wrapper.toggled {
    padding-left: 250px;
  }

  #content-wrapper {
    position: relative;
    top: 0;
  }

  #wrapper.toggled #navbar-wrapper,
  #wrapper.toggled #content-wrapper {
    position: relative;
    margin-right: 250px;
  }
}

@media (max-width: 767px) {
  #wrapper {
    padding-left: 0;
  }

  #sidebar-wrapper {
    width: 0;
  }

  #wrapper.toggled #sidebar-wrapper {
    width: 200px;
  }
  #wrapper.toggled #navbar-wrapper {
    position: absolute;
    margin-right: -250px;
  }

  #wrapper.toggled #content-wrapper {
    position: absolute;
    margin-right: -250px;
  }

  #navbar-wrapper {
    position: relative;
  }

  #wrapper.toggled {
    padding-left: 200px;
  }

  #content-wrapper {
    position: relative;
    top: 0;
  }

  #wrapper.toggled #navbar-wrapper,
  #wrapper.toggled #content-wrapper {
    position: relative;
    margin-right: 250px;
  }
}

@media screen and (max-width:425px) {
    #wrapper.toggled {
    padding-left:50px;
  }

  #wrapper.toggled #sidebar-wrapper {
    width: 50px;
  }
}
</style>

<body>
  <div id="wrapper">

          <aside id="sidebar-wrapper">
                  <div class="sidebar-brand">
                      <h2 style="margin-left:20px">
                          <svg width="24" height="24">
                              <use xlink:href="#logo-icon"></use>
                          </svg>
                  </div>
                <ul class="sidebar-nav">
                    <li class="active">
                        <a href="{{url('factoryadmin_dashboards')}}">
                            <span class="d-flex align-items-center">
                                <div class="fa fa-home p-2" ata-anim-loop="false"></div>   
                                Home
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{url('bcjshdgfhjsgf')}}">
                            <span class="d-flex align-items-center">
                                <div class="fa fa-user p-2" data-anim-loop="false"></div>
                                Employee
                            </span>
                        </a>
                    </li>
                     
                </ul>
                     
          </aside>

          <div id="navbar-wrapper">
              <nav class="navbar navbar-inverse">
                  <div class="container-fluid d-flex">
                      <div class="navbar-header">
                          <a href="#" class="navbar-brand" id="sidebar-toggle"><i class="fa fa-bars"></i></a>
                      </div>        
                      <div class="position-relative d-flex flex-column flex-fill page-content" style="min-width:0">
                              <div class="app-header">
                                  <nav class="navbar border-none">
                                      <ul class="ml-auto menu-right navbar-nav"> 
                                          <div>
                                              <div style="font-size:12px"><span style="font-weight: bold">ID:- </span> {{Auth::user()->user_id}}</div>
                                              <div style="font-size:12px"><span style="font-weight: bold">Name:- </span> {{Auth::user()->name}}</div>
                                              <div style="font-size:12px"><span style="font-weight: bold">Number:- </span> {{Auth::user()->phone_number}}</div>
                                          </div>
                                          <li class="dropdown nav-item">
                                              <a data-toggle="dropdown" aria-haspopup="true" href="#" class="nav-link"
                                                  aria-expanded="false">
                                                  <span class="position-relative d-flex rounded-circle" style="width:32px;height:43px">
                                                      <img src="public/images/avatar.jpg" alt="avatar" width="45px" height="45px" class="rounded-circle" />
                                                  </span>
                                              </a>
                                              <div tabindex="-1" role="menu" aria-hidden="true"
                                                  class="dropdown-menu dropdown-menu-right">
                                          
                                                  <button type="button" href="{{ route('admin.logout') }}" style="color: red"
                                                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                                                          tabindex="0" role="menuitem" class="btn dropdown-toggle dropdown-toggle">
                                                      Signout
                                                  </button>
                                                  <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                                      @csrf
                                                  </form>
                                              </div>
                                          </li>
                                      </ul>
                                  </nav>
                              </div>
                      </div>
                  </div>
              </nav>
          </div>

          <section id="content-wrapper">
              <div class="row">
                  <div class="col-lg-12">
                  @yield('content')
                  </div>
              </div>
          </section>

  </div>


<style>
    .dropdown-toggle::after{
        display: none;
    }


    .employee{
        border-radius: 13px 5px;
        background: #2b2c30;
        color: white;
        border: none;
        height: 38px;
        width: auto !important;
        position: relative;
        margin-bottom: 10px;
    }
    @media (min-width: 768px) and (max-width: 991px){
        .employee {
            width: auto !important; 
        }
    }
    @media only screen and (max-width: 768px) {
        .employee {
            width: auto !important; 
        }
    }


</style>
 

<script>
    const $button  = document.querySelector('#sidebar-toggle');
    const $wrapper = document.querySelector('#wrapper');

    $button.addEventListener('click', (e) => {
    e.preventDefault();
    $wrapper.classList.toggle('toggled');
    });
</script>


    <script src="{{asset('vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/lottie.js')}}"></script>

    <script src="{{asset('js/app.js')}}"></script>

    <script src="{{asset('js/dashboard.js')}}"></script>
    
</body>

</html>
