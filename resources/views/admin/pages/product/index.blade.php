@extends('admin.layouts.back-app')

@section('cssContent')
    <style>
        .cat {
            background: green;
            color: #fff;
            padding: 3px 5px;
            border-radius: 5px;
        }

        table thead tr th,
        table tbody tr td {
            text-align: center !important;
        }

        .productImg {
            width: 60%;
            display: inline-block;
            aspect-ratio: 3/2;
            object-fit: contain;
        }

        #setImageBtn {
            display: table;
            margin: 25px auto 0;
        }

        span.select2 {
            width: 100% !important;
        }

        span.select2-selection {
            height: 40px !important;
        }

        .productSelectToDiv {
            margin-left: 35px;
            margin-top: 20px;
        }

        .select2-dropdown span.select2-search--dropdown:after {
            width: 20px !important;
            left: 90% !important;
        }

        .select2-selection--single .select2-selection__arrow:after {
            top: 65% !important;
        }

        #similarProducts,
        #currentProduct {
            text-align: center;
            padding-top: 3rem;
            padding-bottom: 2rem:
        }

        .similarProducts {
            text-align: left;
            padding-left: 45px;
            font-size: 20px;
            font-weight: bold;
        }

        .similarProductImg {
            display: table;
            width: 80%;
            margin: 0 auto;
            aspect-ratio: 3/2;
            margin-bottom: 10px;
            object-fit: contain;
        }

        .similarProductTitle {
            font-size: 20px;
            font-weight: bold;
        }

        .eachProduct {
            margin-bottom: 20px;
        }

        .currentProductDiv {
            text-align: left;
        }

        .currentProductImg {
            display: table;
            width: 80%;
            margin: 0 auto;
            margin-bottom: 10px;
            object-fit: contain;
        }
    </style>
@endsection

@section('content')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Products</span> - All Products</h4>
            </div>

            <div class="heading-elements">
                <a href="{{ route('administrator.product.create_product') }}" class="btn bg-blue heading-btn">
                    <i class="icon-plus3"></i> Add New Products
                </a>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="panel panel-flat">

            <div class="row">
                <div class="col-md-4 productSelectToDiv">
                    <select class="productSelectTo" id="productSelectTo" onchange="return checkFun()">
                        @foreach ($products as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="table-responsive" id="productTblId">
                <table class="table table-striped table-bordered table-products-list" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>price</th>
                            <th>Stocks</th>
                            <th>Cateory</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>

                                <td>{{ $item->title }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->stocks }}</td>
                                <td>
                                    @foreach ($item->productBelongsToCategories as $category)
                                        <span class="cat"> {{ $category->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('administrator.product.fetch_product', ['id' => $item->id]) }}"
                                        class="btn btn-info">
                                        <i class="fa fa-edit" style="color: #fff !important"></i>
                                    </a>
                                    <a href="{{ route('administrator.product.delete_product', ['id' => $item->id]) }}"
                                        class="btn btn-danger">
                                        <i class="fa fa-trash" style="color: #fff !important"></i>
                                    </a>
                                    <a href="javascript:;" class="btn btn-info" class="productImg"
                                        data-id="{{ $item->id }}" onclick="return productImg({{ $item->id }})">
                                        <i class="icon-images3" style="color: #fff !important"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="row" id="currentProduct">
                    </div>

                    <div class="row" id="similarProducts">
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="productImgModal" class="modal" role="dialog">

        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Product Images</h4>
                </div>
                <div class="modal-body">
                    <div class="row" id="renderImages">

                    </div>
                    <button type="button" id="setImageBtn" class="btn bg-blue heading-btn" onclick="return setImageFun()">
                        Set as Parent Image
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default close" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('jsContent')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

        $('.close').click(function(e) {
            $("#productImgModal").removeClass("fade in").css('display', 'none')
        });

        function productImg(id) {

            $.ajax({
                'type': 'GET',
                'url': "{{ route('administrator.product.fetch_product_image') }}",
                'dataType': 'json',
                'data': {
                    id: id
                },
                success: function(resp) {
                    $("#renderImages").html(resp.data);
                    $("#productImgModal").addClass("fade in").css('display', 'block');
                },
            });
        }

        function setImageFun() {

            var ImgId = $('input[name="firstImg"]:checked').val();
            var productID = $('.productId').val();;

            if (ImgId == null || ImgId == '') {
                $.notify("Select atleast one image", "error");
                return false;
            } else {
                $.ajax({
                    'type': 'GET',
                    'url': "{{ route('administrator.product.set_first_image_for_product') }}",
                    'dataType': 'json',
                    'data': {
                        imgId: ImgId,
                        productID: productID
                    },
                    success: function(resp) {
                        console.log(resp);
                        if (resp.status == 'success') {
                            $("#productImgModal").removeClass("fade in").css('display', 'none')
                            $.notify("Wow the primary image is set!!!", "success");
                        } else {
                            $.notify("Something went wrong please try again", "error");
                            $("#productImgModal").removeClass("fade in").css('display', 'none')
                        }
                    },
                });
            }
        }

        $('.productSelectTo').select2();

        function checkFun() {
            var productId = $("#productSelectTo").val();

            $.ajax({
                'type': 'GET',
                'url': "{{ route('administrator.product.fetch_product_with_similar_parent') }}",
                'dataType': 'json',
                'data': {
                    id: productId
                },
                success: function(resp) {
                    $("#productTblId").css("display", "none");
                    console.log(resp);

                    $("#currentProduct").html(resp.data.currentProduct);
                    $("#similarProducts").html(resp.data.each_product);
                },
            });;
        }
    </script>
@endsection
