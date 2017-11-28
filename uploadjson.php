<?php
 include "php/session.php";
 include "php/dbconnect.php";

 $id_data = $_GET['id_data'];
 //echo $id_data;
 ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Visualisasi DSIB</title>
</head>
<body>
    <div class="container" style="width:800px;margin-top:0px;">
         <h3 align="center">Insert JSON File</h3>
         <form action="importjson.php" method="post" enctype="multipart/form-data">
              <div class="col-md-4">
                   <input type="file" name="bank_file" style="margin-top:15px;" />
                        <input type="hidden" name="id_data" value="<?php echo $id_data ?>" style="margin-top:15px;" />
              </div>
              <div class="col-md-5">
                   <input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" class="btn btn-info" />
              </div>
              <div style="clear:both"></div>
         </form>
</body>
</html>
