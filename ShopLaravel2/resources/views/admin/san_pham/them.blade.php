@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản phẩm
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
                    <form action="admin/sanpham/them" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input class="form-control" name="name"/>
                        </div>
                        <div class="row form-group col-sm-12 aside-menu">
                            <label>Thể loại</label>
                            <div>
                                @foreach($types as $type)
                                    <div class="col-sm-3">
                                        <input name="type[]" value="{{ $type->id }}" type="checkbox"
                                               class="form-check-input"/>
                                        <label class="form-check-label">{{ $type->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row form-group col-sm-12 aside-menu">
                            <label>Tác giả</label>
                            <div>
                                @foreach($authors as $author)
                                    <div class="col-sm-3">
                                        <input name="author[]" value="{{ $author->id }}" type="checkbox"
                                               class="form-check-input"/>
                                        <label class="form-check-label">{{ $author->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea id="demo" name="description" class="form-control ckeditor" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Giá gốc</label>
                            <input class="form-control" name="unit_price"/>
                        </div>
                        <div class="form-group">
                            <label>Giá khuyến mãi</label>
                            <input class="form-control" name="promotion_price"/>
                        </div>
                        <div class="form-group">
                            <label>Ảnh</label>
                            <input class="form-control" type="file" name="image" id="image">
                        </div>
                        <div class="form-group">
                            <label>Đơn vị tính</label>
                            <input class="form-control" name="unit"/>
                        </div>
                        <div class="form-group">
                            <label>Số lượng</label>
                            <input class="form-control" name="amount"/>
                        </div>
                        <div class="form-group">
                            <label>Mới</label>
                            <label class="radio-inline">
                                <input name="new" value="1" checked="" type="radio">Có
                            </label>
                            <label class="radio-inline">
                                <input name="new" value="0" type="radio">Không
                            </label>
                        </div>
                        <button type="submit" name="submit" value="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" name="reset" class="btn btn-default">Làm mới</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection