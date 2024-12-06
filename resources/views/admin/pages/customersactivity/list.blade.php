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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Last Login</th>
                            <th>Order Count</th>
                            <th>Total Spent</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone_number }}</td>
                                <td>
                                    @foreach ($item->usersactivity as $activity)
                                        {{ \Carbon\Carbon::parse($activity->logged_in)->format('Y/m/d H:i:s') }}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($item->usersactivity as $activity)
                                        {{ $activity->order_count }}
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($item->usersactivity as $activity)
                                        {{ $activity->total_spend }}
                                    @endforeach
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
