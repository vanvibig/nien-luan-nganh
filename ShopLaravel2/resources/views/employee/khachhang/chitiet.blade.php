@extends('employee.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Khách hàng
                        <small>{{ $customer->name }}</small>
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
                    <tr class="odd gradeX" align="center">
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->gender }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->phone_number }}</td>
                        <td>{{ $customer->note }}</td>
                        {{--<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/xoa/{{ $user->id }}"> Xóa</a></td>--}}
                        {{--<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/sua/{{ $user->id }}">Sửa</a></td>--}}
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hoá đơn
                        <small>Danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Khách hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Hình thức thanh toán</th>
                        <th>Ghi chú</th>
                        <th>Chi tiết</th>
                        {{--<th>Delete</th>--}}
                        {{--<th>Edit</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bills as $bill)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $bill->id }}</td>
                            <td>
                                <a href="{{ route('nv_chitietkhachhang', $bill->customer->id) }}">{{ $bill->customer->name }}</a>
                            </td>
                            <td>{{ $bill->date_order }}</td>
                            <td>{{ $bill->total }}</td>
                            <td>{{ $bill->payment }}</td>
                            <td>{{ $bill->note }}</td>
                            {{--<td><a class="beta-btn primary" href="{{ route('chitiethoadon', $bill->id) }}">Chi tiết <i class="fa fa-chevron-right"></i></a></td>--}}
                            {{--<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>--}}
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                        href="{{ route('nv_chitiethoadon', $bill->id) }}">Chi tiết</a></td>
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