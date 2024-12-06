@extends('admin.layouts.back-app')

@section('content')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Categories</span> - All Categories</h4>
            </div>

            <div class="heading-elements">
                <a href="{{ route('administrator.category.category-list') }}" class="btn bg-blue heading-btn">
                    <i class="icon-plus3"></i> Add New Categories
                </a>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="panel panel-flat">

            <div class="table-responsive ">
                <table class="table table-striped table-bordered table-products-list" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Offer percentage</th>
                            <th>Tax percent</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($parentCategory as $item)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <img src="{{ url('/') }}/category/{{ $item->path }}" alt=""
                                        style="width: 100px" />
                                </td>
                                <td>{{ $item->offer_percentage }}</td>
                                <td>{{ $item->tax_percent }}</td>
                                <td>
                                    <a href="{{ route('administrator.category.fetch_category', ['id' => $item->id]) }}"
                                        class="btn btn-info">
                                        <i class="fa fa-edit" style="color: #fff !important"></i>
                                    </a>
                                    <a href="{{ route('administrator.category.delete_category', ['id' => $item->id]) }}"
                                        class="btn btn-danger">
                                        <i class="fa fa-trash" style="color: #fff !important"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('jsContent')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
