@extends('layouts.admin.main')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.home')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('admin.categories')}}">Categories</a>
            </li>
            <li class="breadcrumb-item active">Add New</li>
        </ol>

        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-language"></i>Add New Category</h2>
            </div>
            <div class="row">

                <form action="{{route('admin.store_category')}}" enctype="multipart/form-data" method="post" style="width: 100%;">
                @csrf
                <div class="col-md-8 add_top_30">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category header photo</label>
                                <input type="file" name="image" id="image">
                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <!-- /row-->

                    @if(get_languages()->count()>0)
                        @foreach(get_languages() as$index => $lang)
                    <div class="row">

                        <div class="col-md-6">
                            @error('category')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <div class="form-group">
                                <label>Name ({{$lang->name}})</label>
                                <input type="text" name="category[{{$index}}][name]" id="category[{{$index}}][name]" class="form-control" placeholder="Enter Category Name">
                                <input type="hidden" name="category[{{$index}}][trans_lang]" id="category[{{$index}}][trans_lang]"  class="form-control" value="{{$lang->abbr}}">
                                @error('category.'.$index.'.name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <!-- /row-->
                        @endforeach
                    @endif

                    <p><button type="submit"  class="btn_1 medium">Save</button></p>
                </div>

                </form>
            </div>
        </div>

    </div>
    <!-- /container-fluid-->
</div>

    @endsection
