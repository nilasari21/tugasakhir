<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $page_title or "Admin Machiko" }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/adminlte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- <link rel="stylesheet" href="{{ asset('/adminlte') }}/bootstrap/css/bootstrap.min.css"> -->
    <link href="{{ asset('/adminlte') }}/bootstrap/css/font-awesome.min.css" rel="stylesheet" >

    <!-- <link href="{{ asset("/adminlte/plugins/datatables/dataTables.bootstrap.css") }}" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="{{ asset('/adminlte/') }}/plugins/datatables/dataTables.bootstrap.css"  >
        <!-- bootstrap datepicker -->
<link href="{{ asset('/adminlte') }}/plugins/datepicker/datepicker3.css" rel="stylesheet"  >
     
    
    
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet"  >
    <!-- Theme style -->
    <link href="{{ asset('/adminlte')}}/dist/css/AdminLTE.min.css" rel="stylesheet"  >
    <link href="{{ asset("/adminlte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <style type="text/css">
    .main-sidebar { background-color: #06587D !important }
    .main-header .navbar{ background-color: #de6262 !important }
    .main-header .navbar .sidebar-toggle{ background-color: #de6262 !important }
    .main-header .logo{ background-color: #de6262 !important }

    .main-sidebar .sidebar-menu > li.header {
  color: #ffffff;
  background: #077AB0;
  }
   .main-sidebar .sidebar-menu > li > a {
    border-left: 3px solid transparent;
  }
   .main-sidebar .sidebar-menu > li:hover > a,
   .main-sidebar .sidebar-menu > li.active > a {
    color: #ffffff;
    background: #077AB0;
    border-left-color: #0A99DB;
  }
   .main-sidebar .sidebar-menu > li > .treeview-menu {
    margin: 0 1px;
    background: #0A99DB;
  }
   .main-sidebar .sidebar a {
    color: #b8c7ce;
  }
   .main-sidebar .sidebar a:hover {
    text-decoration: none;
    background: #077AB0;
  }
   .main-sidebar .treeview-menu > li > a {
    color: #ffffff;
  }
   .main-sidebar .treeview-menu > li.active > a,
   .main-sidebar .treeview-menu > li > a:hover {
    color: #ffffff;
  }
  

    </style>
    @yield('js')
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Header -->
    
    
    @include('admin.header')

    <!-- Sidebar -->
    @include('admin.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    
        <!-- Content Header (Page header) -->
        <!-- <section class="content-header">
            <h1>
                {{ $page_title or "Page Title" }}
                <small>{{ $page_description or null }}</small>
            </h1>
            <!-- You can dynamically generate breadcrumbs here -->
            
       <!-- </section>-->

        <!-- Main content -->
        <section class="content">

            <!-- Your Page Content Here -->
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('admin.footer')

</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->
<script src="{{ asset ("/adminlte/plugins/jQuery/jQuery-2.2.3.min.js") }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("/adminlte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("/adminlte/dist/js/app.min.js") }}"></script>
<script src="{{ asset ("/adminlte/plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>
<script src="{{ asset ("/adminlte/dist/js/demo.js") }}"></script>
<script src="{{ asset("/adminlte/plugins/fastclick/fastclick.js") }}"></script>
<script src="{{ asset("/adminlte/bootstrap/js/bootstrap2-toggle.js")}}"  ></script>
<script src="{{ asset("/adminlte/plugins/datatables/jquery.dataTables.min.js") }}" > </script>
<script src="{{ asset("/adminlte/plugins/datatables/dataTables.bootstrap.min.js") }}"  > </script>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>

<!-- bootstrap datepicker -->
<script src="{{ asset("/adminlte/plugins/datepicker/bootstrap-datepicker.js") }}"  > </script>
<script src="{{ asset("/adminlte/plugins/input-mask/jquery.inputmask.js") }}"  > </script>
<script src="{{ asset("/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js") }}"  > </script>
<script src="{{ asset("/adminlte/plugins/input-mask/jquery.inputmask.extensions.js") }}"  > </script>
<!-- bootstrap time picker -->

@yield('js') 
<script>
  $(function () { 
      // Data Table
    $("#data").dataTable({
      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
      "order": [[ 1, "desc" ]],
      // sscrollX: true
      "oLanguage": {
        "sLengthMenu": "Tampilkan _MENU_ data",
        "sZeroRecords": "Maaf, Data tidak ditemukan",
        "sSearch": "cari",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        "sInfoEmpty": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        "sInfoFiltered": "(Memfilter dari _MAX_ total records)",
        "oPaginate": {
            "sPrevious": "sebelum",
            "sNext": "selanjutnya",
        }
    },

    });   
  });
</script>
<script>
  $(function () { 
      // Data Table
    $("#data2").dataTable({
      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
      "order": [[ 1, "desc" ]],
      // sscrollX: true
      "oLanguage": {
        "sLengthMenu": "Tampilkan _MENU_ data",
        "sZeroRecords": "Maaf, Data tidak ditemukan",
        "sSearch": "cari",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        "sInfoEmpty": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        "sInfoFiltered": "(Memfilter dari _MAX_ total records)",
        "oPaginate": {
            "sPrevious": "sebelum",
            "sNext": "selanjutnya",
        }
    },

    });   
  });
</script>
<script>
  $(function () { 
      // Data Table
    $("#data3").dataTable({
      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
      "order": [[ 1, "desc" ]],
      // sscrollX: true
      "oLanguage": {
        "sLengthMenu": "Tampilkan _MENU_ data",
        "sZeroRecords": "Maaf, Data tidak ditemukan",
        "sSearch": "cari",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        "sInfoEmpty": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        "sInfoFiltered": "(Memfilter dari _MAX_ total records)",
        "oPaginate": {
            "sPrevious": "sebelum",
            "sNext": "selanjutnya",
        }
    },

    });   
  });
</script>
<script>
  $(function () { 
      // Data Table
    $("#data4").dataTable({
      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
      "order": [[ 1, "desc" ]],
      // sscrollX: true
      "oLanguage": {
        "sLengthMenu": "Tampilkan _MENU_ data",
        "sZeroRecords": "Maaf, Data tidak ditemukan",
        "sSearch": "cari",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        "sInfoEmpty": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        "sInfoFiltered": "(Memfilter dari _MAX_ total records)",
        "oPaginate": {
            "sPrevious": "sebelum",
            "sNext": "selanjutnya",
        }
    },

    });   
  });
</script>
<script>
  $(function () { 
      // Data Table
    $("#data5").dataTable({
      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
      "order": [[ 1, "desc" ]],
      // sscrollX: true
      "oLanguage": {
        "sLengthMenu": "Tampilkan _MENU_ data",
        "sZeroRecords": "Maaf, Data tidak ditemukan",
        "sSearch": "cari",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        "sInfoEmpty": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        "sInfoFiltered": "(Memfilter dari _MAX_ total records)",
        "oPaginate": {
            "sPrevious": "sebelum",
            "sNext": "selanjutnya",
        }
    },

    });   
  });
</script>
<script>
  $(function () { 
      // Data Table
    $("#data8").dataTable({
      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
      "order": [[ 1, "desc" ]],
      // sscrollX: true
      "oLanguage": {
        "sLengthMenu": "Tampilkan _MENU_ data",
        "sZeroRecords": "Maaf, Data tidak ditemukan",
        "sSearch": "cari",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        "sInfoEmpty": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        "sInfoFiltered": "(Memfilter dari _MAX_ total records)",
        "oPaginate": {
            "sPrevious": "sebelum",
            "sNext": "selanjutnya",
        }
    },

    });   
  });
</script>
<script>
  $(function () { 
      // Data Table
    $("#tu2").dataTable({
      "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
      "order": [[ 1, "desc" ]],
      // sscrollX: true
      "oLanguage": {
        "sLengthMenu": "Tampilkan _MENU_ data",
        "sZeroRecords": "Maaf, Data tidak ditemukan",
        "sSearch": "cari",
        "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        "sInfoEmpty": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        "sInfoFiltered": "(Memfilter dari _MAX_ total records)",
        "oPaginate": {
            "sPrevious": "sebelum",
            "sNext": "selanjutnya",
        }
    },

    });   
  });
</script>
<script type="text/javascript">
           function displayForm(c){
            
            if (c.value=="option1"){
                jQuery('#ukuran').hide();
                jQuery('#harga_pokok1').toggle('show');
                jQuery('#stock1').toggle('show');  
                jQuery('#harga_pokok').hide();
                jQuery('#buttonukuran').hide();  
                jQuery('#buttonnonukuran').toggle('show'); 
                

            }
            if (c.value=="option2"){
                jQuery('#ukuran').toggle('show');
                 jQuery('#harga_pokok1').hide();
                jQuery('#stock1').hide(); 
                jQuery('#harga_pokok').toggle('show');
                jQuery('#buttonukuran').toggle('show');
                jQuery('#buttonnonukuran').hide();
                 
            }
           };

   </script>
   <script type="text/javascript">
    $(function(){
      $('#buttonnonukuran').click(function(){
        $(this).closest("form").attr('action','{{ url('readystock/simpannonukuran') }}')
      });
    });
   </script>


       <script type="text/javascript">
        $(function(){
          $('#buttonukuran').click(function(){
            $(this).closest("form").attr('action','{{ url('readystock/simpanukuran') }}')
          });
        });
       </script>
<script type="text/javascript">
           function display(c){
            
            if (c.value=="radio1"){
                jQuery('#ukuran1').hide();
                jQuery('#buttonukuran1').hide();  
                jQuery('#buttonnonukuran1').toggle('show'); 
                

            }
            if (c.value=="radio2"){
                jQuery('#ukuran1').toggle('show');
                jQuery('#buttonukuran1').toggle('show');
                jQuery('#buttonnonukuran1').hide();
                 
            }
           };

       </script>

       <script type="text/javascript">
        $(function(){
          $('#buttonnonukuran1').click(function(){
            $(this).closest("form").attr('action','{{ url('preorder/simpannonukuran') }}')
          });
        });
       </script>

       <script type="text/javascript">
        $(function(){
          $('#buttonukuran1').click(function(){
            $(this).closest("form").attr('action','{{ url('preorder/simpanukuran') }}')
          });
        });
       </script>

   <script>
  $(function () {
   $('#tanggal').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
    })
     });
    </script>
    <script>
  $(function () {
   $('#tanggal2').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
    })
     });
    </script>
    <script>
  $(function () {
   $('#tanggal3').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
    })
     });
    </script>
    <script>
  $(function () {
   $('#laporan').datepicker({
    format: 'yyyy-mm-dd',
    // startDate: '-3d'
    })
     });
    </script>
    <script>
  $(function () {
   $('#laporan2').datepicker({
    format: 'yyyy-mm-dd',
    // startDate: '-3d'
    })
     });
    </script>
    <script>
<!-- <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> -->
</body>
</html>