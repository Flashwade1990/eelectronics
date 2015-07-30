@extends('templates.main')

@section('content')
    <div class="slider-area">
        <div class="zigzag-bottom"></div>
        <div id="slide-list" class="carousel carousel-fade slide" data-ride="carousel">
            
            <div class="slide-bulletz">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ol class="carousel-indicators slide-indicators">
                                <li data-target="#slide-list" data-slide-to="0" class="active"></li>
                                <li data-target="#slide-list" data-slide-to="1"></li>
                                <li data-target="#slide-list" data-slide-to="2"></li>
                            </ol>                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="single-slide">
                        <div class="slide-bg slide-one"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>Apple MacBook Air 13 </h2>
                                                <p>Тип процессора: Core i5
Частота процессора: 1400 МГц
Размер оперативной памяти: 4...8 Гб
Объем накопителя: 128...512 Гб
Размер экрана: 13.3 "
Видеопроцессор: Intel HD Graphics 5000
Вес: 1.35 кг</p>
                                                <p>от 1000$</p>
                                                <a href="{{asset('catalog/3/67')}}" class="readmore">Информация</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg slide-two"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>Kindle 6 Touch</h2>
                                                <p>Amazon Kindle 6 седьмого поколения впервые с сенсорным дисплеем и без кнопок. Русское меню, наличие англо-русского и толкового словарей. Больше памяти: 4 ГБ вместо 2Гб. Более быстрый процессор: на 20% увеличилась скорость работы по сравнению с предыдущими моделями. Долгая работа аккумулятора - не требует подзарядки неделями. Встроенный wifi. </p>
                                                <a href="{{'catalog/6/138'}}" class="readmore">Информация</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg slide-three"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>Aspire V Nitro</h2>
                                                <p>Aspire V Nitro Black Edition – это мощный и современный ноутбук, выпущенный ограниченной серией. Стильный дизайн: черная матовая крышка с текстурным узором и алюминиевой вставкой. Экран Full HD*, клавиатура с красной подсветкой.</p>
                                                <p>от 800$</p>
                                                <a href="{{asset('catalog/3/62')}}" class="readmore">Информация</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>        
    </div> <!-- End slider area -->
    
    <div class="promo-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-refresh"></i>
                        <p>30 Дней возврата</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-truck"></i>
                        <p>Доставка от 1$</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-lock"></i>
                        <p>Безопасная оплата</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-gift"></i>
                        <p>Новая продукция</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->

    <div class="maincontent-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                    <div class="latest-product">
                        <h2 class="section-title">Новая продукция</h2>
                        <div class="product-carousel">
                        
                        @foreach($products->slice(0, 10) as $product)
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src="{{url('local/media/images/products/' . $product->image)}}" alt="">
                                    <div>


                               <h2><a href="{{url('catalog/' . $product->category_id . '/' . $product->id)}}">{{substr($product->title, 0, 20)}}</a></h2>
                                
                                <div class="product-carousel-price">
                                    <ins>{{$sing . ' '}}{{$product->price * $currency}}</ins>
                                </div> 
                                <h2><form action="{{url('cart')}}" method="post">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <input type="hidden" name="quantity" value="1"></h2>

                                        
                                    </div>
                                </div>
                                <input type="submit" class="btn-lg" value="В корзину">
                            </form>
                             <a href="{{asset('account/wishlist/' . $product->id)}}" class="btn-danger btn-lg">
          <span class="glyphicon glyphicon-heart"></span></a>
                            </div>
                        @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End main content area -->
    
    <div class="brands-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-wrapper">
                        <h2 class="section-title">Бренды</h2>
                        <div class="brand-list">
                            <img src="{{asset('local/media/images/services_logo__1.jpg')}}" alt="">
                            <img src="{{asset('local/media/images/services_logo__2.jpg')}}" alt="">
                            <img src="{{asset('local/media/images/services_logo__3.jpg')}}" alt="">
                            <img src="{{asset('local/media/images/services_logo__4.jpg')}}" alt="">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End brands area -->
    
    <div class="product-widget-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Популярные</h2>

<?php
$arr = array();
$new = array(); ?>
                    @foreach($products as $product)

                    <?php $i = 0; 
$summa = 0;?>

<?php $a = $product->feature;

    foreach ($a as $one){
        $summa += $one->rate; 
        $i++;
        $summa/$i;
  }
  if($summa !== 0){
  $rating = round($summa/$i, 0, PHP_ROUND_HALF_UP);
  $arr[$product->id] = $rating;

}
  else {
    $rating = 0;
    $arr[$product->id] = $rating;
  }

