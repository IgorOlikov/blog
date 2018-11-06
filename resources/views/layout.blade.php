<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon icon -->

    <title>Blog</title>

    <!-- common css -->
    <link rel="stylesheet" href="/css/front.css">

    <!-- HTML5 shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.js"></script>
    <![endif]-->

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/images/favicon.png">

</head>

<body>

<nav class="navbar main-menu navbar-default">
    <div class="container">
        <div class="menu-content">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="/images/devup.png" alt="" width="80" height="40"></a>
            </div>


            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav text-uppercase">
                    <li><a href="/">Homepage</a></li>
                    <li><a href="https://vk.com/id155276665">ABOUT ME </a></li>
                    <li><a href="https://vk.com/id155276665">CONTACT</a></li>
                </ul>

                <ul class="nav navbar-nav text-uppercase pull-right">

                    @if(Auth::check())
                        <li><a href="/profile">My profile</a></li>
                        <li><a href="/logout">Logout</a></li>
                    @else
                        <li><a href="/register">Register</a></li>
                        <li><a href="/login">Login</a></li>
                    @endif
                </ul>

            </div>
            <!-- /.navbar-collapse -->


            <div class="show-search">
                <form role="search" method="get" id="searchform" action="#">
                    <div>
                        <input type="text" placeholder="Search and hit enter..." name="s" id="s">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</nav>
 <div class="container">
     <div class="row">
         <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-info">
                 {{session('status')}}
                </div>
            @endif
        </div>
     </div>
 </div>
<!--main content start-->
@yield('content')
<!-- end main content-->
<!--footer start-->
<div id="footer">
    <div class="footer-instagram-section">
        <h3 class="footer-instagram-title text-center text-uppercase">Instagram</h3>

        <div id="footer-instagram" class="owl-carousel">

            <div class="item">
                <a href="#"><img src="/images/ins-28.jpg" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="/images/ins-22.jpg" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="/images/ins-23.jpg" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="/images/ins-24.jpg" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="/images/ins-39.jpg" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="/images/ins-26.jpg" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="/images/ins-27.jpg" alt=""></a>
            </div>
            <div class="item">
                <a href="#"><img src="/images/ins-121.jpg" alt=""></a>
            </div>

        </div>
    </div>
</div>

<footer class="footer-widget-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <aside class="footer-widget">
                    <h3 class="widget-title text-uppercase">CONTACT INFO</h3>
                    <div class="about-img"><img src="/images/laravel.png" alt=""></div>
                    <div class="about-content">
                    </div>
                    <div class="address">


                        <p> Russia,Orenburg.</p>

                        <p> Igor Olikov</p>

                        <p> i.olikov@mail.ru<br>
                            https://vk.com/id155276665</p>
                    </div>
                </aside>
            </div>

            <div class="col-md-4">
                <aside class="footer-widget">
                    <h3 class="widget-title text-uppercase">FUNNY QUOTES</h3>

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!--Indicator-->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="single-review">
                                    <div class="review-text">
                                        <p>Трудность работы с программистом заключается в том, что вы не можете понять,
                                            что он делает, до тех пор, пока не стало слишком поздно.<br><br>

                                            Seymour Cray</p>
                                    </div>
                                    <div class="author-id">
                                        <img src="/images/authore.png" alt="">

                                        <div class="author-text">
                                            <h4>Seymour Cray</h4>

                                            <h4>Quote</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="single-review">
                                    <div class="review-text">
                                        <p>Два самых известных продукта, созданных в Университете Беркли —
                                            это UNIX и LSD. Это не может быть просто совпадением.<br><br>

                                            Jeremy S. Anderso</p>
                                    </div>
                                    <div class="author-id">
                                        <img src="/images/authore.png" alt="">

                                        <div class="author-text">
                                            <h4>Jeremy S.Anderso</h4>

                                            <h4>Quote</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="single-review">
                                    <div class="review-text">
                                        <p>Если бы в Java действительно работала сборка мусора,
                                            большинство программ бы удаляли сами себя при первом же запуске.<br><br>

                                            Robert Sewell</p>
                                    </div>
                                    <div class="author-id">
                                        <img src="/images/authore.png" alt="">

                                        <div class="author-text">
                                            <h4>Robert Sewell</h4>

                                            <h4>Quote</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </aside>
            </div>
            <div class="col-md-4">
                <aside class="footer-widget">
                    <h3 class="widget-title text-uppercase">MAIN PROGRAMMING LANGUAGE</h3>


                    <div class="custom-post">
                        <div>
                            <a href="#"><img src="/images/php-icon.png" alt=""></a>
                        </div>

                    </div>
                </aside>
            </div>
        </div>
    </div>
    <div class="footer-copy">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">&copy; 2018 <a href="#">Blog, </a> Designed with <i
                            class="fa fa-heart"></i> by <a href="#">Igor Olikov</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="/js/front.js"></script>
</body>
</html>
