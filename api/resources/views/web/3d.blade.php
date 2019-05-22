<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Material Kit PRO by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="./assets/css/material-kit.css?v=2.1.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="./assets/demo/demo.css" rel="stylesheet" />
    <link href="./assets/demo/vertical-nav.css" rel="stylesheet" />
</head>
<body>
<div class="header-3">
    <nav class="navbar navbar-transparent navbar-absolute navbar-expand-lg">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-translate">
                <a class="navbar-brand logo-big" href="#">
                    <img src="./assets/img/logo.png" alt="ХНЕУ">
                    ХНЕУ
                </a>
                <button type="button" class="ml-auto navbar-toggler" data-toggle="collapse" data-target="#navigation-example3">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navigation-example3">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{url('home')}}" class="nav-link">
                            Портал ХНЕУ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('3d')}}" class="nav-link">
                            3D тур
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('blog')}}" class="nav-link">
                            Блог
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('shop')}}" class="nav-link">
                            Магазин
                        </a>
                    </li>
                    <li class="button-container nav-item iframe-extern">
                        <a href="./amin/404.html" target="_blank" class="btn  btn-primary   btn-round btn-block">
                            <i class="material-icons">account_circle</i> &nbsp;&nbsp;Личный кабинет
                            <div class="ripple-container"></div></a>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="#pablo" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="true">
                            <i class="material-icons">settings</i>
                            <b class="caret"></b>
                            <div class="ripple-container"></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#pablo" class="dropdown-item">Русский</a>
                            <a href="#pablo" class="dropdown-item">English</a>
                            <a href="#pablo" class="dropdown-item">French</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<div class="page-header header-filter" style="background-image: url('./assets/img/bg12.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title">3D TOUR</h1>
                <h4>
                    Take a tour of the university right now.
                </h4>
                <br>
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-lg">
                    <i class="fa fa-ticket"></i> Order Now
                </a>
            </div>
            <div class="col-md-5 ml-auto">
                <div class="iframe-container">
                    <!--                            <iframe height="250" src="https://www.youtube.com/embed/IN6QnLpVEPI" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen=""></iframe>-->

                    <iframe height="250" src="https://www.youtube.com/embed/cfiac7aDinY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<!--   Core JS Files   -->
<script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="./assets/js/plugins/moment.min.js"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="./assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="./assets/js/plugins/bootstrap-tagsinput.js"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="./assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="./assets/js/plugins/jasny-bootstrap.min.js" type="text/javascript"></script>
<!--	Plugin for Small Gallery in Product Page -->
<script src="./assets/js/plugins/jquery.flexisel.js" type="text/javascript"></script>
<!-- Plugins for presentation and navigation  -->
<script src="./assets/demo/modernizr.js" type="text/javascript"></script>
<script src="./assets/demo/vertical-nav.js" type="text/javascript"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Js With initialisations For Demo Purpose, Don't Include it in Your Project -->
<script src="./assets/demo/demo.js" type="text/javascript"></script>
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/material-kit.js?v=2.1.1" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        //init DateTimePickers
        materialKit.initFormExtendedDatetimepickers();

        // Sliders Init
        materialKit.initSliders();
    });
</script>

</body>
</html>