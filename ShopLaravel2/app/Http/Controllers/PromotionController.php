<?php

namespace App\Http\Controllers;

use App\Promotion;
use App\Type_detail;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function getDanhSach()
    {
        $promtions = Promotion::all();
        return view('admin.khuyenmai.danhsach', compact('promtions'));
    }

    public function getThem()
    {
        return view('admin.khuyenmai.them');
    }

    public function postThem(Request $req)
    {

        $this->validate($req, [
            'name' => 'required|min:3|max:100',
            'start' => 'required',
            'end' => 'required'
        ], [
            'name.required' => 'Bạn chưa nhập tên khuyến mãi',
            'start.required' => 'Bạn chưa nhập ngày bắt đầu',
            'end.required' => 'Bạn chưa nhập ngày kết thúc'
        ]);
        $promotion = new Promotion();
        $promotion->name = $req->name;
        $promotion->status = $req->status;
        $promotion->discount = $req->discount;
        $promotion->start = $req->start;
        $promotion->end = $req->end;
        $promotion->save();

        return redirect('admin/khuyenmai/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $promotion = Promotion::find($id);
        return view('admin.khuyenmai.sua', compact('promotion'));
    }

    public function postSua(Request $req, $id)
    {
        $promotion = Promotion::find($id);

        $this->validate($req, [
            'name' => 'required|min:3|max:100',
            'start' => 'required',
            'end' => 'required'
        ], [
            'name.required' => 'Bạn chưa nhập tên khuyến mãi',
            'start.required' => 'Bạn chưa nhập ngày bắt đầu',
            'end.required' => 'Bạn chưa nhập ngày kết thúc'
        ]);

        $promotion->name = $req->name;
        $promotion->status = $req->status;
        $promotion->discount = $req->discount;
        $promotion->start = $req->start;
        $promotion->end = $req->end;
        $promotion->save();

        return redirect('admin/khuyenmai/sua/' . $id)->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id){
        $promotion = Promotion::find($id);
        try {
            $promotion->delete();
        } catch (\Exception $e) {
            echo "Error: " . $e;
        }

        return redirect('admin/khuyenmai/danhsach')->with('thongbao', 'Bạn đã xóa thành công');
    }

}
