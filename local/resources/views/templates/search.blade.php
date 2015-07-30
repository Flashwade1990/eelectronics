@extends('templates.main')

@section('content')
<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Поиск</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<div>
        <br>
		<h2>Результаты по запросу "<span>{{$keyword}}</span>":</h2>
	</div>



	    
    
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                





            @foreach($products as $product)
              <div class="col-md-3 col-sm-6">
                    <div class="single-shop-product">
                        <div class="product-upper">
                            <img src="{{url('local/media/images/products/' . $product->image)}}" alt="">
                        </div>


                        <h2><form action="{{url('cart')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">                          
                        <input type="hidden" name="id" value="{{$product->id}}"></h2>
                        <input type="hidden" name="quantity" value="1"></h2>
                        <h2><a href="{{url('catalog/' . $product->category_id . '/' . $product->id)}}">{{$product->title}}</a></h2>
                        <div class="product-carousel-price">
                            <ins>{{$sing . ' '}}{{$product->price * $currency}}</ins>
                        </div>  
                        <br>
                                <input type="submit" class="btn-lg" value="В корзину">
                            </form>    
                            <a href="#" class="btn-danger btn-lg">
          <span class="glyphicon glyphicon-heart"></span></a>                   
                    </div>
                </div>
                @endforeach









                          <ul class="pagination">

                         <li> {!! $search->appends(array('keyword' => $keyword))->render() !!}</li>
                           
                          </ul>        
           
        </div>
    </div>
</div>
@stop