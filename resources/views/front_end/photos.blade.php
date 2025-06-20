@extends('front_end.template.layout')
@section('header')
    <style>
        .gallery-item {
            position: relative;
            overflow: hidden;
        }

        .grid-item-holder img {
            width: 100%;
            height: auto;
            display: block;
        }

        .folder-title {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.6);
            color: #fff;
            text-align: center;
            padding: 8px;
            z-index: 2;
        }
    </style>
@stop

@section('content')
<div class="body-overlay fs-wrapper search-form-overlay close-search-form"></div>
            <!--header-end-->
            <!--warpper-->
            <div class="wrapper">
                <!--content-->
                <div class="content">
                    <!--section-->
                     <div class="section hero-section ">
                        <div class="hero-section-wrap inner-head">
                            <div class="hero-section-wrap-item">
                                <div class="container">
                                    <div class="hero-section-container">

                                        <div class="hero-section-title_container">

                                            <div class="hero-section-title">
                                                <h2 style="text-transform: uppercase;">{{ __('messages.photos_media') }}</h2>

                                            </div>
                                        </div>
                                        <div class="hs-scroll-down-wrap">
                                            <div class="scroll-down-item">
                                                <div class="mousey">
                                                    <div class="scroller"></div>
                                                </div>
                                                <span>{{ __('messages.scroll_down_to_discover') }}</span>
                                            </div>
                                            <div class="svg-corner svg-corner_white"  style="bottom:0;left:-40px;"></div>
                                        </div>

                                    </div>
                                </div>
                                <div class="bg-wrap bg-hero bg-parallax-wrap-gradien fs-wrapper" data-scrollax-parent="true">
                                    <div class="bg" data-bg="{{ asset('') }}front-assets/images/bg/12.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
                                </div>
                                <div class="svg-corner svg-corner_white"  style="bottom:64px;right: 0;z-index: 100"></div>
                            </div>
                        </div>
                    </div>



                    <!--section-end-->
                    <!--container-->
                    <div class="container">
                        <!--breadcrumbs-list-->
                        <!-- <div class="breadcrumbs-list bl_flat">
                            <a href="#">Home</a><span>NEWS & MEDIA</span>
                            <div class="breadcrumbs-list_dec"><i class="fa-thin fa-arrow-up"></i></div>
                        </div> -->
                        <!--breadcrumbs-list end-->
                    </div>
                    <!--container end-->
                    <!--main-content-->
                    <div class="main-content  ms_vir_height">
                        <!--boxed-container-->
                        <div class="container">
                            <div class="row">
                                <!-- user-dasboard-menu_wrap -->
                                <div class="col-lg-3">
                                    <div class="boxed-content btf_init">
                                        <div class="user-dasboard-menu_wrap">
                                            <div class="user-dasboard-menu faq-nav">
                                                <ul>
                                                    <li><a href="{{url('photos')}}" class="act-scrlink">{{ __('messages.photos_media') }}</a></li>
{{--                                                    <li><a href="{{url('videos')}}" >{{ __('messages.videos') }} </a></li>--}}
{{--                                                    <li><a href="{{url('blogs')}}" >{{ __('messages.blog') }}</a></li>--}}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- user-dasboard-menu_wrap end-->

                                <!-- pricing-column -->
                                <div class="col-lg-9">
                                    <div class="dashboard-title">
                                        <!-- Folders Gallery -->
                                    </div>
                                    <div class="db-container">
                                        <div class="gallery-items grid-small-pad list-single-gallery three-coulms">
                                            @foreach ($folders as $folder)
                                                <div class="gallery-item">
                                                    <div class="grid-item-holder hovzoom" style="position: relative;">
                                                        <a href="{{ url('folder/'.$folder->id) }}">
                                                            <img src="{{ aws_asset_path($folder->cover_image) }}" alt="{{ $folder->title }}">
                                                            <div class="folder-title">
                                                                <h4>{{ $folder->title }}</h4>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <!-- pricing-column end-->
                            </div>
                            <div class="limit-box"></div>
                        </div>

                        <!--boxed-container end-->
                    </div>
                    <!--main-content end-->

@stop

@section('script')

@stop
