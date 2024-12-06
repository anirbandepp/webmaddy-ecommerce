@extends('admin.layouts.back-app')

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Product</span> - Edit Product</h4>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content content-product-add">
        <div class="row">
            <form action="{{ route('administrator.product.update_product') }}" method="POST" enctype="multipart/form-data"
                onsubmit="return product_add_fx()">
                @csrf

                <input type="hidden" name="id" value="{{ $product->id }}">

                <div class="col-md-9">
                    <div class="panel panel-flat pd-20">

                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control pr-title" id="name" name="title"
                                value="{{ $product->title }}" placeholder="Enter product name" />
                        </div>

                        <div class="form-group">
                            <label for="prodimg">Image</label>
                            <input type="file" id="prodimg" name="prodimg[]" class="form-control pr-title" multiple />
                            @error('prodimg')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control pr-title" id="price" name="price" step="0.01"
                                placeholder="Enter product name" value="{{ $product->price }}" />
                        </div>

                        <div class="form-group">
                            <label for="sell_price">Sell Price</label>
                            <input type="number" class="form-control pr-title" id="sell_price" name="sell_price"
                                step="0.01" placeholder="Enter product sell price" value="{{ $product->sell_price }}" />
                        </div>

                        <div class="form-group">
                            <label for="availability">Availability</label>
                            <select class="form-control" name="availability" id="availability">
                                <option value="1" {{ $product->availability == 1 ? 'selected' : '' }}>
                                    Yes
                                </option>
                                <option value="0" {{ $product->availability == 0 ? 'selected' : '' }}>
                                    No
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="stocks">Stocks</label>
                            <input type="number" class="form-control pr-title" id="stocks" name="stocks"
                                value="{{ $product->stocks }}" placeholder="Enter product stocks" />
                        </div>

                        <div class="form-group">
                            <label for="offer_percentage">Offer Percentage</label>
                            <input type="number" class="form-control pr-title" id="offer_percentage"
                                name="offer_percentage" step="0.01" placeholder="Enter product offer percentage"
                                value="{{ $product->offer_percentage }}" />
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
                                    placeholder="Enter text ..."> {{ $product->short_description }} </textarea>
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
                                    placeholder="Enter text ..."> {{ $product->description }}  </textarea>
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
                                        <td>
                                            <input type="date" class="form-control" placeholder="Published Date"
                                                name="published_date">
                                        </td>
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
                            <input type="submit" class="btn btn-success btn-block" value="Update Product" />
                        </div>

                    </div><!-- panel -->

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

                                                <input type="checkbox" class="styled" name="cat[]"
                                                    value="{{ $item->id }}">
                                            </div>
                                            {{ $item->name }}
                                        </label>
                                        @foreach ($item->subcategory as $subcategory)
                                            <ul>
                                                <li>
                                                    <label>
                                                        <div class="checker">
                                                            <input type="checkbox" class="styled" name="cat[]"
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

                </div><!-- col 3 -->

        </div>

    </div>
@endsection

@section('jsContent')
    <script>
        function product_add_fx() {

            var category_id = $("#category_id").val();
            var name = $("#name").val();
            var prodimg = $("#prodimg").val();
            var price = $("#price").val();
            var sell_price = $("#sell_price").val();
            var availability = $("#availability").val();
            var stocks = $("#stocks").val();
            var offer_percentage = $("#offer_percentage").val();
            var short_description = $("#short_description").val();
            var description = $("#description").val();

            if (name == "" || name == null) {
                $.notify("Product name is required", "error");
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
    </script>
@endsection
