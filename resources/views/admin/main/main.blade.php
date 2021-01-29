<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link
          rel="stylesheet"
          href="/public/assets/css/jquery-ui.css"
          type="text/css"
          media="all"
  />
  <style>
    .search-img, .search-img:hover, .search-img.ui-state-active {
      height: 40px;
      border-radius: 10px;
      margin-right: 5px;
      padding: 0 !important;
      border: 0;
      margin-bottom: 5px;
      background: none;

    }

    .user-cabinet .row {
      max-width: 90rem;

    }
    div.dataTables_filter {
      display: flex;
      justify-content: flex-end;
    }
    div.dataTables_filter input {
      margin: auto;
      margin-left: 15px;
    }
    .dataTables_length {
      display: none;
    }
    .dataTables_length, .DataTables_Table_0_filter, .dataTables_filter {

    }
    table.dataTable thead th, table.dataTable thead td {
      border-bottom: 1px solid #d9e3f3;
    }
    form.search_form_header {
      position: relative;
    }
    form.search_form_header input {
      position: absolute;
      padding-left: 52px;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
    }
    .ui-widget.ui-widget-content {

      min-width: 395px;
      margin-left: -60px;
      margin-top: 15px;
      border-radius: 10px;
    }
    .btn-primary:hover {
      color: white !important;
      opacity: .7;
    }
    .search-img, .search-img:hover, .search-img.ui-state-active {
      margin-right: 10px;
    }
    .search-img, .search-img:hover, .search-img.ui-state-active {
      margin-top: 0 !important;
      margin-left: 0 !important;
    }


    .ui-widget.ui-widget-content {
      padding: 10px 20px;
      border: 1px solid #c5c5c5;
      z-index: 999;
      position: absolute;
    }
    /* Style The Dropdown Button */
  </style>
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/public/adminfaz/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/public/adminfaz/assets/plugins/datepicker/datepicker3.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/public/adminfaz/assets/font-awesome/4.5.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="/public/adminfaz/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/public/adminfaz/assets/plugins/datatables/dataTables.bootstrap.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/public/adminfaz/assets/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/public/adminfaz/assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/public/adminfaz/assets/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="/public/adminfaz/https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="/public/adminfaz/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/public/adminfaz/../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="/public/adminfaz/#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <a href="/" target="_blank" style="
  color: white;
  position: relative;
  top: 13px;
">Перейти на сайт</a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="/public/adminfaz/#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="/public/adminfaz/#">
                      <div class="pull-left">
                        <img src="/public/adminfaz/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
              </li>
              <li class="footer"><a href="/public/adminfaz/#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="/public/adminfaz/#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="/public/adminfaz/#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="/public/adminfaz/#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="/public/adminfaz/#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="/public/adminfaz/#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="/public/adminfaz/#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="/public/adminfaz/#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/public/adminfaz/assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="/public/adminfaz/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="/public/adminfaz/#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="/public/adminfaz/#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="/public/adminfaz/#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/public/adminfaz/#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="/public/adminfaz/#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="/public/adminfaz/#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/public/adminfaz/assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="/public/adminfaz/#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form typeahead">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
    @include('admin.lib.left')
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
@yield('content')
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.7
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="/public/adminfaz/http://almsaeedstudio.com/">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>


</div>
<!-- ./wrapper -->





<!-- jQuery 2.2.3 -->
<script src="/public/adminfaz/assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/public/adminfaz/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/public/adminfaz/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/public/adminfaz/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->

<!-- AdminLTE App -->
<script src="/public/adminfaz/assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/public/adminfaz/assets/dist/js/demo.js"></script>
<script src="/public/adminfaz/assets/plugins/ckeditor/ckeditor.js"></script>
<script src="/public/adminfaz/assets/plugins/datepicker/bootstrap-datepicker.js"></script>

<script src="/public/assets/js/jquery-ui.js"></script>
<script src="/public/assets/js/script2.js"></script>
<script>
    $(document).ready(function(){
        //Initialize Select2 Elements

        $("#example1").DataTable();
        $(".DataTable").DataTable();

        if(!document.querySelector('.noEditor')) {
          var editor = CKEDITOR.replaceAll()
          //CKFinder.setupCKEditor( editor );
        }

        $('.return-product').click(function() {
          $(this).next('.modal-returned').toggle();
        })

        $('.datapicker').datepicker({
            format: 'yyyy-mm-dd',
        });
    });

    $('.nav-tabs a').click( function(e) {
        window.location.hash = $(this).attr('href');
    })

    $('[href="'+window.location.hash+'"]').click();
</script>
</body>

<!-- Mirrored from almsaeedstudio.com/themes/AdminLTE/pages/examples/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 18 Dec 2016 15:13:35 GMT -->
</html>
