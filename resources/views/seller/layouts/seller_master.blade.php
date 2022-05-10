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



    <link href="{{asset('panel/lib/rickshaw/rickshaw.min.css')}}" rel="stylesheet">
    <link href="{{asset('panel/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('panel/lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
    <link href="{{asset('panel/lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link href="{{asset('panel/lib/highlightjs/github.css')}}" rel="stylesheet">
    <link href="{{asset('panel/lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('panel/lib/select2/css/select2.min.css')}}" rel="stylesheet">




    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('panel/css/starlight.css')}}">
  </head>

  <body>



    <!-- ########## START: HEAD PANEL ########## -->

    <!-- ########## END: HEAD PANEL ########## -->
    @include('seller.sections.header')
    <!-- ########## START: RIGHT PANEL ########## -->
    @include ('seller.sections.right_panel')
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->

    <div class="sl-mainpanel">

        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" style="text-align:center; text-transform: uppercase;" role="alert">
            <strong style="text-align:center"> {{session::get('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
          @if(Session::has('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert" style="text-align:center; text-transform: uppercase;">
              <strong> {{session::get('error')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
      @yield('seller')

      @include('seller.sections.footer')
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


    <script src="{{asset('panel/lib/jquery/jquery.js')}}"></script>

    <script src="{{asset('panel/lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('panel/lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('panel/lib/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{asset('panel/js/ResizeSensor.js')}}"></script>
    <script src="{{asset('panel/js/dashboard.js')}}"></script>
    <script src="{{asset('panel/lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('panel/lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('panel/lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('panel/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{asset('panel/lib/highlightjs/highlight.pack.js')}}"></script>
    <script src="{{asset('panel/lib/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('panel/lib/datatables-responsive/dataTables.responsive.js')}}"></script>
    <script src="{{asset('panel/lib/select2/js/select2.min.js')}}"></script>

    <script src="{{asset('panel/js/starlight.js')}}"></script>
    <script src="{{asset('panel/lib/d3/d3.js')}}"></script>
    <script src="{{asset('panel/lib/rickshaw/rickshaw.min.js')}}"></script>
    <script src="{{asset('panel/lib/chart.js/Chart.js')}}"></script>
    <script src="{{asset('panel/lib/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('panel/lib/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('panel/lib/Flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('panel/lib/flot-spline/jquery.flot.spline.js')}}"></script>
    <script src="{{asset('panel/lib/jquery.sparkline.bower/jquery.sparkline.min.js')}}"></script>
    <script>

      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>
  </body>
</html>

