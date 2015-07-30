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
                        <form action="{{url('/search')}}">
                            <input type="text" name="keyword" placeholder="Название продукта...">
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
                @if($cook)
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Товар</th>
                                            <th class="product-price">Цена</th>
                                            <th class="product-quantity">Количество</th>
                                            <th class="product-subtotal">Итого</th>
                                            <th class="product-subtotal"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
 

                                        <?php 
                                        if(isset($cook)){
                                        foreach($cook as $key => $value){
                                            $a = $product->find($key);
                                      ?>  <tr class="cart_item">
                                                    
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="{{asset('/cart/delete/' . $a->id)}}">×</a> 
                                            </td>
                                        <?php
                                           echo '<td class="product-thumbnail">
                                                <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail"
                                                 src="local/media/images/products/' . $a->image . '"></a>
                                            </td>

                                            <td class="product-name">
                                                ' . $a->title .  '
                                            </td>

                                            <td class="product-price">
                                                <span class="amount">' . $sing . ' ' . $a->price * $currency . '</span> 
                                            </td>


                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">';
                                                ?>
                                                <form action="{{asset('cart')}}" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<?php
                                           echo '<input type="hidden" name="id" value="' . $a->id . '">                                                   
                                                    <input type="number" size="4" class="input-text qty text" name="quantity" value="' . $value . '" min="1">
                                                    
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="amount">' . $sing . ' ' . $a->price * $currency * $value . '</span> 
                                            </td>


                                                                                    <td class="actions" colspan="6">
                                             <input type="submit" value="Пересчитать" name="proceed" class="checkout-button button alt wc-forward">
                                            </td>

</form>
                                        </tr>';
}
} 


?>

 













                                               
                                    </tbody>
                                </table>

<form method="post" action="{{url('cart/count')}}">
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                 <h3 id="order_review_heading">ВАШ ЗАКАЗ</h3>

                                <div id="order_review" style="position: relative;">
                                    <table class="shop_table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Товар</th>
                                                <th class="product-total">Сумма</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $sum = 0; ?>
                                           @foreach($cook as $key => $value)
                                           <?php $a = $products->find($key);
                                             ?>
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{$a->title}} <strong class="product-quantity">× {{$value}}</strong> </td>
                                                <td class="product-total">
                                                    <span class="amount">{{$sing . ' '}} {{$a->price * $currency * $value}} </span> </td>
                                            </tr>
                                            <?php $sum += $a->price * $value; ?>
                                        @endforeach
                                        </tbody>
                                        <tfoot>

                                            
                                            <tr class="order-total">
                                                <th>Итого</th>
                                                <td><strong><span class="amount">{{$sing . ' '}}<?php echo $sum * $currency; ?></span></strong> </td>
                                            </tr>

                                        </tfoot>
                                    </table>

                                        <h3 id="order_review_heading">Телефон</h3> 
                                        <input type="text" name="phone" required="required" placeholder="Введите номер..."> 
                                        <br>
                                        <br>
                                        <br>
                                        <h3 id="order_review_heading">Email</h3>
                                        <input type="text" name="email" required="required" placeholder="Введите email...">
                                        <br>
                                        <br>
                                        <br>
                                    <div id="payment">
                                        

                                        <div class="form-row place-order">

                                        <input type="submit" value="Заказать" name="update_cart" class="order">


 
                                     </form>

                                        </div>

                                        
                                    </div>
                                </div>


                        </div>   

@else
<h1 class="zzz">Корзина пуста</h1>
<p>Чтобы заказать понравившийся товар нажмите кнопку "В КОРЗИНУ".</p>
<a href="{{asset('/')}}">На главную</a>

@endif

























                            </div>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>

@stop