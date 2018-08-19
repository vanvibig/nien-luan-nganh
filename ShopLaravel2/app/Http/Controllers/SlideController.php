<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function getDanhSach()
    {
        $slides = Slide::all();
        return view('admin.slide.danhsach', compact('slides'));
    }

    public function getThem()
    {
        return view('admin.slide.them');
    }

    public function postThem(Request $req)
    {

        $this->validate($req, [
            'link' => 'required',
            'image' => 'required|unique:type_products'
        ], [
            'link.required' => 'Bạn chưa nhập link',
            'image.required' => 'Bạn chưa upload hình',
            'image.unique' => 'Tên file đã tồn tại, vui lòng đổi tên khác'
        ]);
        $slide = new Slide();
        $slide->link = $req->link;

        if ($req->hasFile('image')) {
            $file = $req->image;
            $slide->image = $file->getClientOriginalName();
            while(file_exists('public/source/image/slide/'.$slide->image)){
                $slide->image = str_random(4)."_".$slide->image;
            }
            $file->move('public/source/image/slide/', $slide->image);
        }
        $slide->save();

        return redirect('admin/slide/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $slide = Slide::find($id);
        return view('admin.slide.sua', compact('slide'));
    }

    public function postSua(Request $req, $id)
    {
        $slide = Slide::find($id);
        $this->validate($req, [
            'link' => 'required',
        ], [
            'link.required' => 'Bạn chưa nhập link',
        ]);

        $slide->link = $req->link;

        if ($req->hasFile('image')) {
            $file = $req->image;
            $slide->image = $file->getClientOriginalName();
            if(file_exists('public/source/image/slide/'.$slide->image)){
                unlink('public/source/image/slide/' . $slide->image);
//                $slide->image = str_random(4)."_".$slide->image;
            }
            $file->move('public/source/image/slide/', $slide->image);
        }

        $slide->save();

        return redirect('admin/slide/sua/' . $id)->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id)
    {
        $slide = Slide::find($id);
        try {
            if (file_exists('public/source/image/slide/' . $slide->image)) {
                unlink('public/source/image/slide/' . $slide->image);
            }
            $slide->delete();
        } catch (\Exception $e) {
            echo "Error: " . $e;
        }

        return redirect('admin/slide/danhsach')->with('thongbao', 'Bạn đã xóa thành công');
    }
}
