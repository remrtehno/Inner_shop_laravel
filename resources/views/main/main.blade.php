<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, maximum-scale=1"
        />
        <meta name="keywords" content="{{ $meta_key }}" />
        <meta name="description" content="{{ $meta_desc }}" />

        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
  <link rel="stylesheet" href="/public/adminfaz/assets/font-awesome/4.5.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="/public/adminfaz/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="/public/adminfaz/assets/plugins/datatables/dataTables.bootstrap.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/public/adminfaz/assets/ionicons/2.0.1/css/ionicons.min.css">

        <title>{{ $title }}</title>
        <!-- <link
            href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap"
            rel="stylesheet"
        /> -->
<!--           <link rel="stylesheet" href="/public/assets/css/jquery.dataTables.min.css"> -->
        <link
            rel="stylesheet"
            href="/public/assets/css/jquery-ui.css"
            type="text/css"
            media="all"
        />
        <link
            rel="stylesheet"
            href="/public/assets/css/style.min.css"
            type="text/css"
            media="all"
        />
        <style>
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
                  border: 1px solid #c5c5c5;ч
            }
            /* Style The Dropdown Button */
.dropbtn {
padding: 10px 0;

  font-size: 14px;
  border: none;
  cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    color: var(--main-hover);
}

.cabinet-menu {
      min-width: 200px;
}
a.logo, .all_categories_btn {
      flex-shrink: 0;
}

.pagination a, .pagination  .page-link {
  font-size: 16px;

  display: inline-block;

}
/*.pagination .disabled{
    padding: 0;
}
.pagination li {
      margin-right: .4em;
}*/
.pagination .active { 
    padding: 0 .5em;
    }
.pagination .active {
    background: var(--main-hover);
    color: white;
}
.pagination {
      display: inline-block;
  background: white;
  border-radius: 5px;
  padding: 5px 15px;
}
.search-img, .search-img:hover, .search-img.ui-state-active {
    height: 40px;
    border-radius: 10px;
    margin-right: 5px;
    padding: 0 !important;
  border: 0;
  margin-bottom: 5px;
  background: none;

}


        </style>
        
    </head>

    <body>
        @include("lib.header") 
        
        @yield("content")


        <footer>
            <div class="footer-bar"> ® copyright 2020. | Разработано в <a href="http://steepcoder.uz/site">steepcoder.uz</a> </div> <!-- /.footer-bar -->
        </footer>

        <script src="/public/assets/js/script.js"></script>
        
        <script src="/public/assets/js/jquery-ui.js"></script>
        <script src="/public/assets/js/script2.js"></script>
<script src="/public/adminfaz/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/public/adminfaz/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

        <script>
          $(document).ready(function(){
              //Initialize Select2 Elements

              $(".score.table").DataTable({
                
              });

          });

        
      </script>
    </body>
</html>