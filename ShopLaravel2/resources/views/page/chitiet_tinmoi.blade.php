@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Tin mới</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{ route('trang-chu') }}">Trang chủ</a> / <span>Tin mới</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content">
            <div class="row">
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="public/source/image/product/{{ $new->image }}" alt="">
                        </div>
                        <div class="col-sm-8">
                            <div class="single-item-body">
                                <p class="single-item-title">
                                <h5>{{ $new->title }}</h5></p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="woocommerce-tabs">
                        <ul class="tabs">
                            <li><a href="#tab-description">Mô tả</a></li>
                        </ul>
                        <div class="panel" id="tab-description">
                            <p style="font-size: 18px;">{!! $new->content !!}</p>
                        </div>
                    </div>
                    <div class="space50">&nbsp;</div>

                    <h4>Tin khác</h4>
                    <div class="beta-products-details">
                        <p class="pull-left">Tìm thấy {{ count($new_khac) }} tin</p>
                        <div class="clearfix"></div>
                    </div>
                    <ul>
                        @foreach($new_khac as $new)
                            <li class="text-info"
                                style="padding-left: 20px; font-size: 20px; margin-bottom: 20px;">
                                <a href="{{ route('chitiettinmoi', $new->id) }}" style="font-family: 'Open Sans',sans-serif">
                                    <u>{{ $new->title }}</u>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-3">
                    <ul class="aside-menu container-fluid list-group">
                        <h6 class="title center">Xem nhiều</h6>
                        @foreach($sp_moi as $spm)
                            {{--@if($spm->id != $sanpham->id)--}}
                                <div class="media beta-sales-item row single-item" style="display: inline-flex">
                                    <a style="margin: 12px" class="pull-left"
                                       href="{{ route('chitietsanpham', $spm->id) }}">
                                        <img class="w3-image" width="100%"
                                             src="public/source/image/product/{{ $spm->image }}"
                                             alt="">
                                    </a>
                                    <div class="media-body w3-bar">
                                        <a class="pull-left single-item-title"
                                           href="{{ route('chitietsanpham', $spm->id) }}">{{ $spm->name }}</a>
                                        <br>
                                        <div class="pull-left">
                                            @foreach($spm->type_detail as $type)
                                                <a class="label w3-medium"
                                                   style="font-size: 13px!important; color: #1d439b"
                                                   href="{{ route('loaisanphamchitiet', $type->id) }}">{{ $type->name }}</a>
                                            @endforeach
                                        </div>
                                        <div class="clear"></div>
                                        <div>
                                            <lable>Lượt xem:</lable>
                                            {{ $spm->view_count }}
                                        </div>
                                        @if($spm->promotion_price == 0)
                                            <span>{{ number_format($spm->unit_price) }} đ</span>
                                        @else
                                            <span class="flash-del">{{ number_format($spm->unit_price) }}
                                                đ</span>
                                            <br>
                                            <span class="flash-sale">{{ number_format($spm->promotion_price) }}
                                                đ</span>
                                        @endif
                                    </div>
                                </div>
                            {{--@endif--}}
                        @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                </div>
            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
