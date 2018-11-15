<?php

namespace App\Http\Controllers;

use App\Author;
use App\Bill;
use App\Bill_detail;
use App\Cart;
use App\Customer;
use App\News;
use App\Product;
use App\Slide;
use App\Type_detail;
use App\Type_product;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Session;
use Hash;
use Auth;
use Illuminate\Http\Request;
use DB;
use Event;


/**
 * Class PageController
 * @package App\Http\Controllers
 */
class PageController extends Controller
{

    public function __construct()
    {
        $user = Auth::user();
    }

    public function getIndex()
    {
        $slide = Slide::all();

//        return view('page.trangchu', [
//            'slide' => $slide
//        ]);


        $new_product = Product::where('new', '=', 1)
            ->paginate(6);
        /**
         * dd show raw data getted
         */
//        dd($new_product);


//        return view('page.trangchu', compact('slide', 'new_product'));

//        $sanpham_khuyenmai = Product::where('promotion_price', '<>', 0)->paginate(6);

        $sanpham_khuyenmai = Product::whereHas('promotion', function ($query) {
            $query->where('status', 1);
        })->paginate(6);

//        dd($sanpham_khuyenmai);

        $news = News::all();

        $loai_chitiet = Type_detail::all();

        $sp_theoview = Product::limit(5)->orderByDesc('view_count')->get();

//        foreach ($new_product as $newp){
//            foreach ($newp->promotion as $p){
//                dd(is_null($p));
//            }
//        }


        return view('page.trangchu', [
            'slide' => $slide,
            'new_product' => $new_product,
            'sanpham_khuyenmai' => $sanpham_khuyenmai,
            'news' => $news,
            'loai_chitiet' => $loai_chitiet,
            'sp_theoview' => $sp_theoview,
        ]);
    }

    public function getSanPhamMoi()
    {
        $sp_moi = Product::orderBy('created_at', 'desc')->paginate(6);

        $loai_chitiet = Type_detail::all();

        $top5 = Product::limit(5)->orderByDesc('view_count')->get();

        return view('page.sanphammoi', compact('sp_moi', 'loai_chitiet', 'top5'));

    }

    public function getSanPhamTheoTacGia($id)
    {
        $sp = Author::find($id)->product()->paginate(9);
        $author = Author::find($id);

        $loai_chitiet = Type_detail::all();

        $top5 = Product::limit(5)->orderByDesc('view_count')->get();

        return view('page.sanphamtheotacgia', compact('sp', 'loai_chitiet', 'top5', 'author'));

    }


    public function getSanPhamXemNhieu()
    {
        $loai_chitiet = Type_detail::all();

        $sp_theoview = Product::orderByDesc('view_count')->paginate(6);

        return view('page.sanphamxemnhieu', compact('loai_chitiet', 'sp_theoview'));
    }

