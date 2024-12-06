<!DOCTYPE html>
<html lang="en">

@include('admin.include.head')

<body class="navbar-top">

    @include('admin.include.header')

    @yield('cssContent')

    <div class="page-container">

        <div class="page-content">

            @include('admin.include.sidebar')

            @yield('content')

            @include('admin.include.footer')

            @yield('jsContent')

        </div>
    </div>

</body>

</html>
