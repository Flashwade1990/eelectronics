@extends('templates.main')

@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Корзина</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Page title area -->
    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Искать продукты</h2>
                        <form action="#">
                            <input type="text" placeholder="Название продукта...">
                            <input type="submit" value="Поиск">
                        </form>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Продукты</h2>


                     @foreach($products->slice(0, 4) as $product)
                        <div class="thubmnail-recent">
                            <img src="{{url('local/media/images/products/' . $product->image)}}" class="recent-thumb" alt="">
                            <h2><a href="{{url('catalog/' . $product->category_id . '/' . $product->id)}}">{{$product->title}}</a></h2>
                            <div class="product-sidebar-price">
                                <ins>{{$sing . ' '}}{{$product->price * $currency}}</ins>
                            </div>                             
                        </div>

                    @endforeach


                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Новинки</h2>
                        <ul>
                            @foreach($products->slice(0, 5) as $product)
                            <li><a href="{{url('catalog/' . $product->category_id . '/' . $product->id)}}">{{$product->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                 <div class="col-md-8">
                   <h1>Ваш заказ принят</h1>
                <a href="{{asset('/')}}">На главную</a>




























                            </div>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>

@stop