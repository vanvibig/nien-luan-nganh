<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Bill_detail;
use App\Product;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function getDanhSach()
    {
        $bills = Bill::orderBy('id', 'desc')->get();
        return view('admin.hoadon.danhsach', compact('bills'));
    }

    public function getChiTietHoaDon($id)
    {
        $bill_details = Bill_detail::where('id_bill', $id)->get();
        $bill_detail_1 = Bill_detail::where('id_bill', $id)->first();
        return view('admin.hoadon.chitiet', compact('bill_details', 'bill_detail_1'));
    }

    public function getDoanhThu()
    {
        $total = Bill::all()->sum('total');
        return view('admin.thongke.doanhthu', compact('total'));
    }

    public function getSanPham()
    {
        $bill_detail = Bill_detail::orderByDesc('quantity')->groupBy('id_product')->get();
//        $products_id = $products_id->get('id_product');
//        dd($bill_detail);
        return view('admin.thongke.sanpham', compact('bill_detail'));
    }
}
