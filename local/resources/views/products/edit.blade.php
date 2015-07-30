@extends('app')

@section('content')
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> {{ $product->id ? $product->title : "New Product"}}</h3>

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






                <form class="form-horizontal style-form" method="POST" action="{{ url("products") }}" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">

                    <label class="col-sm-2 col-sm-2 control-label">Category</label>
                                            <div class="col-sm-10">
                            <select name="category_id" class="form-control">
                                <?php if(isset($product->category->id)){ ?>
                                <option value="{{$product->category->id}}">{{$product->category->name}}</option>
                                <?php } ?>
                                @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{ old('category', $cat->name) }}</option>
                                {{$cat->id}}
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" value="{{ old('title', $product->title) }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" rows="10" class="form-control">{{ old('title', $product->description) }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Price</label>
                        <div class="col-sm-10">
                        <input type="text" name="price" value="{{ old('price', $product->price) }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" >
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