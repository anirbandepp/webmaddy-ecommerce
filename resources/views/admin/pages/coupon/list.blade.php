@extends('admin.layouts.back-app')

@section('cssContent')
    <style>
        table.dataTable thead th,
        table tbody tr td {
            text-align: center !important;
        }

        span.bg_danger {
            background-color: red;
            color: #fff;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid red;
        }

        span.bg_success {
            background-color: green;
            color: #fff;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid green;
        }
    </style>
@endsection

@section('content')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Coupons</span> - All Coupons</h4>
            </div>

            <div class="heading-elements">
                <a href="{{ route('administrator.coupon.create_coupon') }}" class="btn bg-blue heading-btn">
                    <i class="icon-plus3"></i> Add New Coupons
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
                            <th>coupon Code</th>
                            <th>Coupon value</th>
                            <th>Coupon type</th>
                            <th>Status</th>
                            <th>Expiry at</th>
                            <th>Is used</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $item)
                            @php
                                $isUsed = 'No';
                                if ($item->is_used == 1) {
                                    $isUsed = 'Yes';
                                }

                                $isActive = 'inactive';
                                if ($item->status == 'active') {
                                    $isActive = 'active';
                                }
                            @endphp

                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>

                                <td>{{ $item->coupon_code }}</td>
                                <td>{{ $item->coupon_value }}</td>

                                <td style="text-transform: uppercase;">
                                    {{ preg_replace('/_[0-9]*/', ' ', $item->coupon_type) }}
                                </td>

                                <td>
                                    <span class="{{ $item->status == 'inactive' ? 'bg_danger' : 'bg_success' }}">
                                        {{ $isActive }}
                                    </span>
                                </td>

                                <td> {{ \Carbon\Carbon::parse($item->expiry_at)->format('d/m/Y') }} </td>

                                <td>
                                    <span class="{{ $item->is_used == 0 ? 'bg_danger' : 'bg_success' }}">
                                        {{ $isUsed }}
                                    </span>
                                </td>

                                <td>
                                    <a href="{{ route('administrator.coupon.fetch_coupon', ['id' => $item->id]) }}"
                                        class="btn btn-info">
                                        <i class="fa fa-edit" style="color: #fff !important"></i>
                                    </a>
                                    <a href="{{ route('administrator.coupon.delete_coupon', ['id' => $item->id]) }}"
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
