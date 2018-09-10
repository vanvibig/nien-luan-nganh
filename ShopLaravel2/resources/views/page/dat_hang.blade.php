@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Đặt hàng</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb">
                    <a href="{{ route('trang-chu') }}">Trang chủ</a> / <span>Đặt hàng</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">

            <form action="{{ route('dathang') }}" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="alert alert-info">
                    @if(Session::has('thongbao'))
                        {{ Session::get('thongbao') }}
                </div>
                <div class="row">
                    @elseif(Session::has('cart'))
                        <div class="col-sm-7">

                            <h4>Đặt hàng</h4>
                            <div class="space20">&nbsp;</div>

                            <div class="form-block">
                                <label for="name">Họ tên*</label>
                                <input type="text" id="name" name="name" placeholder="Họ tên" required>
                            </div>
                            <div class="form-block">
                                <label>Giới tính </label>
                                <input id="gender" type="radio" class="input-radio" name="gender" value="nam"
                                       checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
                                <input id="gender" type="radio" class="input-radio" name="gender" value="nữ"
                                       style="width: 10%"><span>Nữ</span>

                            </div>

                            <div class="form-block">
                                <label for="email">Email*</label>
                                <input type="email" id="email" name="email" required placeholder="expample@gmail.com">
                            </div>

                            <div class="form-block">
                                <label for="address">Địa chỉ*</label>
                                <input type="text" id="address" name="address" placeholder="Street Address" required>
                            </div>


                            <div class="form-block">
                                <label for="phone">Điện thoại*</label>
                                <input type="text" id="phone" name="phone" required>
                            </div>

                            <div class="form-block">
                                <label for="notes">Ghi chú</label>
                                <textarea id="notes" name="notes"></textarea>
                            </div>

                            <div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
                            <div class="your-order-body">
                                <ul class="payment_methods methods">
                                    <li class="payment_method_bacs">
                                        <input id="payment_method_bacs" type="radio" class="input-radio"
                                               name="payment" value="COD" checked="checked"
                                               data-order_button_text="">
                                        <label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
                                        <div class="payment_box payment_method_bacs" style="display: block;">
                                            Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán
                                            tiền cho nhân viên giao hàng
                                        </div>
                                    </li>
                                    <li class="payment_method_cheque">
                                        <input id="payment_method_cheque" type="radio" class="input-radio"
                                               name="payment" value="ATM" data-order_button_text="">
                                        <label for="payment_method_cheque">Chuyển khoản </label>
                                        <div class="payment_box payment_method_cheque" style="display: none;">
                                            Chuyển tiền đến tài khoản sau:
                                            <br>- Số tài khoản: 123 456 789
                                            <br>- Chủ TK: Nguyễn A
                                            <br>- Ngân hàng ACB, Chi nhánh TPHCM
                                        </div>
                                    </li>

                                </ul>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="beta-btn primary" href="#">Đặt hàng <i
                                            class="fa fa-chevron-right"></i></button>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="your-order">
                                <div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
                                <div class="your-order-body" style="padding: 0px 10px">
                                    <div class="your-order-item">
                                        <ul class="aside-menu container-fluid list-group w3-display-container">
                                            @foreach($product_cart as $product)
                                                <li>
                                                    <div class="media beta-sales-item row"
                                                         style="display: inline-flex">
                                                        <a style="margin: 12px" class="pull-left"
                                                           href="{{ route('chitietsanpham', $product['item']['id']) }}">
                                                            <img class="w3-image" width="100%"
                                                                 src="source/image/product/{{ $product['item']['image'] }}"
                                                                 alt="">
                                                        </a>
                                                        <div class="media-body w3-bar">
                                                            <a class="pull-left single-item-title"
                                                               href="{{ route('chitietsanpham', $product['item']['id']) }}">{{ $product['item']['name'] }}</a>
                                                            <br>
                                                            <div class="pull-left">
                                                                @foreach(\App\Product::find($product['item']['id'])->type_detail as $type)
                                                                    <a class="label w3-medium"
                                                                       style="font-size: 13px!important; color: #1d439b"
                                                                       href="{{ route('loaisanphamchitiet', $type->id) }}">{{ $type->name }}</a>
                                                                @endforeach
                                                            </div>
                                                            <div class="clear"></div>
                                                            <div>
                                                                <lable>Lượt xem:</lable>
                                                                {{ $product['item']['view_count'] }}
                                                            </div>
                                                            <div>
                                                                <lable>Số lượng đã đặt:</lable>
                                                                <a class="add btn btn-success"
                                                                   {{--product_id="{{ $product['item']['id'] }}"--}}
                                                                   href="{{ route('themgiohang', $product['item']['id']) }}"
                                                                >
                                                                    <span class="glyphicon glyphicon-chevron-up"></span>
                                                                </a>
                                                                <a
                                                                        {{--class="so_luong_{{ $product['item']['id'] }}"--}}
                                                                >{{ $product['qty'] }}</a>
                                                                <a class="odd btn btn-success"
                                                                   {{--product_id="{{ $product['item']['id'] }}"--}}
                                                                   href="{{ route('giamxuong1', $product['item']['id']) }}"
                                                                >
                                                                    <span class="glyphicon glyphicon-chevron-down"></span>
                                                                </a>&nbsp;
                                                                <a class="remove btn btn-danger confirmation"
                                                                   href="{{ route('xoagiohang', $product['item']['id']) }}"
                                                                >
                                                                    <span class="glyphicon glyphicon-remove"></span>
                                                                </a>
                                                            </div>
                                                            @if($product['item']['promotion_price'] == 0)
                                                                <span>{{ number_format($product['item']['unit_price']) }}
                                                                    đ</span>
                                                            @else
                                                                <span class="flash-del">{{ number_format($product['item']['unit_price']) }}
                                                                    đ</span>
                                                                <br>
                                                                <span class="flash-sale">{{ number_format($product['item']['promotion_price']) }}
                                                                    đ</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="your-order-item">
                                        <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
                                        <div class="pull-right"><h5
                                                    class="color-black">{{ number_format(Session('cart')->totalPrice) }}
                                                đ</h5></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div> <!-- .your-order -->
                        </div>
                </div>
                @else
                    <h4 class="alert alert-info">Giỏ hàng hiện tại trống</h4>
                @endif
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->
    {{--<script>--}}
    {{--$(document).ready(function () {--}}
    {{--$(".add").click(function () {--}}
    {{--$value = $(this).attr('product_id');--}}
    {{--$.ajax({--}}
    {{--type: 'get',--}}
    {{--url: 'add-to-cart/'+$value,--}}
    {{--data: {--}}
    {{--// 'id': $value--}}
    {{--},--}}
    {{--success: function () {--}}
    {{--$('.so_luong_'+ "{{ $product['item']['id'] }}").text("jjj");--}}
    {{--}--}}
    {{--});--}}
    {{--});--}}
    {{--});--}}
    {{--</script>--}}
@endsection
