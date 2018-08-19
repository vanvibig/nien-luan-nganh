@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thể loại
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
                        <th>Mô tả</th>
                        <th>Hình ảnh</th>
                        <th>Xoá</th>
                        <th>Sửa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($types as $type)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $type->id }}</td>
                            <td><a href="{{ route('danhsachtheoloai', $type->id) }}">{{ $type->name }}</a></td>
                            <td>{!! $type->description !!}</td>
                            <td><img height="100px" src="public/source/image/product/{{ $type->image }}" alt=""></td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a class="confirmation"
                                        href="admin/loai/xoa/{{ $type->id }}"> Xoá</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                        href="admin/loai/sua/{{ $type->id }}">Sửa</a></td>
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