@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Khách hàng
                        <small>Danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
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
                        <th>Giới tính</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Điện thoại</th>
                        <th>Ghi chú</th>
                        {{--<th>Delete</th>--}}
                        {{--<th>Edit</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $customer)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $customer->id }}</td>
                            <td><a href="{{ route('chitietkhachhang', $customer->id) }}">{{ $customer->name }}</a></td>
                            <td>{{ $customer->gender }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->phone_number }}</td>
                            <td>{{ $customer->note }}</td>
                            {{--<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/xoa/{{ $user->id }}"> Xóa</a></td>--}}
                            {{--<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/sua/{{ $user->id }}">Sửa</a></td>--}}
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