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
                <div class="col-sm-12 container">
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
                                @if(count($sanpham->promotion) == 0 || $sanpham->promotion[0]->status == 0)
                                    <span>{{ number_format($sanpham->unit_price) }} đ</span>
                                @endif
                                @foreach($sanpham->promotion as $prom)
                                    @if($prom->status == 1 && Carbon\Carbon::today() >= $prom->start && Carbon\Carbon::today() <= $prom->end)
                                        <span class="flash-del">{{ number_format($sanpham->unit_price) }}
                                            đ</span>
                                        <span class="flash-sale">&nbsp;-{{ $prom->discount}}
                                            %</span>
                                        <br>
                                        <span class="flash-sale">&nbsp;{{ number_format($sanpham->unit_price*(1 - $prom->discount/100))}}
                                            đ</span>
                                    @endif
                                @endforeach
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
                                <div class="single-item-options">
                                    <a class="add-to-cart" href="{{ route('themgiohang', $sanpham->id) }}"><i
                                                class="fa fa-shopping-cart"></i></a>
                                    <div class="clearfix"></div>
                                    Thêm vào giỏ hàng
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
                                    @foreach($cung_loai as $sp)
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
                            {{--                            <div class="row w3-bar-item">{{ $sptt_product->links() }}</div>--}}
                        </div> <!-- .beta-products-list -->
                    </div>
                </div>
            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
