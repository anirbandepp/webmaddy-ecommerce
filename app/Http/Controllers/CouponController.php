<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::orderBy('id', 'desc')->get();
        return view('admin.pages.coupon.list')->with(['coupons' => $coupons]);
    }

    public function createCoupon()
    {
        return view('admin.pages.coupon.create');
    }

    public function storeCoupon(Request $r)
    {
        try {
            $this->validate($r, [
                'coupon_code' => 'required|unique:coupons,coupon_code',
                'coupon_value' => 'required',
                'expiry_at' => 'required|date|after:now',
                'coupon_type' => [
                    'required',
                    Rule::in(['percentage', 'flat_value']),
                ]
            ]);

            $input = [
                'coupon_code' => $r->coupon_code,
                'coupon_value' => $r->coupon_value,
                'coupon_type' => $r->coupon_type,
                'expiry_at' => Carbon::parse($r->expiry_at)->format('Y-m-d'),
                'slug' => uniqid()
            ];

            Coupon::create($input);
            return redirect()->route('administrator.coupon.coupon_list');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deleteCoupon(Request $r, $id)
    {
        try {
            Coupon::destroy($id);
            $r->session()->flash('success', 'coupon deleted successfully.');
            return redirect()->route('administrator.coupon.coupon_list');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function fetchCoupon($id)
    {
        try {
            $coupon = Coupon::where('id', $id)->first();
            return view('admin.pages.coupon.edit')->with(['coupon' => $coupon]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updateCoupon(Request $r)
    {
        try {
            $this->validate($r, [
                'coupon_code' => [
                    'required',
                    Rule::unique('coupons')->ignore($r->id, 'id')
                ],
                'coupon_value' => 'required|integer|min:1',
                'expiry_at' => 'required|date|after:now',
                'coupon_type' => [
                    'required',
                    Rule::in(['percentage', 'flat_value']),
                ]
            ]);

            Coupon::where("id", $r->id)->update([
                "coupon_code" => $r->coupon_code,
                "coupon_value" => $r->coupon_value,
                "coupon_type" => $r->coupon_type,
                "status" => $r->status,
                "expiry_at" => Carbon::parse($r->expiry_at)->format('Y-m-d')
            ]);
            $r->session()->flash('success', 'coupon updated successfully.');
            return redirect()->route('administrator.coupon.coupon_list');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
