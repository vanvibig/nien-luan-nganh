@extends('master')
@section('content')
    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <div class="bannercontainer">
                <div class="banner">
                    <ul>
                    @foreach($slide as $sl)
                        <!-- THE FIRST SLIDE -->
                            <li data-transition="boxfade" data-slotamount="20" class="active-revslide"
                                style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                                <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined"
                                     data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined"
                                     data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined"
                                     data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined"
                                     data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined"
                                     data-oheight="undefined">
                                    <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover"
                                         data-bgposition="center center" data-bgrepeat="no-repeat"
                                         data-lazydone="undefined" src="source/image/slide/{{ $sl->image }}"
                                         data-src="source/image/slide/{{ $sl->image }}"
                                         style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{ $sl->image }}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
    <!--slider-->
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
                    <div class="col-sm-9 container aside-menu">
                        <div class="beta-products-list">
                            <h4 class="">Sản phẩm mới</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{ count($new_product) }} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                            @if(Session::has('thongbao'))
                                <h6 class="alert alert-info">{{ Session::get('thongbao') }}</h6>
                            @endif
                            <div class="row">
                                <ul class="container-fluid" style="list-style: none;">
                                    @foreach($new_product as $new)
                                        <li class="col-sm-4" style="min-height: 440px;">
                                            <div style="margin: 12px" class="">
                                                <div class="single-item">
                                                    <div class="row w3-display-container">
                                                        <div class="col-sm-8">
                                                            @foreach($new->promotion as $prom)
                                                                @if($prom->status == 1 && Carbon\Carbon::today() >= $prom->start && Carbon\Carbon::today() <= $prom->end)
                                                                    <div class="ribbon-wrapper">
                                                                        <div class="ribbon sale">Sale</div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                            <div class="single-item-header">
                                                                <a href="{{ route('chitietsanpham', $new->id) }}"><img
                                                                            class=".img-fluid" style="height: 220px"
                                                                            src="source/image/product/{{ $new->image }}"
                                                                            alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 w3-display-container">
                                                            @foreach($new->type_detail as $type)
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
                                                            <a href="{{ route('chitietsanpham', $new->id) }}">{{ $new->name }}</a>
                                                        </p>
                                                        <div class="w3-display-container">
                                                            @foreach($new->author as $author)
                                                                <a class="label w3-medium"
                                                                   style="font-size: 13px!important;"
                                                                   href="{{ route('sanphamtheotacgia', $author->id) }}">{{ $author->name }}</a>
                                                                <div class="clear clearfix row"
                                                                     style="margin: 2px auto"></div>
                                                            @endforeach
                                                        </div>
                                                        <div>
                                                            <lable>Lượt xem:</lable>
                                                            {{ $new->view_count }}
                                                        </div>
                                                        <p class="single-item-price">
                                                            @if(count($new->promotion) == 0 || $new->promotion[0]->status == 0)
                                                                <span>{{ number_format($new->unit_price) }} đ</span>
                                                            @endif
                                                            @foreach($new->promotion as $prom)
                                                                @if($prom->status == 1 && Carbon\Carbon::today() >= $prom->start && Carbon\Carbon::today() <= $prom->end)
                                                                    <span class="flash-del">{{ number_format($new->unit_price) }}
                                                                        đ</span>
                                                                    <span class="flash-sale">&nbsp;-{{ $prom->discount}}
                                                                        %</span>
                                                                    <br>
                                                                    <span class="flash-sale">&nbsp;{{ number_format($new->unit_price*(1 - $prom->discount/100))}}
                                                                        đ</span>
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                    <div class="single-item-caption">
                                                        <a class="add-to-cart pull-left"
                                                           href="{{ route('themgiohang', $new->id) }}"><i
                                                                    class="fa fa-shopping-cart"></i></a>
                                                        <a class="beta-btn primary"
                                                           href="{{ route('chitietsanpham', $new->id) }}">Chi tiết <i
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
                            <div class="row w3-bar-item">{{ $new_product->links() }}</div>
                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>

                        <div class="beta-products-list">
                            <h4>Sản phẩm khuyến mãi</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{ count($sanpham_khuyenmai) }} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <ul class="container-fluid" style="list-style: none;">
                                    @foreach($sanpham_khuyenmai as $spkm)
                                        @if(count($spkm->promotion) != 0)
                                            @if($spkm->promotion[0]->status == 1)
                                                <li class="col-sm-4" style="min-height: 440px;">
                                                    <div style="margin: 12px" class="">
                                                        <div class="single-item">
                                                            <div class="row">
                                                                <div class="col-sm-8">
                                                                    @foreach($spkm->promotion as $prom)
                                                                        @if($prom->status == 1 && Carbon\Carbon::today() >= $prom->start && Carbon\Carbon::today() <= $prom->end)
                                                                            <div class="ribbon-wrapper">
                                                                                <div class="ribbon sale">Sale</div>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                    <div class="single-item-header">
                                                                        <a href="{{ route('chitietsanpham', $spkm->id) }}"><img
                                                                                    class=".img-fluid"
                                                                                    style="height: 220px"
                                                                                    src="source/image/product/{{ $spkm->image }}"
                                                                                    alt=""></a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    {{--<span>Thể loại: </span>--}}
                                                                    @foreach($spkm->type_detail as $type)
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
                                                                            href="{{ route('chitietsanpham', $spkm->id) }}">{{ $spkm->name }}</a>
                                                                </p>
                                                                <div class="w3-display-container">
                                                                    @foreach($spkm->author as $author)
                                                                        <a class="label w3-medium"
                                                                           style="font-size: 13px!important;"
                                                                           href="{{ route('sanphamtheotacgia', $author->id) }}">{{ $author->name }}</a>
                                                                        <div class="clear clearfix row"
                                                                             style="margin: 2px auto"></div>
                                                                    @endforeach
                                                                </div>
                                                                <div>
                                                                    <lable>Lượt xem:</lable>
                                                                    {{ $spkm->view_count }}
                                                                </div>
                                                                <p class="single-item-price">
                                                                    @if(count($spkm->promotion) == 0 || $spkm->promotion[0]->status == 0)
                                                                        <span>{{ number_format($spkm->unit_price) }}
                                                                            đ</span>
                                                                    @endif
                                                                    @foreach($spkm->promotion as $prom)
                                                                        @if($prom->status == 1 && Carbon\Carbon::today() >= $prom->start && Carbon\Carbon::today() <= $prom->end)
                                                                            <span class="flash-del">{{ number_format($spkm->unit_price) }}
                                                                                đ</span>
                                                                            <span class="flash-sale">&nbsp;-{{ $prom->discount}}
                                                                                %</span>
                                                                            <br>
                                                                            <span class="flash-sale">&nbsp;{{ number_format($spkm->unit_price*(1 - $prom->discount/100))}}
                                                                                đ</span>
                                                                        @endif
                                                                    @endforeach
                                                                </p>
                                                            </div>
                                                            <div class="single-item-caption">
                                                                <a class="add-to-cart pull-left"
                                                                   href="{{ route('themgiohang', $spkm->id) }}"><i
                                                                            class="fa fa-shopping-cart"></i></a>
                                                                <a class="beta-btn primary"
                                                                   href="{{ route('chitietsanpham', $spkm->id) }}">Chi
                                                                    tiết
                                                                    <i
                                                                            class="fa fa-chevron-right"></i></a>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <div class="w-100"></div>
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                            <div class="row">{{ $sanpham_khuyenmai->links() }}</div>
                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>

                        <div class="beta-products-list">
                            <h4>Tin mới</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{ count($news) }} tin</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <ul>
                                        @foreach($news as $new)
                                            <li class="text-info"
                                                style="padding-left: 20px; font-size: 20px; margin-bottom: 20px;">
                                                <a href="{{ route('chitiettinmoi', $new->id) }}"
                                                   style="font-family: 'Open Sans',sans-serif">
                                                    <u>{{ $new->title }}</u>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div> <!-- .beta-products-list -->
                        </div>
                    </div> <!-- end section with sidebar and main content -->
                </div> <!-- .main-content -->
            </div> <!-- #content -->
        </div>
    </div>
@endsection
