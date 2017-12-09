<?php
    include "dbconnect.php";

  /*  $attrib = $_GET['id'];*/
    $ownership = $_GET['ownership'];
    $buku = $_GET['buku'];
    $dsib_flag = $_GET['dsib_flag'];
    $month = $_GET['month'];
    $year = $_GET['year'];
    $id_data = $_GET['id_data'];
    $carminvar = $_GET['carminvar'];
    $carmaxvar = $_GET['carmaxvar'];
    $nplrasiominvar = $_GET['nplrasiominvar'];
    $nplrasiomaxvar = $_GET['nplrasiomaxvar'];
    $assetsminvar = $_GET['assetsminvar'];
    $assetsmaxvar = $_GET['assetsmaxvar'];
    $kreditminvar = $_GET['kreditminvar'];
    $kreditmaxvar = $_GET['kreditmaxvar'];
    $nplnominalminvar = $_GET['nplnominalminvar'];
    $nplnominalmaxvar = $_GET['nplnominalmaxvar'];
    $depositminvar = $_GET['depositminvar'];
    $depositmaxvar = $_GET['depositmaxvar'];
    $ldrminvar = $_GET['ldrminvar'];
    $ldrmaxvar = $_GET['ldrmaxvar'];

      if($ownership =='All' && $buku == 'All' && $dsib_flag == 'All')
      {
            $myquery = "SELECT id_bank, size, interconnect, complexity FROM bank where MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year' and id_data = '$id_data' and car between $carminvar and $carmaxvar and npl_rasio between $nplrasiominvar and $nplrasiomaxvar and assets between $assetsminvar and $assetsmaxvar and kredit between $kreditminvar and $kreditmaxvar and npl_nominal between $nplnominalminvar and $nplnominalmaxvar and deposit between $depositminvar and $depositmaxvar and ldr between $ldrminvar and $ldrmaxvar";

      }
      elseif($ownership =='All' && $buku == 'All' && $dsib_flag != 'All')
      {
        $myquery = "SELECT id_bank, size, interconnect, complexity FROM bank where dsib_flag = '$dsib_flag'and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year' and id_data = '$id_data' and car between $carminvar and $carmaxvar and npl_rasio between $nplrasiominvar and $nplrasiomaxvar and assets between $assetsminvar and $assetsmaxvar and kredit between $kreditminvar and $kreditmaxvar and npl_nominal between $nplnominalminvar and $nplnominalmaxvar and deposit between $depositminvar and $depositmaxvar and ldr between $ldrminvar and $ldrmaxvar";
      }
      elseif($buku =='All' && $dsib_flag == 'All' && $ownership !='All')
      {
        $myquery = "SELECT id_bank, size, interconnect, complexity FROM bank where ownership = '$ownership'and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year' and id_data = '$id_data' and car between $carminvar and $carmaxvar and npl_rasio between $nplrasiominvar and $nplrasiomaxvar and assets between $assetsminvar and $assetsmaxvar and kredit between $kreditminvar and $kreditmaxvar and npl_nominal between $nplnominalminvar and $nplnominalmaxvar and deposit between $depositminvar and $depositmaxvar and ldr between $ldrminvar and $ldrmaxvar";
      }
      elseif($ownership =='All' && $dsib_flag == 'All' && $buku !='All')
      {
        $myquery = "SELECT id_bank, size, interconnect, complexity FROM bank where buku= '$buku' and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year' and id_data = '$id_data' and car between $carminvar and $carmaxvar and npl_rasio between $nplrasiominvar and $nplrasiomaxvar and assets between $assetsminvar and $assetsmaxvar and kredit between $kreditminvar and $kreditmaxvar and npl_nominal between $nplnominalminvar and $nplnominalmaxvar and deposit between $depositminvar and $depositmaxvar and ldr between $ldrminvar and $ldrmaxvar";
      }
      elseif($ownership =='All' && $buku != 'All' && $dsib_flag != 'All')
      {
        $myquery = "SELECT id_bank, size, interconnect, complexity FROM bank where buku = '$buku' and dsib_flag = '$dsib_flag' and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year' and id_data = '$id_data' and car between $carminvar and $carmaxvar and npl_rasio between $nplrasiominvar and $nplrasiomaxvar and assets between $assetsminvar and $assetsmaxvar and kredit between $kreditminvar and $kreditmaxvar and npl_nominal between $nplnominalminvar and $nplnominalmaxvar and deposit between $depositminvar and $depositmaxvar and ldr between $ldrminvar and $ldrmaxvar";
      }
      elseif($buku =='All' && $dsib_flag != 'All' && $ownership !='All')
      {
        $myquery = "SELECT id_bank, size, interconnect, complexity FROM bank where ownership = '$ownership' and dsib_flag = '$dsib_flag' and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year' and id_data = '$id_data' and car between $carminvar and $carmaxvar and npl_rasio between $nplrasiominvar and $nplrasiomaxvar and assets between $assetsminvar and $assetsmaxvar and kredit between $kreditminvar and $kreditmaxvar and npl_nominal between $nplnominalminvar and $nplnominalmaxvar and deposit between $depositminvar and $depositmaxvar and ldr between $ldrminvar and $ldrmaxvar";
      }
      elseif($dsib_flag == 'All' && $ownership !='All' && $buku != 'All')
      {
        $myquery = "SELECT id_bank, size, interconnect, complexity FROM bank where ownership = '$ownership' and buku = '$buku' and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year' and id_data = '$id_data' and car between $carminvar and $carmaxvar and npl_rasio between $nplrasiominvar and $nplrasiomaxvar and assets between $assetsminvar and $assetsmaxvar and kredit between $kreditminvar and $kreditmaxvar and npl_nominal between $nplnominalminvar and $nplnominalmaxvar and deposit between $depositminvar and $depositmaxvar and ldr between $ldrminvar and $ldrmaxvar";
      }
      elseif($ownership !='All' && $buku != 'All' && $dsib_flag != 'All')
      {
            $myquery = "SELECT id_bank, size, interconnect, complexity FROM bank where ownership = '$ownership' and buku = '$buku' and dsib_flag = '$dsib_flag'and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year' and id_data = '$id_data' and car between $carminvar and $carmaxvar and npl_rasio between $nplrasiominvar and $nplrasiomaxvar and assets between $assetsminvar and $assetsmaxvar and kredit between $kreditminvar and $kreditmaxvar and npl_nominal between $nplnominalminvar and $nplnominalmaxvar and deposit between $depositminvar and $depositmaxvar and ldr between $ldrminvar and $ldrmaxvar";
      }
  //return var_dump($myquery);

    //$myquery ="SELECT id_bank, size, interconnect, complexity FROM bank WHERE id_data = '$id_data' and MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year'";

    //  $myquery = "SELECT id_bank, size, interconnect, complexity FROM bank where MONTH(timestamp) = '$month' and YEAR(timestamp) = '$year' and id_data = '$id_data' ";



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
