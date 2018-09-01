<html>
@include('admin/layouts/head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('admin/layouts/header')
    @include('admin/layouts/aside')
    <div class="content-wrapper">
        @yield('content')
    </div>
    @include('admin/layouts/footer')
</div>
</body>
</html>

