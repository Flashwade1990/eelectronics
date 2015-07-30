@extends('templates.main')

@section('content')

    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Каталог</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

        <div class="container">
            
  


<?$str='';?>
 
            @foreach($products as $product)
            <?php
            if( $str != $product->category->name){
               $str = $product->category->name;
               echo '<br><br><div><h2 class="section-title">' . $str . '</h2></div>';
            }
 
            ?>
          <!--{{$product->category->name}}-->
             <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="{{url('local/media/images/products/' . $product->image)}}" alt="">
                        </div>


                        <h2><form action="{{url('catalog/' . $product->id)}}" method="post">
                        <input type="hidden" name="id" value="{{$product->id}}"></h2>
                        <h2><a href="{{url('catalog/' . $product->id)}}">{{$product->title}}</a></h2>
                        <div class="product-carousel-price">
                            <ins>${{$product->price}}</ins> <del>$999.00</del>
                        </div>  
                        
                        <div class="product-option-shop">
                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="/canvas/shop/?add-to-cart=70">В корзину</a>
                        </div>                       
                    </div>
                </div>

                @endforeach











            
            <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>
                          <ul class="pagination">


                           <li> {!! $products->render() !!}</li>
                           
                          </ul>
                        </nav>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop