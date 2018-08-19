<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// begin customer interface

Route::get('/', [
    'as' => 'trang-chu',
    'uses' => 'PageController@getIndex'
]);
//
//Route::get('index', [
//    'as' => 'trang-chu',
//    'uses' => 'PageController@getIndex'
//]);

Route::get('loai-san-pham/{type}', [
    'as' => 'loaisanpham',
    'uses' => 'PageController@getLoaiSp'
]);

Route::get('loai-san-pham-chi-tiet/{type}', [
    'as' => 'loaisanphamchitiet',
    'uses' => 'PageController@getLoaiSpChiTiet'
]);

Route::get('san-pham-theo-tac-gia/{id}', [
    'as' => 'sanphamtheotacgia',
    'uses' => 'PageController@getSanPhamTheoTacGia'
]);

Route::get('san-pham-moi', [
    'as' => 'sanphammoi',
    'uses' => 'PageController@getSanPhamMoi'
]);

Route::get('san-pham-xem-nhieu', [
    'as' => 'sanphamxemnhieu',
    'uses' => 'PageController@getSanPhamXemNhieu'
]);

Route::get('san-pham-khuyen-mai', [
    'as' => 'sanphamkhuyenmai',
    'uses' => 'PageController@getSanPhamKhuyenMai'
]);

Route::get('chi-tiet-san-pham/{id}', [
    'as' => 'chitietsanpham',
    'uses' => 'PageController@getChiTiet'
])->middleware('filter');

Route::get('chi-tiet-tin-moi/{id}', [
    'as' => 'chitiettinmoi',
    'uses' => 'PageController@getChiTietTinMoi'
]);


Route::get('lien-he', [
    'as' => 'lienhe',
    'uses' => 'PageController@lienHe'
]);

Route::get('gioi-thieu', [
    'as' => 'gioithieu',
    'uses' => 'PageController@gioiThieu'
]);

Route::get('add-to-cart/{id}', [
    'as' => 'themgiohang',
    'uses' => 'PageController@getAddToCart'
]);

Route::get('del-cart-reduce-one/{id}', [
    'as' => 'giamxuong1',
    'uses' => 'PageController@getreduceByOne'
]);

Route::get('del-cart/{id}', [
    'as' => 'xoagiohang',
    'uses' => 'PageController@getDelItemCart'
]);

Route::get('dat-hang', [
    'as' => 'dathang',
    'uses' => 'PageController@getCheckout'
]);

Route::post('dat-hang', [
    'as' => 'dathang',
    'uses' => 'PageController@postCheckout'
]);

Route::get('dang-nhap', [
    'as' => 'login',
    'uses' => 'PageController@getLogin'
]);

Route::post('dang-nhap', [
    'as' => 'login',
    'uses' => 'PageController@postLogin'
]);

Route::get('dang-ki', [
    'as' => 'signin',
    'uses' => 'PageController@getSignin'
]);

Route::post('dang-ki', [
    'as' => 'signin',
    'uses' => 'PageController@postSignin'
]);

Route::get('sua-tai-khoan', [
    'as' => 'suataikhoan',
    'middleware' => 'normalUser',
    'uses' => 'PageController@getSuaTaiKhoan'
]);

Route::post('sua-tai-khoan', [
    'as' => 'suataikhoan',
    'middleware' => 'normalUser',
    'uses' => 'PageController@postSuaTaiKhoan'
]);

Route::get('dang-xuat', [
    'as' => 'logout',
    'uses' => 'PageController@postLogout'
]);

Route::get('search', [
    'as' => 'search',
    'uses' => 'PageController@getSearch'
]);

Route::get('search2', [
    'as' => 'search2',
    'uses' => 'SearchController@search'
]);


// end customer interface

//begin admin interface


