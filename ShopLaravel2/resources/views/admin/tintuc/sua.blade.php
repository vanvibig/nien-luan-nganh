@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin tức
                        <small>Sửa</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12" style="padding-bottom:120px">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{ $err }} <br>
                            @endforeach
                        </div>
                    @endif
                    @if(Session::has('thongbao'))
                        <div class="alert alert-success">
                            {{ Session::get('thongbao') }}
                        </div>
                    @endif
                    <form action="admin/tintuc/sua/{{ $new->id }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input value="{{ $new->title }}" class="form-control" name="title"/>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea id="demo" name="contentt" class="form-control ckeditor" rows="3">{!! $new->content !!}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Ảnh</label>
                            <table>
                                <tr>
                                    <td><img style="margin-right: 5px" height="100px"
                                             src="public/source/image/product/{{ $new->image }}" alt=""></td>
                                    <td><input class="form-control" type="file" name="image" id="image"></td>
                                </tr>
                            </table>
                            {{--<input class="form-control" type="file" name="image" id="image">--}}
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