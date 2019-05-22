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

<body class="ecommerce-page sidebar-collapse">
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
                    <a href="shopping-cart.html" target="_blank" class="btn  btn-rose   btn-round btn-block">
                        <i class="material-icons">shopping_cart</i> Buy Now
                        <div class="ripple-container"></div>
                    </a>
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

<div class="page-header header-filter header-small" data-parallax="true" style="background-image: url('./assets/img/examples/clark-street-merc.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ml-auto mr-auto text-center">
                <div class="brand">
                    <h1 class="title">Ecommerce Page!</h1>
                    <h4>Free global delivery for all products. Use coupon
                        <b>25summer</b> for an extra 25% Off</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main main-raised">
    <div class="section">
        <div class="container">
            <h2 class="section-title">Latest Offers</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-product card-plain">
                        <div class="card-header card-header-image">
                            <a href="product-page.html">
                                <img src="./assets/img/examples/gucci.jpg" alt="">
                            </a>
                        </div>
                        <div class="card-body text-center">
                            <h4 class="card-title">
                                <a href="#pablo">Gucci</a>
                            </h4>
                            <p class="card-description">The structured shoulders and sleek detailing ensure a sharp silhouette. Team it with a silk pocket square and leather loafers.</p>
                        </div>
                        <div class="card-footer">
                            <div class="price-container">
                                <span class="price price-old"> €1,430</span>
                                <span class="price price-new"> €743</span>
                            </div>
                            <div class="stats ml-auto">
                                <button type="button" rel="tooltip" title="" class="btn btn-just-icon btn-link btn-rose" data-original-title="Saved to Wishlist">
                                    <i class="material-icons">favorite</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-product card-plain">
                        <div class="card-header card-header-image">
                            <a href="product-page.html">
                                <img src="./assets/img/examples/dolce.jpg" alt="">
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Dolce &amp; Gabbana</h4>
                            <p class="card-description">The structured shoulders and sleek detailing ensure a sharp silhouette. Team it with a silk pocket square and leather loafers.</p>
                        </div>
                        <div class="card-footer">
                            <div class="price-container">
                                <span class="price price-old"> €1,430</span>
                                <span class="price price-new">€743</span>
                            </div>
                            <div class="stats ml-auto">
                                <button type="button" rel="tooltip" title="" class="btn btn-just-icon btn-link btn-rose" data-original-title="Saved to Wishlist">
                                    <i class="material-icons">favorite</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-product card-plain">
                        <div class="card-header card-header-image">
                            <a href="product-page.html">
                                <img src="./assets/img/examples/tom-ford.jpg" alt="">
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Dolce &amp; Gabbana</h4>
                            <p class="card-description">The structured shoulders and sleek detailing ensure a sharp silhouette. Team it with a silk pocket square and leather loafers.</p>
                        </div>
                        <div class="card-footer">
                            <div class="price-container">
                                <span class="price price-old"> €1,430</span>
                                <span class="price price-new">€743</span>
                            </div>
                            <div class="stats ml-auto">
                                <button type="button" rel="tooltip" title="" class="btn btn-just-icon btn-link btn-rose" data-original-title="Saved to Wishlist">
                                    <i class="material-icons">favorite</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section -->
    <div class="section">
        <div class="container">
            <h2 class="section-title">Find what you need</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-refine card-plain card-rose">
                        <div class="card-body">
                            <h4 class="card-title">
                                Refine
                                <button class="btn btn-default btn-fab btn-fab-mini btn-link pull-right" rel="tooltip" title="" data-original-title="Reset Filter">
                                    <i class="material-icons">cached</i>
                                </button>
                            </h4>
                            <div id="accordion" role="tablist">
                                <div class="card card-collapse">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Price Range
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="card-body card-refine">
                                            <span id="price-left" class="price-left pull-left" data-currency="€">€42</span>
                                            <span id="price-right" class="price-right pull-right" data-currency="€">€880</span>
                                            <div class="clearfix"></div>
                                            <div id="sliderRefine" class="slider slider-rose noUi-target noUi-ltr noUi-horizontal"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-collapse">
                                    <div class="card-header" role="tab" id="headingTwo">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Clothing
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="card-body">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value="" checked> Blazers
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Casual Shirts
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Formal Shirts
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Jeans
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Polos
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Pyjamas
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Shorts
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Trousers
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-collapse">
                                    <div class="card-header" role="tab" id="headingThree">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                Designer
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse show" role="tabpanel" aria-labelledby="headingThree">
                                        <div class="card-body">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value="" checked> All
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Polo Ralph Lauren
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Wooyoungmi
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Alexander McQueen
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Tom Ford
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> AMI
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Berena
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Thom Sweeney
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Burberry Prorsum
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Calvin Klein
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Kingsman
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Club Monaco
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Dolce &amp; Gabbana
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Gucci
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Biglioli
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Lanvin
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Loro Piana
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Massimo Alba
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-collapse">
                                    <div class="card-header" role="tab" id="headingFour">
                                        <h5 class="mb-0">
                                            <a class="collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                Colour
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
                                        <div class="card-body">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value="" checked> All
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Black
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Blue
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Brown
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Gray
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Green
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Neutrals
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" value=""> Purple
                                                    <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-product card-plain no-shadow" data-colored-shadow="false">
                                <div class="card-header card-header-image">
                                    <a href="#">
                                        <img src="./assets/img/examples/suit-1.jpg" alt="...">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <a href="#">
                                        <h4 class="card-title">Polo Ralph Lauren</h4>
                                    </a>
                                    <p class="description">
                                        Impeccably tailored in Italy from lightweight navy wool.
                                    </p>
                                </div>
                                <div class="card-footer justify-content-between">
                                    <div class="price-container">
                                        <span class="price"> € 800</span>
                                    </div>
                                    <button class="btn btn-rose btn-link btn-fab btn-fab-mini btn-round pull-right" rel="tooltip" title="" data-placement="left" data-original-title="Remove from wishlist">
                                        <i class="material-icons">favorite</i>
                                    </button>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <div class="col-md-4">
                            <div class="card card-product card-plain no-shadow" data-colored-shadow="false">
                                <div class="card-header card-header-image">
                                    <a href="#">
                                        <img src="./assets/img/examples/suit-2.jpg" alt="...">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <a href="#">
                                        <h4 class="card-title">Wooyoungmi</h4>
                                    </a>
                                    <p class="description">
                                        Dark-grey slub wool, pintucked notch lapels.
                                    </p>
                                </div>
                                <div class="card-footer justify-content-between">
                                    <div class="price-container">
                                        <span class="price">€ 555</span>
                                    </div>
                                    <button class="btn btn-rose btn-link btn-fab btn-fab-mini btn-round pull-right" rel="tooltip" title="" data-placement="left" data-original-title="Add to wishlist">
                                        <i class="material-icons">favorite_border</i>
                                    </button>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <div class="col-md-4">
                            <div class="card card-product card-plain no-shadow" data-colored-shadow="false">
                                <div class="card-header card-header-image">
                                    <a href="#">
                                        <img src="./assets/img/examples/suit-3.jpg" alt="...">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <a href="#">
                                        <h4 class="card-title">Tom Ford</h4>
                                    </a>
                                    <p class="description">
                                        Immaculate tailoring is TOM FORD's forte.
                                    </p>
                                </div>
                                <div class="card-footer justify-content-between">
                                    <div class="price-container">
                                        <span class="price"> € 879</span>
                                    </div>
                                    <button class="btn btn-rose btn-link btn-fab btn-fab-mini btn-round pull-right" rel="tooltip" title="" data-placement="left" data-original-title="Add to wishlist">
                                        <i class="material-icons">favorite_border</i>
                                    </button>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <div class="col-md-4">
                            <div class="card card-product card-plain no-shadow" data-colored-shadow="false">
                                <div class="card-header card-header-image">
                                    <a href="#">
                                        <img src="./assets/img/examples/suit-4.jpg" alt="...">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <a href="#">
                                        <h4 class="card-title">Thom Sweeney</h4>
                                    </a>
                                    <p class="description">
                                        It's made from lightweight grey wool woven.
                                    </p>
                                </div>
                                <div class="card-footer justify-content-between">
                                    <div class="price-container">
                                        <span class="price"> € 680</span>
                                    </div>
                                    <button class="btn btn-rose btn-link btn-fab btn-fab-mini btn-round pull-right" rel="tooltip" title="" data-placement="left" data-original-title="Add to wishlist">
                                        <i class="material-icons">favorite_border</i>
                                    </button>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <div class="col-md-4">
                            <div class="card card-product card-plain no-shadow" data-colored-shadow="false">
                                <div class="card-header card-header-image">
                                    <a href="#">
                                        <img src="./assets/img/examples/suit-5.jpg" alt="...">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <a href="#">
                                        <h4 class="card-title">Kingsman</h4>
                                    </a>
                                    <p class="description">
                                        Crafted from khaki cotton and fully canvassed.
                                    </p>
                                </div>
                                <div class="card-footer justify-content-between">
                                    <div class="price-container">
                                        <span class="price"> € 725</span>
                                    </div>
                                    <button class="btn btn-rose btn-link btn-fab btn-fab-mini btn-round pull-right" rel="tooltip" title="" data-placement="left" data-original-title="Remove from wishlist">
                                        <i class="material-icons">favorite</i>
                                    </button>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <div class="col-md-4">
                            <div class="card card-product card-plain no-shadow" data-colored-shadow="false">
                                <div class="card-header card-header-image">
                                    <a href="#">
                                        <img src="./assets/img/examples/suit-6.jpg" alt="...">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <a href="#">
                                        <h4 class="card-title">Boglioli</h4>
                                    </a>
                                    <p class="description">
                                        Masterfully crafted in Northern Italy.
                                    </p>
                                </div>
                                <div class="card-footer justify-content-between">
                                    <div class="price-container">
                                        <span class="price">€ 699</span>
                                    </div>
                                    <button class="btn btn-rose btn-link btn-fab btn-fab-mini btn-round pull-right" rel="tooltip" title="" data-placement="left" data-original-title="Add to wishlist">
                                        <i class="material-icons">favorite_border</i>
                                    </button>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <div class="col-md-3 ml-auto mr-auto">
                            <button rel="tooltip" class="btn btn-rose btn-round" data-original-title="" title="">Load more...</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <h2 class="section-title">News in fashion</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-background" style="background-image: url(./assets/img/examples/color1.jpg)">
                        <div class="card-body">
                            <h6 class="card-category text-info">Productivy Apps</h6>
                            <a href="#pablo">
                                <h3 class="card-title">The best trends in fashion 2017</h3>
                            </a>
                            <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                            </p>
                            <a href="#pablo" class="btn btn-white btn-round">
                                <i class="material-icons">subject</i> Read
                            </a>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <div class="col-md-4">
                    <div class="card card-background" style="background-image: url(./assets/img/examples/color3.jpg)">
                        <div class="card-body">
                            <h6 class="card-category text-info">Fashion News</h6>
                            <h3 class="card-title">Kanye joins the Yeezy team at Adidas</h3>
                            <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                            </p>
                            <a href="#pablo" class="btn btn-white btn-round">
                                <i class="material-icons">subject</i> Read
                            </a>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <div class="col-md-4">
                    <div class="card card-background" style="background-image: url(./assets/img/examples/color2.jpg)">
                        <div class="card-body">
                            <h6 class="card-category text-info">Productivy Apps</h6>
                            <a href="#pablo">
                                <h3 class="card-title">Learn how to use the new colors of 2017</h3>
                            </a>
                            <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                            </p>
                            <a href="#pablo" class="btn btn-white btn-round">
                                <i class="material-icons">subject</i> Read
                            </a>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-background" style="background-image: url(./assets/img/dg3.jpg)">
                        <div class="card-body">
                            <h6 class="card-category text-info">Tutorials</h6>
                            <a href="#pablo">
                                <h3 class="card-title">Trending colors of 2017</h3>
                            </a>
                            <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                            </p>
                            <a href="#pablo" class="btn btn-white btn-round">
                                <i class="material-icons">subject</i> Read
                            </a>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-background" style="background-image: url(./assets/img/dg1.jpg)">
                        <div class="card-body">
                            <h6 class="card-category text-info">Productivy Style</h6>
                            <a href="#pablo">
                                <h3 class="card-title">Fashion &amp; Style 2017</h3>
                            </a>
                            <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                            </p>
                            <a href="#pablo" class="btn btn-white btn-round">
                                <i class="material-icons">subject</i> read
                            </a>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
        </div>
    </div>
    <!-- section -->
