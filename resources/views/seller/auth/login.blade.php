<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Starlight Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="{{asset('panel/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('panel/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('panel/css/starlight.css')}}">
  </head>

  <body id="page-top">


    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">
        <div class="preloader">
            <img src="{{asset('panel/assets/images/img12.gif')}}" alt="">
        </div>

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">starlight <span class="tx-info tx-normal">seller</span></div>
        <div class="tx-center mg-b-60">Professional Admin Template Design</div>
        @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align:center; text-transform: uppercase;">
            <strong>{{session::get('error')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align:center ;text-transform: uppercase;">
            <strong>{{session::get('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          <form action="{{route('seller.login')}} " class="d-block" method="post">
            @csrf
        <div class="form-group">
          <input  type="email" class="form-control"  name="email" value=" " required autocomplete="email" autofocus placeholder="Email Address" required>
        </div><!-- form-group -->
        <div class="form-group">
          <input id="password" type="password" class="form-control"   name="password" required autocomplete="current-password" placeholder="Password" required>

        </div><!-- form-group -->
        <button type="submit" class="btn btn-info btn-block">Sign In</button>
          </form>

      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="{{asset('panel/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('panel/lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('panel/lib/bootstrap/bootstrap.js')}}"></script>

  </body>
</html>
<script>
    $(window).load(function() {
    $('.preloader').hide();
  });
    </script>

{{-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="{{asset('panel/assets/images/favicon.png')}}" >
        <!--Page title-->
        <title>Admin easy Learning</title>
        <!--bootstrap-->
        <link rel="stylesheet" href="{{asset('panel/assets/css/bootstrap.min.css')}}">
        <!--font awesome-->
        <link rel="stylesheet" href="{{asset('panel/assets/css/all.min.css')}}">
        <!-- metis menu -->
        <link rel="stylesheet" href="{{asset('panel/assets/plugins/metismenu-3.0.4/assets/css/metisMenu.min.css')}}">
        <link rel="stylesheet" href="{{asset('panel/assets/plugins/metismenu-3.0.4/assets/css/mm-vertical-hover.css')}}">
        <!-- chart -->

        <!-- <link rel="stylesheet" href="assets/plugins/chartjs-bar-chart/chart.css"> -->
        <!--Custom CSS-->
        <link rel="stylesheet" href="{{asset('panel/assets/css/style.css')}}">
    </head>
    <body id="page-top">
        <!-- preloader -->
        <div class="preloader">
            <img src="{{asset('panel/assets/images/preloader.gif')}}" alt="">
        </div>


        <!-- wrapper -->
          <div class="wrapper without_header_sidebar">
            <!-- contnet wrapper -->
            <div class="content_wrapper">
                    <!-- page content -->
                    <div class="login_page center_container">
                        <div class="center_content">
                            <div class="logo">
                                <img src="{{asset('panel/assets/images/logo.png')}}" alt="" class="img-fluid">
                            </div>

                            @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{session::get('error')}}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              @endif

                            <form action="{{route('admin.login')}} " class="d-block" method="post">
                                @csrf

                                <div class="form-group icon_parent">
                                     <label for="password">Email</label>
         <input id="email" type="email" class="form-control"  name="email" value=" " required autocomplete="email" autofocus placeholder="Email Address" required>
              <span class="icon_soon_bottom_right"><i class="fas fa-envelope"></i></span>

                                </div>
                                <div class="form-group icon_parent">
                                    <label for="password">Password</label>
       <input id="password" type="password" class="form-control"   name="password" required autocomplete="current-password" placeholder="Password" required>

                                    <span class="icon_soon_bottom_right"><i class="fas fa-unlock"></i></span>
                                </div>
                                <div class="form-group">
                                    <label class="chech_container">Remember me
                                        <input type="checkbox" name="remember" id="remember" >
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <a class="registration" href="{{route('admin.register')}} ">Create new account</a><br>
                                    <a href=" " class="text-white">I forgot my password</a>
                                    <button type="submit" class="btn btn-blue">Login</button>
                                </div>
                            </form>
                            <div class="footer">
                               <p>Copyright &copy; 2020 <a href="https://easylearningbd.com/">easy Learning</a>. All rights reserved.</p>
                            </div>

                        </div>
                    </div>
            </div><!--/ content wrapper -->
        </div><!--/ wrapper -->



        <!-- jquery -->
        <script src="{{asset('panel/assets/js/jquery.min.js')}}"></script>
        <!-- popper Min Js -->
        <script src="{{asset('panel/assets/js/popper.min.js')}}"></script>
        <!-- Bootstrap Min Js -->
        <script src="{{asset('panel/assets/js/bootstrap.min.js')}}"></script>
        <!-- Fontawesome-->
        <script src="{{asset('panel/assets/js/all.min.js')}}')}}"></script>
        <!-- metis menu -->
        <script src="{{asset('panel/assets/plugins/metismenu-3.0.4/assets/js/metismenu.js')}}"></script>
        <script src="{{asset('panel/assets/plugins/metismenu-3.0.4/assets/js/mm-vertical-hover.js')}}"></script>
        <!-- nice scroll bar -->
        <script src="{{asset('panel/assets/plugins/scrollbar/jquery.nicescroll.min.js')}}"></script>
        <script src="{{asset('panel/assets/plugins/scrollbar/scroll.active.js')}}"></script>
        <!-- counter -->
        <script src="{{asset('panel/assets/plugins/counter/js/counter.js')}}"></script>
        <!-- chart -->
        <script src="{{asset('panel/assets/plugins/chartjs-bar-chart/Chart.min.js')}}"></script>
        <script src="{{asset('panel/assets/plugins/chartjs-bar-chart/chart.js')}}"></script>
        <!-- pie chart -->
        <script src="{{asset('panel/assets/plugins/pie_chart/chart.loader.js')}}"></script>
        <script src="{{asset('panel/assets/plugins/pie_chart/pie.active.js')}}"></script>


        <!-- Main js -->
        <script src="{{asset('panel/assets/js/main.js')}}"></script>





    </body>
</html> --}}
