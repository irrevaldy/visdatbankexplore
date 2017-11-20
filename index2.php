<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Design</title>
  <link rel="stylesheet" href="css/normalize.min.css">
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
                    <div class="col-xs-12 col-md-6 col-push-12 card">
                      <div id="main">
                      </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-push-12 card">
                          <div class="row" style="width:100%;"/>
                            <div class="row" style="width:100%;"/>
                            </div>
                          </div>
                    </div>
                </div>
        <!-- /#page-content-wrapper -->
          </div>
    <!-- /#wrapper -->
    <script src="js/d3.v4.min.js"></script>
    <!-- <script src="js/d3-grid.js"></script> -->
    <script src="js/flower.js"></script>
    <script src="js/slider.js"></script>
    <script src='js/jquery.min.js'></script>
    <script src='js/bootstrap.min.js'></script>

    <script src="js/sidebar.js"></script>

</body>
</html>
