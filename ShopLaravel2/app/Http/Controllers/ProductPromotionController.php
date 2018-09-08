<?php

namespace App\Http\Controllers;

use App\Author;
use App\Product;
use App\Product_type_detail;
use App\Promotion;
use App\Type_detail;
use App\Type_product;
use Illuminate\Http\Request;
use MongoDB\BSON\Type;
use DB;

class ProductPromotionController extends Controller
{
    public function getDanhSach()
    {
        $promotions = Promotion::all();
        return view('admin.sanpham_khuyenmai.danhsach', compact('promotions'));
    }


    public function getThem()
    {
        $promotions = Promotion::all();
        $products = Product::all();
        return view('admin.sanpham_khuyenmai.them', compact('promotions', 'products'));
    }

    public function postThem(Request $req)
    {
//        $this->validate($req, [
//            'name' => 'required|min:3|unique:products',
//            'type' => 'required',
//            'unit_price' => 'required',
//            'unit' => 'required',
//            'image' => 'required|unique:products'
//        ], [
//            'name.required' => 'Bạn chưa nhập tên sản phẩm',
//            'name.min' => 'Tên sản phẩm phải có ít nhất 3 kí tự',
//            'name.unique' => 'Tên bạn nhập đã tồn tại',
//            'type.required' => 'Bạn chưa chọn thể loại',
//            'image.required' => 'Bạn chưa nhập file ảnh',
//            'image.unique' => 'Tên file đã tồn tại, vui lòng đổi tên khác',
//            'unit_price' => 'Bạn chưa nhập giá',
//            'unit.required' => 'Bạn chưa nhập đơn vị tính'
//
//        ]);

        /**
         * Phải thêm sản phẩm xong mới có id để thêm bên bảng thể loại nhiều nhiều
         */
        $product = Product::find($req->product);
        $product->promotion()->attach($req->promotions);

        return redirect('admin/sanpham-khuyenmai/them')->with('thongbao', 'Thêm sản phẩm khuyến mãi thành công');
    }

    public function getSua($id)
    {
        $product = Product::find($id);
        $promotions = Promotion::all();
        $products = Product::all();
        return view('admin.sanpham_khuyenmai.sua', compact('product', 'products', 'promotions'));
    }

    public function postSua(Request $req, $id)
    {
        $product = Product::find($id);

//        $this->validate($req, [
//            'name' => 'required|min:3',
//            'type' => 'required',
//            'unit_price' => 'required',
//            'unit' => 'required',
//        ], [
//            'name.required' => 'Bạn chưa nhập tên sản phẩm',
//            'name.min' => 'Tên sản phẩm phải có ít nhất 3 kí tự',
//            'type.required' => 'Bạn chưa chọn thể loại',
//            'unit_price' => 'Bạn chưa nhập giá',
//            'unit.required' => 'Bạn chưa nhập đơn vị tính'
//
//        ]);

        $product->promotion()->sync($req->promotions);

        return redirect('admin/sanpham-khuyenmai/sua/' . $id)->with('thongbao', 'Sửa sản phẩm khuyến mãi thành công');
    }

    public function getXoa($id)
    {
        $product = Product::find($id);
        try {
            $product->promotion()->detach();
        } catch (\Exception $e) {
            echo "Error: " . $e;
        }
        return redirect('admin/sanpham-khuyenmai/danhsach')->with('thongbao', 'Xóa sản phẩm khuyến mãi thành công');
    }
}
