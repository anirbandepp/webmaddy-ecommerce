@extends('admin.layouts.back-app')

@section('cssContent')
    <style>
        .err {
            color: red;
        }

        .d-flex input {
            width: calc(100% - 100px);
            display: inline-block;
        }
    </style>
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Category</span> - Add Category</h4>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content content-product-add">
        <div class="row">
            <form action="{{ route('administrator.coupon.store_coupon') }}" onsubmit="return coupon_add_fx()" method="POST">
                @csrf

                <div class="col-md-9">
                    <div class="panel panel-flat pd-20">

                        <div class="form-group d-flex">
                            <label for="coupon_code" style="display: block;">Coupon Code:</label>
                            <input type="text" class="form-control" placeholder="Enter coupon code" name="coupon_code"
                                id="coupon_code" value="{{ old('coupon_code') }}" />
                            <button type="button" id="couponCodeGenerate" class="btn btn-primary d-none">Generate</button>
                            <span class="err">
                                @error('coupon_code')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="coupon_value">Coupon Value(Discount amount):</label>
                            <input type="number" class="form-control" placeholder="Enter coupon value" name="coupon_value"
                                id="coupon_value" />
                            <span class="err">
                                @error('coupon_value')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="coupon_type">Coupon Type:</label>
                            <select name="coupon_type" id="coupon_type" class="form-control">
                                <option value="percentage">Percentage</option>
                                <option value="flat_value">Flat Value</option>
                            </select>
                            <span class="err">
                                @error('coupon_type')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="expiry_at">Expiry At:</label>
                            <input type="date" class="form-control" name="expiry_at" id="expiry_at" />
                            <span class="err">
                                @error('expiry_at')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Create Coupon <a class="heading-elements-toggle">
                                    <i class="icon-more"></i></a>
                            </h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse" class=""></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body" style="display: block;">
                            <input type="submit" class="btn btn-success btn-block" value="Create Coupon">
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('jsContent')
    <script>
        function coupon_add_fx() {
            var coupon_code = $("#coupon_code").val();
            var coupon_value = $("#coupon_value").val();
            var coupon_type = $("#coupon_type").val();
            var expiry_at = $("#expiry_at").val();

            if (coupon_code == "" || coupon_code == null) {
                $.notify("coupon code is required", "error");
                return false;
            } else if (coupon_value == "" || coupon_value == null) {
                $.notify("coupon value is required", "error");
                return false;
            } else if (coupon_type == "" || coupon_type == null) {
                $.notify("coupon type is required", "error");
                return false;
            } else if (expiry_at == "" || expiry_at == null) {
                $.notify("expiry at is required", "error");
                return false;
            } else {
                return true;
            }
        }

        $(document).on('click', '#couponCodeGenerate', function(e) {
            e.preventDefault();

            var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
            var string_length = 10;
            var randomstring = '';
            for (var i = 0; i < string_length; i++) {
                var rnum = Math.floor(Math.random() * chars.length);
                randomstring += chars.substring(rnum, rnum + 1);
            }
            $("#coupon_code").val(randomstring);
        });
    </script>
@endsection
