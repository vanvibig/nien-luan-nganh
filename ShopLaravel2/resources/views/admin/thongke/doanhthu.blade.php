@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thống kê
                        <small>Doanh thu</small>
                    </h1>
                </div>

                <div class="col-lg-8">
                    <h3>Tổng doanh thu: {{ number_format($total) }} đ</h3>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection