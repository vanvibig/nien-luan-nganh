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
                        <ul class="aside-menu">
                            <h6 class="title">Loại</h6>
                            @foreach($loai as $l)
                                <li style="width: 100%" class="btn center btn-success"><a href="{{ route('loaisanpham', $l->id) }}">{{ $l->name }}</a></li>
                            @endforeach
                                <hr>
                            <h6 class="title">Thể loại</h6>
                            @foreach($loai_chitiet as $loai)
                                <li class="col-sm-6 btn center btn-success" style="width: 50%; float: left;"><a
                                            href="{{ route('loaisanphamchitiet', $loai->id) }}">{{ $loai->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <div class="beta-products-list">
                            <h4>{{ $loai_sp->name }}</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy: {{ $loai_sp->count() }} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach($sp_theoloai as $sp)
                                    <div class="col-sm-4" style="margin-bottom: 40px">
                                        <div class="single-item">
                                            @if($sp->promotion_price != 0)
                                                <div class="ribbon-wrapper">
                                                    <div class="ribbon sale">Sale</div>
                                                </div>
                                            @endif
                                            <div class="single-item-header">
                                                <a href="{{ route('chitietsanpham', $sp->id) }}"><img height="250px"
                                                                                                      src="source/image/product/{{ $sp->image }}"
                                                                                                      alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{ $sp->name }}</p>
                                                <div>
                                                    <span>Thể loại: </span>
                                                    <a style="margin: 3px" class="label label-default"
                                                       href="{{ route('loaisanpham', $sp->product_type->id) }}">{{ $sp->product_type->name }}
                                                    </a>
                                                    @foreach($sp->type_detail as $type)
                                                        <a class="label label-default"
                                                           href="{{ route('loaisanphamchitiet', $type->id) }}">{{ $type->name }}</a>
                                                    @endforeach
                                                </div>
                                                <p class="single-item-price">
                                                    @if($sp->promotion_price == 0)
                                                        <span>{{ number_format($sp->unit_price) }} đ</span>
                                                    @else
                                                        <span class="flash-del">{{ number_format($sp->unit_price) }}
                                                            đ</span>
                                                        <span class="flash-sale">{{ number_format($sp->promotion_price) }}
                                                            đ</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left"
                                                   href="{{ route('themgiohang', $sp->id) }}"><i
                                                            class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary"
                                                   href="{{ route('chitietsanpham', $sp->id) }}">Details <i
                                                            class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>

                        <div class="beta-products-list">
                            <h4>Sản phẩm khác</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">{{ count($sp_khac) }} sản phẩm khác</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach($sp_khac as $sp)
                                    <div class="col-sm-4" style="margin-bottom: 40px">
                                        <div class="single-item">
                                            @if($sp->promotion_price != 0)
                                                <div class="ribbon-wrapper">
                                                    <div class="ribbon sale">Sale</div>
                                                </div>
                                            @endif
                                            <div class="single-item-header">
                                                <a href="{{ route('chitietsanpham', $sp->id) }}"><img height="250px"
                                                                                                      src="source/image/product/{{ $sp->image }}"
                                                                                                      alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{ $sp->name }}</p>
                                                <div>
                                                    <span>Thể loại: </span>
                                                    <a style="margin: 3px" class="label label-default"
                                                       href="{{ route('loaisanpham', $sp->product_type->id) }}">{{ $sp->product_type->name }}
                                                    </a>
                                                    @foreach($sp->type_detail as $type)
                                                        <a class="label label-default"
                                                           href="{{ route('loaisanphamchitiet', $type->id) }}">{{ $type->name }}</a>
                                                    @endforeach
                                                </div>
                                                <p class="single-item-price">
                                                    @if($sp->promotion_price == 0)
                                                        <span>{{ number_format($sp->unit_price) }} đ</span>
                                                    @else
                                                        <span class="flash-del">{{ number_format($sp->unit_price) }}
                                                            đ</span>
                                                        <span class="flash-sale">{{ number_format($sp->promotion_price) }}
                                                            đ</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left"
                                                   href="{{ route('themgiohang', $sp->id) }}"><i
                                                            class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary"
                                                   href="{{ route('chitietsanpham', $sp->id) }}">Details <i
                                                            class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">{{ $sp_khac }}</div>
                            <div class="space40">&nbsp;</div>

                        </div> <!-- .beta-products-list -->
                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
