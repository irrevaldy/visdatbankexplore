<?php
include "php/session.php";
 include "php/dbconnect.php";
 ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="bootstrap.min.js"></script>
  <script type="text/javascript" src="d3.min.js"></script>
	<!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- Fonts -->
	<!-- Scripts -->
  <script src="js/close_menu.js"></script>
	<title>Visualisasi DSIB</title>
</head>
<body>
<?php include "php/header.php"; ?>
<?php include "php/sidebar.php"; ?>
<?php

 $query = "SELECT * FROM indikatorresiko ORDER BY no desc";
 $result = mysqli_query($server, $query);
 ?>

           <div class="container" style="width:800px;margin-top:90px;">
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
                               <td><?php echo $row["kelkepemilikan"]; ?></td>
                               <td><?php echo $row["kelbuku"]; ?></td>
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
