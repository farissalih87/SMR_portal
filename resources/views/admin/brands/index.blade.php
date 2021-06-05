@extends('layouts.admin.main')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.home')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Brands</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-folder"></i> Brands</div>
            <div class="card-body">
                @include('shared.alerts')
                <table class="table">

                    <thead>

                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Lang</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    @isset($brands)
                        @foreach($brands as $brand)
                            <tr>
                                <th scope="row">{{$brand->id}}</th>
                                <td>{{$brand->name}}</td>
                                <td><img style="width:100%; max-width:100px" src="{{url('/application/storage/'.$brand->image)}}"></td>
                                <td>{{$brand->trans_lang}}</td>

                                <td>
                                    @if($brand->active==1)
                                        <i style="font-size: 25px" class="fa fa-fw fa-check"></i>
                                    @else
                                        <i style="font-size: 25px" class="fa fa-fw fa-close"></i>
                                    @endif
                                </td>
                                <td><a href="{{route('admin.edit_brand',$brand->id)}}"><i style="font-size: 25px" class="fa fa-fw fa-edit"></i></a>
                                    <a href="{{route('admin.delete_brand',$brand->id)}}"><i style="font-size: 25px" class="fa fa-fw fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                    </tbody>
                </table>


            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        <!-- /tables-->
    </div>
    <!-- /container-fluid-->
</div>

    @endsection
@section('js')
    <script>

        $(document).ready(function() {

            $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                $("#success-alert").slideUp(500);
            });
        });
    </script>
    @endsection
