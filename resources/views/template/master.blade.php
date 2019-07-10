<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CLİCKMATİK</title>
    @include('template.head')
</head>

<body class="page-index has-hero">
<!--Change the background class to alter background image, options are: benches, boots, buildings, city, metro -->
<div id="background-wrapper" class="buildings" data-stellar-background-ratio="1.1">


    @include('template.header')
    @include('template.navbar')
    @include('template.slider')


</div>
@include('template.duyuru')
@yield('content')

@include('template.footer')
<!-- Required JavaScript Libraries -->

<script src="{{asset('lib/jquery/jquery.min.js')}}"></script>

<script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('lib/stellar/stellar.min.js')}}"></script>
<script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
<script src="{{asset('contactform/contactform.js')}}"></script>


<!-- Template Specisifc Custom Javascript File -->
<script src="{{asset('js/custom.js')}}"></script>

<!--Custom scripts demo background & colour switcher - OPTIONAL -->
<script src="{{asset('js/color-switcher.js')}}"></script>

<!--Contactform script -->
<script src="{{asset('contactform/contactform.js')}}"></script>
<script src="{{asset('/js/app.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
<script>
    $('.kredikarti').mask('0000-0000-0000-0000', { placeholder: "____-____-____-____" });
    $('.kredikarti_cvv').mask('000', { placeholder: "___" });
    $('.telefon').mask('(000) 000-00-00', { placeholder: "(___) ___-__-__" });
</script>
<script src="{{asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>

</body>

</html>