</div>
<!-- end-main-raised -->

<!--     *********    BIG WHITE FOOTER V2     *********      -->
<footer class="footer footer-big">
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-md-3">
                    <a href="#pablo">
                        <h5>Material Kit PRO</h5>
                    </a>
                    <p>Probably the best UI Kit in the world! We know you&apos;ve been waiting for it, so don&apos;t be shy!</p>
                </div>
                <div class="col-md-2">
                    <h5>About</h5>
                    <ul class="links-vertical">
                        <li>
                            <a href="#pablo">
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Presentation
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Contact Us
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5>Market</h5>
                    <ul class="links-vertical">
                        <li>
                            <a href="#pablo">
                                Sales FAQ
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                How to Register
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Sell Goods
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Receive Payment
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Transactions Issues
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5>Legal</h5>
                    <ul class="links-vertical">
                        <li>
                            <a href="#pablo">
                                Transactions FAQ
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Terms &amp; Conditions
                            </a>
                        </li>
                        <li>
                            <a href="#pablo">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Subscribe to Newsletter</h5>
                    <p>
                        Join our newsletter and get news in your inbox every week! We hate spam too, so no worries about this.
                    </p>
                    <form class="form form-newsletter" method="" action="">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Your Email...">
                        </div>
                        <button type="button" class="btn btn-primary btn-just-icon" name="button">
                            <i class="material-icons">mail</i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <ul class="social-buttons">
            <li>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-twitter">
                    <i class="fa fa-twitter"></i>
                </a>
            </li>
            <li>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-facebook">
                    <i class="fa fa-facebook-square"></i>
                </a>
            </li>
            <li>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-dribbble">
                    <i class="fa fa-dribbble"></i>
                </a>
            </li>
            <li>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-google">
                    <i class="fa fa-google-plus"></i>
                </a>
            </li>
            <li>
                <a href="#pablo" class="btn btn-just-icon btn-link btn-youtube">
                    <i class="fa fa-youtube-play"></i>
                </a>
            </li>
        </ul>
        <div class="copyright pull-center">
            Copyright &#xA9;
            <script>
                document.write(new Date().getFullYear())
            </script> Creative Tim All Rights Reserved.
        </div>
    </div>
</footer>
<!--     *********   END BIG WHITE FOOTER v2     *********      -->

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
        var slider2 = document.getElementById('sliderRefine');

        noUiSlider.create(slider2, {
            start: [101, 790],
            connect: true,
            range: {
                'min': [30],
                'max': [900]
            }
        });

        var limitFieldMin = document.getElementById('price-left');
        var limitFieldMax = document.getElementById('price-right');

        slider2.noUiSlider.on('update', function(values, handle) {
            if (handle) {
                limitFieldMax.innerHTML = $('#price-right').data('currency') + Math.round(values[handle]);
            } else {
                limitFieldMin.innerHTML = $('#price-left').data('currency') + Math.round(values[handle]);
            }
        });
    });
</script>
</body>

</html>