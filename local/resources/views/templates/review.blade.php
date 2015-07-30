﻿@extends('templates.main')

@section('content')
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Искать продукты</h2>
                        <form action="{{url('/search')}}">
                            <input type="text" name="keyword" placeholder="Название продукта...">
                            <input type="submit" value="Поиск">
                        </form>
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Продукты</h2>

                        @foreach($prods->slice(0, 4) as $product)
                        <div class="thubmnail-recent">       
                            <img src="{{url('local/media/images/products/' . $product->image)}}" class="recent-thumb" alt="">
                            <h2><a href="{{url('catalog/' . $product->category_id . '/' . $product->id)}}">{{$product->title}}</a></h2>
                            <div class="product-sidebar-price">
                                <ins>${{$product->price}}</ins>
                            </div>                             
                        </div>
                        @endforeach

                        
                    </div>
                    
                    <div class="single-sidebar">
                        <h2 class="sidebar-title">Новые продукты</h2>
                        <ul>
                            @foreach($prods->slice(0, 5) as $product)
                            <li><a href="{{url('catalog/' . $product->category_id . '/' . $product->id)}}">{{$product->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
               <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="{{asset('/')}}">Главная</a>
                            <a href="{{url('catalog/' . $category)}}">{{$cat_name}}</a>
                            <a href="{{url('catalog/' . $category . '/' . $products->id)}}">{{$products->title}}</a>
                            <a href="{{url('catalog/' . $category . '/' . $products->id . '/review')}}">review</a>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                        <img src="{{url('local/media/images/products/' . $products->image)}}" alt="">
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">{{$products->title}}</h2>
                                    <div class="product-inner-price">
                                        <ins>{{$sing . ' '}}{{$product->price * $currency}}</ins>
                                    </div>    

                                    <form action="{{url('cart')}}" method="post" class="cart">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1">
                                        </div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{$products->id}}">
                                        <button class="add_to_cart_button" type="submit">В корзину</button>
                                                                            <a href="{{asset('account/wishlist/' . $products->id)}}" class="btn-danger btn-lg">
          <span class="glyphicon glyphicon-heart"></span></a>
                                    </form> 
                                 <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Описание продукта</h2>  
                                                <p>{{$products->description}}</p>
                                                 </div>
                                             </div>
                                    
                                </div>
                            </div>

                        </div>
                        
                                    <div>
                                      <h1>Отзывы</h1>
                                      @foreach($reviews as $review)
                                        <h3>{{$review->name}}</h3>
                                        <p>{{$review->created_at}}</p>
                                        <p><?php 
                                        switch ($review->rate) {
                                            case '1':
                                                echo '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>';
                                                break;
                                            case '2':
                                                echo '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>';
                                                break;
                                            case '3':
                                                echo '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>';
                                                break;
                                            case '4':
                                                echo '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star"></i>';
                                                break;
                                            case '5':
                                                echo '<i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>
                                                            <i class="fa fa-star" style="color:#ffce02"></i>';
                                                break;

                                        }
                                         ?></p>
                                        <p>{{$review->review}}</p>
                                      @endforeach
                                   </div>
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Похожие продукты</h2>
                            <div class="related-products-carousel">

                                @foreach($prods->slice(0, 6) as $product)
                                <div class="single-product">
                                    <div class="product-f-image">
                                        <img src="{{url('local/media/images/products/' . $product->image)}}" alt="">

                                    </div>
                                    <h2><form action="{{url('cart')}}" method="post">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <input type="hidden" name="quantity" value="1"></h2>

                                        
                                   
                                <input type="submit" class="btn-lg" value="В корзину">
                            </form>
                                                         <a href="{{asset('account/wishlist/' . $product->id)}}" class="btn-danger btn-lg">
          <span class="glyphicon glyphicon-heart"></span></a>
                                    <h2><a href="{{url('catalog/' . $product->category_id . '/' . $product->id)}}">{{$product->title}}</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>{{$sing . ' '}}{{$product->price * $currency}}</ins>
                                    </div> 
                                </div>
                                @endforeach



                                         
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>

@stop