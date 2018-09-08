@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Khuyến mãi
                        <small>{{ $promotion->name }}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-10" style="padding-bottom:120px">
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
                    <form action="admin/khuyenmai/sua/{{ $promotion->id }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>Tên khuyến mãi</label>
                            <input value="{{ $promotion->name }}" required class="form-control" name="name" id="name"/>
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <input @if($promotion->status == 1)
                                   {{ "checked" }}
                                   @endif
                                   id="status" type="radio" class="input-radio" name="status" value="1"
                                   checked="checked" style="width: 10%"><span style="margin-right: 10%">Active</span>
                            <input
                                    @if($promotion->status == 0)
                                    {{ "checked" }}
                                    @endif
                                    id="status" type="radio" class="input-radio" name="status" value="0"
                                   style="width: 10%"><span>Deactive</span>
                        </div>
                        <div class="form-group">
                            <label>Ngày bắt đầu</label>
                            <input value="{{ $promotion->start->todatestring(), date('Y-m-d') }}" required id="start" name="start" type="date">
                        </div>
                        <div class="form-group">
                            <label>Ngày kết thúc</label>
                            <input value="{{ $promotion->end->todatestring(), date('Y-m-d') }}" required id="end" name="end" type="date">
                        </div>
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection