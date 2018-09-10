@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Loại sản phẩm
                        <small>{{ $type->name }}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{ $err }} <br>
                            @endforeach
                        </div>
                    @endif

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{ session('thongbao') }}
                        </div>
                    @endif
                    <form action="admin/loai/sua/{{ $type->id }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>Tên</label>
                            <input class="form-control" value="{{ $type->name }}" name="name" id="name"/>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <input class="form-control" value="{{ $type->description }}" name="description"
                                   id="description"/>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <table>
                                <tr>
                                    <td><img style="margin-right: 5px" height="100px"
                                             src="source/image/product/{{ $type->image }}" alt=""></td>
                                    <td><input class="form-control" type="file" name="image" id="image"></td>
                                </tr>
                            </table>


                        </div>
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection