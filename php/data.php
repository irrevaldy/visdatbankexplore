<?php
    include "dbconnect.php";

  /*  $attrib = $_GET['id'];
    $ownership = $_GET['ownership'];
    $buku = $_GET['buku'];
    $dsibflag = $_GET['dsibflag'];*/
    $month = $_GET['month'];
    $year = $_GET['year'];
    $id_data = $_GET['id_data'];

    $myquery ="SELECT id_bank, size, interconnect, complexity FROM bank WHERE id_data = '$id_data' and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year'";
    /*
    if($ownership =='All' && $buku == 'All' && $dsibflag == 'All')
    {
          $myquery = "SELECT id_bank, $attrib FROM bank where MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year' and id_data = '$id_data'";
    }
    elseif($ownership =='All' && $buku == 'All' && $dsibflag != 'All')
    {
      $myquery = "SELECT id_bank, $attrib FROM bank where dsibflag = '$dsibflag'and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year' and id_data = '$id_data'";
    }
    elseif($buku =='All' && $dsibflag == 'All' && $ownership !='All')
    {
      $myquery = "SELECT id_bank, $attrib FROM bank where ownership = '$ownership'and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year' and id_data = '$id_data'";
    }
    elseif($ownership =='All' && $dsibflag == 'All' && $buku !='All')
    {
      $myquery = "SELECT id_bank, $attrib FROM bank where buku= '$buku' and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year' and id_data = '$id_data'";
    }
    elseif($ownership =='All' && $buku != 'All' && $dsibflag != 'All')
    {
      $myquery = "SELECT id_bank, $attrib FROM bank where buku = '$buku' and dsibflag = '$dsibflag' and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year' and id_data = '$id_data'";
    }
    elseif($buku =='All' && $dsibflag != 'All' && $ownership !='All')
    {
      $myquery = "SELECT id_bank, $attrib FROM bank where ownership = '$ownership' and dsibflag = '$dsibflag' and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year' and id_data = '$id_data'";
    }
    elseif($dsibflag == 'All' && $ownership !='All' && $buku != 'All')
    {
      $myquery = "SELECT id_bank, $attrib FROM bank where ownership = '$ownership' and buku = '$buku' and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year' and id_data = '$id_data'";
    }
    elseif($ownership !='All' && $buku != 'All' && $dsibflag != 'All')
    {
          $myquery = "SELECT id_bank, $attrib FROM bank where ownership = '$ownership' and buku = '$buku' and dsibflag = '$dsibflag'and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year' and id_data = '$id_data'";
    }*/
    $query = mysqli_query($server, $myquery);

    if ( ! $query ) {
        echo mysqli_error($server);
        die;
    }

    $data = array();

    for ($x = 0; $x < mysqli_num_rows($query); $x++) {
        $data[] = mysqli_fetch_assoc($query);

    }

    echo json_encode($data);
    mysqli_close($server);
?>
