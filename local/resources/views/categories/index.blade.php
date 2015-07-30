@extends('app')

@section('content')
  <section class="wrapper">
      <h3><i class="fa fa-angle-right"></i> Categories</h3>

      <div class="row mt">
          <div class="col-md-12">
              <div class="content-panel">
                  <table class="table table-striped table-advance table-hover">
                      <div class="row">
                       <div class="col-md-6"><h4><i class="fa fa-angle-right"></i> List</h4></div>
                      <div class="col-md-6"><a href="{{ url('categories/edit') }}" class="btn btn-theme" type="button">New category</a></div>
                      </div>
                      <hr>
                      @if (count($categories))
                      <thead>
                          <tr>
                              <th><i class="fa fa-laptop"></i> Name</th>
                              <th><i class="fa fa-calendar"></i> Created at</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($categories as $category)
                          <tr>
                              <td><a href="{{ url('categories/edit/' . $category->id) }}">{{ $category->name }}</a></td>
                              <td>{{ date('M d, Y', strtotime($category->created_at)) }}</td>
                              <td>
                                  <a href="{{ url('categories/edit/' . $category->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                  <a data-toggle="confirmation" data-id="{{ $category->id }}" href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                              </td>
                          </tr>
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
          var category_id = $(this).attr("data-id");
          $(this).parent().parent().remove();
          $.post("{{ url('categories/destroy') }}", { id: category_id, _token: "{{ csrf_token() }}" });
        }
      });
  </script>
  @stop 
@endsection
