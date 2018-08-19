<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getDanhSach(){
        $users = User::all();
        return view('admin.user.danhsach', compact('users'));
    }

    public function getThem(){
        return view('admin.user.them');
    }

    public function postThem(Request $req){
        $this->validate($req,
            [
                'email' => 'required|email|unique:users',
                'password' => 'required|min:4|max:20',
                'full_name' => 'required|min:3',
                'password2' => 'required|same:password'

            ], [
                'full_name.min' => 'Tên phải có ít nhất 3 kí tự',
                'full_name.required' => 'Bạn chưa nhập tên',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng email',
                'email.unique' => 'Email đã có người sử dụng',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password2.required' => 'Vui lòng nhập mật khẩu lần nữa',
                'password2.same' => 'Mật khẩu không giống nhau',
                'password.min' => 'Mật khẩu ít nhất 4 kí tự',
                'password.max' => 'Mật khẩu nhiều nhất 20 kí tự',
            ]);

        $user = new User();
        $user->full_name = $req->full_name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->level = $req->level;
        $user->save();

        return redirect()->back()->with('thongbao', 'Tạo tài khoản thành công');

    }

    public function getSua($id){
        $user = User::find($id);
        return view('admin.user.sua', compact('user'));
    }
    public function postSua(Request $req, $id){
        $this->validate($req,
            [
//                'email' => 'required|email|unique:users',
                'full_name' => 'required|min:3',
//                'password2' => 'required|same:password'
//                'password' => 'required|min:4|max:20',

            ], [
                'full_name.min' => 'Tên phải có ít nhất 3 kí tự',
                'full_name.required' => 'Bạn chưa nhập tên',
//                'email.required' => 'Vui lòng nhập email',
//                'email.email' => 'Không đúng định dạng email',
//                'email.unique' => 'Email đã có người sử dụng',
//                'password.required' => 'Vui lòng nhập mật khẩu',
//                'password2.required' => 'Vui lòng nhập mật khẩu lần nữa',
//                'password2.same' => 'Mật khẩu không giống nhau',
//                'password.min' => 'Mật khẩu ít nhất 6 kí tự',
//                'password.max' => 'Mật khẩu nhiều nhất 20 kí tự',
            ]);

        $user = User::find($id);
        $user->full_name = $req->full_name;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->level = $req->level;

        if($req->changePassword == "on"){
                $this->validate($req,
                    [
                    'password2' => 'required|same:password',
                    'password' => 'required|min:4|max:20'

                    ],
                    [
                    'password.required' => 'Vui lòng nhập mật khẩu',
                    'password2.required' => 'Vui lòng nhập mật khẩu lần nữa',
                    'password2.same' => 'Mật khẩu không giống nhau',
                    'password.min' => 'Mật khẩu ít nhất 4 kí tự',
                    'password.max' => 'Mật khẩu nhiều nhất 20 kí tự'
                    ]);
            $user->password = Hash::make($req->password);
        }
        $user->save();

        return redirect('admin/user/sua/'.$id)->with('thongbao', 'Sửa thành công');

    }

    public function getXoa($id){
        $user = User::find($id);
        try {
            $user->delete();
        } catch (\Exception $e) {
            echo 'Err: '. $e;
        }

        return redirect('admin/user/danhsach')->with('thongbao', 'Đã xóa thành công');
    }

    public function getDangNhapAdmin(){
        if(Auth::check()) {
            $user = Auth::user();
            if ($user->level == 1) {
                return redirect('admin/sanpham/danhsach');
            } else {
                return redirect('admin/dangnhap')->with('thongbao', 'Vui lòng đăng nhập bằng tài khoản Admin');
            }
        }
        return view('admin.login');
    }
    public function postDangNhapAdmin(Request $req){
        $this->validate($req, [
            'email' => 'required',
            'password' => 'required|min:4|max:20',
        ], [
            'email.required' => 'Vui lòng nhập email',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu ít nhất 4 kí tự',
            'password.max' => 'Mật khẩu nhiều nhất 20 kí tự',
        ]);

        if(Auth::attempt(['email'=>$req->email, 'password'=>$req->password])){
            return redirect('admin/sanpham/danhsach');
        }else{
            return redirect('admin/dangnhap')->with('thongbao', 'Đăng nhập không thành công');
        }
    }

    public function getDangXuatAdmin(){
        Auth::logout();
        return redirect('/');
    }
}
