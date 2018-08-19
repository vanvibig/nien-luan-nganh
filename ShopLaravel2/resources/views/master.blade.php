<!doctype html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Laravel </title>
    <base href="{{ asset('') }}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href='http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css'>
    <link rel="stylesheet" href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="public/source/assets/dest/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/css/w3.css">
    <link rel="stylesheet" href="public/source/assets/dest/vendors/colorbox/example3/colorbox.css">
    <link rel="stylesheet" href="public/source/assets/dest/rs-plugin/css/settings.css">
    <link rel="stylesheet" href="public/source/assets/dest/rs-plugin/css/responsive.css">
    <link rel="stylesheet" title="style" href="public/source/assets/dest/css/style.css">
    <link rel="stylesheet" href="public/source/assets/dest/css/animate.css">
    <link rel="stylesheet" href="public/source/assets/dest/css/animate.css">
    <link rel="stylesheet" title="style" href="public/source/assets/dest/css/huong-style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
        .pagination>.active>a, .pagination>.active>span, .pagination>.active>a:hover, .pagination>.active>span:hover, .pagination>.active>a:focus, .pagination>.active>span:focus {
            z-index: 2;
            color: #fff;
            background-color: #9e9e9e;
            border-color: #9f9f9f;
            cursor: default;
        }

        .main-menu ul.l-inline> li> a:hover {
            background: #5f5f5f;
            text-decoration: underline;
            color: white;
        }

        .main-menu ul li.active> a {
            background: #5f5f5f;
            text-decoration: underline;
        }

        #kv_menu:hover{
            background: #5f5f5f;
            text-decoration: underline;
        }

        #kv_menu:active{
            background: #5f5f5f;
            text-decoration: underline;
        }

        html, body{
            font-family: Roboto, Arial, sans-serif; background-color: #fafafa;
        }

        .aside-menu li a {
            color: #3d3d3d;
        }

        .aside-menu li a:hover {
            color: #5f5f5f;
            text-decoration: underline;
        }

        a:active, a:hover {
            text-decoration: underline;
            color: #000;
        }

        a {
            color: #000000;
        }

        .aside-menu li a:hover {
            color: #000000;
            text-decoration: underline;
        }

        .label[href]:hover, .label[href]:focus {
            color: #000000;
            text-decoration: underline;
        }

        .label {
            font-size: 100%;
            font-weight: 400;
            color: #000000;
        }

        .aside-menu li a {
            color: #000000;

            /*color: #1d439b;*/
        }

        .main-menu ul.l-inline> li> a:hover {
            background: #5f5f5f;
            text-decoration: underline;
        }
        .main-menu ul.l-inline> li:hover {
            background: #5f5f5f;
            text-decoration: underline;
        }

        .parent-active>a {
            background: #5f5f5f;
            text-decoration: underline;
            color: white;
        }

        .sub-menu li:active {
            background: #5f5f5f;
            text-decoration: underline;
        }

        .sub-menu li.active, .children li.active{
            background:#5f5f5f;
            text-decoration: underline;
        }
        .sub-menu li a.active, .children li a.active{
            background:#5f5f5f;
            text-decoration: underline;
        }
        .main-menu ul li.active> a{
            background:#5f5f5f;
            text-decoration: underline;
        }
        .sub-menu ul li.active> a{
            background:#5f5f5f;
            text-decoration: underline;
        }

        .btn:hover, .btn:focus {
            text-decoration: underline;
        }

        #bluecate{
            color: #1d439b;
        }

        #kv_active{
        }
        #kv_active a{
            color: #1d439b;
            text-decoration: underline;
        }

        .aside-menu {
            border: 0px;
        }

        input[type="text"], input[type="email"], input[type="url"], textarea {
            border: 1px solid #afafaf;
        }
    </style>
</head>
<body>

@include('header')
<!-- #header -->
<div class="rev-slider">
    @yield('content')
</div> <!-- .container -->

@include('footer')

<!-- include js files -->
<script src="public/source/assets/dest/js/jquery.js"></script>
<script src="public/source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
<script src='http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js'></script>
<script src="public/source/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
<script src="public/source/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
<script src="public/source/assets/dest/vendors/animo/Animo.js"></script>
<script src="public/source/assets/dest/vendors/dug/dug.js"></script>
<script src="public/source/assets/dest/js/scripts.min.js"></script>
<script src="public/source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="public/source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="public/source/assets/dest/js/waypoints.min.js"></script>
<script src="public/source/assets/dest/js/wow.min.js"></script>
<!--customjs-->
<script src="public/source/assets/dest/js/custom2.js"></script>
<script>
    $(document).ready(function ($) {
        $(window).scroll(function () {
                if ($(this).scrollTop() > 150) {
                    $(".header-bottom").addClass('fixNav')
                } else {
                    $(".header-bottom").removeClass('fixNav')
                }
            }
        )
    })
</script>

<script !src="">
    $(document).ready(function(){
        // $(':input').live('focus',function(){
        //     $(this).attr('autocomplete', 'off');
        // });
        $("form").attr('autocomplete', 'off');
    });
</script>

<script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Bạn có chắc không?');
    });
</script>
</body>
</html>
