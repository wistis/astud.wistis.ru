<!DOCTYPE html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Bootstrap stylesheet -->
    <link href="/bootstrap4/css/bootstrap.min.css" rel="stylesheet">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- icofont -->
    <link href="/icofont/css/icofont.css" rel="stylesheet" type="text/css" />
    <!-- font-awesome -->
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- crousel css -->
    <link href="/js/owl-carousel/owl.carousel.min.css" rel="stylesheet" type="text/css" />
    <!-- stylesheet -->
    <link href="/css/style.css?12" rel="stylesheet" type="text/css"/>
    <link href="/css/bs.css?1" rel="stylesheet" type="text/css"/>
</head>
<body>
<!--top start here -->
@include('_part._header')
<!-- header end here -->
@yield('content')
<!-- footer start here -->
@include('_part._footer')
<!-- footer end here -->

<!-- jquery -->
<script src="/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<!-- bootstrap js -->
<script src="/js/popper.min.js" type="text/javascript"></script>

<script src="/bootstrap4/js/bootstrap.min.js" type="text/javascript"></script>
<!-- owlcarousel js -->
<script src="/js/holder.min.js" type="text/javascript"></script>
<script src="/js/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<!--internal js-->
<script src="/js/owlinternal.js" type="text/javascript"></script>
<script src="/js/bs.js" type="text/javascript"></script>
@yield('js')
</body>
</html>
