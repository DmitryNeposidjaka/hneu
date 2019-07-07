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

<body class="blog-posts sidebar-collapse">

@include('web.header')

<main class="cd-main-content">

    <div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('/assets/img/section-bg-6.jpg');">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
                    <h1 class="title">Новости университета</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="main main-raised">

        <div class="section" style="position: relative; top: -24vh">

            <div id="owl-1" class="owl-carousel">
                @foreach($posts['advertising'] as $advert)

                <div class="col-md-12">
                    <div class="card card-plain card-blog">
                        <div class="card-header card-header-image">
                            <a href="{{$advert['web_link']}}">
                                <img class="img img-raised" src="{{$advert['thumbnail']}}" alt="{{$advert['title']}}">
                            </a>
                            <!--                <h4 class="card-title" style="height: 80px">-->
                            <!--                  <a href="blog-post.html">&quot;А У ВАШЕГО ДИПЛОМА ЕСТЬ ОБЛОЖКА ОТ BC_INGEK?</a>-->
                            <!--                </h4>-->
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

        </div>

        <!-- cards -->
        <div id="cards" class="cd-section" style="position: relative; top: -28vh">
            <div class="section-white">
                <!--     *********    BLOG CARDS     *********      -->
                <div class="cards">
                    <div class="container">
                        <div class="title-wrapper">
                            <h2>Новости</h2>
                        </div>
                        <div id="owl-2" class="owl-carousel">
                            @foreach($posts['article'] as $article)

                                <div class="col">
                                    <div class="card card-plain card-blog">
                                        <div class="card-header card-header-image">
                                            <a href="{{$article['web_link']}}">
                                                <img class="img img-raised" src="{{$article['thumbnail']}}">
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h6 class="card-category text-info">{{ implode(', ', array_column($article['categories'], 'name')) }}</h6>
                                            <h4 class="card-title" style="height: 80px">
                                                <a href="{{$article['web_link']}}">{{$advert['title']}}</a>
                                            </h4>
                                            <p class="card-description">
                                                {{ substr($article['description'], 0, 255) . '...'}}
                                                <a href="{{$article['web_link']}}"> читать дальше </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                        <div class="title-wrapper">
                            <h2>Уведомления</h2>
                        </div>
                        <div id="owl-3" class="owl-carousel">
                            @foreach($posts['message'] as $message)

                                <div class="col-lg-12">
                                    <div class="card bg-info">
                                        <div class="card-body">
                                            <h5 class="card-category card-category-social">
                                                {{ implode(', ', array_column($article['categories'], 'name')) }}
                                            </h5>
                                            <h4 class="card-title" style="height: 80px">
                                                <a href="{{$message['web_link']}}">&quot;{{$message['title']}}</a>
                                            </h4>
                                        </div>
                                        <div class="card-footer">
                                            <div class="author">
                                                <a href="{{$message['title']}}">
                                                    <!--                          <img src="/assets/img/faces/avatar.jpg" alt="..." class="avatar img-raised">-->
                                                    <span>{{$message['creator']['fullname']}}</span>
                                                </a>
                                            </div>
                                            <div class="stats ml-auto">
                                                <i class="material-icons">favorite</i> 2.4K
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
                <!--     *********    END BLOG CARDS      *********      -->
            </div>
        </div>
        <!-- end cards -->

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
