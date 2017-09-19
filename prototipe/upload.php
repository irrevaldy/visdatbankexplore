<html lang="en">
<head>
<meta charset="UTF-8">

<!-- If IE use the latest rendering engine -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Set the page to the width of the device and set the zoon level -->
<meta name="viewport" content="width = device-width, initial-scale = 1">
<title>Visualization Prototype</title>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">

<style>
.jumbotron{
    background-color:#2E2D88;
    color:white;
}
/* Adds borders for tabs */
.tab-content {
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    padding: 10px;
}
.nav-tabs {
    margin-bottom: 0;
}

body { font: 12px Arial;}
path {
    stroke: steelblue;
    stroke-width: 2;
    fill: none;
}
.axis path,
.axis line {
    fill: none;
    stroke: grey;
    stroke-width: 1;
    shape-rendering: crispEdges;
}
.bar {
  fill: steelblue;
  fill-opacity: .9;
}

</style>
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js" charset="utf-8"></script>


</head>
<body>
<!-- CONTAINERS -->
<!-- container puts padding around itself while container-fluid fills the whole screen. Bootstap grids require a container. -->
<div class="container">

<!-- Collapsible Navigation Bar -->
<div class="container">

<!-- .navbar-fixed-top, or .navbar-fixed-bottom can be added to keep the nav bar fixed on the screen -->
<nav class="navbar navbar-default">
  <div class="container-fluid">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <!-- Button that toggles the navbar on and off on small screens -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

      <!-- Hides information from screen readers -->
        <span class="sr-only"></span>

        <!-- Draws 3 bars in navbar button when in small mode -->
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="upload.php">Upload Data</a></li>
        <li><a href="index.html">DSIB Score<span class="sr-only">(current)</span></a></li>
        <li><a href="index2.html" id="size" class="only_this_class">Size</a></li>
        <li><a href="index3.html">Interconnectedness</a></li>
        <li><a href="index4.html">IFSA</a></li>
        <li><a href="index5.html">IFSL</a></li>
        <li><a href="index6.html">DS</a></li>
        <li><a href="index7.html">Complexity</a></li>
        <li><a href="index8.html">Complexity-Complexity</a></li>
        <li><a href="index9.html">Country-Specific</a></li>
        <li><a href="index10.html">Substitutability</a></li>
      </ul>
      <!-- navbar-left will move the search to the left -->

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<?php
 $connect = mysqli_connect("localhost", "root", "", "systemicriskbi");
 $query = "SELECT * FROM indikatorresiko ORDER BY no desc";
 $result = mysqli_query($connect, $query);
 ?>

           <div class="container" style="width:800px;">
                <h3 align="center">Import Your CSV Data to Database</h2>
                <form id="upload_csv" method="post" enctype="multipart/form-data">
                     <div class="col-md-3">
                          <br />
                          <label>Add More Data</label>
                     </div>
                     <div class="col-md-4">
                          <input type="file" name="bank_file" style="margin-top:15px;" />
                     </div>
                     <div class="col-md-5">
                          <input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" class="btn btn-info" />
                     </div>
                     <div style="clear:both"></div>
                </form>
                <br /><br /><br />
                <div class="table-responsive" id="bank_table">
                     <table class="table table-bordered">
                          <tr>
                               <th width="5%">Timestamp</th>
                               <th width="25%">ID Bank</th>
                               <th width="35%">Kel.Kepemilikan</th>
                               <th width="10%">Kel. Buku</th>
                               <th width="20%">DSIB Flag</th>
                               <th width="5%">DSIB Score</th>
                          </tr>
                          <?php
                          while($row = mysqli_fetch_array($result))
                          {
                          ?>
                          <tr>
                               <td><?php echo $row["timestamp"]; ?></td>
                               <td><?php echo $row["idbank"]; ?></td>
                               <td><?php echo $row["kel.kepemilikan"]; ?></td>
                               <td><?php echo $row["kel.buku"]; ?></td>
                               <td><?php echo $row["dsibflag"]; ?></td>
                               <td><?php echo $row["dsibscore"]; ?></td>
                          </tr>
                          <?php
                          }
                          ?>
                     </table>
                </div>
           </div>
 <script>
      $(document).ready(function(){
           $('#upload_csv').on("submit", function(e){
                e.preventDefault(); //form will not submitted
                $.ajax({
                     url:"export.php",
                     method:"POST",
                     data:new FormData(this),
                     contentType:false,          // The content type used when sending data to the server.
                     cache:false,                // To unable request pages to be cached
                     processData:false,          // To send DOMDocument or non processed data file it is set to false
                     success: function(data){
                          if(data=='Error1')
                          {
                               alert("Invalid File");
                          }
                          else if(data == "Error2")
                          {
                               alert("Please Select File");
                          }
                          else
                          {
                               $('#bank_table').html(data);
                          }
                     }
                })
           });
      });
 </script>
</div>

</body>
</html>
