<?php
include "php/session.php";
 include "php/dbconnect.php";
 ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/d3.min.js"></script>
	<!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- Fonts -->
	<!-- Scripts -->
  <script src="js/close_menu.js"></script>
	<title>Visualisasi DSIB</title>
</head>
<body>
  <?php include "php/sidebar.php"; ?>
<?php include "php/header.php"; ?>
<?php
 $query = "SELECT  * from snapshot_dsib order by periode asc";
   $result = mysqli_query($server, $query);
 ?>
           <div class="container" style="width:800px;margin-top:90px;">
                <h3 align="center">Import Excel File to Database</h3>
                <form id="upload_xls" method="post" enctype="multipart/form-data">
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
                     <table class="table table-bordered" >
                          <tr>
                            <th width="5%">ID Data</th>
                            <th width="25%">Periode</th>
                            <th width="30%">Deskripsi</th>
                            <th width="10%">N-cluster</th>
                            <th width="20%">Threshold</th>
                            <th width="5%">Cutoff Score</th>
                            <th width="15%">DSIB Structure</th>
                            <th width="5%">Delete Row</th>
                        </tr>
                        <?php
                        while($row = mysqli_fetch_array($result))
                        {
                          $id_data = $row["id_data"];

                        ?>
                        <tr>
                             <td><a href="detail.php?id=<?php echo $id_data; ?>"><?php echo $row["id_data"]; ?></a></td>
                             <td><?php echo $row["periode"]; ?></td>
                             <td><?php echo $row["deskripsi"]; ?></td>
                             <td><?php echo $row["n_cluster"]; ?></td>
                             <td><?php echo $row["threshold"]; ?></td>
                             <td><?php echo $row["cutoff_score"]; ?></td>
                             <?php if(empty($row["structure_json"]))
                             {
                               ?><td><a href="" onclick="window.open('uploadjson.php?id_data=<?php echo $id_data; ?>','_blank','height=400,width=800,top=200,left=250')"><?php echo "Upload Json"; ?></a></td>
                          <?php
                         }
                             else
                           {
                             ?><td><a href=""onclick="window.open('viewjson.php?id_data=<?php echo $id_data; ?>','_blank','height=400,width=800,top=200,left=250')"><?php echo "View"; ?></a><br>
                               <a href="" onclick="window.open('uploadjson.php?id_data=<?php echo $id_data; ?>','_blank','height=400,width=800,top=200,left=250')">Reupload</a></td>
                            <?php
                           }
                           ?>
                               <td><a href="" onclick="window.open('deletejson.php?id_data=<?php echo $id_data; ?>','_blank','height=400,width=800,top=200,left=250')">Delete</a></td>
                        </tr>
                      <?php } ?>
                     </table>
                </div>
           </div>
 <script>
      $(document).ready(function(){
           $('#upload_xls').on("submit", function(e){
                e.preventDefault(); //form will not submitted
                $.ajax({
                     url:"import.php",
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
