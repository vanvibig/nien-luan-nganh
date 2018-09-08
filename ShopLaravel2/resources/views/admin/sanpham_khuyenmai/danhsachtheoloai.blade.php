@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thể loại
                        <small>{{ $type->name }}</small>
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
                        <th class="text-center">Tên + Thể loại</th>
                        <th class="text-center">Mô tả</th>
                        <th class="text-center">Lượt xem</th>
                        <th class="text-center">Giá gốc</th>
                        <th class="text-center">Giá khuyến mãi</th>
                        <th class="text-center">Đơn vị</th>
                        <th class="text-center">Mới</th>
                        {{--<th class="text-center">Xoá</th>--}}
                        {{--<th class="text-center">Sửa</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $product->id }}</td>
                            <td class="col-sm-2 text-center">
                                <div style="text-align: center" class="label label-default">{{ $product->name }}</div>
                                <div class="clearfix"></div>
                                <br>
                                <div class="col-sm-12"><img class="img-fluid img-responsive center-block"
                                                            style="max-width:100%"
                                                            src="public/source/image/product/{{ $product->image }}"
                                                            alt=""></div>
                                <div class="clearfix clear"></div>
                                <br>
                                <div class="col-sm-12">
                                    @foreach($product->type_detail as $type)
                                        <a class="label label-default"
                                           href="{{ route('danhsachtheoloai', $type->id) }}">{{ $type->name }}</a>
                                    @endforeach
                                </div>
                                <div class="clearfix clear"></div>
                                <br>
                                <div class="col-sm-12">
                                    @foreach($product->author as $author)
                                        <a class="label label-default"
                                           href="{{ route('danhsachtheotacgia', $author->id) }}">{{ $author->name }}</a>
                                    @endforeach
                                </div>
                                <div class="clearfix"></div>
                                <br>
                                <div>
                                    <i class="fa fa-trash-o  fa-fw"></i><a class="confirmation"
                                            href="admin/sanpham/xoa/{{ $product->id }}"> Xoá</a>
                                    <i class="fa fa-pencil fa-fw"></i> <a
                                            href="admin/sanpham/sua/{{ $product->id }}">Sửa</a>
                                </div>
                            </td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->view_count }}</td>
                            <td>{{ $product->unit_price }} đ</td>
                            <td>{{ $product->promotion_price }} đ</td>
                            <td>{{ $product->unit }}</td>
                            <td>
                                @if($product->new == 0)
                                    {{ 'Không' }}
                                @else
                                    {{ 'Có' }}
                                @endif
                            </td>
                            {{--<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a--}}
                            {{--href="admin/sanpham/xoa/{{ $product->id }}"> Xoá</a></td>--}}
                            {{--<td class="center"><i class="fa fa-pencil fa-fw"></i> <a--}}
                            {{--href="admin/sanpham/sua/{{ $product->id }}">Sửa</a></td>--}}
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