    public function getSanPhamKhuyenMai()
    {
        $loai_chitiet = Type_detail::all();

//        $sp_khuyenmai = Product::where('promotion_price', '>', 0)
//            ->where('unit_price', '>', 'promotion_price')
//            ->paginate(6);

        $sp_khuyenmai = Product::whereHas('promotion', function ($query) {
            $query->where('status', 1)
                ->where('end', '>=', Carbon::today()->format('Y/m/d'))
                ->orderByDesc('discount');
        })->paginate(6);

        return view('page.sanphamkhuyenmai', compact('loai_chitiet', 'sp_khuyenmai'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLoaiSp($type)
    {
        $sp_theoloai = Product::where('id_type', $type)->get();

//        $sp_khac = Product::where('id_type', '<>', $type)->paginate(3);

        $sp_khac = Product::whereNotIn('id', $sp_theoloai)->get();

        $loai = Type_product::all();

        $loai_sp = Type_product::where('id', $type)->first();

        $loai_chitiet = Type_detail::all();

        return view('page.loai_sanpham', compact('sp_theoloai',
            'sp_khac',
            'loai',
            'loai_sp',
            'loai_chitiet'));
    }

    public function getLoaiSpChiTiet($type)
    {
        $sp_theoloai_list = Type_detail::find($type)->product();
        $sp_theoloai = $sp_theoloai_list->paginate(6);

        $sp_theoloai_list_id = $sp_theoloai_list->pluck('id')->toArray();

//        $loai_khac = Type_detail::where('id', '<>', $type)
//            ->limit(2)
//            ->get();
//        dd($loai_khac);

//        $sanpham_khuyenmai = Product::whereHas('promotion', function ($query) {
//            $query->where('status', 1);
//        })->paginate(6);

        $loai_khac = Product::whereHas('type_detail', function ($query) use ($type) {
            $query->where('id', '<>', $type);
        })
            ->whereNotIn('id', $sp_theoloai_list_id)
            ->limit(6)
            ->orderByDesc('view_count')
            ->get();

//        dd($loai_khac);

        $loai_chitiet = Type_detail::all();
        $loai_sp = Type_detail::where('id', $type)->first();

        $sp_theoview = Product::limit(5)->orderByDesc('view_count')->get();

        return view('page.loai_sanpham_chitiet', compact('sp_theoloai', 'loai_khac', 'loai_sp', 'spk', 'loai_chitiet', 'sp_theoview'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getChiTiet(Request $req)
    {
        $id_loai = $req->id;
        $sanpham = Product::where('id', $req->id)->first();
//        $cung_loai = $sanpham->type_detail()->get();

        $sp_moi = Product::orderBy('updated_at', 'desc')->limit(10)->get();

//        $sp_tuongtu = Product::where('id_type', $sanpham->id_type)->paginate(6);

        $sp_tuongtu = Type_detail::find($req->id)->product()->get();
//        $sp_tuongtu = Product::whereIn('id', $sp_theoloai)->get();

        // đếm lượt view

        $sp_theoview = Product::limit(10)->orderByDesc('view_count')->get();

        $cung_loai = Product::where('id', '<>', $sanpham->id)
            ->limit(6)
            ->orderByDesc('view_count')
            ->get();

        Event::fire('products.view', $sanpham);


        $currentItemDetail = $this->getCurrentItemInCart($sanpham);

        return view('page.chitiet_sanpham', compact(
            'sanpham',
            'sp_tuongtu',
            'sp_moi',
            'cung_loai',
            'sp_theoview',
            'currentItemDetail'
        ));
    }

    public function getCurrentItemInCart(Product $sanpham)
    {
        $cart = Session::get('cart');
        $currentItemInCart = array_filter($cart->items, function ($el) use ($sanpham) {
            return ($el['item']->id == $sanpham->id);
        });

        $currentItemDetail = '';
        foreach ($currentItemInCart as $item) {
            $currentItemDetail = $item;
        }

        return $currentItemDetail;
    }

    public function getChiTietTinMoi(Request $req)
    {
        $new = News::find($req->id);
        $new_khac = News::where('id', '<>', $req->id)->get();
        $sp_moi = Product::orderBy('updated_at', 'desc')->limit(10)->get();
        return view('page.chitiet_tinmoi', compact('new', 'sp_moi', 'new_khac'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function lienHe()
    {
        return view('page.lienhe');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function gioiThieu()
    {
        return view('page.gioithieu');
    }

    public function getAddToCart(Request $req, $id)
    {
        $product = Product::find($id);
        $old_cart = Session('cart') ? Session::get('cart') : null;
//        $old_cart->items[$id]['item']['amount'];
//        dd($old_cart->items[$id]['item']['amount'] - $product->amount);
//        dd($old_cart);

        if ($old_cart == null) {
            if ($product->amount > 0) {
                $cart = new Cart($old_cart);
                $cart->add($product, $id);
                $req->session()->put('cart', $cart);
                return redirect()->back();//->with('thongbao', 'Thêm vào giỏ hàng thành công');
            } else {
                return redirect()->back()->with('thongbao', 'Sản phẩm hiện hết hàng. Hàng mới sắp về.');
            }
        } else {
            if (array_key_exists($id, $old_cart->items)) {
                if ($product->amount - $old_cart->items[$id]['qty'] >= 1) {
                    $cart = new Cart($old_cart);
                    $cart->add($product, $id);
                    $req->session()->put('cart', $cart);
//                    return redirect()->back();
                    return redirect()->back();//->with('thongbao', 'Thêm vào giỏ hàng thành công');
                } else {
                    return redirect()->back()->with('thongbao', 'Sản phẩm hiện đã được đặt tối đa trong giỏ hàng');
                }
            } else {
                $cart = new Cart($old_cart);
                $cart->add($product, $id);
                $req->session()->put('cart', $cart);
                return redirect()->back();//->with('thongbao', 'Thêm vào giỏ hàng thành công');
            }
        }


    }

    public function getreduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->back();
    }

    public function getDelItemCart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->back();
    }

    public function getCheckout()
    {
        return view('page.dat_hang');
    }

    public function postCheckout(Request $req)
    {
        $cart = Session::get('cart');

        $customer = new Customer();
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill();
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment;
        $bill->note = $req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new Bill_detail();
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = $value['price'] / $value['qty'];
            $bill_detail->save();
        }

        Session::forget('cart');
        return redirect()->back()->with('thongbao', 'Đặt hàng thành công');
    }

    public function getSignin()
    {
        return view('page.dangki');
    }

    public function postSignin(Request $req)
    {
        $this->validate($req,
            [
                'email' => 'required|email|unique:users',
                'password' => 'required|min:4|max:20',
                'full_name' => 'required',
                're_password' => 'required|same:password',
            ], [
                'full_name' => 'Vui lòng nhập tên',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng email',
                'email.unique' => 'Email đã có người sử dụng',
                'password.required' => 'Vui lòng nhập mật khẩu',
                're_password.same' => 'Mật khẩu không giống nhau',
                'password.min' => 'Mật khẩu ít nhất 4 kí tự',
                'password.max' => 'Mật khẩu nhiều nhất 20 kí tự',
            ]);

        $user = new User();
        $user->full_name = $req->full_name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thanhcong', 'Tạo tài khoản thành công');
    }

    public function getSuaTaiKhoan()
    {
        return view('page.suataikhoan');
    }

    public function postSuaTaiKhoan(Request $req)
    {
        $this->validate($req, [
            'full_name' => 'required|min:3',
        ], [
            'full_name.min' => 'Tên phải có ít nhất 3 kí tự',
            'full_name.required' => 'Bạn chưa nhập tên',
        ]);

        $user = User::find(Auth::user()->id);
        $user->full_name = $req->full_name;

        if (isset($req->password)) {
            $this->validate($req,
                [
                    're_password' => 'same:password',
                    'password' => 'min:4|max:20',

                ],
                [
                    're_password.same' => 'Mật khẩu không giống nhau',
                    'password.min' => 'Mật khẩu ít nhất 4 kí tự',
                    'password.max' => 'Mật khẩu nhiều nhất 20 kí tự',
                ]);
            $user->password = Hash::make($req->password);
        }

        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();

        return redirect()->back()->with('thanhcong', 'Sửa tài khoản thành công');
    }

    public function getLogin()
    {
        return view('page.dangnhap');
    }

    public function postLogin(Request $req)
    {
        $this->validate($req,
            [
                'email' => 'required|email',
                'password' => 'required|min:4|max:20'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'Vui lòng nhập password',
                'password.min' => 'Mật khẩu ít nhất 6 kí tự',
                'password.max' => 'Mật khẩu không quá 20 kí tự',
            ]);

        $credentials = array(
            'email' => $req->email,
            'password' => $req->password,
        );

        if (Auth::attempt($credentials)) {
//            return redirect()->back()->with([
//                'flag' => 'success',
//                'message' => 'Đăng nhập thành công',
//            ]);
            return redirect('/');
        } else {
            return redirect()->back()->with([
                'flag' => 'danger',
                'message' => 'Đăng nhập không thành công',
            ]);
        }
    }

    public function postLogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function getSearch(Request $req)
    {
        $sp = Product::where('name', 'like', '%' . $req->search . '%')
            ->orWhere('unit_price', $req->search)
            ->paginate(9);
//            ->get();

//        dd($sp);

        $keyword = $req->search;

        $loai_chitiet = Type_detail::all();

        $top5 = Product::limit(5)->orderByDesc('view_count')->get();
        return view('page.search', compact('sp', 'loai_chitiet', 'top5', 'keyword'));
    }
}
