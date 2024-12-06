@extends('admin.layouts.back-app')

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Category</span> - Update Category</h4>
            </div>
        </div>
    </div>
    <!-- /page header -->
    <!-- Content area -->
    <div class="content content-product-add">
        <div class="row">
            <form action="{{ route('administrator.category.update_category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $category->id }}">
                <div class="col-md-9">
                    <div class="panel panel-flat pd-20">
                        <div class="form-group">
                            <label for="name">Category Image</label>
                            <input type="file" name="catimg" class="form-control pr-title" placeholder="Category Image">
                        </div>
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control pr-title" id="name" name="name"
                                value="{{ $category->name }}" placeholder="Enter category name" />
                        </div>
                        <div class="form-group">
                            <label for="offer_percentage">Offer Percentage</label>
                            <input type="number" class="form-control pr-title" id="offer_percentage"
                                name="offer_percentage" placeholder="Enter offer percentage" step="0.1"
                                value="{{ $category->offer_percentage }}" />
                        </div>
                        <div class="form-group">
                            <label for="tax_percent">Tax Percentage</label>
                            <input type="number" class="form-control pr-title" id="tax_percent" name="tax_percent"
                                placeholder="Enter tax percentage" step="0.1" value="{{ $category->tax_percent }}" />
                        </div>
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
                            <input type="submit" class="btn btn-success btn-block" value="Save Product">

                        </div>

                    </div>
                </div>
            </form>
        </div>

    </div>

    </div>
@endsection
