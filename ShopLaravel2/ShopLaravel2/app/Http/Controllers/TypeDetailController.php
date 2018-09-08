<?php

namespace App\Http\Controllers;

use App\Type_detail;
use Illuminate\Http\Request;
use Psy\Output\PassthruPager;

class TypeDetailController extends Controller
{
    public function getDanhSach()
    {
        $types = Type_detail::all();

//        $product = array();
//        foreach ($types as $t){
//            $product[] =
//        }
        $products = Type_detail::find(1)->product()->get();
//        dd($products);
        return view('admin.loai_chitiet.danhsach', compact('types', 'products'));
    }

    public function getThem()
    {
        return view('admin.loai.them');
    }

//    public function postThem(Request $req)
//    {
//
//        $this->validate($req, [
//            'name' => 'required|min:3|max:100|unique:type_products',
//            'image' => 'unique:type_products'
//        ], [
//            'name.required' => 'Bạn chưa nhập tên thể loại',
//            'name.min' => 'Tên phải có ít nhất 3 kí tự',
//            'name.max' => 'Tên có nhiều nhất 100 kí tự',
//            'name.unique' => 'Tên thể loại đã tồn tại',
//            'image.unique' => 'Tên file đã tồn tại'
//        ]);
//        $type = new Type_product();
//        $type->name = $req->name;
//        $type->description = $req->description;
//
//        $image = $req->image;
//        $image->move('public/source/image/product/', $image->getClientOriginalName());
//        $type->image = $image->getClientOriginalName();
//        $type->save();
//
//        return redirect('admin/loai/them')->with('thongbao', 'Thêm thành công');
//    }
//
//    public function getSua($id)
//    {
//        $type = Type_product::find($id);
//        return view('admin.loai.sua', compact('type'));
//    }
//
//    public function postSua(Request $req, $id)
//    {
//        $type = Type_product::find($id);
//        $this->validate($req, [
//            'name' => 'required|min:3|max:100',
//            'image' => 'unique:type_products'
//        ], [
//            'name.required' => 'Bạn chưa nhập tên thể loại',
//            'name.unique' => 'Tên thể loại đã tồn tại',
//            'name.min' => 'Tên phải có ít nhất 3 kí tự',
//            'name.max' => 'Tên có nhiều nhất 100 kí tự',
//            'image.unique' => 'Tên file đã tồn tại'
//        ]);
//
//        if ($type->name <> $req->name) {
//            $type->name = $req->name;
//        }
//        $type->description = $req->description;
//
////        $image_old = $type->image;
////        $image_new = $req->image;
////        if($image_old <> $image_new && $req->hasFile('image')){
////            $image_new->move('public/source/image/product/', $image_new->getClientOriginalName());
////            $type->image = $image_new->getClientOriginalName();
////        }
//
////        if ($req->hasFile('image')) {
////            $image = $req->file('image');
////        $image = $req->image;
////        if($image <> null){
////            $image->move('public/source/image/product/', $image->getClientOriginalName());
////            $type->image = $image->getClientOriginalName();
////        }
////        }
//
//        if($req->hasFile('image')){
//            $file = $req->image;
//            if(file_exists('public/source/image/product/'.$type->image)){
//                unlink('public/source/image/product/'.$type->image);
//            }
//            $type->image = $file->getClientOriginalName();
//            $file->move('public/source/image/product/', $type->image);
//        }
//
//        $type->save();
//
//        return redirect('admin/loai/sua/' . $id)->with('thongbao', 'Sửa thành công');
//    }
//
//    public function getXoa($id){
//        $type = Type_product::find($id);
//        try {
//            if(file_exists('public/source/image/product/'.$type->image)){
//                unlink('public/source/image/product/'.$type->image);
//            }
//            $type->delete();
//        } catch (\Exception $e) {
//            echo "Error: " . $e;
//        }
//
//        return redirect('admin/loai/danhsach')->with('thongbao', 'Bạn đã xóa thành công');
//    }
}
