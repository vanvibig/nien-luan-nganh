<?php

namespace App\Http\Controllers;

use App\Author;
use App\Product;
use App\Product_type_detail;
use App\Type_detail;
use App\Type_product;
use Illuminate\Http\Request;
use MongoDB\BSON\Type;
use DB;

class ProductController extends Controller
{
    public function getDanhSach()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.san_pham.danhsach', compact('products'));
    }

    public function getDanhSachTheoLoai($id)
    {
//        $products = Product::where('id_type', $id)->get();
        $products = Type_detail::find($id)->product()->get();
        $type = Type_detail::find($id);
        return view('admin.san_pham.danhsachtheoloai', compact('products', 'type'));
    }

    public function getDanhSachTheoTacGia($id)
    {
        $products = Author::find($id)->product()->get();
        $author = Author::find($id);
        return view('admin.san_pham.danhsachtheotacgia', compact('products', 'author'));
    }

    public function getThem()
    {
        $types = Type_detail::all();
        $authors = Author::all();
        return view('admin.san_pham.them', compact('types', 'authors'));
    }

    public function postThem(Request $req)
    {
        $this->validate($req, [
            'name' => 'required|min:3|unique:products',
            'type' => 'required',
            'unit_price' => 'required',
            'unit' => 'required',
            'image' => 'required|unique:products'
        ], [
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'name.min' => 'Tên sản phẩm phải có ít nhất 3 kí tự',
            'name.unique' => 'Tên bạn nhập đã tồn tại',
            'type.required' => 'Bạn chưa chọn thể loại',
            'image.required' => 'Bạn chưa nhập file ảnh',
            'image.unique' => 'Tên file đã tồn tại, vui lòng đổi tên khác',
            'unit_price' => 'Bạn chưa nhập giá',
            'unit.required' => 'Bạn chưa nhập đơn vị tính'

        ]);

        $product = new Product();
        $product->name = $req->name;

        $product->description = $req->description;
        $product->unit_price = $req->unit_price;
        $product->promotion_price = $req->promotion_price;

        if ($req->hasFile('image')) {
            $file = $req->image;
            $product->image = $file->getClientOriginalName();
            while (file_exists('source/image/product/' . $product->image)) {
                $product->image = str_random(4) . "_" . $product->image;
            }
            $file->move('source/image/product/', $product->image);
        }

        $product->unit = $req->unit;
        $product->amount = $req->amount;
        $product->new = $req->new;

        $product->save();


        /**
         * Phải thêm sản phẩm xong mới có id để thêm bên bảng thể loại nhiều nhiều
         */
        $product->type_detail()->attach($req->type);
        $product->author()->attach($req->author);

        return redirect('admin/sanpham/them')->with('thongbao', 'Thêm sản phẩm thành công');
    }

    public function getSua($id)
    {
        $types = Type_detail::all();
        $product = Product::find($id);
        $authors = Author::all();
        return view('admin.san_pham.sua', compact('product', 'types', 'authors'));
    }

    public function postSua(Request $req, $id)
    {
        $product = Product::find($id);

        $this->validate($req, [
            'name' => 'required|min:3',
            'type' => 'required',
            'unit_price' => 'required',
            'unit' => 'required',
        ], [
            'name.required' => 'Bạn chưa nhập tên sản phẩm',
            'name.min' => 'Tên sản phẩm phải có ít nhất 3 kí tự',
            'type.required' => 'Bạn chưa chọn thể loại',
            'unit_price' => 'Bạn chưa nhập giá',
            'unit.required' => 'Bạn chưa nhập đơn vị tính'

        ]);

        $product->id = $req->id;
        if (isset($req->name)) {
            $this->validate($req, [
                'name' => 'min:3',
            ], [
                'name.min' => 'Tên sản phẩm phải có ít nhất 3 kí tự',
            ]);
            $product->name = $req->name;
        }

//        $product->id_type = $req->id_type;


        $product->description = $req->description;
        $product->amount = $req->amount;
        $product->unit_price = $req->unit_price;
        $product->promotion_price = $req->promotion_price;

        if ($req->hasFile('image')) {
            $file = $req->image;
            if (file_exists('source/image/product/' . $product->image)) {
                unlink('source/image/product/' . $product->image);
            }
            $product->image = $file->getClientOriginalName();
            $file->move('source/image/product/', $product->image);
        }

        $product->unit = $req->unit;
        $product->new = $req->new;

        $product->save();

        $product->type_detail()->sync($req->type);
        $product->author()->sync($req->author);

        return redirect('admin/sanpham/sua/' . $id)->with('thongbao', 'Sửa sản phẩm thành công');
    }

    public function getXoa($id)
    {
        $product = Product::find($id);
        $thongbao = '';
        if (
            count($product->bill_detail()->get()) == 0
        ) {
            try {
                if (file_exists('source/image/product/' . $product->image)) {
                    unlink('source/image/product/' . $product->image);
                }
                $product->type_detail()->detach();
                $product->author()->detach();
                $product->delete();
                $thongbao = 'Bạn đã xóa thành công';
            } catch (\Exception $e) {
                echo "Error: " . $e;
            }
        } else {
            $thongbao = 'Bạn không được phép xóa vì có 1 đối tượng khác đang sử dụng thông tin này';
        }
        return redirect('admin/sanpham/danhsach')->with('thongbao', $thongbao);
    }
}
