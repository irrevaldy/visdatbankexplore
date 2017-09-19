<?php
    $attrib = $_GET['id'];
    $kelkepemilikan = $_GET['kelkepemilikan'];
    $kelbuku = $_GET['kelbuku'];
    $dsibflag = $_GET['dsibflag'];
    $month = $_GET['month'];
    $year = $_GET['year'];

    $username = "root";
    $password = "";
    $host = "localhost";
    $database = "systemicriskbi";

    $server = mysqli_connect($host, $username, $password, $database);
    if($kelkepemilikan =='All' && $kelbuku == 'All' && $dsibflag == 'All')
    {
          $myquery = "SELECT idbank, $attrib FROM indikatorresiko where MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year'";
    }
    elseif($kelkepemilikan =='All' && $kelbuku == 'All' && $dsibflag != 'All')
    {
      $myquery = "SELECT idbank, $attrib FROM indikatorresiko where dsibflag = '$dsibflag'and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year'";
    }
    elseif($kelbuku =='All' && $dsibflag == 'All' && $kelkepemilikan !='All')
    {
      $myquery = "SELECT idbank, $attrib FROM indikatorresiko where kelkepemilikan = '$kelkepemilikan'and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year'";
    }
    elseif($kelkepemilikan =='All' && $dsibflag == 'All' && $kelbuku !='All')
    {
      $myquery = "SELECT idbank, $attrib FROM indikatorresiko where kelbuku= '$kelbuku' and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year'";
    }
    elseif($kelkepemilikan =='All' && $kelbuku != 'All' && $dsibflag != 'All')
    {
      $myquery = "SELECT idbank, $attrib FROM indikatorresiko where kelbuku = '$kelbuku' and dsibflag = '$dsibflag' and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year'";
    }
    elseif($kelbuku =='All' && $dsibflag != 'All' && $kelkepemilikan !='All')
    {
      $myquery = "SELECT idbank, $attrib FROM indikatorresiko where kelkepemilikan = '$kelkepemilikan' and dsibflag = '$dsibflag' and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year'";
    }
    elseif($dsibflag == 'All' && $kelkepemilikan !='All' && $kelbuku != 'All')
    {
      $myquery = "SELECT idbank, $attrib FROM indikatorresiko where kelkepemilikan = '$kelkepemilikan' and kelbuku = '$kelbuku' and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year'";
    }
    elseif($kelkepemilikan !='All' && $kelbuku != 'All' && $dsibflag != 'All')
    {
          $myquery = "SELECT idbank, $attrib FROM indikatorresiko where kelkepemilikan = '$kelkepemilikan' and kelbuku = '$kelbuku' and dsibflag = '$dsibflag'and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year'";
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
