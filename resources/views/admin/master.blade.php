<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="css/admin/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/admin/simple-sidebar.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript -->
    <script src="js/admin/jquery/jquery.min.js"></script>
    <script src="js/admin/bootstrap/js/bootstrap.bundle.min.js"></script>

    {{--use in datatable--}}
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

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

</body>
</html>