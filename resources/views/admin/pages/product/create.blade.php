@extends('admin.layouts.back-app')

@section('cssContent')
    <style>
        .createSlug {
            margin-top: 10px;
            display: none;
        }

        #slug {
            height: 35px;
            width: 50%;
            display: inline-block;
        }

        .err {
            color: red;
            font-weight: bold;
        }

        .fa-floppy-o {
            background: green;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Product</span> - Add Product</h4>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content content-product-add">
        <div class="row">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('administrator.product.store_product') }}" method="POST" enctype="multipart/form-data"
                onsubmit="return product_add_fx()">
                @csrf

                <div class="col-md-9">
                    <div class="panel panel-flat pd-20">

                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control pr-title" id="name" name="title"
                                placeholder="Enter product name" onchange="return changeSlugOnType()"
                                onkeyup="return changeSlugOnType()" />
                            <p class="url">
                                <strong>Slug: </strong> /<span id="slug_preview">create-slug</span>
                                <a href="javascript:;" onclick="return createCustomSlugFun()">
                                    <i class="icon-pencil4"></i>
                                </a>
                            </p>
                            <div class="createSlug" id="createSlug">
                                <input type="text" class="form-control pr-title" id="slug" name="slug"
                                    placeholder="Enter custom slug" />
                                <a href="javascript:;" onclick="return checkSlug()">
                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                </a>
                                <span class="err" id="errResp"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="prodimg">Image</label>
                            <input type="file" id="prodimg" name="images[]" class="form-control pr-title" multiple />
                            @error('prodimg')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control pr-title" id="price" name="price" step="0.01"
                                placeholder="Enter product name" />
                        </div>

                        <div class="form-group">
                            <label for="sell_price">Sell Price</label>
                            <input type="number" class="form-control pr-title" id="sell_price" name="sell_price"
                                step="0.01" placeholder="Enter product sell price" />
                        </div>

                        <div class="form-group">
                            <label for="stocks">Stocks</label>
                            <input type="number" class="form-control pr-title" id="stocks" name="stocks"
                                placeholder="Enter product stocks" />
                        </div>

                        <div class="form-group">
                            <label for="offer_percentage">Offer Percentage</label>
                            <input type="number" class="form-control pr-title" id="offer_percentage"
                                name="offer_percentage" step="0.01" placeholder="Enter product offer percentage" />
                        </div>

                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Short Description<a class="heading-elements-toggle">
                                        <i class="icon-more"></i></a>
                                </h5>
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="collapse" class=""></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="panel-body" style="display: block;">
                                <textarea cols="18" rows="18" class="summernote" name="short_description" id="short_description"
                                    placeholder="Enter text ..."></textarea>
                            </div>
                        </div>

                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Long Description<a class="heading-elements-toggle">
                                        <i class="icon-more"></i></a>
                                </h5>
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="collapse" name="description" class=""></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="panel-body" style="display: block;">
                                <textarea cols="18" rows="18" class="summernote" name="description" id="description"
                                    placeholder="Enter text ..."></textarea>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-3">

                    <div class="panel panel-flat">

                        <div class="panel-heading">

                            <h5 class="panel-title">Publish
                                <a class="heading-elements-toggle">
                                    <i class="icon-more"></i>
                                </a>
                            </h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse" class=""></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="panel-body" style="display: block;">
                            <table class="publish-table">
                                <tbody>
                                    <tr>
                                        <td><label>Date</label></td>
                                        <td>:</td>
                                        <td><input type="date" class="form-control" placeholder="Published Date"
                                                name="published_date"></td>
                                    </tr>
                                    <tr>
                                        <td><label>Status</label></td>
                                        <td>:</td>
                                        <td>
                                            <select class="form-control" name="availability" id="availability">
                                                <option value="1"> Enable </option>
                                                <option value="0"> Disabled </option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="panel-body" style="display: block;">
                            <input type="submit" class="btn btn-success btn-block" id="submitBtn"
                                value="Save Product" />
                        </div>

                    </div>

                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Product Categories<a class="heading-elements-toggle">
                                    <i class="icon-more"></i></a><a class="heading-elements-toggle">
                                    <i class="icon-more"></i></a>
                            </h5>
                            <div class="heading-elements">
                                <ul class="icons-list">
                                    <li><a data-action="collapse" class=""></a></li>
                                </ul>
                            </div>
                        </div>


                        <div class="pr-category-check">
                            <ul>
                                @foreach ($category as $item)
                                    <li>
                                        <label>
                                            <div class="checker">
                                                <input type="checkbox" class="styled cat" name="cat[]"
                                                    value="{{ $item->id }}">
                                            </div>
                                            {{ $item->name }}
                                        </label>
                                        @foreach ($item->subcategory as $subcategory)
                                            <ul>
                                                <li>
                                                    <label>
                                                        <div class="checker">
                                                            <input type="checkbox" class="styled cat" name="cat[]"
                                                                value="{{ $subcategory->id }}">
                                                        </div>
                                                        {{ $subcategory->name }}
                                                    </label>
                                                </li>
                                            </ul>
                                        @endforeach
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                </div>
        </div>

    </div>
