<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/admin/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/admin/simple-sidebar.css') }}" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <script src="{{ url('/js/admin/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('/js/admin/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    {{--use in datatable--}}
{{--    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">--}}
{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css" rel="stylesheet">--}}
{{--    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css" rel="stylesheet">--}}
{{--    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <link href="https://cdn.datatables.net/fixedheader/3.1.6/css/fixedHeader.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script>

{{----}}
</head>

<body>
<div class="d-flex" id="wrapper">

@include('admin.Sidebar')
<!-- Page Content -->
    <div id="page-content-wrapper" style="">
        <!-- Nav -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            @yield('nav')
        </nav>
        <!-- container -->
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <!-- /#page-content-wrapper -->
</div>
@yield('JS')

@yield('modal')
</body>
</html>