@extends('layouts.site.main')
@section('title',__('messages.home_title'))
@section('content')
    <main>
        <section class="hero_single version_2">
            <div class="wrapper">
                <div class="container">
                        {!! trans('messages.home_header_text')!!}
                    <form>
                        <div class="row no-gutters custom-search-input-2">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="What are you looking for...">
                                    <i class="icon_search"></i>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Where">
                                    <i class="icon_pin_alt"></i>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <select class="wide">
                                    <option>All Categories</option>
                                    <option>Tours</option>
                                    <option>Hotels</option>
                                    <option>Restaurants</option>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <input type="submit" class="btn_search" value="Search">
                            </div>
                        </div>
                        <!-- /row -->
                    </form>
                </div>
            </div>
        </section>
        <!-- /hero_single -->
        <div class="container margin_60_35">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>{{__('messages.popular_categories')}}</h2>
            </div>
            <div class="wrapper-grid">
                <div class="row">
                    @foreach(App\Models\Category::with('categories')->where('trans_of',0)->get() as $category)
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="box_grid">
                            <figure style="height: 150px;">
                                <a href="{{route('cat.companies',$category->id)}}"><img src="{{url('/application/storage/'.$category->image)}}" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>{{__('messages.brows')}}</span></div></a>
                            </figure>
                            <div class="wrapper">
                                <h6><a href="{{route('cat.companies',$category->id)}}">@if(App::getLocale()=='en'){{$category->name}} @else {{$category->categories[0]->name}} @endif  </a></h6>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- /box_grid -->
                </div>
                <!-- /row -->
            </div>
            <!-- /wrapper-grid -->
        </div>


        <div class="container container-custom ">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>{{__('messages.popular_brands')}}</h2>
            </div>
            <div id="reccomended" class="owl-carousel owl-theme">
                @foreach(App\Models\Brand::with('brands')->where('trans_of',0)->get() as $brand)
                <div class="item">
                    <div class="box_grid">
                        <figure>
                            <a href="{{route('brand.companies',$brand->id)}}"><img style="width: 60%;" src="{{url('/application/storage/'.$brand->image)}}"" class="img-fluid" alt="@if(App::getLocale()=='en'){{$brand->name}} @else {{$brand->brands[0]->name}} @endif" ><div class="read_more"><span>{{__('messages.brows')}}</span></div></a>
                        </figure>
                        <div class="wrapper">
                            <h3><a href="{{route('brand.companies',$brand->id)}}">@if(App::getLocale()=='en'){{$brand->name}} @else <span style="font-weight: 700">{{$brand->brands[0]->name}} @endif</span> </a></h3>
                        </div>

                    </div>
                </div>
                <!-- /item -->
                @endforeach

                <!-- /item -->
            </div>
            <!-- /carousel -->

        </div>
        <!-- /container -->




        <div class="call_section" style="background:  url({{ asset('/assets/img/home_call_background.jpg') }})">
            <div class="container clearfix">
                <div class="col-lg-5 col-md-6 float-right wow" data-wow-offset="250">
                    <div class="block-reveal">
                        <div class="block-vertical"></div>
                        <div class="box_1">
                            <h3>{!! __('messages.take_the_opportunity') !!}</h3>
                            <p>{!! __('messages.call_section_txt') !!}</p>
                            <a href="#0" class="btn_1 rounded">{{__('messages.join_now')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/call_section-->
    </main>
    <!-- /main -->
@endsection
