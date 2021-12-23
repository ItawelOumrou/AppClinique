<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{('/images/CPLogo.png')}}">
    <!--<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- debut style-->
   <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet"> Pour bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{ asset('assets/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"> 
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/theme.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/theme-skin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/pace.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/pikaday/pikaday.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/chosen/chosen.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/animsition/css/animsition.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/amaranjs//css/amaran.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"> 
    
    
    
    
    
    
    
    <!-- fin style-->
    
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    @livewireStyles
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper animsition">
<header class="main-header">
    <a href="{{url('/')}}" class="logo" style="background-color: white!important;">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b style="color: black"></b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg" style="height: 20px; width:30px; margin-left:0"><img src="{{('/images/CPLogo.png')}}" alt="logo" style="width:213px; height:70px;"/></span>
    </a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-fixed-top navbar-default " role="navigation">
~    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
<!-- Navbar Right Menu -->

<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        
       
    <!-- User Account: style can be found in dropdown.less -->
   
    </ul>
    
</div>
</nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
@include('nav')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Content Header (Page header) -->
@yield('content')
</div><!-- /.content-wrapper -->

<!-- debut scripte -->

<!--<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>  Pour bootstrap -->
<script type="text/javascript" src="{{ asset('assets/js/jquery-2.1.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap-dialog.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/datatables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/pace.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/pikaday/moment.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/pikaday/pikaday.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/pikaday/pikaday.jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/chosen/chosen.jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/animsition/js/jquery.animsition.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/validator.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/amaranjs/js/jquery.amaran.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert.js') }}"></script>




<!-- fin scripte -->

<script type="text/javascript">

$(document).ready(function() {
    $(".sidebar-toggle").on('click',function(){
        $("#barc").toggleClass("cacher");
    })
    $.sidebarMenu = function(menu) {
    var animationSpeed = 300,
    subMenuSelector = '.sidebar-submenu';

    $(menu).on('click', 'li a', function(e) {
      var $this = $(this);
      var checkElement = $this.next();

      if (checkElement.is(subMenuSelector) && checkElement.is(':visible')) {
        checkElement.slideUp(animationSpeed, function() {
          checkElement.removeClass('menu-open');
        });
        checkElement.parent("li").removeClass("active");
      }

      //If the menu is not visible
      else if ((checkElement.is(subMenuSelector)) && (!checkElement.is(':visible'))) {
        //Get the parent menu
        var parent = $this.parents('ul').first();
        //Close all open menus within the parent
        var ul = parent.find('ul:visible').slideUp(animationSpeed);
        //Remove the menu-open class from the parent
        ul.removeClass('menu-open');
        //Get the parent li
        var parent_li = $this.parent("li");

        //Open the target menu and add the menu-open class
        checkElement.slideDown(animationSpeed, function() {
          //Add the class active to the parent li
          checkElement.addClass('menu-open');
          parent.find('li.active').removeClass('active');
          parent_li.addClass('active');
        });
        }
        //if this isn't a link, prevent the page from being redirected
        if (checkElement.is(subMenuSelector)) {
        e.preventDefault();
        }
    });
 
  
    }
    $.sidebarMenu($('.sidebar-menu'));

});



 

</script>


@yield('scripts')
@if (session()->has('flash_notification'))
    <?php
        $notification = session()->get('flash_notification');
        $message_type = session()->get('type');
        $info = session()->get('info');
    ?>
    @if($message_type == 'success')
        <script>
            $.amaran({
                'theme'     :'awesome ok',
                'content'   :{
                    title:'Success !',
                    message:'{{$notification}}!',
                    info:'{{$info}}',
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
                    message:'{{$notification}}!',
                    info:'{{$info}}',
                    icon:'fa fa-times-circle-o'
                },
                'position'  :'bottom right',
                'outEffect' :'slideBottom'
            });
        </script>
    @endif
@endif
<!-- sweetAlert -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if (session()->get('status'))
      <script>

              swal({
                    title:'{{session('status')}}',
                     icon:'{{session('statuscode')}}',
                    button:'OK',
                });
           
              
        
        </script>
          @endif
        
        @livewireScripts
        
</body>
</html>
