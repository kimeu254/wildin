<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Wildin'</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <!-- CSS -->
        <link rel="stylesheet" href="{{URL::to('css/main.css')}}">
        
    </head>
    <body>
       <div id="app">

        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 shadow-sm">
            <div class="container-fluid">
                <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
                    <h1 class="m-0">Wildin'</h1>
                </a>
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.html" class="nav-item nav-link active">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </a>
                    <a href="about.html" class="nav-item nav-link">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </a>
                    <a href="service.html" class="nav-item nav-link">
                        <i class="fa fa-commenting" aria-hidden="true"></i>
                    </a>
                    <a href="project.html" class="nav-item nav-link">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                    </a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                        <div class="dropdown-menu bg-white rounded-0 rounded-bottom m-0">
                            <div class="container">
                                <div class="row profile py-3 g-0">
                                    <a href="#" class="col-3 profile-img">
                                        <img src="https://picsum.photos/200/300" alt="" class="img-fluid">
                                    </a>
                                    <div class="col-9">
                                        <div class="mx-3">
                                            <div class="username mb-3">
                                                <a href="#">
                                                    <h6>JimmyTheMad</h6>
                                                    <span>@jim254</span>
                                                </a>
                                            </div>
                                            <div class="bio">
                                                <p>
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit...
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row profile-info g-0 text-center">
                                            <div class="col-4">
                                                <a href="#">
                                                    <p>Followers</p>
                                                    <span>1000</span>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a href="#">
                                                    <p>Following</p>
                                                    <span>1000</span>
                                                </a>                                        
                                            </div>
                                            <div class="col-4">
                                                <a href="#">
                                                    <p>Posts</p>
                                                    <span>1000</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <span>Profile</span>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                    <span>Settings & Privacy</span>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="fa fa-question" aria-hidden="true"></i>
                                    <span>Help & Support</span>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="fa fa-moon" aria-hidden="true"></i>
                                    <span>Display & Accessibility</span>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                    <span>Feedback</span>
                                </a>
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                    <span>Log Out</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Navbar-md Start -->
        <div class="nav shadow-sm">
            <div class="container top-nav p-3">
                <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
                    <h1 class="m-0">Wildin'</h1>
                </a>
                <div data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <img src="" alt="profile-pic" class="img-fluid">
                </div>
            </div>
        </div>
        <!-- Navbar-md End -->

        <!-- Offcanvas Start -->
        <div class="offcanvas offcanvas-end offcanvas-size-sm" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
              <h5 id="offcanvasRightLabel">Offcanvas right</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              ...
            </div>
          </div>
        <!-- Offcanvas End -->

        <main class="py-4">
            @yield('content')
        </main>

        <!-- Bottom-Nav Start -->
        <div class="footer shadow-lg">
            <div class="container">
                <div class="foot-nav p-4">
                    <a href="index.html" class="nav-item nav-link active">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </a>
                    <a href="about.html" class="nav-item nav-link">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </a>
                    <a href="service.html" class="nav-item nav-link">
                        <i class="fa fa-commenting" aria-hidden="true"></i>
                    </a>
                    <a href="project.html" class="nav-item nav-link">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- Bottom-Nav End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-wildin btn-lg-square rounded-circle post-story"><i class="fa fa-plus"></i></a>

       </div>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       <script type="text/javascript">
            (function ($) {
                "use strict";
            
                // Spinner
                var spinner = function () {
                    setTimeout(function () {
                        if ($('#spinner').length > 0) {
                            $('#spinner').removeClass('show');
                        }
                    }, 3000);
                };
                spinner();
            })(jQuery);
        </script>
    </body>
</html>
