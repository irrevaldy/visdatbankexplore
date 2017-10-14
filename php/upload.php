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
                                <th width="5%">Size Score</th>
                                  <th width="5%">Interconnectedness</th>
                                    <th width="5%">On Balance Sheet</th>
                                      <th width="5%">Off Balance sheet</th>
                                        <th width="5%">Total Kkom</th>
                                          <th width="5%">total KKon</th>
                                            <th width="5%">Posisi PSD</th>
                                              <th width="5%">Potential FE</th>
                                                <th width="5%">IFSA Score</th>
                                                  <th width="5%">Penempatan PBLKMD</th>
                                                  <th width="5%">Kredit BDL</th>
                                                  <th width="5%">Acceptance FOB</th>
                                                  <th width="5%">Undrawn Cletofi</th>
                                                  <th width="5%">Secure DDS</th>
                                                  <th width="5%">Senior UDS</th>
                                                  <th width="5%">Subordinate DDS</th>
                                                  <th width="5%">Commercial P</th>
                                                  <th width="5%">Stock</th>
                                                  <th width="5%">Netpceosftwofir</th>
                                                  <th width="5%">Netpceosftwofirr</th>
                                                  <th width="5%">Otcdnpfv</th>
                                                  <th width="5%">Derivativepfe</th>
                                                  <th width="5%">IFSL</th>
                                                  <th width="5%">Liabilitiesiddtdi</th>
                                                  <th width="5%">Deposits DTNdfi</th>
                                                  <th width="5%">Undrawn Clofofi</th>
                                                  <th width="5%">Pinjaman Yd</th>
                                                  <th width="5%">Netnceosftwofi</th>
                                                  <th width="5%">Otcdnnfv</th>
                                                  <th width="5%">Debts</th>
                                                  <th width="5%">Senior UDSS</th>
                                                  <th width="5%">Subdordinate DDSS</th>
                                                  <th width="5%">Equity MC</th>
                                                  <th width="5%">Complexitys</th>
                                                  <th width="5%">Complexitycs</th>
                                                  <th width="5%">OTCD</th>
                                                  <th width="5%">Securities</th>
                                                  <th width="5%">Countryss</th>
                                                    <th width="5%">Garansi</th>
                                                      <th width="5%">Lc</th>
                                                        <th width="5%">Pangsasbn</th>
                                                          <th width="5%">Rekdpk</th>
                                                            <th width="5%">Fask</th>
                                                              <th width="5%">KCDN</th>
                                                              <th width="5%">KCLN</th>
                                                                <th width="5%">Substitutability Score</th>
                                                                <th width="5%">Nilai RTGS</th>
                                                                <th width="5%">Nilai SKNBI</th>
                                                                <th width="5%">Volume RTGS</th>
                                                                <th width="5%">Volume SKNBI</th>
                                                                <th width="5%">Kustodian Nilai</th>
                                                                <th width="5%">Kustodian Volume Ke</th>
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
                               <td><?php echo $row["sizescore"]; ?></td>
                               <td><?php echo $row["interconnectedness"]; ?></td>
                               <td><?php echo $row["onbs"]; ?></td>
                               <td><?php echo $row["offbs"]; ?></td>
                               <td><?php echo $row["totalkkom"]; ?></td>
                               <td><?php echo $row["totalkkon"]; ?></td>
                               <td><?php echo $row["posisipsd"]; ?></td>
                               <td><?php echo $row["potentialfe"]; ?></td>
                               <td><?php echo $row["ifsascore"]; ?></td>
                               <td><?php echo $row["penempatanpblkmd"]; ?></td>
                               <td><?php echo $row["kreditbdl"]; ?></td>
                               <td><?php echo $row["acceptancefob"]; ?></td>
                               <td><?php echo $row["undrawncletofi"]; ?></td>
                               <td><?php echo $row["securedds"]; ?></td>
                               <td><?php echo $row["senioruds"]; ?></td>
                               <td><?php echo $row["subordinatedds"]; ?></td>
                               <td><?php echo $row["commercialp"]; ?></td>
                               <td><?php echo $row["stock"]; ?></td>
                               <td><?php echo $row["netpceosftwofir"]; ?></td>
                               <td><?php echo $row["netpceosftwofirr"]; ?></td>
                               <td><?php echo $row["otcdnpfv"]; ?></td>
                               <td><?php echo $row["derivativepfe"]; ?></td>
                               <td><?php echo $row["ifsl"]; ?></td>
                               <td><?php echo $row["liabilitiesiddtdi"]; ?></td>
                               <td><?php echo $row["depositsdtndfi"]; ?></td>
                               <td><?php echo $row["undrawnclofofi"]; ?></td>
                               <td><?php echo $row["pinjamanyd"]; ?></td>
                               <td><?php echo $row["netnceosftwofi"]; ?></td>
                               <td><?php echo $row["otcdnnfv"]; ?></td>
                               <td><?php echo $row["debts"]; ?></td>
                               <td><?php echo $row["seniorudss"]; ?></td>
                               <td><?php echo $row["subordinateddss"]; ?></td>
                               <td><?php echo $row["equitymc"]; ?></td>
                               <td><?php echo $row["complexitys"]; ?></td>
                               <td><?php echo $row["complexitycs"]; ?></td>
                               <td><?php echo $row["otcd"]; ?></td>
                               <td><?php echo $row["securities"]; ?></td>
                               <td><?php echo $row["countryss"]; ?></td>
                               <td><?php echo $row["garansi"]; ?></td>
                               <td><?php echo $row["lc"]; ?></td>
                               <td><?php echo $row["pangsasbn"]; ?></td>
                               <td><?php echo $row["rekdpk"]; ?></td>
                               <td><?php echo $row["fask"]; ?></td>
                               <td><?php echo $row["kcdn"]; ?></td>
                               <td><?php echo $row["kcln"]; ?></td>
                               <td><?php echo $row["substitutabilityscore"]; ?></td>
                               <td><?php echo $row["nilairtgs"]; ?></td>
                               <td><?php echo $row["nilaisknbi"]; ?></td>
                               <td><?php echo $row["volumertgs"]; ?></td>
                               <td><?php echo $row["volumesknbi"]; ?></td>
                               <td><?php echo $row["kustodiannilai"]; ?></td>
                               <td><?php echo $row["kustodianvolumeke"]; ?></td>
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
