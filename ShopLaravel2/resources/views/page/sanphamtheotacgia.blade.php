@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Sản phẩm</h6>
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
                            @foreach($top5 as $spv)
                                {{--<li class="col-sm-12 btn center btn-default"><a--}}
                                {{--href="{{ route('chitietsanpham', $spv->id) }}">--}}
                                <div class="media beta-sales-item row single-item" style="display: inline-flex">
                                    <a style="margin: 12px" class="pull-left"
                                       href="{{ route('chitietsanpham', $spv->id) }}">
                                        <img class="w3-image" width="100%"
                                             src="public/source/image/product/{{ $spv->image }}"
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
                                        @if($spv->promotion_price == 0)
                                            <span>{{ number_format($spv->unit_price) }} đ</span>
                                        @else
                                            <span class="flash-del">{{ number_format($spv->unit_price) }}
                                                đ</span>
                                            <br>
                                            <span class="flash-sale">{{ number_format($spv->promotion_price) }}
                                                đ</span>
                                        @endif
                                    </div>
                                </div>
                                {{--</a>--}}
                                {{--</li>--}}
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-9 aside-menu">
                        <div class="beta-products-list">
                            <h4>Sản phẩm của {{ $author->name }}</h4>
                            <div class="beta-products-details">
                                {{--                                <p class="pull-left">Tìm thấy: {{ $loai_sp->count() }} sản phẩm</p>--}}
                                <div class="clearfix"></div>
                            </div>
                            @if($sp->isEmpty())
                                <h5 class="alert alert-success">
                                    Sản phẩm sắp có
                                </h5>
                            @endif
                            @if(Session::has('thongbao'))
                                <h6 class="alert alert-info">{{ Session::get('thongbao') }}</h6>
                            @endif
                            <div class="row">
                                <ul class="container-fluid" style="list-style: none;">
                                    @foreach($sp as $s)
                                        <li class="col-sm-4" style="min-height: 415px;">
                                            <div style="margin: 12px" class="">
                                                <div class="single-item">
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            @if($s->promotion_price != 0)
                                                                <div class="ribbon-wrapper">
                                                                    <div class="ribbon sale">Sale</div>
                                                                </div>
                                                            @endif
                                                            <div class="single-item-header">
                                                                <a href="{{ route('chitietsanpham', $s->id) }}"><img
                                                                            class=".img-fluid" style="height: 220px"
                                                                            src="public/source/image/product/{{ $s->image }}"
                                                                            alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            @foreach($s->type_detail as $type)
                                                                <a class="label w3-medium"
                                                                   style="font-size: 13px!important;"
                                                                   href="{{ route('loaisanphamchitiet', $type->id) }}">{{ $type->name }}</a>
                                                                <div class="clear clearfix row"
                                                                     style="margin: 2px auto"></div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="single-item-body">
                                                        <p class="single-item-title"><a
                                                                    href="{{ route('chitietsanpham', $s->id) }}">{{ $s->name }}</a>
                                                        </p>
                                                        <div class="w3-display-container">
                                                            @foreach($s->author as $author)
                                                                <a class="label w3-medium"
                                                                   style="font-size: 13px!important;"
                                                                   href="{{ route('sanphamtheotacgia', $author->id) }}">{{ $author->name }}</a>
                                                                <div class="clear clearfix row"
                                                                     style="margin: 2px auto"></div>
                                                            @endforeach
                                                        </div>
                                                        <div>
                                                            <lable>Lượt xem:</lable>
                                                            {{ $s->view_count }}
                                                        </div>
                                                        <p class="single-item-price">
                                                            @if($s->promotion_price == 0)
                                                                <span>{{ number_format($s->unit_price) }} đ</span>
                                                            @else
                                                                <span class="flash-del">{{ number_format($s->unit_price) }}
                                                                    đ</span>
                                                                <span class="flash-sale">{{ number_format($s->promotion_price) }}
                                                                    đ</span>
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="single-item-caption">
                                                        <a class="add-to-cart pull-left"
                                                           href="{{ route('themgiohang', $s->id) }}"><i
                                                                    class="fa fa-shopping-cart"></i></a>
                                                        <a class="beta-btn primary"
                                                           href="{{ route('chitietsanpham', $s->id) }}">Chi tiết <i
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
                            <div class="row w3-bar-item">{{ $sp->links() }}</div>
                        </div> <!-- .beta-products-list -->
                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
