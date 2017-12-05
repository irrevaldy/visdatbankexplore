<?php

include "php/dbconnect.php";

$id_data = $_GET['id_data'];

$sql="delete from snapshot_dsib where snapshot_dsib.id_data='$id_data'";
$sql2="delete from bank where bank.id_data='$id_data'";
$result = mysqli_query($server, $sql);
$result2 = mysqli_query($server, $sql2);

if($result || $result2)
{
  echo "File JSON Snapshot DSIB $id_data telah berhasil dihapus.";
}
else {
  echo "gagal";
}


 ?>
<br>
 <a href="" onclick="window.opener.location.reload(), window.close()">Close</a>