@endsection

@section('jsContent')
    <script>
        function product_add_fx() {

            var name = $("#name").val();
            var prodimg = $("#prodimg").val();
            var price = $("#price").val();
            var sell_price = $("#sell_price").val();
            var availability = $("#availability").val();
            var stocks = $("#stocks").val();
            var offer_percentage = $("#offer_percentage").val();
            var short_description = $("#short_description").val();
            var description = $("#description").val();
            var slug = $("#slug").val();

            var $cat = $('.cat').is(":checked");


            if (name == "" || name == null) {
                $.notify("Product name is required", "error");
                return false;
            } else if ($cat == "" || !$cat || $cat == null) {
                $.notify("Select atleast one category", "error");
                return false;
            } else if ($slug == "" || !$slug || $slug == null) {
                $.notify("Slug field is required", "error");
                return false;
            } else if (prodimg == "" || prodimg == null) {
                $.notify("Product image is required", "error");
                return false;
            } else if (price == "" || price == null) {
                $.notify("Product price is required", "error");
                return false;
            } else if (sell_price == "" || sell_price == null) {
                $.notify("Product sell price is required", "error");
                return false;
            } else if (availability == "" || availability == null) {
                $.notify("Product availability is required", "error");
                return false;
            } else if (stocks == "" || stocks == null) {
                $.notify("Product stocks is required", "error");
                return false;
            } else if (offer_percentage == "" || offer_percentage == null) {
                $.notify("Product offer percentage is required", "error");
                return false;
            } else if (short_description == "" || short_description == null) {
                $.notify("Product short description is required", "error");
                return false;
            } else if (description == "" || description == null) {
                $.notify("Product log=ng description is required", "error");
                return false;
            } else {
                return true;
            }
        }

        function changeSlugOnType() {
            var pname = $('#name').val();
            var slug = pname.replace(/\s+/g, '-').toLowerCase()
            $("#slug_preview").text(slug);
            $("#slug").val(slug);
        }

        function createCustomSlugFun() {
            $("#createSlug").toggle(function() {
                $("#createSlug").addClass("createSlug");
            }, function() {
                $("#createSlug").removeClass("createSlug");
            });
        }

        function checkSlug() {

            var slug = $("#slug").val();

            if (slug == '') {
                $("#errResp").text('slug field required');
                $("#submitBtn").attr("disabled", true);
            } else {
                $.ajax({
                    'type': 'GET',
                    'url': "{{ route('administrator.product.fetch_slug') }}",
                    'dataType': 'json',
                    'data': {
                        slug: slug
                    },
                    success: function(resp) {

                        var slugCheck = resp.status;

                        if (slugCheck == 1) {
                            $("#errResp").text('slug already taken');
                            $("#submitBtn").attr("disabled", true);
                        } else if (slugCheck == 0) {
                            $("#errResp").text('');
                            $("#submitBtn").attr("disabled", false);
                        }
                    },
                });
            }
        }
    </script>
@endsection
