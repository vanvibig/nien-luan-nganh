<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Bill;
use App\Bill_detail;

class EmployeeController extends Controller
{
    public function getDanhSach()
    {
        $bills = Bill::orderBy('id', 'desc')->get();
        return view('employee.hoadon.danhsach', compact('bills'));
    }

    public function getChiTietHoaDon($id)
    {
        $bill_details = Bill_detail::where('id_bill', $id)->get();
        $bill_detail_1 = Bill_detail::where('id_bill', $id)->first();
        return view('employee.hoadon.chitiet', compact('bill_details', 'bill_detail_1'));
    }

    public function getChiTietKhachHang($id){
        $customer = Customer::find($id);
        $bills = Bill::where('id_customer', $id)->get();

        return view('employee.khachhang.chitiet', compact('customer', 'bills'));
    }
}
