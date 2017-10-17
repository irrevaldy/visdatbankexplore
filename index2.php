<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Design</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet prefetch' href="css/bootstrap.min.css">
  <link rel="stylesheet/less" type="text/less" href="css/sidebar.less" />
  <script src="js/less-v2.js"></script>
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/base64js.min.js"></script>
</head>

<body>
      <div id="wrapper">
        <div class="overlay"></div>

        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul id="parameter" class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                       Visualisasi Data
                    </a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-plus"></i> Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li class="dropdown-header">Dropdown heading</li>
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
                <li><a onclick="upload()" class="fa-upload">Upload</a></li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <input id="image-input" type="file" style="visibility: hidden" accept="text/csv, .csv"/>
        <!-- Page Content -->
        <div id="page-content-wrapper">
          <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
          </button>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-6 card">
                      <div id="main">
                      </div>
                    </div>
                    <div class="col-xs-12 col-md-6 card">
                          <div class="row" style="width:100%;"/>
                          <div class="row" style="width:100%;"/>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <script src="https://d3js.org/d3.v4.min.js"></script>
    <!-- <script src="js/d3-grid.js"></script> -->
    <script src="js/flower.js"></script>
    <script src="js/slider.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>

    <script src="js/sidebar.js"></script>

</body>
</html>
