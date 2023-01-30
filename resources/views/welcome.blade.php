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
                .navbar {
                    display: block
                }
            }

            /* Extra large devices (large laptops and desktops, 1200px and up) */
            @media only screen and (min-width: 1200px) {
                .navbar {
                    display: block
                }
            }
        </style>
        
    </head>
    <body>
       <div id="app">

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
            <div class="container">
                <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
                    <h1 class="m-0">Gardener</h1>
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
       </div>
    </body>
</html>
