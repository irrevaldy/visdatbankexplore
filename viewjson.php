<?php

include "php/dbconnect.php";

$id_data = $_GET['id_data'];

$sql="select structure_json from snapshot_dsib where snapshot_dsib.id_data='$id_data'";
$result = mysqli_query($server, $sql);
$row = mysqli_fetch_array($result);

echo $row[0];

 ?>
<br>
 <a href="" onclick="window.close(), window.opener.location.reload()">Close</a>
