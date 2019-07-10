<!DOCTYPE html>
<html lang="en">

<head>
    <title> Admin </title>
    <meta charset="utf-8">
    @include('admintemplate.head')

</head>

<body id="page-top">

@include('admintemplate.adminnavbar')

<div id="wrapper">

    <!-- Sidebar -->
    @include('admintemplate.adminsidebar')

    @yield('content')
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('js/jquery.easing.min.js')}}"></script>

<!-- Page level plugin JavaScript-->
<script src="{{asset('js/Chart.min.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap4.js')}}"></script>


<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin.min.js')}}"></script>

<!-- Demo scripts for this page-->
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
<script src="{{asset('js/demo/chart-area-demo.js')}}"></script>
<script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.9.2/plugins/autogrow/plugin.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    $(function () {
        $('#kategoriler').select2({
            placeholder: 'Lütfen kategori seçiniz'
        });
    });
</script>

</body>

</html>
