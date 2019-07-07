@php
    #var_dump($article)
@endphp
        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Material Kit PRO by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="/assets/css/material-kit.css?v=2.1.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <!--  <link href="/assets/demo/demo.css" rel="stylesheet" />-->
    <!--  <link href="/assets/demo/vertical-nav.css" rel="stylesheet" />-->

    <!--  Owlcarousel  -->
    <link rel="stylesheet" href="/assets/owlcarousel/owl.carousel.min.css">

    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- Modernizr -->
    <script src="/assets/js/modernizr.js"></script>

</head>

<body class="blog-post sidebar-collapse">

@include('web.header')

<main class="cd-main-content">

    <div class="page-header header-filter" data-parallax="true" style="background-image: url('./assets/img/bg5.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h1 class="title">{{$article['title']}}</h1>
                    <!--          <h4>The last 48 hours of my life were total madness. This is what I did.</h4>-->
                    <!--          <br>-->
                    <!--          <a href="#pablo" class="btn btn-rose btn-round btn-lg">-->
                    <!--            <i class="material-icons">format_align_left</i> Read Article-->
                    <!--          </a>-->
                </div>
            </div>
        </div>
    </div>

    <div class="main main-raised" style="padding-bottom: 2em">
        <div class="container">
            <div class="section section-text">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        {{$article['description']}}
                    </div>
                    <div class="section col-md-10 ml-auto mr-auto">
                        <div class="row">
                            @foreach($article['thumbnails'] as $thumbnail)
                                <div class="col-md-4">
                                    <img class="img-raised rounded img-fluid" alt="Raised Image" src="{{$thumbnail}}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-8 ml-auto mr-auto">
                        {!! $article['content'] !!}
                    </div>
                </div>
            </div>
            <div class="section section-blog-info">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6">
                                <a href="#pablo" class="btn btn-google btn-round float-right">
                                    <i class="fa fa-google"></i> 232
                                </a>
                                <a href="#pablo" class="btn btn-twitter btn-round float-right">
                                    <i class="fa fa-twitter"></i> 910
                                </a>
                                <a href="#pablo" class="btn btn-facebook btn-round float-right">
                                    <i class="fa fa-facebook-square"></i> 872
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

</main>



<footer class="footer">
    <div class="container">
        <div class="flex-row">
            <nav>
                <ul>
                    <li>
                        <a href="profile-page.html">
                            Гостевой профиль
                        </a>
                    </li>
                    <li>
                        <a href="profile-page.html">
                            Профиль студента
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, сделано <a href="#">Digital Flat [Bo]</a>
            </div>
        </div>
    </div>
</footer>

<!--   Core JS Files   -->
<script src="/assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="/assets/owlcarousel/owl.carousel.min.js"></script>
<script src="/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="/assets/js/plugin.js"></script>
<script src="/assets/js/plugins/moment.min.js"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="/assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="/assets/js/plugins/bootstrap-tagsinput.js"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="/assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="/assets/js/plugins/jasny-bootstrap.min.js" type="text/javascript"></script>
<!--	Plugin for Small Gallery in Product Page -->
<script src="/assets/js/plugins/jquery.flexisel.js" type="text/javascript"></script>
<!-- Plugins for presentation and navigation  -->
<script src="/assets/demo/modernizr.js" type="text/javascript"></script>
<script src="/assets/demo/vertical-nav.js" type="text/javascript"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Js With initialisations For Demo Purpose, Don't Include it in Your Project -->
<script src="/assets/demo/demo.js" type="text/javascript"></script>
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="/assets/js/material-kit.js?v=2.1.1" type="text/javascript"></script>
</body>

</html>
