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
                <a href="{{route('admin.languages')}}">Languages</a>
            </li>
            <li class="breadcrumb-item active">Add New</li>
        </ol>

        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-language"></i>Add New Language</h2>
            </div>
            <div class="row">

                <form action="{{route('admin.update_language',$language->id)}}" method="post" style="width: 100%;">
                @csrf
                <div class="col-md-8 add_top_30">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" value="{{$language->name}}" name="name" id="name" class="form-control" placeholder="Language Name">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Abbr</label>
                                <input type="text" value="{{$language->abbr}}" name="abbr" id="abbr" class="form-control" placeholder="Abbr ex.(en)">
                                @error('abbr')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- /row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Locale</label>
                                <input type="text" value="{{$language->locale}}" name="locale" id="locale" class="form-control" placeholder="Localization ex.(en_US)">
                                @error('locale')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Category</label>
                                <div  class="styled-select">
                                    <select name="direction" id="direction">
                                        <option value="LTR" @if($language->direction == 'LTR') selected @endif>LTR</option>
                                        <option value="RTL" @if($language->direction == 'RTL') selected @endif>RTL</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /row-->
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="checkbox"  @if($language->active == 1) checked @endif value="1"  style="transform: scale(1.5); -webkit-transform: scale(1.5);"  id="active" name="active">
                                <label for="customSwitch1">Active</label>
                            </div>
                        </div>
                    </div>
                    <p><button type="submit"  class="btn_1 medium">Update</button></p>
                    <!-- /row-->
                </div>

                </form>
            </div>
        </div>

    </div>
    <!-- /container-fluid-->
</div>

    @endsection
