@extends('templates.main')

@section('content')
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Мой аккаунт</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <div class="maincontent-area">

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="latest-product">
                        <br>
                        <h4><i class="fa fa-user"></i>{{' ' . Auth::user()->name}}</h4>
                        <p>Дата регистрации: {{Auth::user()->created_at}}</p>
                        </div>
                    </div>


               <div class="col-md-8">
                    <div class="latest-product">
                        <br>
                        <p class="section-title1">Добро пожаловать в ваш аккаунт. Здесь вы cможете управлять своими заказами.</p>
                        </div>
<br>                





        <div class="container">
            <div class="row">
                <a href="{{asset('cart')}}"><div class="col-md-2 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-shopping-cart"></i>
                        <p>Корзина</p>
                    </div>
                </div></a>
                <a href="{{asset('account/wishlist')}}"><div class="col-md-2 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-heart"></i>
                        <p>Избранное</p>
                    </div>
                </div></a>
                <a href=""><div class="col-md-2 col-sm-6">
                    <div class="single-promo">
                        <i class="fa fa-history"></i>
                        <p>История</p>
                    </div>
                </div></a>
                
            </div>
        </div>






                    </div>
                </div>
            </div>
        </div>
    </div>
@stop