@extends('app')

@section('content')
  <section class="wrapper">
      <h3><i class="fa fa-angle-right"></i> Products</h3>

      <div class="row mt">
          <div class="col-md-12">
              <div class="content-panel">
                  <table class="table table-striped table-advance table-hover">
                      <div class="row">
                       <div class="col-md-6"><h4><i class="fa fa-angle-right"></i> List</h4></div>
                      <div class="col-md-6"><a href="{{ url('products/edit') }}" class="btn btn-theme" type="button">New product</a></div>
                      </div>
                      <hr>
                      @if (count($products))
                      <thead>
                          <tr>
                              <th><i class="fa fa-image"></i> Image</th>
                              <th><i class="fa fa-laptop"></i> Title</th>
                              <th><i class="fa fa-list"></i> Description</th>
                              <th class="hidden-phone"><i class="fa fa-usd"></i> Price</th>
                              <th><i class="fa fa-calendar"></i> Created at</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($products as $product)
                          <tr>
                               <td> {!! HTML::image('local/media/images/products/'.$product->image, $product->title, array('width' => '60', 
                                'height' => '60')) !!}</td>
                              <td><a href="{{ url('products/edit/' . $product->id) }}">{{ $product->title }}</a></td>
                              <td style="max-width: 150px"><?php echo mb_substr($product->description, 0, 95); echo '...'; ?></td>
                              <td>{{$product->price}}</td>
                              <td>{{$product->created_at}}</td>
                              <td>
                                  <a href="{{ url('products/edit/' . $product->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                  <a data-toggle="confirmation" data-id="{{ $product->id }}" href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                      @endif
                  </table>
              </div><!-- /content-panel -->
              {!! $products !!}
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
          var product_id = $(this).attr("data-id");
          $(this).parent().parent().remove();
          $.post("{{ url('products/destroy') }}", { id: product_id, _token: "{{ csrf_token() }}" });
        }
      });
  </script>
  @stop 
@endsection
