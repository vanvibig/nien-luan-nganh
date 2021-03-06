@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tác giả
                        <small>Danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
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
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Ảnh</th>
                        <th>Năm sinh</th>
                        <th>Giới tính</th>
                        <th>Xoá</th>
                        <th>Sửa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($authors as $author)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $author->id }}</td>
                            <td><a href="{{ route('danhsachtheotacgia', $author->id) }}">{{ $author->name }}</a></td>
                            <td><img height="100px" src="source/image/product/{{ $author->image }}" alt=""></td>
                            <td>{{ $author->yearofbirth }}</td>
                            <td>{{ $author->gender }}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a class="confirmation"
                                        href="admin/tacgia/xoa/{{ $author->id }}"> Xoá</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                        href="admin/tacgia/sua/{{ $author->id }}">Sửa</a></td>
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