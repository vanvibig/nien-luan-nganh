@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin tức
                        <small>Danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
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
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Ảnh</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($news as $new)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $new->id }}</td>
                            <td>{{ $new->title }}</td>
                            <td>{!! $new->content !!}</td>
                            <td>
                                <img height="80px" width="80px" src="source/image/product/{{ $new->image }}"
                                     alt="">
                            </td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a class="confirmation"
                                                                                      href="admin/tintuc/xoa/{{ $new->id }}">
                                    Xóa</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                        href="admin/tintuc/sua/{{ $new->id }}">Sửa</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection