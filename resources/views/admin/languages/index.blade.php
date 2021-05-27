@extends('layouts.admin.main')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('admin.home')}}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Languages</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-language"></i> Languages</div>
            <div class="card-body">
                @include('shared.alerts')
                <table class="table">

                    <thead>

                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Abbr</th>
                        <th scope="col">Locale</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>

                    </thead>
                    <tbody>
                    @isset($languages)
                        @foreach($languages as $language )
                    <tr>
                        <th scope="row">{{$language->id}}</th>
                        <td>{{$language->name}}</td>
                        <td>{{$language->abbr}}</td>
                        <td>{{$language->locale}}</td>
                        <td>
                            @if($language->active==1)
                            <i style="font-size: 25px" class="fa fa-fw fa-check"></i>
                            @else
                            <i style="font-size: 25px" class="fa fa-fw fa-close"></i>
                            @endif
                        </td>
                        <td><a href="{{route('admin.edit_language',$language->id)}}"><i style="font-size: 25px" class="fa fa-fw fa-edit"></i></a>
                        <a href="{{route('admin.delete_language',$language->id)}}"><i style="font-size: 25px" class="fa fa-fw fa-trash"></i></a>
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
