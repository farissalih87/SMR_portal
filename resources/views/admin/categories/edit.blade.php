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
                <li class="breadcrumb-item active">Edit Category</li>
            </ol>

            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-language"></i>Edit ({{$parent_cat->name}})</h2>
                </div>
                <div class="row">

                    <form action="{{route('admin.update_category',$parent_cat->id)}}" enctype="multipart/form-data" method="post" style="width: 100%;">
                        @csrf
                        <div class="col-md-8 add_top_30">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <img style="width: 100%" src="{{url('/application/storage/'.$parent_cat->image)}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category header photo</label>
                                        <input type="file" name="image" id="image">
                                        <input hidden name="himage" id="himage" value="{{$parent_cat->id}}">
                                        @error('image')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                @error('category')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Name ({{$parent_cat->trans_lang}})</label>
                                                    <input type="text" name="category[0][name]" id="category[0][name]" class="form-control" value="{{$parent_cat->name}}">
                                                    <input type="hidden" name="category[0][trans_lang]" id="category[0][trans_lang]"  class="form-control" value="{{$parent_cat->trans_lang}}">
                                                    @error('category.0.name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="checkbox"  @if($parent_cat->active == 1) checked @endif value="1"  style="transform: scale(1.5); -webkit-transform: scale(1.5);" name="category[0][active]" id="category[0][active]">
                                                    <label for="customSwitch1">Active</label>
                                                </div>
                                            </div>
                                        </div>
                            <!-- /row-->
                            <p><button type="submit"  class="btn_1 medium">Save</button></p>
                        </div>

                    </form>

                    <!-- Trans lations-->

                        <div class="col-md-8 ">
                            @isset($parent_cat->categories)
                                @foreach($parent_cat->categories as $index=>$trans)
                            <nav>

                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab{{$index}}" data-toggle="tab" href="#nav-home{{$index}}" role="tab" aria-controls="nav-home" aria-selected="true">{{$trans->trans_lang}}</a>
                                </div>

                            </nav>
                            <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home{{$index}}" role="tabpanel" aria-labelledby="nav-home-tab">

                                    <form action="{{route('admin.update_category',$trans->id)}}" enctype="multipart/form-data" method="post" style="width: 100%;">
                                        @csrf
                                        <input hidden name="himage" id="himage" value="{{$trans->id}}">

                                            <div class="row">

                                                <div class="col-md-6">
                                                    @error('category')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                    <div class="form-group">
                                                        <label>Name ({{$trans->trans_lang}})</label>
                                                        <input type="text" name="category[0][name]" id="category[0][name]" class="form-control" value="{{$trans->name}}">
                                                        <input type="hidden" name="category[0][trans_lang]" id="category[0][trans_lang]"  class="form-control" value="{{$trans->trans_lang}}">
                                                        @error('category.0.name')
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /row-->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="checkbox"  @if($trans->active == 1) checked @endif value="1"  style="transform: scale(1.5); -webkit-transform: scale(1.5);" name="category[0][active]" id="category[0][active]">
                                                        <label for="customSwitch1">Active</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /row-->
                                            <p><button type="submit"  class="btn_1 medium">Save</button></p>


                                    </form>

                                </div>

                            </div>
                                @endforeach
                                @endisset
                        </div>

            </div>

        </div>
        <!-- /container-fluid-->
    </div>

@endsection
