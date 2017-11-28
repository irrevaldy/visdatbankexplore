<?php

  include "php/dbconnect.php";
/*
 if(!empty($_FILES['bank_file']['name']))
 {
   $output = '';
   $extension = explode(".", $_FILES['bank_file']['name']);
   if($extension[1] == 'json')
   {
      $data = file_get_contents($_FILES['bank_file']['name']);
      echo $data;
   }
   else
   {
        echo "Wrong data type. Insert JSON!";
   }
 }
 else
 {
      echo "There is no data to display";
 }
 */

$id_data = $_POST['id_data'];
//echo $id_data;

 if(isset($_FILES['bank_file']))
 {
   $file = $_FILES['bank_file'];
   $file_tmp = $file['tmp_name'];
   //print_r($file_tmp);

   $data = file_get_contents($file_tmp);
   //echo $data;

   $sql="update snapshot_dsib set structure_json='$data' where snapshot_dsib.id_data='$id_data'";
   $result = mysqli_query($server, $sql);

   if($sql)
   {
     echo "File JSON Snapshot DSIB $id_data telah berhasil diupload.";
   }
   else {
     echo "gagal";
   }

 }
 ?>
<br>
 <a href="" onclick="window.close(), window.opener.location.reload()">Close</a>
