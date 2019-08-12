<header>

    <div class="cd-logo"><a href="{{route('home', [app()->getLocale()])}}" style="color: white; text-transform: uppercase; white-space: nowrap">Портал студента</a></div>
    <!--  <div class="cd-logo"><a href="#"><img src="./assets/img/logo.png" alt="Logo"></a></div>-->

    <nav class="cd-main-nav-wrapper navbar navbar-color-on-scroll navbar-transparent fixed-top navbar-expand-lg " color-on-scroll="100" id="sectionsNav">
        <ul class="cd-main-nav">
            <li><a href="{{route('home', [app()->getLocale()])}}">Главная</a></li>
            <li><a href="{{route('introductory', [app()->getLocale()])}}">Поступление 2019</a></li>
            <li><a href="{{route('training', [app()->getLocale()])}}">Подготовка поступлению</a></li>
            <li><a href="testing.html">Тесты</a></li>
            <li><a href="{{route('3d', [app()->getLocale()])}}">3D тур</a></li>
            <li>
                <a href="#" class="cd-subnav-trigger"><span>Для студента</span></a>

                <ul>
                    <li class="go-back"><a href="#0">Menu</a></li>
                    <li><a href="{{route('blog', [app()->getLocale()])}}">Инфо портал</a></li>
                    <li><a href="{{route('shop', [app()->getLocale()])}}">Магазин</a></li>
                    <li><a href="#">Навигатор по корпусам</a></li>
                    <li><a href="{{route('contacts', [app()->getLocale()])}}">Контакты</a></li>
                    <li><a href="#" class="placeholder">Placeholder</a></li>
                </ul>
            </li>
        </ul> <!-- .cd-main-nav -->
    </nav> <!-- .cd-main-nav-wrapper -->

    <a href="#0" class="cd-nav-trigger"><span></span></a>

</header>