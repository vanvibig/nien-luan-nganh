<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function getDanhSach()
    {
        $authors = Author::all();
        return view('admin.tacgia.danhsach', compact('authors'));
    }

    public function getThem()
    {
        return view('admin.tacgia.them');
    }

    public function postThem(Request $req)
    {

        $this->validate($req, [
            'name' => 'required|min:3|max:100|unique:authors',
            'image' => 'unique:authors'
        ], [
            'name.required' => 'Bạn chưa nhập tên tác giả',
            'name.min' => 'Tên phải có ít nhất 3 kí tự',
            'name.max' => 'Tên có nhiều nhất 100 kí tự',
            'name.unique' => 'Tên đã tồn tại',
            'image.unique' => 'Tên file đã tồn tại, Vui lòng đổi tên khác'
        ]);
        $author = new Author();
        $author->name = $req->name;
        $author->yearofbirth = $req->yearofbirth;
        $author->gender = $req->gender;

        if ($req->hasFile('image')) {
            $file = $req->image;
            $author->image = $file->getClientOriginalName();
            while(file_exists('public/source/image/product/'.$author->image)){
                $author->image = str_random(4)."_".$author->image;
            }
            $file->move('public/source/image/product/', $author->image);
        }
        $author->save();

        return redirect('admin/tacgia/them')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $author = Author::find($id);
        return view('admin.tacgia.sua', compact('author'));
    }

    public function postSua(Request $req, $id)
    {
        $author = Author::find($id);
        $this->validate($req, [
            'name' => 'required|min:3|max:100',
            'image' => 'unique:authors'
        ], [
            'name.required' => 'Bạn chưa nhập tên',
            'name.unique' => 'Tên đã tồn tại',
            'name.min' => 'Tên phải có ít nhất 3 kí tự',
            'name.max' => 'Tên có nhiều nhất 100 kí tự',
            'image.unique' => 'Tên file đã tồn tại, vui lòng chọn file khác'
        ]);

        if ($author->name <> $req->name) {
            $author->name = $req->name;
        }
        $author->yearofbirth = $req->yearofbirth;
        $author->gender = $req->gender;

        if ($req->hasFile('image')) {
            $file = $req->image;
            if (file_exists('public/source/image/product/' . $author->image)) {
                unlink('public/source/image/product/' . $author->image);
            }
            $author->image = $file->getClientOriginalName();
            $file->move('public/source/image/product/', $author->image);
        }

        $author->save();

        return redirect('admin/tacgia/sua/' . $id)->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id)
    {
        $author = Author::find($id);
        try {
            if (file_exists('public/source/image/product/' . $author->image)) {
                unlink('public/source/image/product/' . $author->image);
            }
            $author->delete();
        } catch (\Exception $e) {
            echo "Error: " . $e;
        }

        return redirect('admin/tacgia/danhsach')->with('thongbao', 'Xóa thành công');
    }
}