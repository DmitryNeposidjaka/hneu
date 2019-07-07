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

    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- Modernizr -->
    <script src="/assets/js/modernizr.js"></script>

</head>

<body class="product-page sidebar-collapse">
    
@include('web.header')

<main class="cd-main-content">
    <div class="page-header" data-parallax="true" filter-color="rose" style="background-image: url('/assets/img/section-bg-5.jpg');">
        <div class="container">
            <div class="row title-row">
                <div class="col-md-4 ml-auto">
                    <!--          <button class="btn btn-white float-right"><i class="material-icons">shopping_cart</i> 0 Items</button>-->
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="main main-raised main-product">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="tab-content">
                            @foreach($product['thumbnails'] as $k => $thumbnail)

                                <div class="tab-pane" id="product-page{{$k}}">
                                    <img src="{{$thumbnail}}">
                                </div>

                            @endforeach
                        </div>
                        <ul class="nav flexi-nav" data-tabs="tabs" id="flexiselDemo{{$k}}">
                            @foreach($product['thumbnails'] as $k => $thumbnail)

                                <li class="nav-item">
                                    <a href="{{$thumbnail}}" class="nav-link" data-toggle="tab">
                                        <img src="{{$thumbnail}}">
                                    </a>
                                </li>

                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <h2 class="title">{{$product['title']}}</h2>
                        <h3 class="main-price">₴{{$product['price']}}</h3>
                        <h3 class="main-price mb-0"><strong>Артикул {{$product['id']}}</strong></h3>
                        <div id="accordion" role="tablist">
                            <div class="card card-collapse">
                                <div class="card-header pt-0 ьк-фгещ" role="tab" id="headingOne">
                                    <h5 class="mb-0">
                                        <p>
                                            {{ implode(', ', array_column($product['categories'], 'name')) }}
                                        </p>
                                    </h5>
                                </div>
                                <div  class="" >
                                    <div class="card-body">
                                        <p>{!! $product['description'] !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <button class="btn btn-rose btn-round"  data-toggle="modal" data-target="#loginModal" style="font-size: 1.5rem;">Заказать &#xA0;<i class="material-icons">shopping_cart</i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="features text-center">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-info">
                                <i class="material-icons">local_shipping</i>
                            </div>
                            <h4 class="info-title">2 Days Delivery </h4>
                            <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">verified_user</i>
                            </div>
                            <h4 class="info-title">Refundable Policy</h4>
                            <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-rose">
                                <i class="material-icons">favorite</i>
                            </div>
                            <h4 class="info-title">Popular Item</h4>
                            <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
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

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-login" role="document">
        <div class="modal-content">
            <div class="card card-signup card-plain">
                <div class="modal-header">
                    <div class="card-header card-header-primary text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
                        <h4 class="card-title">Оформить заказ</h4>
                    </div>
                </div>
                <div class="modal-body">
                    <form class="form" method="" action="">
                        <p class="description text-center">Наш мененжер свяжеться с Вами в течении 5 минут</p>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">face</i>
                      </span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Имя">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">phone</i>
                      </span>
                                    </div>
                                    <input type="tel" class="form-control" placeholder="Телефон">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-center mb-5">
                    <a href="#pablo" class="btn btn-primary" style="font-size: 1.2rem;" data-toggle="modal" data-target="#loginModal">Отправить</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  End Modal -->

<!--   Core JS Files   -->
<script src="/assets/js/core/jquery.min.js" type="text/javascript"></script>
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
<script>
    $(document).ready(function() {
        $("#flexiselDemo1").flexisel({
            visibleItems: 4,
            itemsToScroll: 1,
            animationSpeed: 400,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 3
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 3
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 3
                }
            }
        });
    });
</script>
</body>

</html>
