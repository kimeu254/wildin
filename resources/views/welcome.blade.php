<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <style>
            :root {
                --primary: #ffee59;
                --secondary: #525368;
                --light: #E8F5E9;
                --dark: black;
            }

            body {
                background: white;
            }

            /* Extra small devices (phones, 600px and down) */
            @media only screen and (max-width: 600px) {
                .navbar {
                    display: none
                }
            }

            /* Small devices (portrait tablets and large phones, 600px and up) */
            @media only screen and (min-width: 600px) {
                .navbar {
                    display: none
                }
            }

            /* Medium devices (landscape tablets, 768px and up) */
            @media only screen and (min-width: 768px) {
                .navbar {
                    display: none
                }
            }

            /* Large devices (laptops/desktops, 992px and up) */
            @media only screen and (min-width: 992px) {
                .footer, .nav {
                    display: none;
                }

                .navbar {
                    display: block
                }
            }

            /* Extra large devices (large laptops and desktops, 1200px and up) */
            @media only screen and (min-width: 1200px) {
                .footer, .nav {
                    display: none;
                }

                .navbar {
                    display: block
                }
            }

            /*** Navbar ***/
            .navbar.sticky-top {
                top: -100px;
                transition: .5s;
            }

            /* .navbar .navbar-brand,
            .navbar a.btn {
                height: 80px
            } */

            .navbar .navbar-nav .nav-link {
                margin-right: 35px;
                padding: 10px 15px;
                color: var(--dark);
                font-size: 20px;
                font-weight: 500;
                outline: none;
            }

            .navbar .navbar-nav .nav-link.active {
                color: var(--primary);
                border-bottom: 2px solid #ffee10
            }

            .navbar .navbar-nav .nav-link:hover {
                color: #B2BEB5
            }

            .navbar .dropdown-toggle::after {
                border: none;
                content: "\f107";
                font-family: "Font Awesome 5 Free";
                font-weight: 900;
                vertical-align: middle;
                margin-left: 8px;
            }

            @media (max-width: 991.98px) {
                .navbar .navbar-nav .nav-link  {
                    margin-right: 0;
                    padding: 10px 0;
                }

                .navbar .navbar-nav {
                    border-top: 1px solid #EEEEEE;
                }
            }

            @media (min-width: 992px) {
                .navbar .nav-item .dropdown-menu {
                    display: block;
                    border: none;
                    margin-top: 0;
                    top: 150%;
                    opacity: 0;
                    visibility: hidden;
                    transition: .5s;
                }

                .navbar .nav-item:hover .dropdown-menu {
                    top: 100%;
                    visibility: visible;
                    transition: .5s;
                    opacity: 1;
                }
            }

            .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                color: black;
            }

            .foot-nav {
                display: flex;
                align-items: center;
                justify-content:space-between   
            }

            .foot-nav .nav-item {
                font-size: 20px
            }

            .foot-nav .nav-item.active {
                color: #ffee59
            }

            .nav .top-nav {
                display: flex;
                align-items: center;
                justify-content:space-between 
            }

            .offcanvas-size-sm {
                --bs-offcanvas-width: min(95vw, 300px) !important;
            }

        </style>
        
    </head>
    <body>
       <div id="app">

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 shadow-sm">
            <div class="container">
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
                        <div class="dropdown-menu bg-light rounded-0 rounded-bottom m-0">
                            <a href="feature.html" class="dropdown-item">Features</a>
                            <a href="team.html" class="dropdown-item">Our Team</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="quote.html" class="dropdown-item">Quotation</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
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

       </div>
    </body>
</html>
