@extends('templates.main')

@section('content')
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Избранное</h2>
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
@if(DB::table('wishlists')->where('id', '>', 0)->get())
 <table cellspacing="0" class="shop_table cart">
    <br>
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Товар</th>
                                            <th class="product-price">Цена</th>
                                            <th class="product-quantity">Добавлено</th>
                                            <th class="product-quantity">Действие</th>
                                        </tr>
                                    </thead>




                                    <tbody>



                                         @foreach($products as $prod)
        <?php $a = $prod->product_id;
        $item = DB::table('products')->where('id', $a)->get();
?>
@foreach($item as $one)

                    <tr class="cart_item">
  


                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="{{asset('account/wishlist/delete/' . $one->id)}}">×</a> 
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="{{url('catalog/' . $one->category_id . '/' . $one->id)}}"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail"
                                                 src="{{asset('local/media/images/products/' . $one->image)}}"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="{{url('catalog/' . $one->category_id . '/' . $one->id)}}">{{$one->title}}</a> 
                                            </td>

                                            <td class="product-price">
                                                <span class="amount">{{$one->price}}</span> 
                                            </td>

                                            <td class="product-quantity">
                                                {{$prod->created_at}}
                                            </td>

                                            <td><form action="{{asset('cart')}}" method="post">
                                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{$one->id}}">
                        <input type="hidden" name="quantity" value="1">
                                                <input type="submit" value="В корзину" name="proceed" class="checkout-button button alt wc-forward">
                                            </form>
                                            </td>

                                        </tr>
                                        @endforeach
                                            @endforeach
                                                                       </tbody>
                                </table>

                        <br>
                        <p class="section-title1"></p>
                        </div>
<br>               
@else
<br>
<h1 class="zzz">Нет продуктов в категории "Избранное"</h1>
<p>Чтобы добавить понравившийся продукт, нажмите кнопку "Избранное".</p>
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