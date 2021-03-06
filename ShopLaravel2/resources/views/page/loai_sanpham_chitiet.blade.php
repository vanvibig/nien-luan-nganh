@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Sản phẩm {{ $loai_sp->name }}</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{ route('trang-chu') }}">Home</a> / <span>Loại Sản phẩm</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-3">
                        <ul class="aside-menu container-fluid w3-bar">
                            <h6 class="title center">Thể loại</h6>
                            <br>
                            @foreach($loai_chitiet as $loai)
                                <li class="btn w3-bar-item w3-medium w3-left-align"
                                    @if($loai->id == $loai_sp->id)
                                    id="{{ "kv_active" }}"
                                    @endif
                                    style="width: 50%; float: left; background-color: #f8f8f8">
                                    <a
                                            href="{{ route('loaisanphamchitiet', $loai->id) }}">{{ $loai->name }}</a>
                                </li>
                                <div class="w-100"></div>
                            @endforeach
                        </ul>

                        <br>
                        <ul class="aside-menu container-fluid list-group">
                            <h6 class="title center">Xem nhiều</h6>
                            @foreach($sp_theoview as $spv)
                                {{--<li class="col-sm-12 btn center btn-default"><a--}}
                                {{--href="{{ route('chitietsanpham', $spv->id) }}">--}}
                                <div class="media beta-sales-item row single-item" style="display: inline-flex">
                                    <a style="margin: 12px" class="pull-left"
                                       href="{{ route('chitietsanpham', $spv->id) }}">
                                        <img class="w3-image" width="100%"
                                             src="{{ asset('source/image/product/' . $spv->image) }}"
                                             alt="">
                                    </a>
                                    <div class="media-body w3-bar">
                                        <a class="pull-left single-item-title"
                                           href="{{ route('chitietsanpham', $spv->id) }}">{{ $spv->name }}</a>
                                        <br>
                                        <div class="pull-left">
                                            @foreach($spv->type_detail as $type)
                                                <a class="label w3-medium"
                                                   style="font-size: 13px!important; color: #1d439b"
                                                   href="{{ route('loaisanphamchitiet', $type->id) }}">{{ $type->name }}</a>
                                            @endforeach
                                        </div>
                                        <div class="clear"></div>
                                        <div>
                                            <lable>Lượt xem:</lable>
                                            {{ $spv->view_count }}
                                        </div>
                                        @if(count($spv->promotion) == 0 || $spv->promotion[0]->status == 0)
                                            <span>{{ number_format($spv->unit_price) }} đ</span>
                                        @endif
                                        @foreach($spv->promotion as $prom)
                                            @if($prom->status == 1 && Carbon\Carbon::today() >= $prom->start && Carbon\Carbon::today() <= $prom->end)
                                                <span class="flash-del">{{ number_format($spv->unit_price) }}
                                                    đ</span>
                                                <span class="flash-sale">&nbsp;-{{ $prom->discount}}
                                                    %</span>
                                                <br>
                                                <span class="flash-sale">&nbsp;{{ number_format($spv->unit_price*(1 - $prom->discount/100))}}</span>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                {{--</a>--}}
                                {{--</li>--}}
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-9 aside-menu">
                        <div class="beta-products-list">
                            <h4>{{ $loai_sp->name }}</h4>
                            <div class="beta-products-details">
                                {{--                                <p class="pull-left">Tìm thấy: {{ $loai_sp->count() }} sản phẩm</p>--}}
                                <div class="clearfix"></div>
                            </div>
                            @if($sp_theoloai->isEmpty())
                                <h5 class="alert alert-success">
                                    Sản phẩm loại {{ $loai_sp->name }} đang về
                                </h5>
                            @endif
                            @if(Session::has('thongbao'))
                                <h6 class="alert alert-info">{{ Session::get('thongbao') }}</h6>
                            @endif
                            <div class="row">
                                <ul class="container-fluid" style="list-style: none;">
                                    @foreach($sp_theoloai as $sp)
                                        <li class="col-sm-4" style="min-height: 450px;">
                                            <div style="margin: 12px" class="">
                                                <div class="single-item">
                                                    <div class="row w3-display-container">
                                                        <div class="col-sm-8">
                                                            @foreach($sp->promotion as $prom)
                                                                @if($prom->status == 1 && Carbon\Carbon::today() >= $prom->start && Carbon\Carbon::today() <= $prom->end)
                                                                    <div class="ribbon-wrapper">
                                                                        <div class="ribbon sale">Sale</div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                            <div class="single-item-header">
                                                                <a href="{{ route('chitietsanpham', $sp->id) }}"><img
                                                                            class=".img-fluid" style="height: 220px"
                                                                            src="source/image/product/{{ $sp->image }}"
                                                                            alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 w3-display-container">
                                                            @foreach($sp->type_detail as $type)
                                                                <a class="label w3-medium"
                                                                   style="font-size: 13px!important;"
                                                                   href="{{ route('loaisanphamchitiet', $type->id) }}">{{ $type->name }}</a>
                                                                <div class="clear clearfix row"
                                                                     style="margin: 2px auto"></div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="single-item-body">
                                                        <p class="single-item-title">
                                                            <a href="{{ route('chitietsanpham', $sp->id) }}">{{ $sp->name }}</a>
                                                        </p>
                                                        <div class="w3-display-container">
                                                            @foreach($sp->author as $author)
                                                                <a class="label w3-medium"
                                                                   style="font-size: 13px!important;"
                                                                   href="{{ route('sanphamtheotacgia', $author->id) }}">{{ $author->name }}</a>
                                                                <div class="clear clearfix row"
                                                                     style="margin: 2px auto"></div>
                                                            @endforeach
                                                        </div>
                                                        <div>
                                                            <lable>Lượt xem:</lable>
                                                            {{ $sp->view_count }}
                                                        </div>
                                                        <p class="single-item-price">
                                                            @if(count($sp->promotion) == 0 || $sp->promotion[0]->status == 0)
                                                                <span>{{ number_format($sp->unit_price) }} đ</span>
                                                            @endif
                                                            @foreach($sp->promotion as $prom)
                                                                @if($prom->status == 1 && Carbon\Carbon::today() >= $prom->start && Carbon\Carbon::today() <= $prom->end)
                                                                    <span class="flash-del">{{ number_format($sp->unit_price) }}
                                                                        đ</span>
                                                                    <span class="flash-sale">&nbsp;-{{ $prom->discount}}
                                                                        %</span>
                                                                    <br>
                                                                    <span class="flash-sale">&nbsp;{{ number_format($sp->unit_price*(1 - $prom->discount/100))}}
                                                                        đ</span>
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                    <div class="single-item-caption">
                                                        <a class="add-to-cart pull-left"
                                                           href="{{ route('themgiohang', $sp->id) }}"><i
                                                                    class="fa fa-shopping-cart"></i></a>
                                                        <a class="beta-btn primary"
                                                           href="{{ route('chitietsanpham', $sp->id) }}">Chi tiết <i
                                                                    class="fa fa-chevron-right"></i></a>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <div class="w-100"></div>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="row w3-bar-item">{{ $sp_theoloai->links() }}</div>
                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>

                        <div class="beta-products-list">
                            <h4>Sản phẩm loại khác</h4>
                            <div class="beta-products-details">
                                {{--                                <p class="pull-left">{{ count($loai_khac) }} sản phẩm khác</p>--}}
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                <ul class="container-fluid" style="list-style: none;">
                                    @foreach($loai_khac as $sp)
                                        <li class="col-sm-4" style="min-height: 450px;">
                                            <div style="margin: 12px" class="">
                                                <div class="single-item">
                                                    <div class="row w3-display-container">
                                                        <div class="col-sm-8">
                                                            @foreach($sp->promotion as $prom)
                                                                @if($prom->status == 1 && Carbon\Carbon::today() >= $prom->start && Carbon\Carbon::today() <= $prom->end)
                                                                    <div class="ribbon-wrapper">
                                                                        <div class="ribbon sale">Sale</div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                            <div class="single-item-header">
                                                                <a href="{{ route('chitietsanpham', $sp->id) }}"><img
                                                                            class=".img-fluid" style="height: 220px"
                                                                            src="source/image/product/{{ $sp->image }}"
                                                                            alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 w3-display-container">
                                                            @foreach($sp->type_detail as $type)
                                                                <a class="label w3-medium"
                                                                   style="font-size: 13px!important;"
                                                                   href="{{ route('loaisanphamchitiet', $type->id) }}">{{ $type->name }}</a>
                                                                <div class="clear clearfix row"
                                                                     style="margin: 2px auto"></div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="single-item-body">
                                                        <p class="single-item-title">
                                                            <a href="{{ route('chitietsanpham', $sp->id) }}">{{ $sp->name }}</a>
                                                        </p>
                                                        <div class="w3-display-container">
                                                            @foreach($sp->author as $author)
                                                                <a class="label w3-medium"
                                                                   style="font-size: 13px!important;"
                                                                   href="{{ route('sanphamtheotacgia', $author->id) }}">{{ $author->name }}</a>
                                                                <div class="clear clearfix row"
                                                                     style="margin: 2px auto"></div>
                                                            @endforeach
                                                        </div>
                                                        <div>
                                                            <lable>Lượt xem:</lable>
                                                            {{ $sp->view_count }}
                                                        </div>
                                                        <p class="single-item-price">
                                                            @if(count($sp->promotion) == 0 || $sp->promotion[0]->status == 0)
                                                                <span>{{ number_format($sp->unit_price) }} đ</span>
                                                            @endif
                                                            @foreach($sp->promotion as $prom)
                                                                @if($prom->status == 1 && Carbon\Carbon::today() >= $prom->start && Carbon\Carbon::today() <= $prom->end)
                                                                    <span class="flash-del">{{ number_format($sp->unit_price) }}
                                                                        đ</span>
                                                                    <span class="flash-sale">&nbsp;-{{ $prom->discount}}
                                                                        %</span>
                                                                    <br>
                                                                    <span class="flash-sale">&nbsp;{{ number_format($sp->unit_price*(1 - $prom->discount/100))}}
                                                                        đ</span>
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                    <div class="single-item-caption">
                                                        <a class="add-to-cart pull-left"
                                                           href="{{ route('themgiohang', $sp->id) }}"><i
                                                                    class="fa fa-shopping-cart"></i></a>
                                                        <a class="beta-btn primary"
                                                           href="{{ route('chitietsanpham', $sp->id) }}">Chi tiết <i
                                                                    class="fa fa-chevron-right"></i></a>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <div class="w-100"></div>
                                    @endforeach
                                </ul>
                            </div>
                            {{--<div class="row">{{ $sp_khac }}</div>--}}
                            <div class="space40">&nbsp;</div>

                        </div> <!-- .beta-products-list -->
                    </div>
                </div> <!-- end section with sidebar and main content -->
            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
