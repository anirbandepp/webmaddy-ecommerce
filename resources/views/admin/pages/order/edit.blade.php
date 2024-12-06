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
                <h4><span class="text-semibold">Order Status</span> - Update Order Status</h4>
            </div>
        </div>
    </div>
    <!-- /page header -->
    <!-- Content area -->
    <div class="content content-product-add">
        <div class="row">
            <form action="{{ route('administrator.order.update_order') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $order->id }}">
                <div class="col-md-9">

                    <div class="panel panel-flat pd-20">

                        <label for="parnetCategory">Order Status : </label>
                        <select class="form-control" id="order_status" name="order_status">
                            <option value="pending" {{ $order->order_status == 'pending' ? 'selected' : '' }}>
                                Pending
                            </option>
                            <option value="processing" {{ $order->order_status == 'processing' ? 'selected' : '' }}>
                                Processing
                            </option>
                            <option value="shipped" {{ $order->order_status == 'shipped' ? 'selected' : '' }}>
                                Shipped
                            </option>
                            <option value="complete" {{ $order->order_status == 'complete' ? 'selected' : '' }}>
                                Complete
                            </option>
                            <option value="review" {{ $order->order_status == 'review' ? 'selected' : '' }}>
                                Review
                            </option>
                            <option value="cancelled" {{ $order->order_status == 'cancelled' ? 'selected' : '' }}>
                                Cancelled
                            </option>
                        </select>
                        @error('order_status')
                            <span class="err">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">

                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">
                                Update
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
                            <input type="submit" class="btn btn-success btn-block" value="Update Status">

                        </div>

                    </div>
                </div>

        </div>

    </div>
@endsection
