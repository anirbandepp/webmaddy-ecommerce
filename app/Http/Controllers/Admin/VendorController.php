<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vendor\VendorModel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = VendorModel::get();
        return view('admin.pages.vendor.list')->with(['vendors' => $vendors]);
    }

    public function createVendor()
    {
        return view('admin.pages.vendor.create');
    }

    public function storeVendor(Request $r)
    {
        try {
            $this->validate($r, [
                'vendor_name' => 'required',
                'vendor_email' => 'required|unique:vendors,vendor_email',
                'vendor_phone' => 'required|numeric',
                'address_line1' => 'required',
                'address_line2' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'admin_action' => [
                    'required',
                    Rule::in([0, 1]),
                ]
            ]);

            $input = [
                'vendor_name' => $r->vendor_name,
                'vendor_email' => $r->vendor_email,
                'vendor_phone' => $r->vendor_phone,
                'address_line1' => $r->address_line1,
                'address_line2' => $r->address_line2,
                'city' => $r->city,
                'state' => $r->state,
                'country' => $r->country,
                'admin_action' => $r->admin_action
            ];

            VendorModel::create($input);
            return redirect()->route('administrator.vendor.vendor_list');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deleteVendor(Request $r, $id)
    {
        try {
            VendorModel::destroy($id);
            $r->session()->flash('success', 'vendor deleted successfully.');
            return redirect()->route('administrator.vendor.vendor_list');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function fetchVendor($id)
    {
        try {
            $vendor = VendorModel::where('id', $id)->first();
            return view('admin.pages.vendor.edit')->with(['vendor' => $vendor]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function updateVendor(Request $r)
    {
        try {
            $this->validate($r, [
                'id' => 'required|exists:vendors,id',
                'vendor_name' => 'required',
                'vendor_email' => [
                    'required',
                    Rule::unique('vendors')->ignore($r->id, 'id')
                ],
                'vendor_phone' => 'required|numeric',
                'address_line1' => 'required',
                'address_line2' => 'required',
                'city' => 'required',
                'state' => 'required',
                'country' => 'required',
                'admin_action' => [
                    'required',
                    Rule::in([0, 1]),
                ]
            ]);

            VendorModel::where("id", $r->id)->update([
                'vendor_name' => $r->vendor_name,
                'vendor_email' => $r->vendor_email,
                'vendor_phone' => $r->vendor_phone,
                'address_line1' => $r->address_line1,
                'address_line2' => $r->address_line2,
                'city' => $r->city,
                'state' => $r->state,
                'country' => $r->country,
                'admin_action' => $r->admin_action
            ]);

            $r->session()->flash('success', 'vendor updated successfully.');
            return redirect()->route('administrator.vendor.vendor_list');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
