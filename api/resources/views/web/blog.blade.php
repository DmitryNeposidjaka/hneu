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
    <link href="/assets/demo/demo.css" rel="stylesheet" />
    <link href="/assets/demo/vertical-nav.css" rel="stylesheet" />

    <!--  Owlcarousel  -->
    <link rel="stylesheet" href="/assets/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">

</head>

<body class="blog-posts sidebar-collapse">
<nav class="navbar navbar-transparent navbar-absolute navbar-expand-lg">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-translate">
            <a class="navbar-brand logo-big" href="#">
                <img src="/assets/img/logo.png" alt="ХНЕУ">
                ХНЕУ
            </a>
            <button tpe="button" class="ml-auto navbar-toggler" data-toggle="collapse" data-target="#navigation-example3">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navigation-example3">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{url(app()->getLocale().'/home')}}" class="nav-link">
                        Портал ХНЕУ
                    </a>
                </li>
                <li class="nav-item">
                    <a href="Introductory-company.html" class="nav-link">
                        Поступление
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url(app()->getLocale().'/3d')}}" class="nav-link">
                        3D тур
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url(app()->getLocale().'/blog')}}" class="nav-link">
                        Блог
                    </a>
                </li>
                <li class="nav-item">
                    <a href="blog-posts.html" class="nav-link">
                        Тесты
                    </a>
                </li>
                <li class="nav-item">
                    <a href="traning.html" class="nav-link">
                        Подготовка до ЗНО
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url(app()->getLocale().'/shop')}}" class="nav-link">
                        Магазин
                    </a>
                </li>
                <li class="button-container nav-item iframe-extern">
                    <a href="/amin/404.html" target="_blank" class="btn  btn-primary   btn-round btn-block">
                        <i class="material-icons">account_circle</i> &nbsp;&nbsp;Личный кабинет
                        <div class="ripple-container"></div>
                    </a>
                </li>
                <li class="dropdown nav-item">
                    <a href="#pablo" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="true" style="display: flex;align-items: center">
                        <i class="material-icons">g_translate</i> Русский
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

<div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('/assets/img/bg10.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto text-center">
                <h2 class="title">Новости университета</h2>
            </div>
        </div>
    </div>
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section" style="position: relative; top: -24vh">

            <div id="owl-1" class="owl-carousel">
                @if(isset($posts['advertising']))
                @foreach($posts['advertising'] as $model)
                <div class="col-md-12">
                    <div class="card card-plain card-blog">
                        <div class="card-header card-header-image">
                            <a href="{{url(app()->getLocale().'/blog/advertising/'.$model['link'])}}">
                                <img class="img img-raised" src="{{$model['thumbnail']}}">
                            </a>
                            <h4 class="card-title" style="height: 80px">
                                <a href="{{url(app()->getLocale().'/blog/advertising/'.$model['link'])}}">{{$model['title']}}</a>
                            </h4>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>

    </div>

    <!-- cards -->
    <div id="cards" class="cd-section" style="position: relative; top: -28vh">
        <div class="section-white">
            <!--     *********    BLOG CARDS     *********      -->
            <div class="cards">
                <div class="container">
                    <div class="title">
                        <h2>Новости</h2>
                    </div>
                    <div id="owl-2" class="owl-carousel">
                    @if(isset($posts['article']))
                    @foreach($posts['article'] as $model)
                            <div class="col">
                                <div class="card card-plain card-blog">
                                    <div class="card-header card-header-image">
                                        <a href="{{url(app()->getLocale().'/blog/article/'.$model['link'])}}">
                                            <img class="img img-raised" src="{{$model['thumbnail']}}">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-category text-info">{{ implode(', ', array_column($model['categories'], 'name')) }}</h6>
                                        <h4 class="card-title" style="height: 80px">
                                            <a href="#pablo">{{$model['title']}}</a>
                                        </h4>
                                        <p class="card-description">
                                            {{$model['description']}}
                                            <a href="{{url(app()->getLocale().'/blog/article/'.$model['link'])}}"> читать дальше </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    @endif
                    </div>
                    <div class="title">
                        <h2>Увидомления</h2>
                    </div>
                    <div id="owl-3" class="owl-carousel">
                        @if(isset($posts['message']))
                        @foreach($posts['message'] as $model)
                            <div class="col-lg-12">
                                <div class="card bg-info">
                                    <div class="card-body">
                                        <h5 class="card-category card-category-social">
                                            {{ implode(', ', array_column($model['categories'], 'name')) }}
                                        </h5>
                                        <h4 class="card-title" style="height: 80px">
                                            <a href="{{url(app()->getLocale().'/blog/message/'.$model['link'])}}">{{$model['title']}}</a>
                                        </h4>
                                    </div>
                                    <div class="card-footer">
                                        <div class="author">
                                            <a href="{{url(app()->getLocale().'/blog/message/'.$model['link'])}}">
                                                <!--                          <img src="/assets/img/faces/avatar.jpg" alt="..." class="avatar img-raised">-->
                                                <span>{{$model['creator']['fullname']}}</span>
                                            </a>
                                        </div>
                                        <div class="stats ml-auto">
                                            <i class="material-icons">favorite</i> 2.4K
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <!--     *********    END BLOG CARDS      *********      -->
        </div>
    </div>
    <!-- end cards -->

</div>

<footer class="footer">
    <div class="container">
        <nav class="float-left">
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
        <div class="copyright float-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, сделано <a href="#">Digital Flat [Bo]</a>
        </div>
    </div>
</footer>

<!--   Core JS Files   -->
<script src="/assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="/assets/owlcarousel/owl.carousel.min.js"></script>
<script src="/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="/assets/js/plugins/moment.min.js"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<!--  <script src="/assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>-->
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<!--  <script src="/assets/js/plugins/nouislider.min.js" type="text/javascript"></script>-->
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
<!--  <script src="/assets/demo/modernizr.js" type="text/javascript"></script>-->
<!--  <script src="/assets/demo/vertical-nav.js" type="text/javascript"></script>-->
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Js With initialisations For Demo Purpose, Don't Include it in Your Project -->
<!--  <script src="/assets/demo/demo.js" type="text/javascript"></script>-->
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="/assets/js/material-kit.js?v=2.1.1" type="text/javascript"></script>

<script src="/assets/js/plugin.js"></script>
</body>

</html>