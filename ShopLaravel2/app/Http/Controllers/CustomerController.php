<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function getDanhSach(){
        $customers = Customer::all();
        return view('admin.khachhang.danhsach', compact('customers'));
    }


    public function getChiTietKhachHang($id){
        $customer = Customer::find($id);
        $bills = Bill::where('id_customer', $id)->get();


        return view('admin.khachhang.chitiet', compact('customer', 'bills'));
    }
}
