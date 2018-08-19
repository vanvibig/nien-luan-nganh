<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getDanhSach()
    {
        $news = News::all();
        return view('admin.tintuc.danhsach', compact('news'));
    }

    public function getThem()
    {
        return view('admin.tintuc.them');
    }

    public function postThem(Request $req)
    {

        $this->validate($req, [
            'title' => 'required|min:3|unique:news',
            'image' => 'unique:news'
        ], [
            'title.required' => 'Bạn chưa nhập tên tin tức',
            'title.min' => 'Tiêu đề phải có ít nhất 3 kí tự',
            'title.unique' => 'Tên tin tức đã tồn tại',
            'image.unique' => 'Tên file đã tồn tại'
        ]);
        $news = new News();
        $news->title = $req->title;
        // content bị unable access nên thêm chữ t
        $news->content = $req->contentt;

        if ($req->hasFile('image')) {
            $file = $req->image;
            $news->image = $file->getClientOriginalName();
            while(file_exists('public/source/image/product/'.$news->image)){
                $news->image = str_random(4)."_".$news->image;
            }
            $file->move('public/source/image/product/', $news->image);
        }
        $news->save();

        return redirect('admin/tintuc/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id){

        $new = News::find($id);
        return view('admin.tintuc.sua', compact('new'));
    }

    public function postSua(Request $req, $id){

        $this->validate($req, [
            'title' => 'required|min:3',
            'image' => 'unique:news'
        ], [
            'title.required' => 'Bạn chưa nhập tên tin tức',
            'title.min' => 'Tiêu đề phải có ít nhất 3 kí tự',
            'image.unique' => 'Tên file đã tồn tại'
        ]);

        $new = News::find($id);
        $new->title = $req->title;
        // content bị unable access nên thêm chữ t
        $new->content = $req->contentt;

        if($req->hasFile('image')){
            $file = $req->image;
            if(file_exists('public/source/image/product/'.$new->image)){
                unlink('public/source/image/product/'.$new->image);
            }
            $new->image = $file->getClientOriginalName();
            $file->move('public/source/image/product/', $new->image);
        }
        $new->save();

        return redirect('admin/tintuc/sua/'.$id)->with('thongbao', 'Sửa thành công');

    }

    public function getXoa($id){
        $new = News::find($id);
        try {
            if(file_exists('public/source/image/product/'.$new->image)){
                unlink('public/source/image/product/'.$new->image);
            }
            $new->delete();
        } catch (\Exception $e) {
            echo "Error: " . $e;
        }

        return redirect('admin/tintuc/danhsach')->with('thongbao', 'Xóa tin tức thành công');
    }

}