Route::get('admin', 'UserController@getDangNhapAdmin');
Route::get('admin/dangnhap', 'UserController@getDangNhapAdmin');
Route::post('admin/dangnhap', 'UserController@postDangNhapAdmin');
Route::get('admin/dangxuat', 'UserController@getDangXuatAdmin');

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {

//    Route::group(['prefix' => 'loai'], function () {
//        Route::get('danhsach', 'TypeController@getDanhSach');
//
//        Route::get('sua/{id}', 'TypeController@getSua');
//        Route::post('sua/{id}', 'TypeController@postSua');
//
//        Route::get('them', 'TypeController@getThem');
//        Route::post('them', 'TypeController@postThem');
//
//        Route::get('xoa/{id}', 'TypeController@getXoa');
//    });

    Route::group(['prefix' => 'loai'], function () {
        Route::get('danhsach', 'TypeController@getDanhSach');

        Route::get('sua/{id}', 'TypeController@getSua');
        Route::post('sua/{id}', 'TypeController@postSua');

        Route::get('them', 'TypeController@getThem');
        Route::post('them', 'TypeController@postThem');

        Route::get('xoa/{id}', 'TypeController@getXoa');
    });

    Route::group(['prefix' => 'tacgia'], function () {
        Route::get('danhsach', 'AuthorController@getDanhSach');

        Route::get('sua/{id}', 'AuthorController@getSua');
        Route::post('sua/{id}', 'AuthorController@postSua');

        Route::get('them', 'AuthorController@getThem');
        Route::post('them', 'AuthorController@postThem');

        Route::get('xoa/{id}', 'AuthorController@getXoa');
    });


    Route::group(['prefix' => 'sanpham'], function () {
        Route::get('danhsach', 'ProductController@getDanhSach')->name('admindanhsachsp');

        Route::get('danh-sach-theo-loai/{id}', [
            'as' => 'danhsachtheoloai',
            'uses' => 'ProductController@getDanhSachTheoLoai'
        ]);

        Route::get('danh-sach-theo-tac-gia/{id}', [
            'as' => 'danhsachtheotacgia',
            'uses' => 'ProductController@getDanhSachTheoTacGia'
        ]);

        Route::get('sua/{id}', 'ProductController@getSua');
        Route::post('sua/{id}', 'ProductController@postSua');

        Route::get('them', 'ProductController@getThem');
        Route::post('them', 'ProductController@postThem');

        Route::get('xoa/{id}', 'ProductController@getXoa');
    });

    Route::group(['prefix' => 'tintuc'], function () {
        Route::get('danhsach', 'NewsController@getDanhSach');

        Route::get('them', 'NewsController@getThem');
        Route::post('them', 'NewsController@postThem');

        Route::get('sua/{id}', 'NewsController@getSua');
        Route::post('sua/{id}', 'NewsController@postSua');

        Route::get('xoa/{id}', 'NewsController@getXoa');


    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('danhsach', 'UserController@getDanhSach');

        Route::get('sua/{id}', 'UserController@getSua');
        Route::post('sua/{id}', 'UserController@postSua');

        Route::get('them', 'UserController@getThem');
        Route::post('them', 'UserController@postThem');

        Route::get('xoa/{id}', 'UserController@getXoa');
    });

    Route::group(['prefix' => 'hoadon'], function () {
        Route::get('danhsach', 'BillController@getDanhSach');

//        Route::get('chitiet/{id}', 'BillController@getChiTietHoaDon');
        Route::get('chi-tiet-hoa-don/{id}', [
            'as' => 'chitiethoadon',
            'uses' => 'BillController@getChiTietHoaDon'
        ]);
    });

    Route::group(['prefix' => 'khachhang'], function () {
        Route::get('danhsach', 'CustomerController@getDanhSach');

        Route::get('chi-tiet-khach-hang/{id}', [
            'as' => 'chitietkhachhang',
            'uses' => 'CustomerController@getChiTietKhachHang'
        ]);
    });

    Route::group(['prefix' => 'slide'], function () {
        Route::get('danhsach', 'SlideController@getDanhSach');

        Route::get('sua/{id}', 'SlideController@getSua');
        Route::post('sua/{id}', 'SlideController@postSua');

        Route::get('them', 'SlideController@getThem');
        Route::post('them', 'SlideController@postThem');

        Route::get('xoa/{id}', 'SlideController@getXoa');
    });

    Route::group(['prefix' => 'loaichitiet'], function () {
        Route::get('danhsach', 'TypeDetailController@getDanhSach');

        Route::get('sua/{id}', 'TypeDetailController@getSua');
        Route::post('sua/{id}', 'TypeDetailController@postSua');

        Route::get('them', 'TypeDetailController@getThem');
        Route::post('them', 'TypeDetailController@postThem');

        Route::get('xoa/{id}', 'TypeDetailController@getXoa');
    });

    Route::group(['prefix' => 'thongke'], function () {
        Route::get('doanhthu', 'BillController@getDoanhThu');
        Route::get('sanpham', 'BillController@getSanPham');
    });

});

// end admin interface

// begin employee interface
/**
 * level 1: admin
 * level 2: nhanvien
 * level không có: người dùng thường
 */
Route::group(['prefix' => 'nhanvien', 'middleware' => 'employee'], function () {
// xem thông tin của mình
// xem đơn hành của khách hàng

    Route::group(['prefix' => 'hoadon'], function () {
        Route::get('danhsach', 'EmployeeController@getDanhSach')->name('danhsachhoadon');
        Route::get('chi-tiet-hoa-don/{id}', [
            'as' => 'nv_chitiethoadon',
            'uses' => 'EmployeeController@getChiTietHoaDon'
        ]);
    });

    Route::group(['prefix' => 'khachhang'], function () {
        Route::get('danhsach', 'EmployeeController@getDanhSach');

        Route::get('chi-tiet-khach-hang/{id}', [
            'as' => 'nv_chitietkhachhang',
            'uses' => 'EmployeeController@getChiTietKhachHang'
        ]);
    });
});

// end employee interface



