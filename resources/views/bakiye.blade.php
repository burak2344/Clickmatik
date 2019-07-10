@extends('template.masterkayıt')
@section('content')
    <link href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
    <script src="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('//code.jquery.com/jquery-1.11.1.min.js')}}"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet"  href="{{asset('css/registerstyle.css')}}">

    <div id="content-wrapper">
        @include('mails.alert')


            <h1 style="text-align: center;margin-top: 200px;font-size: 100px;font-family: 'Lucida Handwriting'" >BAKİYE : {{$bakiye}}</h1>



        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span> </span>
                </div>
            </div>
        </footer>

    </div>

@endsection
