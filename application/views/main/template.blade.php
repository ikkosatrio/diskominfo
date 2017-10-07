<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->


<!-- Mirrored from wbpreview.com/previews/WB052C9L0/index.php by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 26 May 2017 20:58:01 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=100%; initial-scale=1; maximum-scale=1; minimum-scale=1; user-scalable=no;" />
    <link rel="icon" href="images/favicon.png" type="image/png">
    <link rel="shortcut icon" href="{{base_url()}}assets/images/website/config/icon/{{$config->icon}}" type="image/png" />
    <title>{{ucfirst($menu)}} - {{$config->name}}</title>
    <link href="{{base_url()}}assets/main/css/bootstrap.css" type="text/css" rel="stylesheet"/>
    <link href="{{base_url()}}assets/main/css/style.css" type="text/css" rel="stylesheet"/>
    <link href="{{base_url()}}assets/main/css/prettyPhoto.css" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src="{{base_url()}}assets/main/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{base_url()}}assets/main/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{base_url()}}assets/main/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="{{base_url()}}assets/main/js/jquery.quicksand.js"></script>
    <script type="text/javascript" src="{{base_url()}}assets/main/js/superfish.js"></script>
    <script type="text/javascript" src="{{base_url()}}assets/main/js/hoverIntent.js"></script>
    <script type="text/javascript" src="{{base_url()}}assets/main/js/jquery.hoverdir.js"></script>
    <script type="text/javascript" src="{{base_url()}}assets/main/js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="{{base_url()}}assets/main/js/jflickrfeed.min.js"></script>
    <script type="text/javascript" src="{{base_url()}}assets/main/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="{{base_url()}}assets/main/js/jquery.elastislide.js"></script>
    <script type="text/javascript" src="{{base_url()}}assets/main/js/jquery.tweet.js"></script>
    <script type="text/javascript" src="{{base_url()}}assets/main/js/smoothscroll.js"></script>
    {{-- <script type="text/javascript" src="{{base_url()}}assets/main/js/jquery.ui.totop.js"></script> --}}
    {{-- <script type="text/javascript" src="{{base_url()}}assets/main/js/main.js"></script> --}}
    <script type="text/javascript" src="{{base_url()}}assets/main/js/ajax-mail.js"></script>
    <script type="text/javascript" src="{{base_url()}}assets/main/js/accordion.settings.js"></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link href="css/ie.css" type="text/css" rel="stylesheet"/>
    <![endif]-->
    
    
    <!-- GRITTER NOTIF -->
            <!-- GRITTER NOTIF -->
            
</head>

<body>

    <!-- top menu -->
    <section id="top-menu">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </section>

<!-- header -->
        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="span6 logo">
                        <a href="index_3.htm"><img style="height: 70px" src="{{base_url()}}assets/images/website/config/logo/{{$config->logo}}" alt="logo"/></a>
                    </div>
                </div>
                <nav id="menu">
                    <ul class="clearfix">
                        <li><a href="{{base_url('main')}}">Beranda</a></li>
                        <li><a href="{{base_url('main/alur')}}">Alur Pendaftaran Magang</a></li>
                        <li><a href="{{base_url('main/kuota')}}">Kuota Magang</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        @yield("content")
            
        </div>
            </div>
        </div>
    </div>
</section>

<!--footer menu-->
<section id="footer-menu">
    <div class="container">
        <div class="row">
            <p class="span12"><span>&copy; Copyright 2017 Teknik Informatika-UNTAG Surabaya</span></p>
        </div>
    </div>
</section>
</body>
</html>