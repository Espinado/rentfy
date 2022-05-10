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
    <link href="{{ asset('panel/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('panel/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('panel/css/starlight.css') }}">
</head>

<body id="page-top">


    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">
        <div class="preloader">
            <img src="{{ asset('panel/assets/images/img12.gif') }}" alt="">
        </div>

        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
            <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">{{ $Invitee->name }}</div>
            <div class="tx-center mg-b-60">{{ $Invitee->seller_company->seller_company_name }}
                {{ Config::get('company_legal_status.legal_status.' .$Invitee->seller_company->seller_company_profile->seller_company_legal_country .'.status.' .$Invitee->seller_company->seller_company_legal_status) }}
            </div>
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert"
                    style="text-align:center; text-transform: uppercase;">
                    <strong>{{ session::get('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert"
                    style="text-align:center ;text-transform: uppercase;">
                    <strong>{{ session::get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form action="{{ route('seller.confirmed') }} " class="d-block" method="post">
                @csrf
                <div class="form-group">
                    <input type="password" class="form-control" name="password"
                        autofocus placeholder="Password" required>
                </div><!-- form-group -->
                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required  placeholder="Confirm password" required>
                        <input type="hidden" name="invitee_id" value="{{$Invitee->id}}">
                         <input type="hidden" name="invitee_email" value="{{$Invitee->email}}">
                        <input type="hidden" name="token" value="{{$token}}">

                </div><!-- form-group -->
                <button type="submit" class="btn btn-info btn-block">Sign In</button>
            </form>

        </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="{{ asset('panel/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('panel/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('panel/lib/bootstrap/bootstrap.js') }}"></script>

</body>

</html>
<script>
    $(window).load(function() {
        $('.preloader').hide();
    });
</script>
