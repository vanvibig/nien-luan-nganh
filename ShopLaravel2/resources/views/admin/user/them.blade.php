@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Người dùng
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{ $error  }} <br>
                            @endforeach
                        </div>
                    @endif

                    @if(Session::has('thongbao'))
                        <div class="alert alert-success">
                            {{ Session::get('thongbao') }}
                        </div>
                    @endif
                    <form action="admin/user/them" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>Tên</label>
                            <input class="form-control" name="full_name"/>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email"/>
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control" name="password"/>
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="password2"/>
                        </div>
                        <div class="form-group">
                            <label>Điện thoại</label>
                            <input type="number" class="form-control" name="phone"/>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input class="form-control" name="address"/>
                        </div>
                        <div class="form-group">
                            <label>Quyền người dùng</label>
                            <label class="radio-inline">
                                <input name="level" value="0" checked="" type="radio">Thường
                            </label>
                            <label class="radio-inline">
                                <input name="level" value="1" type="radio">Admin
                            </label>
                            <label class="radio-inline">
                                <input name="level" value="2" type="radio">Nhân viên
                            </label>
                        </div>

                        <button type="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection