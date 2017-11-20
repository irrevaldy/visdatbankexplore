<?php
    include "dbconnect.php";

    $attrib = $_GET['id'];
    $ownership = $_GET['ownership'];
    $buku = $_GET['buku'];
    $dsibflag = $_GET['dsibflag'];
    $month = $_GET['month'];
    $year = $_GET['year'];


    if($ownership =='All' && $buku == 'All' && $dsibflag == 'All')
    {
          $myquery = "SELECT id_bank, $attrib FROM bank where MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year'";
    }
    elseif($ownership =='All' && $buku == 'All' && $dsibflag != 'All')
    {
      $myquery = "SELECT id_bank, $attrib FROM bank where dsibflag = '$dsibflag'and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year'";
    }
    elseif($buku =='All' && $dsibflag == 'All' && $ownership !='All')
    {
      $myquery = "SELECT id_bank, $attrib FROM bank where ownership = '$ownership'and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year'";
    }
    elseif($ownership =='All' && $dsibflag == 'All' && $buku !='All')
    {
      $myquery = "SELECT id_bank, $attrib FROM bank where buku= '$buku' and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year'";
    }
    elseif($ownership =='All' && $buku != 'All' && $dsibflag != 'All')
    {
      $myquery = "SELECT id_bank, $attrib FROM bank where buku = '$buku' and dsibflag = '$dsibflag' and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year'";
    }
    elseif($buku =='All' && $dsibflag != 'All' && $ownership !='All')
    {
      $myquery = "SELECT id_bank, $attrib FROM bank where ownership = '$ownership' and dsibflag = '$dsibflag' and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year'";
    }
    elseif($dsibflag == 'All' && $ownership !='All' && $buku != 'All')
    {
      $myquery = "SELECT id_bank, $attrib FROM bank where ownership = '$ownership' and buku = '$buku' and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year'";
    }
    elseif($ownership !='All' && $buku != 'All' && $dsibflag != 'All')
    {
          $myquery = "SELECT id_bank, $attrib FROM bank where ownership = '$ownership' and buku = '$buku' and dsibflag = '$dsibflag'and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year'";
    }
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
