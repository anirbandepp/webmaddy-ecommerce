@extends('admin.layouts.back-app')

@section('cssContent')
    <style>
        .err {
            color: red;
        }
    </style>
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Vendor</span> - Create Vendor</h4>
            </div>
        </div>
    </div>
    <!-- /page header -->
    <!-- Content area -->
    <div class="content content-product-add">
        <div class="row">

            <form action="{{ route('administrator.vendor.store_vendor') }}" method="POST"
                onsubmit="return vendor_add_function()">
                @csrf

                <div class="col-md-9">
                    <div class="panel panel-flat pd-20">

                        <div class="form-group">
                            <label for="vendor_name">Vendor name</label>
                            <input type="text" name="vendor_name" id="vendor_name" class="form-control pr-title"
                                placeholder="Vendor name" />
                            @error('vendor_name')
                                <span class="err">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="vendor_email">Vendor Email</label>
                            <input type="text" name="vendor_email" id="vendor_email" class="form-control pr-title"
                                placeholder="Vendor name" />
                            @error('vendor_email')
                                <span class="err">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="vendor_phone">Vendor Phone no.</label>
                            <input type="tel" name="vendor_phone" id="vendor_phone" class="form-control pr-title"
                                placeholder="Vendor name" />
                            @error('vendor_phone')
                                <span class="err">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address_line1">Vendor address line 1</label>
                            <textarea class="form-control" rows="5" id="address_line1" name="address_line1"></textarea>

                            @error('address_line1')
                                <span class="err">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address_line2">Vendor address line 2</label>
                            <textarea class="form-control" rows="5" id="address_line2" name="address_line2"></textarea>

                            @error('address_line2')
                                <span class="err">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="city">Vendor City</label>
                            <input type="text" name="city" id="city" class="form-control pr-title"
                                placeholder="Vendor City" />
                            @error('city')
                                <span class="err">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="state">Vendor state</label>
                            <input type="text" name="state" id="state" class="form-control pr-title"
                                placeholder="Vendor state" />
                            @error('state')
                                <span class="err">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="country">Vendor country</label>
                            <input type="text" name="country" id="country" class="form-control pr-title"
                                placeholder="Vendor country" />
                            @error('country')
                                <span class="err">{{ $message }}</span>
                            @enderror
                        </div>

                        <label for="admin_action">Admin Action</label>
                        <select class="form-control" id="admin_action" name="admin_action">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>

                    </div>
                </div>

                <div class="col-md-3">

                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Publish <a class="heading-elements-toggle"><i class="icon-more"></i></a>
                            </h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse" class=""></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body" style="display: block;">
                            <input type="submit" class="btn btn-success btn-block" value="Create Vendor">

                        </div>

                    </div>

                </div>

            </form>

        </div>
    </div>
@endsection

@section('jsContent')
    <script>
        function vendor_add_function() {

            var vendor_name = $("#vendor_name").val();
            var vendor_email = $("#vendor_email").val();
            var vendor_phone = $("#vendor_phone").val();
            var address_line1 = $("#address_line1").val();
            var address_line2 = $("#address_line2").val();
            var city = $("#city").val();
            var state = $("#state").val();
            var country = $("#country").val();
            var admin_action = $("#admin_action").val();

            if (vendor_name == "" || vendor_name == null) {
                $.notify("vendor name is required", "error");
                return false;
            } else if (vendor_email == "" || vendor_email == null) {
                $.notify("vendor email is required", "error");
                return false;
            } else if (vendor_phone == "" || vendor_phone == null) {
                $.notify("vendor phone no is required", "error");
                return false;
            } else if (address_line1 == "" || address_line1 == null) {
                $.notify("vendor addless line 1 is required", "error");
                return false;
            } else if (address_line2 == "" || address_line2 == null) {
                $.notify("vendor addless line 2 is required", "error");
                return false;
            } else if (city == "" || city == null) {
                $.notify("vendor city is required", "error");
                return false;
            } else if (state == "" || state == null) {
                $.notify("vendor state is required", "error");
                return false;
            } else if (country == "" || country == null) {
                $.notify("vendor country is required", "error");
                return false;
            } else {
                return true;
            }
        }
    </script>
@endsection