?>


           
                 @endforeach
 <?php uasort($arr, function($a, $b){
    return $a < $b;
 });

   foreach ($arr as $key => $value) {
    $a = DB::table('products')->where('id', '=', $key)->get();
    $new[$key] = $a;
} 
foreach (array_slice($new, 0, 3) as $key => $value) {
    foreach ($value as $ke => $val) {
$rating = $arr[$val->id];


switch ($rating) {
                                            case '1':
                                               $first = '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>';
                                                break;
                                            case '2':
                                                $first = '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>';
                                                break;
                                            case '3':
                                                $first = '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>';
                                                break;
                                            case '4':
                                                $first = '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star"></i>';
                                                break;
                                            case '5':
                                                $first = '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>';
                                                break;
                                            default:
                                                 $first = '<i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>';
                                            break;

                                        }













        ?>
        <div class="single-wid-product">
                            <a href="{{url('catalog/' . $val->category_id . '/' . $val->id)}}"><img src="{{url('local/media/images/products/' . $val->image)}}" alt="" class="product-thumb"></a>
                            <h2><a href="{{url('catalog/' . $val->category_id . '/' . $val->id)}}">{{$val->title}}</a></h2>
                                <?php echo $first; ?>
                               <div class="product-wid-price">
                                <ins>{{$sing . ' '}}{{$val->price * $currency}}</ins>
                            </div>                            
                        </div>
<?php  }}; ?>


                    
                    </div>
                </div> 
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Новые</h2>


                    @foreach($products->slice(0, 3) as $product)

                   <?php 


 $first = $product->section($product->feature);


?>
                        <div class="single-wid-product">
                            <a href="{{url('catalog/' . $product->category_id . '/' . $product->id)}}"><img src="{{url('local/media/images/products/' . $product->image)}}" alt="" class="product-thumb"></a>
                            <h2><a href="{{url('catalog/' . $product->category_id . '/' . $product->id)}}">{{$product->title}}</a></h2>
                                <?php echo $first; ?>
                            <div class="product-wid-price">
                                <ins>{{$sing . ' '}}{{$product->price * $currency}}</ins>
                            </div>                            
                        </div>
                    @endforeach


                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-product-widget">
                        <h2 class="product-wid-title">Популярные новые</h2>
<?php
$arr = array();
$new = array(); ?>
                    @foreach($products as $product)

                    <?php $i = 0; 
$summa = 0;?>

<?php $a = $product->feature;

    foreach ($a as $one){
        $summa += $one->rate; 
        $i++;
        $summa/$i;
  }
  if($summa !== 0){
  $rating = round($summa/$i, 0, PHP_ROUND_HALF_UP);
  $arr[$product->id] = $rating;

}
  else {
    $rating = 0;
    $arr[$product->id] = $rating;
  }

?>


           
                 @endforeach
 <?php uasort($arr, function($a, $b){
    return $a < $b;
 });

   foreach ($arr as $key => $value) {
    $a = DB::table('products')->where('id', '=', $key)->get();
    $new[$key] = $a;
} 
foreach (array_slice($new, 0, 3) as $key => $value) {
    foreach ($value as $ke => $val) {
$rating = $arr[$val->id];


switch ($rating) {
                                            case '1':
                                               $first = '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>';
                                                break;
                                            case '2':
                                                $first = '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>';
                                                break;
                                            case '3':
                                                $first = '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>';
                                                break;
                                            case '4':
                                                $first = '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star"></i>';
                                                break;
                                            case '5':
                                                $first = '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>';
                                                break;
                                            default:
                                                 $first = '<i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>';
                                            break;

                                        }













        ?>
        <div class="single-wid-product">
                            <a href="{{url('catalog/' . $val->category_id . '/' . $val->id)}}"><img src="{{url('local/media/images/products/' . $val->image)}}" alt="" class="product-thumb"></a>
                            <h2><a href="{{url('catalog/' . $val->category_id . '/' . $val->id)}}">{{$val->title}}</a></h2>
                                <?php echo $first; ?>
                            <div class="product-wid-price">
                                <ins>{{$sing . ' '}}{{$val->price * $currency}}</ins>
                            </div>                            
                        </div>
<?php  }}; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End product widget area -->

@stop
