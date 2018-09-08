@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản phẩm khuyến mãi
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
                        <th class="text-center">ID</th>
                        <th class="text-center">Tên khuyến mãi</th>
                        <th class="text-center">Discount</th>
                        <th class="text-center">Sản phẩm</th>
                        {{--<th class="text-center">Xoá</th>--}}
                        {{--<th class="text-center">Sửa</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($promotions as $promotion)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $promotion->id }}</td>
                            <td>{{ $promotion->name }}</td>
                            <td>{{ $promotion->discount }}</td>
                            <td align="left" class="row">
                                @foreach($promotion->product as $product)
                                    <div class="col-sm-6">
                                        {{ $product->name }}
                                    </div>
                                    <div class="col-sm-6">
                                        <i class="fa fa-trash-o fa-fw"></i><a href="admin/sanpham-khuyenmai/xoa/{{ $product->id }}"> Xoá</a>
                                        <i class="fa fa-pencil fa-fw"></i> <a href="admin/sanpham-khuyenmai/sua/{{ $product->id }}">Sửa</a>
                                    </div>
                                @endforeach
                            </td>
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