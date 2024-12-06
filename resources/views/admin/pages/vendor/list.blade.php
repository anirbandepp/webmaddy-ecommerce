@extends('admin.layouts.back-app')

@section('cssContent')
    <style>
        .inactive,
        .active {
            text-align: center;
            text-transform: uppercase;
        }

        span.active {
            background: green;
            color: white;
            padding: 5px;
            border-radius: 5px;
        }

        span.inactive {
            background: red;
            color: white;
            padding: 5px;
            border-radius: 5px;
        }
    </style>
@endsection

@section('content')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Vendors</span> - All Vendors</h4>
            </div>

            <div class="heading-elements">
                <a href="{{ route('administrator.vendor.create_vendor') }}" class="btn bg-blue heading-btn">
                    <i class="icon-plus3"></i> Add New Vendors
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
                            <th>Vendor name</th>
                            <th>Vendor email</th>
                            <th>Vendor phone</th>
                            <th>Address line 1</th>
                            <th>Address line 2</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Country</th>
                            <th>Admin action</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendors as $item)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $item->vendor_name }}</td>
                                <td>{{ $item->vendor_email }}</td>
                                <td>{{ $item->vendor_phone }}</td>
                                <td>{{ $item->address_line1 }}</td>
                                <td>{{ $item->address_line2 }}</td>
                                <td>{{ $item->city }}</td>
                                <td>{{ $item->state }}</td>
                                <td>{{ $item->country }}</td>
                                <td>
                                    @php
                                        $adminIsActive = 'inactive';
                                        if ($item->admin_action == 1) {
                                            $adminIsActive = 'active';
                                        }
                                    @endphp
                                    <span class="{{ $adminIsActive }}">
                                        {{ $adminIsActive }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('administrator.vendor.fetch_vendor', ['id' => $item->id]) }}"
                                        class="btn btn-info">
                                        <i class="fa fa-edit" style="color: #fff !important"></i>
                                    </a>
                                    <a href="{{ route('administrator.vendor.delete_vendor', ['id' => $item->id]) }}"
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
