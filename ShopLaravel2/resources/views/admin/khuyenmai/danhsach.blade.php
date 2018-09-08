@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Khuyến mãi
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
                        <th>Trạng thái</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Xoá</th>
                        <th>Sửa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($promtions as $p)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $p->id }}</td>
                            <td>{{ $p->name }}</td>
                            <td>
                                @if($p->status == 1)
                                    {{ "Active" }}
                                @else
                                    {{ "Deactive" }}
                                @endif
                            </td>
                            <td>{{ $p->start }}</td>
                            <td>{{ $p->end }}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a class="confirmation"
                                        href="admin/khuyenmai/xoa/{{ $p->id }}"> Xoá</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                        href="admin/khuyenmai/sua/{{ $p->id }}">Sửa</a></td>
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