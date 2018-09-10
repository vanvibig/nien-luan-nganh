<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> Hẻm 51, đường 3/2, phường An Khánh, quận Ninh Kiều, Cần
                            Thơ</a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 01643 422 240</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                    @if(Auth::check())
                        <li><a href="{{ route('suataikhoan') }}"><i class="fa fa-user"></i>Tài khoản</a></li>
                        <li><a href="#">Chào bạn {{ Auth::user()->full_name }}</a></li>
                        @if(Auth::user()->level == 1)
                            <li><a href="{{ route('admindanhsachsp') }}">Admin</a>
                            </li>
                        @elseif(Auth::user()->level == 2)
                            <li><a href="{{ route('danhsachhoadon') }}">Nhân viên</a>
                            </li>
                        @endif
                        <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                    @else
                        <li><a href="{{ route('signin') }}">Đăng kí</a></li>
                        <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                    @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative w3-display-container">
            <div class="pull-left col-sm-6">
                <a href="{{ route('trang-chu') }}" id="logo">
                    <img src="source/image/manga-logo.png" width="200px" alt="">
                    <img src="source/image/novel-logo.png" width="200px" alt="">

                </a>
            </div>
            <div class="col-sm-3 space-left ov w3-display-right">
                <div class="dropdown">
                    <form class="row" method="get" id="searchform" autocomplete="off" action="{{ route('search') }}">
                        <input id="search"
                               type="text" name="search" placeholder="Nhập từ khóa..."/>
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>
                <ul class="row" style="position: fixed; list-style: none; z-index: 200" id="txtHint">
                </ul>
                <div class="beta-comp">
                    @if(Session::has('cart'))
                        <div class="cart">
                            <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (
                                @if(Session::has('cart'))
                                    {{ Session('cart')->totalQty }}
                                @else
                                    Trống
                                @endif
                                )
                                <i class="fa fa-chevron-down"></i>
                            </div>
                            <div class="beta-dropdown cart-body">

                                @foreach($product_cart as $product)
                                    <div class="cart-item">
                                        <a class="cart-item-delete"
                                           href="{{ route('xoagiohang', $product['item']['id']) }}"><i
                                                    class="fa fa-times"></i></a>
                                        <div class="media">
                                            <a class="pull-left" href="#"><img
                                                        src="source/image/product/{{ $product['item']['image'] }}"
                                                        alt=""></a>
                                            <div class="media-body">
                                                <span class="cart-item-title">{{ $product['item']['name'] }}</span>
                                                <span class="cart-item-amount">{{ $product['qty'] }}
                                                    *<span>
                                                        @if($product['item']['promotion_price'] == 0)
                                                            {{ number_format($product['item']['unit_price']) }}
                                                            đ
                                                        @else
                                                            {{ number_format($product['item']['promotion_price']) }}
                                                            đ
                                                        @endif
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="cart-caption">
                                    <div class="cart-total text-right">Tổng tiền: <span
                                                class="cart-total-value">{{ number_format(Session('cart')->totalPrice) }}
                                            đ</span></div>
                                    <div class="clearfix"></div>

                                    <div class="center">
                                        <div class="space10">&nbsp;</div>
                                        <a href="{{ route('dathang') }}" class="beta-btn primary text-center">Đặt hàng
                                            <i class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .cart -->
                    @endif
                </div>
            </div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #5f5f5f;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span>
                <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{ route('trang-chu') }}">Trang chủ</a></li>
                    <li><a href="#">Loại sản phẩm</a>
                        <ul class="sub-menu row" style="width: 700px; background-color: #5f5f5f">
                            @foreach($loai_chitiet as $loai)
                                <li id="kv_menu" class="col-sm-2 w3-bar-item" style="width: 20%; float: left;"><a
                                            style="color: #fff;"
                                            href="{{ route('loaisanphamchitiet', $loai->id) }}">{{ $loai->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{ route('sanphammoi') }}">Mới</a></li>
                    <li><a href="{{ route('sanphamxemnhieu') }}">Xem nhiều</a></li>
                    <li><a href="{{ route('sanphamkhuyenmai') }}">Khuyến mãi</a></li>
                    <li><a href="{{ route('gioithieu') }}">Giới thiệu</a></li>
                    <li><a href="{{ route('lienhe') }}">Liên hệ</a></li>
                    @if(Session::has('cart'))
                        <li><a href="{{ route('dathang') }}">Giỏ hàng( {{ Session('cart')->totalQty }} )</a></li>
                    @endif
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div>

{{-- live search --}}
{{--<script>--}}
    {{--$(document).ready(function () {--}}
        {{--$("#search").keyup(function () {--}}
            {{--$value = $(this).val();--}}
            {{--$.ajax({--}}
                {{--type: 'get',--}}
                {{--url: '{{ route('search2') }}',--}}
                {{--data: {--}}
                    {{--'search': $value--}}
                {{--},--}}
                {{--success: function (data) {--}}
                    {{--if (data.no !== "") {--}}
                        {{--data = data.replace($value, '<b style="color: green">' + $value + '</b>');--}}
                        {{--$('#txtHint').html(data);--}}
                    {{--}--}}
                {{--}--}}
            {{--});--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}