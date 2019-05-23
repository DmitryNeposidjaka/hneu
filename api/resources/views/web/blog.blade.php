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
                    <a href="{{url(app()->getLocale().'/home')}}" class="nav-link">
                        Портал ХНЕУ
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
                    <a href="{{url(app()->getLocale().'/shop')}}" class="nav-link">
                        Магазин
                    </a>
                </li>
                <li class="button-container nav-item iframe-extern">
                    <a href="/amin/404.html" target="_blank" class="btn  btn-primary   btn-round btn-block">
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
                        @foreach(config('app.locales') as $locale)
                            <a href="{{url("{$locale}/blog")}}" class="dropdown-item">{{$locale}}</a>
                        @endforeach
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
                <h2 class="title">Latest university news.</h2>
            </div>
        </div>
    </div>
</div>
<div class="main main-raised">
    <div class="container">

        <div class="section">
            @foreach(array_chunk($posts, 3) as $group)
                <div class="row">
                    @foreach($group as $post)
                        <div class="col-md-4">
                            <div class="card card-plain card-blog">
                                <div class="card-header card-header-image">
                                    <a href="blog-post.html">
                                        <img class="img img-raised" src="{{$post['thumbnail']}}">
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-category text-info">{{implode(', ', array_column($post['categories'], 'name'))}}</h6>
                                    <h4 class="card-title">
                                        <a href="#pablo">{{$post['title']}}</a>
                                    </h4>
                                    <p class="card-description">
                                        {{$post['description']}}
                                        <a href="{{url(app()->getLocale().'/blog/article/'.$post['link'])}}"> Read More </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        <div class="section">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-plain card-blog">
                        <div class="card-header card-header-image">
                            <a href="blog-post.html">
                                <img class="img img-raised" src="/assets/img/bg5.jpg">
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-info">Enterprise</h6>
                            <h4 class="card-title">
                                <a href="#pablo">Autodesk looks to future of 3D printing with Project Escher</a>
                            </h4>
                            <p class="card-description">
                                Like so many organizations these days, Autodesk is a company in transition. It was until recently a traditional boxed software company selling licenses.
                                <a href="#pablo"> Read More </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-plain card-blog">
                        <div class="card-header card-header-image">
                            <a href="blog-post.html">
                                <img class="img img-raised" src="/assets/img/examples/blog5.jpg">
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-success">
                                Startups
                            </h6>
                            <h4 class="card-title">
                                <a href="#pablo">Lyft launching cross-platform service this week</a>
                            </h4>
                            <p class="card-description">
                                Like so many organizations these days, Autodesk is a company in transition. It was until recently a traditional boxed software company selling licenses.
                                <a href="#pablo"> Read More </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-plain card-blog">
                        <div class="card-header card-header-image">
                            <a href="blog-post.html">
                                <img class="img img-raised" src="/assets/img/examples/blog6.jpg">
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-danger">
                                <i class="material-icons">trending_up</i> Enterprise
                            </h6>
                            <h4 class="card-title">
                                <a href="#pablo">6 insights into the French Fashion landscape</a>
                            </h4>
                            <p class="card-description">
                                Like so many organizations these days, Autodesk is a company in transition. It was until recently a traditional boxed software company selling licenses.
                                <a href="#pablo"> Read More </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-plain card-blog">
                        <div class="card-header card-header-image">
                            <a href="blog-post.html">
                                <img class="img img-raised" src="/assets/img/bg5.jpg">
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-info">Enterprise</h6>
                            <h4 class="card-title">
                                <a href="#pablo">Autodesk looks to future of 3D printing with Project Escher</a>
                            </h4>
                            <p class="card-description">
                                Like so many organizations these days, Autodesk is a company in transition. It was until recently a traditional boxed software company selling licenses.
                                <a href="#pablo"> Read More </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-plain card-blog">
                        <div class="card-header card-header-image">
                            <a href="blog-post.html">
                                <img class="img img-raised" src="/assets/img/examples/blog5.jpg">
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-success">
                                Startups
                            </h6>
                            <h4 class="card-title">
                                <a href="#pablo">Lyft launching cross-platform service this week</a>
                            </h4>
                            <p class="card-description">
                                Like so many organizations these days, Autodesk is a company in transition. It was until recently a traditional boxed software company selling licenses.
                                <a href="#pablo"> Read More </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-plain card-blog">
                        <div class="card-header card-header-image">
                            <a href="blog-post.html">
                                <img class="img img-raised" src="/assets/img/examples/blog6.jpg">
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-danger">
                                <i class="material-icons">trending_up</i> Enterprise
                            </h6>
                            <h4 class="card-title">
                                <a href="#pablo">6 insights into the French Fashion landscape</a>
                            </h4>
                            <p class="card-description">
                                Like so many organizations these days, Autodesk is a company in transition. It was until recently a traditional boxed software company selling licenses.
                                <a href="#pablo"> Read More </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-plain card-blog">
                        <div class="card-header card-header-image">
                            <a href="blog-post.html">
                                <img class="img img-raised" src="/assets/img/bg5.jpg">
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-info">Enterprise</h6>
                            <h4 class="card-title">
                                <a href="#pablo">Autodesk looks to future of 3D printing with Project Escher</a>
                            </h4>
                            <p class="card-description">
                                Like so many organizations these days, Autodesk is a company in transition. It was until recently a traditional boxed software company selling licenses.
                                <a href="#pablo"> Read More </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-plain card-blog">
                        <div class="card-header card-header-image">
                            <a href="blog-post.html">
                                <img class="img img-raised" src="/assets/img/examples/blog5.jpg">
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-success">
                                Startups
                            </h6>
                            <h4 class="card-title">
                                <a href="#pablo">Lyft launching cross-platform service this week</a>
                            </h4>
                            <p class="card-description">
                                Like so many organizations these days, Autodesk is a company in transition. It was until recently a traditional boxed software company selling licenses.
                                <a href="#pablo"> Read More </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-plain card-blog">
                        <div class="card-header card-header-image">
                            <a href="blog-post.html">
                                <img class="img img-raised" src="/assets/img/examples/blog6.jpg">
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="card-category text-danger">
                                <i class="material-icons">trending_up</i> Enterprise
                            </h6>
                            <h4 class="card-title">
                                <a href="#pablo">6 insights into the French Fashion landscape</a>
                            </h4>
                            <p class="card-description">
                                Like so many organizations these days, Autodesk is a company in transition. It was until recently a traditional boxed software company selling licenses.
                                <a href="#pablo"> Read More </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- cards -->
        <div id="cards" class="cd-section">
            <div class="section-white">
                <!--     *********    BLOG CARDS     *********      -->
                <div class="cards">
                    <div class="container">
                        <div class="title">
                            <h2>Cards</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="card card-blog">
                                    <div class="card-header card-header-image">
                                        <a href="blog-post.html">
                                            <img class="img" src="/assets/img/examples/card-blog1.jpg">
                                            <div class="card-title">
                                                This Summer Will be Awesome
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-category text-info">Fashion</h6>
                                        <p class="card-description">
                                            Don&apos;t be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens&#x2019; bed design but the back is...
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card card-blog">
                                    <div class="card-header card-header-image">
                                        <a href="blog-post.html">
                                            <img class="img" src="/assets/img/examples/card-blog1.jpg">
                                            <div class="card-title">
                                                This Summer Will be Awesome
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-category text-info">Fashion</h6>
                                        <p class="card-description">
                                            Don&apos;t be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens&#x2019; bed design but the back is...
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card card-blog">
                                    <div class="card-header card-header-image">
                                        <a href="blog-post.html">
                                            <img class="img" src="/assets/img/examples/card-blog1.jpg">
                                            <div class="card-title">
                                                This Summer Will be Awesome
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-category text-info">Fashion</h6>
                                        <p class="card-description">
                                            Don&apos;t be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens&#x2019; bed design but the back is...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="card bg-info">
                                    <div class="card-body">
                                        <h5 class="card-category card-category-social">
                                            <i class="fa fa-twitter"></i> Twitter
                                        </h5>
                                        <h4 class="card-title">
                                            <a href="blog-post.html">&quot;You Don&apos;t Have to Sacrifice Joy to Build a Fabulous Business and Life&quot;</a>
                                        </h4>
                                    </div>
                                    <div class="card-footer">
                                        <div class="author">
                                            <a href="blog-post.html">
                                                <img src="/assets/img/faces/avatar.jpg" alt="..." class="avatar img-raised">
                                                <span>Tania Andrew</span>
                                            </a>
                                        </div>
                                        <div class="stats ml-auto">
                                            <i class="material-icons">favorite</i> 2.4K &#xB7;
                                            <i class="material-icons">share</i> 45
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card bg-info">
                                    <div class="card-body">
                                        <h5 class="card-category card-category-social">
                                            <i class="fa fa-twitter"></i> Twitter
                                        </h5>
                                        <h4 class="card-title">
                                            <a href="blog-post.html">&quot;You Don&apos;t Have to Sacrifice Joy to Build a Fabulous Business and Life&quot;</a>
                                        </h4>
                                    </div>
                                    <div class="card-footer">
                                        <div class="author">
                                            <a href="blog-post.html">
                                                <img src="/assets/img/faces/avatar.jpg" alt="..." class="avatar img-raised">
                                                <span>Tania Andrew</span>
                                            </a>
                                        </div>
                                        <div class="stats ml-auto">
                                            <i class="material-icons">favorite</i> 2.4K &#xB7;
                                            <i class="material-icons">share</i> 45
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card bg-info">
                                    <div class="card-body">
                                        <h5 class="card-category card-category-social">
                                            <i class="fa fa-twitter"></i> Twitter
                                        </h5>
                                        <h4 class="card-title">
                                            <a href="blog-post.html">&quot;You Don&apos;t Have to Sacrifice Joy to Build a Fabulous Business and Life&quot;</a>
                                        </h4>
                                    </div>
                                    <div class="card-footer">
                                        <div class="author">
                                            <a href="blog-post.html">
                                                <img src="/assets/img/faces/avatar.jpg" alt="..." class="avatar img-raised">
                                                <span>Tania Andrew</span>
                                            </a>
                                        </div>
                                        <div class="stats ml-auto">
                                            <i class="material-icons">favorite</i> 2.4K &#xB7;
                                            <i class="material-icons">share</i> 45
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="card card-blog">
                                    <div class="card-header card-header-image">
                                        <a href="#pablo">
                                            <img class="img" src="/assets/img/examples/card-blog1.jpg">
                                            <div class="card-title">
                                                This Summer Will be Awesome
                                            </div>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-category text-info">Fashion</h6>
                                        <p class="card-description">
                                            Don&apos;t be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens&#x2019; bed design but the back is...
                                        </p>
                                    </div>
                                </div>
                                <div class="card bg-info">
                                    <div class="card-body">
                                        <h5 class="card-category card-category-social">
                                            <i class="fa fa-twitter"></i> Twitter
                                        </h5>
                                        <h4 class="card-title">
                                            <a href="#pablo">&quot;You Don&apos;t Have to Sacrifice Joy to Build a Fabulous Business and Life&quot;</a>
                                        </h4>
                                    </div>
                                    <div class="card-footer">
                                        <div class="author">
                                            <a href="#pablo">
                                                <img src="/assets/img/faces/avatar.jpg" alt="..." class="avatar img-raised">
                                                <span>Tania Andrew</span>
                                            </a>
                                        </div>
                                        <div class="stats ml-auto">
                                            <i class="material-icons">favorite</i> 2.4K &#xB7;
                                            <i class="material-icons">share</i> 45
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card">
                                    <div class="card-body ">
                                        <h6 class="card-category text-danger">
                                            <i class="material-icons">trending_up</i> Trending
                                        </h6>
                                        <h4 class="card-title">
                                            <a href="#pablo">To Grow Your Business Start Focusing on Your Employees</a>
                                        </h4>
                                    </div>
                                    <div class="card-footer ">
                                        <div class="author">
                                            <a href="#pablo">
                                                <img src="/assets/img/faces/christian.jpg" alt="..." class="avatar img-raised">
                                                <span>Lord Alex</span>
                                            </a>
                                        </div>
                                        <div class="stats ml-auto">
                                            <i class="material-icons">favorite</i> 342 &#xB7;
                                            <i class="material-icons">chat_bubble</i> 45
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-blog">
                                    <div class="card-header card-header-image">
                                        <a href="#pablo">
                                            <img class="img" src="/assets/img/examples/card-blog2.jpg">
                                        </a>
                                    </div>
                                    <div class="card-body ">
                                        <h6 class="card-category text-success">Legal</h6>
                                        <h4 class="card-title">
                                            <a href="#pablo">5 Common Legal Mistakes That Can Trip-Up Your Startup</a>
                                        </h4>
                                        <p class="card-description">
                                            Don&apos;t be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens&#x2019; bed design but the back is...
                                        </p>
                                    </div>
                                    <div class="card-footer ">
                                        <div class="author">
                                            <a href="#pablo">
                                                <img src="/assets/img/faces/marc.jpg" alt="..." class="avatar img-raised">
                                                <span>Mike John</span>
                                            </a>
                                        </div>
                                        <div class="stats ml-auto">
                                            <i class="material-icons">schedule</i> 5 min read
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-6">
                                        <div class="card card-blog">
                                            <div class="card-header card-header-image">
                                                <a href="#pablo">
                                                    <img class="img" src="/assets/img/examples/blog8.jpg">
                                                </a>
                                            </div>
                                            <div class="card-body ">
                                                <h6 class="card-category text-danger">
                                                    <i class="material-icons">trending_up</i> Trending
                                                </h6>
                                                <h4 class="card-title">
                                                    <a href="#pablo">To Grow Your Business Start Focusing on Your Employees</a>
                                                </h4>
                                            </div>
                                            <div class="card-footer ">
                                                <div class="author">
                                                    <a href="#pablo">
                                                        <img src="/assets/img/faces/marc.jpg" alt="..." class="avatar img-raised">
                                                        <span>Mike John</span>
                                                    </a>
                                                </div>
                                                <div class="stats ml-auto">
                                                    <i class="material-icons">schedule</i> 5 min read
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <div class="card bg-success">
                                            <div class="card-body ">
                                                <h5 class="card-category card-category-social">
                                                    <i class="fa fa-newspaper-o"></i> TechCrunch
                                                </h5>
                                                <h4 class="card-title">
                                                    <a href="#pablo">&quot;Focus on Your Employees&quot;</a>
                                                </h4>
                                                <p class="card-description">
                                                    Don&apos;t be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens&#x2019; bed design but the back is...
                                                </p>
                                                <div class="card-stats justify-content-center">
                                                    <a href="#pablo" class="btn btn-white btn-round">Read Article</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--     *********    END BLOG CARDS      *********      -->

            </div>
        </div>
        <!-- end cards -->

        <div class="section">
            <div class="col-md-3 ml-auto mr-auto">
                <button rel="tooltip" class="btn btn-rose btn-round" data-original-title="" title="">Load more...</button>
            </div>
        </div>

    </div>

</div>

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
<script src="/assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
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