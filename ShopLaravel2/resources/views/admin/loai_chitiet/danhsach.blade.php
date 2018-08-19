@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Loại sản phẩm chi tiết
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
                            <td>{{ $type->name }}</td>
                            <td>{{ $type->description }}</td>
                            <td><img height="100px" src="public/source/image/product/{{ $type->image }}" alt=""></td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
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

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản phẩm
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
                        <th>Loại</th>
                        <th>Mô tả</th>
                        <th>Giá gốc</th>
                        <th>Giá khuyến mãi</th>
                        <th>Đơn vị</th>
                        <th>Mới</th>
                        <th>Xoá</th>
                        <th>Sửa</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}
                                <img height="100px" width="100px"
                                     src="public/source/image/product/{{ $product->image }}"
                                     alt="">
                            </td>
                            <td>
                                <a href="{{ route('danhsachtheoloai', $product->product_type->id) }}">
                                    {{ $product->product_type->name }}
                                    <hr>
                                    @foreach($product->type_detail as $t)
                                        {{ $t->name }}
                                    @endforeach
                                </a>
                            </td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->unit_price }} đ</td>
                            <td>{{ $product->promotion_price }} đ</td>
                            {{--<td></td>--}}
                            <td>{{ $product->unit }}</td>
                            <td>
                                @if($product->new == 0)
                                    {{ 'Không' }}
                                @else
                                    {{ 'Có' }}
                                @endif
                            </td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a
                                        href="admin/sanpham/xoa/{{ $product->id }}"> Xoá</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                        href="admin/sanpham/sua/{{ $product->id }}">Sửa</a></td>
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