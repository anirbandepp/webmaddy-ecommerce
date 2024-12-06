@extends('admin.layouts.back-app')

@section('cssContent')
    <style>
        table.dataTable thead th,
        table tbody tr td {
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Orders</span> - All Orders</h4>
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
                            <th>Order Id</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Invoice Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>

                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->created_at }}</td>

                                <td> {{ $order->orderByUser->name }} </td>

                                @php
                                    $status = '';
                                    
                                    if ($order->order_status == 'pending') {
                                        $status = 'bg-orange-300';
                                    }
                                    if ($order->order_status == 'processing') {
                                        $status = 'bg-slate-400';
                                    }
                                    if ($order->order_status == 'shipped') {
                                        $status = 'bg-blue';
                                    }
                                    if ($order->order_status == 'complete') {
                                        $status = 'label-success';
                                    }
                                    if ($order->order_status == 'review') {
                                        $status = 'label-warning';
                                    }
                                    if ($order->order_status == 'cancelled') {
                                        $status = 'label-danger';
                                    }
                                    
                                @endphp

                                <td>
                                    <span class="label @php echo $status; @endphp">
                                        {{ $order->order_status }}
                                    </span>
                                </td>

                                <td>
                                    @php
                                        $sum = 0;
                                        foreach ($order->orderDetails as $orderDetail) {
                                            $sum += $orderDetail->price;
                                        }
                                        echo $sum;
                                    @endphp
                                </td>

                                <td>
                                    <a href="{{ route('administrator.order.fetch_order', ['id' => $order->id]) }}"
                                        class="btn btn-info">
                                        <i class="fa fa-edit" style="color: #fff !important"></i>
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
