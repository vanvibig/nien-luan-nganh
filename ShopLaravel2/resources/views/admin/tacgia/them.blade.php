@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tác giả
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-10" style="padding-bottom:120px">
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
                    <form action="admin/tacgia/them" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>Tên</label>
                            <input class="form-control" name="name" id="name"/>
                        </div>
                        <div class="form-group">
                            <label>Năm sinh</label>
                            <input class="form-control" name="yearofbirth" id="yearofbirth"/>
                        </div>
                        <div class="form-block">
                            <label>Giới tính </label>
                            <input id="gender" type="radio" class="input-radio" name="gender" value="nam"
                                   checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
                            <input id="gender" type="radio" class="input-radio" name="gender" value="nữ"
                                   style="width: 10%"><span>Nữ</span>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input class="form-control" type="file" name="image" id="image">
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection