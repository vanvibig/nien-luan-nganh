@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Chi tiết hoá đơn
                        {{--<small>Danh sách</small>--}}
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
                        {{--<th style="text-align: center">ID</th>--}}
                        <th style="text-align: center">ID Hoá đơn</th>
                        <th style="text-align: center">Khách hàng</th>
                        {{--<th>ID Sản phẩm</th>--}}
                       <th style="text-align: center">Chi tiết</th>

                        {{--<th>Các sản phẩm</th>--}}
                        {{--<th>Delete</th>--}}
                        {{--<th>Edit</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="odd gradeX" align="center">
                        {{--<td>{{ $bill_detail_1->id }}</td>--}}
                        <td>{{ $bill_detail_1->id_bill }}</td>
                        <td><a href="{{ route('chitietkhachhang', $bill_detail_1->bill->customer->id) }}">{{ $bill_detail_1->bill->customer->name }}</a></td>
                        <td>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th style="text-align: center">Tên sản phẩm</th>
                                    <th style="text-align: center">Số lượng</th>
                                    <th style="text-align: center">Đơn giá</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bill_details as $b)
                                    <tr class="odd gradeX" align="center">
                                        {{--<td>{{ $b->id_product }}</td>--}}
                                        <td style="text-align: left">{{ $b->product->name }}</td>
                                        <td>{{ $b->quantity }}</td>
                                        <td>{{ $b->unit_price }}</td>
                                        {{--<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Các sản phẩm</a></td>--}}
                                        {{--<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Xóa</a></td>--}}
                                        {{--<td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Sửa</a></td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <tr>
                        <td class="col-4" style="text-align: right"><strong>Tổng tiền</strong></td>
                        <td class="col-8" style="text-align: center">{{ $bill_detail_1->bill->total }} đ</td>
                    </tr>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection