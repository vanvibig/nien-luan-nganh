@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản phẩm khuyến mãi
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-10" style="padding-bottom:120px">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{ $error  }} <br>
                            @endforeach
                        </div>
                    @endif

                    @if(Session::has('thongbao'))
                        <div class="alert alert-success">
                            {{ Session::get('thongbao') }}
                        </div>
                    @endif
                    <form action="admin/sanpham-khuyenmai/them" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>Sản phẩm</label>
                            <select class="form-control" name="product">
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{$product->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row form-group col-sm-12 aside-menu">
                            <label>Khuyến mãi</label>
                            <div>
                                @foreach($promotions as $promotion)
                                    <div class="col-sm-12">
                                        <input name="promotions[]" value="{{ $promotion->id }}" type="radio"
                                               class="form-check-input"/>
                                        <label class="form-check-label">{{ $promotion->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <button type="submit" name="submit" value="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" name="reset" class="btn btn-default">Làm mới</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection