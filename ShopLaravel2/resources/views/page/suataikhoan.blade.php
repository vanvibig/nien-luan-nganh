@extends('master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Sửa thông tin tài khoản</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb">
                    <a href="indexs">Home</a> / <span>Sửa thông tin tài khoản</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">

            @if(count($errors)>0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{ $err }}
                    @endforeach
                </div>
            @endif
            @if(Session::has('thanhcong'))
                <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
            @endif
            <form action="{{ route('suataikhoan') }}" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <h4>Sửa thông tin tài khoản</h4>
                        <div class="space20">&nbsp;</div>


                        <div class="form-block">
                            <label for="email">Email address*</label>
                            <input readonly value="{{ Auth::user()->email }}" type="email" id="email" name="email" required>
                        </div>

                        <div class="form-block">
                            <label for="full_name">Fullname*</label>
                            <input value="{{ Auth::user()->full_name }}" type="text" id="full_name" name="full_name" required>
                        </div>

                        <div class="form-block">
                            <label for="adress">Address*</label>
                            <input value="{{ Auth::user()->address }}" type="text" id="adress" name="address" required>
                        </div>


                        <div class="form-block">
                            <label for="phone">Phone*</label>
                            <input value="{{ Auth::user()->phone }}" type="text" id="phone" name="phone" required>
                        </div>
                        <div class="form-block">
                            <label for="password">Password*</label>
                            <input type="password" id="password" name="password" placeholder="Không bắt buộc đổi mật khẩu">
                        </div>
                        <div class="form-block">
                            <label for="re_password">Re password*</label>
                            <input type="password" id="re_password" name="re_password">
                        </div>
                        <div class="form-block">
                            <button type="submit" class="btn btn-primary w3-gray">Sửa</button>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection