<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ url('backend/vendors/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('backend/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('backend/vendors/themify-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('backend/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ url('backend/vendors/selectFX/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ url('backend/vendors/jqvmap/dist/jqvmap.min.css') }}">
     {{-- data table link  --}}
    <link rel="stylesheet" href="{{url('backend/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('backend/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@500&family=Montserrat:wght@500&family=Zen+Kurenaido&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ url('backend/assets/css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


    {{-- toaster link --}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>

<body style="font-family: 'Dosis', sans-serif;">


    <!-- Left Panel -->
    @include('layouts.backend.partition.navbar')
    <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        @include('layouts.backend.partition.header_menu')
        <!-- /header -->
        @if(session('message'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('message') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        @endif
        <!-- Header-->
        @yield('content')

        <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="{{ url('backend/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ url('backend/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ url('backend/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('backend/assets/js/main.js') }}"></script>


    <script src="{{ url('backend/vendors/chart.js/dist/Chart.bundle.min.js') }}"></script>
    <script src="{{ url('backend/assets/js/dashboard.js') }}"></script>
    <script src="{{ url('backend/assets/js/widgets.js') }}"></script>
    <script src="{{ url('backend/vendors/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ url('backend/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ url('backend/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>

    <script src="{{url('backend/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('backend/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{url('backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('backend/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{url('backend/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{url('backend/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{url('backend/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{url('backend/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{url('backend/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{url('backend/vendors/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <script src="{{url('backend/assets/js/init-scripts/data-table/datatables-init.js')}}"></script>
    <!----------toaster link------------>

    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}





    <!--------end toaster------------>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>
