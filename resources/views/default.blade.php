<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("assets/images/favicon.png")}}">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/css/theme.min.css')  }}" rel="stylesheet">
    <link href="{{asset('assets/plugins/amaranjs/css/amaran.min.css')  }}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="login-page">
<div class="login-box">
    <div class="login-logo">
      
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        @yield('content')
    </div>
    <section class="panel-footer">
        <!--<a href="#">Lost your password?</a>-->
    </section>
</div>
<script type="text/javascript" src="{{asset('assets/js/jquery-2.1.3.min.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/js/validator.min.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/amaranjs/js/jquery.amaran.min.js') }}"></script>
<script type="text/javascript" src="{{asset('assets/plugins/backstretch-js/jquery.backstretch.min.js') }}"></script>
<script>
    $(function(){
        $('form').validator();
        $.backstretch("{{asset('assets/images/Image1logConnection.png')}}");
    });
</script>
@if (session()->has('flash_notification'))
    <?php
        $notification = session()->pull('flash_notification')[0];
        $message_type = $notification->level;
    ?>
    @if($message_type == 'success')
        <script>
            $.amaran({
                'theme'     :'awesome ok',
                'content'   :{
                    title:'Success !',
                    message:'{{$notification->message}}!',
                    info:'',
                    icon:'fa fa-check-square-o'
                },
                'position'  :'bottom right',
                'outEffect' :'slideBottom'
            });
        </script>
    @elseif($message_type == 'danger')
        <script>
            $.amaran({
                'theme'     :'awesome error',
                'content'   :{
                    title:'Error !',
                    message:'{{$notification->message}}!',
                    info:'',
                    icon:'fa fa-times-circle-o'
                },
                'position'  :'bottom right',
                'outEffect' :'slideBottom'
            });
        </script>
    @endif
@endif



<style>
.login-page, .register-page {
    background: #ffffff !important;
}
.backstretch-item img{
    width: 999px !important;
    height: 583.802px !important;
    max-width: none !important;
    inset: unset !important;
    right: 0 !important;
}
</style>
</body>
</html>
