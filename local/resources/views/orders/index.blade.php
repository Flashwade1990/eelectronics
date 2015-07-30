@extends('app')

@section('content')

  <section class="wrapper">
      <h3><i class="fa fa-angle-right"></i> Orders Admin Panel</h3>
        
  @if(Session::has('message'))
  <div class="alert alert-success">
    <p>{{Session::get('message')}}</p>
 </div>
  @endif
 
      <div class="row mt">
          <div class="col-md-12">
              <div class="content-panel">
                  <table class="table table-striped table-advance table-hover">
                      <div class="row">
                       <div class="col-md-6"><h4><i class="fa fa-angle-right"></i> List</h4></div>
                     </div>
                      <hr>
                      @if (count($orders))
                      <thead>
                          <tr>
                              <th><i class="fa fa-image"></i> Photo</th>
                              <th><i class="fa fa-laptop"></i> Title</th>
                              <th><i class="fa fa-usd"></i> Price</th>
                              <th><i class="fa fa-shopping-cart"></i> Quantity</th>
                              <th><i class="fa fa-usd"></i> Total</th>
                              <th class="hidden-phone"><i class="fa fa-envelope-o"></i> Email</th>
                              <th class="hidden-phone"><i class="fa fa-phone"></i> Phone Number</th>
                              <th><i class="fa fa-check"></i> Status</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($orders as $order)

                          <tr class="success my_<?=$order->id?>"><th class="success"  colspan="8">Order №{{$order->id}}
<a href="{{asset('adminka/orders/old/' . $order->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                  <a data-toggle="confirmation" data-id="{{ $order->id }}" href="" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>


                          </th></tr>


                              <?php $uns = unserialize($order->order);
                              $z = 0;
                               ?>
                              @foreach($uns as $key => $value)
                              <tr class="my_{{$order->id}}">
                              <?php $a = $products->find($key); 
                              $b = $products->find($value); ?>
                              <td> <img src="{{url('local/media/images/products/' . $a->image)}}" width="60px" height="60px" class="recent-thumb" alt=""></td>
                              <td> {{$a->title}}</td>
                              <td> ${{$a->price}}</td>
                              <td> {{$value}}</td>
                              <td> ${{$sum = $a->price * $value}}
                                <?php 
                                $z += $sum;  ?></td>
                              <td>{{ $order->email }}</td>
                              <td>{{ $order->phone }}</td>
                              <td>{{$order->status}}</td>

                          </tr>

                          @endforeach
<tr  class="warning my_<?=$order->id?>" colspan="8"><td  class="warning" colspan="8">Total: {{'$' . $z}}</td></tr>
                          @endforeach

                      </tbody>
                      @endif
                  </table>
              </div><!-- /content-panel -->
          </div><!-- /col-md-12 -->
      </div><!-- /row -->

     
  </section>
  @section("scripts")
  @parent
  <script type="text/javascript" src="{{ asset('js/bootstrap-confirmation/bootstrap-confirmation-2.1.2.min.js') }}"></script>
  <script>
      $('[data-toggle="confirmation"]').confirmation({
        placement: "top",
        onConfirm: function() {
          var order_id = $(this).attr("data-id");
          $('.my_' + order_id).remove();
          $.post("{{ url('orders/destroy') }}", { id: order_id, _token: "{{ csrf_token() }}" });

        }
      });



      
  </script>
  @stop 
@endsection
