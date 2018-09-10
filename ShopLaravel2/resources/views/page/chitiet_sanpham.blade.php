@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Sản phẩm {{ $sanpham->name }}</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{ route('trang-chu') }}">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content">
            <div class="row">
                <div class="col-sm-9 container">
                    @if(Session::has('thongbao'))
                        <h6 class="alert alert-info">{{ Session::get('thongbao') }}</h6>
                    @endif
                    <div class="row aside-menu">
                        <div class="col-sm-4">
                            <img src="source/image/product/{{ $sanpham->image }}" alt="">
                            <div>
                                <lable>Thể loại:</lable>
                                <div class="w3-bar">
                                    @foreach($sanpham->type_detail as $type)
                                        <a class="btn w3-bar-item w3-medium w3-left-align" style="color: #1d439b"
                                           href="{{ route('loaisanphamchitiet', $type->id) }}">{{ $type->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                <lable>Lượt xem:</lable>
                                {{ $sanpham->view_count }}
                            </div>
                            <div>
                                <lable>Còn lại:</lable>
                                {{ $sanpham->amount }} sản phẩm
                            </div>
                            <div>
                                <lable>Tác giả:</lable>
                                <div class="w3-bar">
                                    @foreach($sanpham->author as $author)
                                        <a class="btn w3-bar-item w3-medium w3-left-align" style="color: #1d439b"
                                           href="{{ route('sanphamtheotacgia', $author->id) }}">{{ $author->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <br>
                            <p class="single-item-price">
                                @if($sanpham->promotion_price == 0)
                                    <span>{{ number_format($sanpham->unit_price) }} đ</span>
                                @else
                                    <span class="flash-del">{{ number_format($sanpham->unit_price) }} đ</span>
                                    <span class="flash-sale">{{ number_format($sanpham->promotion_price) }} đ</span>
                                @endif
                            </p>
                        </div>
                        <div class="col-sm-8">
                            <div class="single-item-body">
                                <p class="single-item-title">
                                <h2>{{ $sanpham->name }}</h2>
                                </p>
                            </div>
                            <br>
                            <div class="single-item-desc">
                                <p>{!! $sanpham->description !!}</p>
                                <div class="space20">&nbsp;</div>
                                {{--<p>Số lượng:</p>--}}
                                <div class="single-item-options">
                                    {{--<select class="wc-select" name="color">--}}
                                        {{--<option>Số lượng</option>--}}
                                        {{--<option value="1">1</option>--}}
                                        {{--<option value="2">2</option>--}}
                                        {{--<option value="3">3</option>--}}
                                        {{--<option value="4">4</option>--}}
                                        {{--<option value="5">5</option>--}}
                                    {{--</select>--}}
                                    <a class="add-to-cart" href="{{ route('themgiohang', $sanpham->id) }}"><i class="fa fa-shopping-cart"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row aside-menu">
                        <div class="beta-products-list">
                            <h4 class="">Sản phẩm tương tự</h4>
                            <div class="beta-products-details">
                                {{--<p class="pull-left">Tìm thấy {{ count($sptt_product) }} sản phẩm</p>--}}
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <ul class="container-fluid" style="list-style: none;">
                                    @foreach($cung_loai as $l)
                                        @foreach($l->product as $sptt)
                                            @if($sptt->id != $sanpham->id)
                                                <li class="col-sm-4" style="min-height: 415px;">
                                                    <div style="margin: 12px" class="">
                                                        <div class="single-item">
                                                            <div class="row">
                                                                <div class="col-sm-8">
                                                                    @if($sptt->promotion_price != 0)
                                                                        <div class="ribbon-wrapper">
                                                                            <div class="ribbon sale">Sale</div>
                                                                        </div>
                                                                    @endif
                                                                    <div class="single-item-header">
                                                                        <a href="{{ route('chitietsanpham', $sptt->id) }}"><img
                                                                                    class=".img-fluid"
                                                                                    style="height: 220px"
                                                                                    src="source/image/product/{{ $sptt->image }}"
                                                                                    alt=""></a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    @foreach($sptt->type_detail as $type)
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
                                                                            href="{{ route('chitietsanpham', $sptt->id) }}">{{ $sptt->name }}</a>
                                                                </p>
                                                                <div class="w3-display-container">
                                                                    @foreach($sptt->author as $author)
                                                                        <a class="label w3-medium"
                                                                           style="font-size: 13px!important;"
                                                                           href="{{ route('sanphamtheotacgia', $author->id) }}">{{ $author->name }}</a>
                                                                        <div class="clear clearfix row"
                                                                             style="margin: 2px auto"></div>
                                                                    @endforeach
                                                                </div>
                                                                <div>
                                                                    <lable>Lượt xem:</lable>
                                                                    {{ $sptt->view_count }}
                                                                </div>
                                                                <p class="single-item-price">
                                                                    @if($sptt->promotion_price == 0)
                                                                        <span>{{ number_format($sptt->unit_price) }}
                                                                            đ</span>
                                                                    @else
                                                                        <span class="flash-del">{{ number_format($sptt->unit_price) }}
                                                                            đ</span>
                                                                        <span class="flash-sale">{{ number_format($sptt->promotion_price) }}
                                                                            đ</span>
                                                                    @endif
                                                                </p>
                                                            </div>
                                                            <div class="single-item-caption">
                                                                <a class="add-to-cart pull-left"
                                                                   href="{{ route('themgiohang', $sptt->id) }}"><i
                                                                            class="fa fa-shopping-cart"></i></a>
                                                                <a class="beta-btn primary"
                                                                   href="{{ route('chitietsanpham', $sptt->id) }}">Chi
                                                                    tiết <i
                                                                            class="fa fa-chevron-right"></i></a>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <div class="w-100"></div>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
{{--                            <div class="row w3-bar-item">{{ $sptt_product->links() }}</div>--}}
                        </div> <!-- .beta-products-list -->
                    </div>
                </div>
                <div class="col-sm-3">
                    <ul class="aside-menu container-fluid list-group">
                        <h6 class="title center">Xem nhiều</h6>
                        @foreach($sp_theoview as $spv)
                            @if($spv->id != $sanpham->id)
                                <div class="media beta-sales-item row single-item" style="display: inline-flex">
                                    <a style="margin: 12px" class="pull-left"
                                       href="{{ route('chitietsanpham', $spv->id) }}">
                                        <img class="w3-image" width="100%"
                                             src="source/image/product/{{ $spv->image }}"
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
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
