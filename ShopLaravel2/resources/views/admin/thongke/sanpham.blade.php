@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thống kê
                        <small>Sản phẩm</small>
                    </h1>
                </div>

                {{--<div class="col-lg-8">--}}
                    {{--@foreach($bill_detail as $p)--}}
                        {{--<h6>{{ $p->product->name }}</h6>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th class="text-center">ID</th>
                        <th class="text-center">Tên + Thể loại</th>
                        <th class="text-center">Lượt xem</th>
                        <th class="text-center">Giá gốc</th>
                        <th class="text-center">Giá khuyến mãi</th>
                        <th class="text-center">Đã bán</th>
                        <th class="text-center">Còn lại</th>
                        <th class="text-center">Mới</th>
                        {{--<th class="text-center">Xoá</th>--}}
                        {{--<th class="text-center">Sửa</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bill_detail as $p)
                        <tr class="odd gradeX" align="center">
                            <td>{{ $p->product->id }}</td>
                            <td class="col-sm-2 text-center">
                                <div style="text-align: center" class="label label-default">{{ $p->product->name }}</div>
                                <div class="clearfix"></div>
                                <br>
                                <div class="col-sm-12"><img class="img-fluid img-responsive center-block"
                                                            style="max-width:60%"
                                                            src="public/source/image/product/{{ $p->product->image }}"
                                                            alt=""></div>
                                <div class="clearfix clear"></div>
                                <br>
                                <div class="col-sm-12">
                                    @foreach($p->product->type_detail as $type)
                                        <a class="label label-default"
                                           href="{{ route('danhsachtheoloai', $type->id) }}">{{ $type->name }}</a>
                                    @endforeach
                                </div>
                                <div class="clearfix clear"></div>
                                <br>
                                <div class="col-sm-12">
                                    @foreach($p->product->author as $author)
                                        <a class="label label-default"
                                           href="{{ route('danhsachtheotacgia', $author->id) }}">{{ $author->name }}</a>
                                    @endforeach
                                </div>
                            </td>
                            <td>{{ $p->product->view_count }}</td>
                            <td>{{ $p->product->unit_price }} đ</td>
                            <td>{{ $p->product->promotion_price }} đ</td>
                            <td>{{ \App\Bill_detail::where('id_product',$p->product->id)->sum('quantity') }}</td>
                            <td>{{ $p->product->amount }}</td>
                            <td>
                                @if($p->product->new == 0)
                                    {{ 'Không' }}
                                @else
                                    {{ 'Có' }}
                                @endif
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