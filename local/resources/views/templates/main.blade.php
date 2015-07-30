<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eElectronics - HTML eCommerce Template</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    @section('styles')
    <link rel="stylesheet" href="{{asset('local/media/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('local/media/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('local/media/css/responsive.css')}}">
    @show
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
         <script src="https://maps.googleapis.com/maps/api/js"></script>
  
  </head>
  <body>

        <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    @if(Auth::check())
                    <div class="user-menu">
                        <ul>
                            <li><a href="{{asset('account')}}"><i class="fa fa-user"></i> {{Auth::user()->name}}</a></li>
                            <li><a href="{{asset('account')}}"><i class="fa fa-user-secret"></i> Аккаунт</a></li>
                            <li><a href="{{asset('account/wishlist')}}"><i class="fa fa-heart"></i> Избранное</a></li>
                            <li><a href="{{asset('cart')}}"><i class="fa fa-shopping-cart"></i> Корзина</a></li>
                            <li><a href="{{asset('auth/logout')}}"><i class="fa fa-ban"></i> Выйти</a></li>
                        </ul>
                    </div>
                    @else
                     <div class="user-menu">
                        <ul>
                            <li><a href="{{asset('auth/register')}}"><i class="fa fa-user"></i> Регистрация</a></li>
                            <li><a href="{{asset('auth/login')}}"><i class="fa fa-user"></i> Логин</a></li>
                        </ul>
                    </div>
                    @endif
                   
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">валюта </span><span class="value">{{$menu}} </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{asset('currency/usd')}}">USD</a></li>
                                    <li><a href="{{asset('currency/byr')}}">BYR</a></li>
                                    <li><a href="{{asset('currency/eur')}}">EUR</a></li>

                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="{{asset('/')}}">e<span>Electronics</span></a></h1>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="{{asset('cart')}}">Cart - <span class="cart-amunt">
                                     <?php   $total = 0;
                                     $it = 0;
                                     if(isset($cook)){
                                        foreach($cook as $key => $value){
                                            $a = $product->find($key)->price * $value;
                                            $total += $a;
                                            $it += $value;
                                        }
                                    }

                                    ?>
                                    {{$sing . ' '}}{{$total * $currency}}
                                    </span> <i class="fa fa-shopping-cart"></i> <span class="product-count">
                                        <?php echo $it; ?>
                                    </span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{asset('/')}}">Главная</a></li>
                        <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="key">Категории </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
@foreach($categories as $category)
<li><a href="{{url('catalog/' . $category->id)}}">{{$category->name}}</a></li>
@endforeach
                                </ul>
                            </li>
                        <li><a href="{{asset('cart')}}">Корзина</a></li>
                         <li><a href="{{asset('contacts')}}">Контакты</a></li>
                        <li> <div class="form-inline">
                        <form action="{{url('/search')}}" class="navbar-form" role="search" method="get">
                            <div class="input-group">
                            <input type="text" name="keyword" placeholder="Найти...">
                            <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                        </form>
                    </div></li>
                       
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->

                                @if(Session::has('message'))
  <div class="alert alert-success">
    <p>{{Session::get('message')}}</p>
 </div>
  @endif


@yield('content')










    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>e<span>Electronics</span></h2>
                        <p>Прием заказов на сайте - круглосуточно или по телефонам 222-21-24, 
                            +37529 365 89 22, +37533 657 48 12 ежедневно с 9 до 17.</p>
                        <div class="footer-social">
                            <a href="{{asset('https://www.facebook.com/')}}" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="{{asset('https://twitter.com/')}}" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="{{asset('https://instagram.com/')}}" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Навигация </h2>
                        <ul>
                            <li><a href="
                                <?php if(Auth::user()){ ?>
                                {{asset('account')}}

                                <?php } else { ?>
                                {{asset('auth/login')}}
                                <?php } ?>">Аккаунт</a></li>
                            <li><a href="
                                <?php if(Auth::user()){ ?>
                                {{asset('account/wishlist')}}

                                <?php } else { ?>
                                {{asset('auth/login')}}
                                <?php } ?>">Избранное</a></li>
                            <li><a href="{{asset('/contacts')}}">Контакты</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Категории</h2>
                        <ul>
                            <li><a href="{{asset('catalog/1')}}">Мобильные телефоны</a></li>
                            <li><a href="{{asset('catalog/2')}}">Телевизоры</a></li>
                            <li><a href="{{asset('catalog/3')}}">Ноутбуки</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Рассылка</h2>
                        <p>Подпишитесь на нашу рассылку и получайте уникальные предложения прямо на электронную почту!</p>
                        <div class="newsletter-form">
                            <form action="{{url('/')}}" method="post">
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="email" name="email" placeholder="Введите email">
                                <input type="submit" value="Подписаться">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div> <!-- End footer top area -->
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2015 eElectronics. All Rights Reserved.</p>
                    </div>
                </div>
                

                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   



    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    @section('js')
    <!-- jQuery sticky menu -->
    <script src="{{asset('local/media/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('local/media/js/jquery.sticky.js')}}"></script>
    
    <!-- jQuery easing -->
    <script src="{{asset('local/media/js/jquery.easing.1.3.min.js')}}"></script>
    
    <!-- Main Script -->
    <script src="{{asset('local/media/js/main.js')}}"></script>
    @show
  </body>
</html>