@extends('app')

@section('content')
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> {{ $category->id ? $category->name : "New Category"}}</h3>

    <!-- BASIC FORM ELELEMNTS -->
    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($success)
                    <div class="alert alert-success">
                        All changes have been saved<br><br>
                    </div>
                @endif
                <form class="form-horizontal style-form" method="POST" action="{{ url("categories") }}">
                    <input type="hidden" name="id" value="{{ $category->id }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control">
                        </div>
                    </div>
                   
                    <!--a class="btn btn-theme04" href="{{ url('users') }}">Return</a-->
                    <button class="btn btn-theme" type="submit">Submit</button>
                    
                </form>
            </div>
        </div><!-- col-lg-12-->      	
    </div><!-- /row -->
</section><! --/wrapper -->
@endsection