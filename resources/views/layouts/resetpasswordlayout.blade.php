<!DOCTYPE html>
<html lang="en">

<head>
    <title tkey="reset_password__titulo">Appcess - FCB - Reset de contrasenya</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <!-- Favicon icon -->

    <link rel="icon" href="{{ asset ("files/assets/images/favicon.ico")}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset ("files/bower_components/bootstrap/css/bootstrap.min.css")}}">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{ asset ("files/assets/pages/waves/css/waves.min.css")}}" type="text/css" media="all">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset ("files/assets/icon/feather/css/feather.css")}}
    <link rel="stylesheet" type="text/css" href="{{ asset ("files/assets/css/font-awesome-n.min.css")}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset ("files/assets/css/style.css")}}">
    <link rel="stylesheet" type="text/css" href="{{ asset ("files/assets/css/pages.css")}}">

    <style>
        html, section {
            background-color: #171f32;
        }
    </style>    

       {{-- Definiciones propias de la aplicacion --}}
       <script src="{{asset('js/lang/appcess-es.js')}}"></script>


       {{-- Definiciones propias de la aplicacion --}}
       <script src="{{asset('js/appcess-defs.js')}}"></script>
   

</head>

<body themebg-pattern="theme1">
    <section class="login-block">
        <!-- Container-fluid starts -->
        @yield('content')
        <!-- end of container-fluid -->
    </section>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="../files/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="../files/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="../files/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset ("files/bower_components/jquery/js/jquery.min.js")}}"></script>
    <script type="text/javascript" src="{{ asset ("files/bower_components/jquery-ui/js/jquery-ui.min.js")}}"></script>
    <script type="text/javascript" src="{{ asset ("files/bower_components/popper.js/js/popper.min.js")}}"></script>
    <script type="text/javascript" src="{{ asset ("files/bower_components/bootstrap/js/bootstrap.min.js")}}"></script>
    <script type="text/javascript" src="{{ asset ("files/assets/js/pace.min.js")}}"></script>
    <!-- waves js -->
    <script src="{{ asset ("files/assets/pages/waves/js/waves.min.js")}}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset ("files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js")}}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset ("files/bower_components/modernizr/js/modernizr.js")}}"></script>
    <script type="text/javascript" src="{{ asset ("files/bower_components/modernizr/js/css-scrollbars.js")}}"></script>
    <script type="text/javascript" src="{{ asset ("files/assets/js/common-pages.js")}}"></script>
</body>
<script>

    $(document).ready(function () {

        updateTranslations()

    })
    // fin document ready


</script>
</html>
