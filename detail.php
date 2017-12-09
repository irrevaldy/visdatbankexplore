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
<?php include "php/header.php"; ?>
  <?php include "php/sidebar.php"; ?>
<?php
$id_data = $_GET['id'];
$_SESSION['id_data'] = $id_data;
//echo $_SESSION['id_data'];
$quer = "SELECT * from snapshot_dsib where snapshot_dsib.id_data = '$id_data'";
$query = "SELECT bank.id_bank, bank.timestamp, bank.nama_bank, bank.ownership, bank.buku, bank.dsib_score, bank.size, bank.s1, bank.s2, bank.s3, bank.s4, bank.s5, bank.s6, bank.interconnect, bank.ifsa, bank.if_1, bank.if_2, bank.if_3, bank.if_4, bank.if_5, bank.if_6, bank.if_7, bank.if_8, bank.if_9, bank.if_10, bank.if_11, bank.if_12, bank.if_13, bank.ifsl, bank.il_1, bank.il_2, bank.il_3, bank.il_4, bank.il_5, bank.il_6, bank.ds, bank.ds_1, bank.ds_2, bank.ds_3, bank.complexity, bank.complexity_c, bank.c_1, bank.c_2, bank.complexity_cs, bank.cs_1, bank.cs_2, bank.cs_3, bank.cs_4, bank.cs_5, bank.cs_6, bank.cs_7, bank.complexity_sub, bank.sub_1, bank.sub_2, bank.sub_3, bank.sub_4, bank.sub_5, bank.sub_6, bank.car, bank.npl_rasio, bank.assets, bank.kredit, bank.npl_nominal, bank.deposit, bank.ldr FROM bank, snapshot_dsib WHERE bank.id_data = snapshot_dsib.id_data and snapshot_dsib.id_data = '$id_data' order by bank.timestamp desc, bank.id_bank asc";$result = mysqli_query($server, $query);
   $resulto = mysqli_query($server, $quer);
   $rowi = mysqli_fetch_array($resulto);
 ?>

           <div class="container" style="width:800px;margin-top:90px;">
                <h3 align="center">Detail Snapshot Information</h3>
                <br /><br />
                <div class="table-responsive" id="bank_table">
                    <table class = "table">
                      <tr border=0>
                        <td>ID_Data</td>
                        <td>:</td>
                        <td><?php echo $id_data; ?>
                      </tr>

                      <tr border=0>
                        <td>Periode</td>
                        <td>:</td>
                        <td><?php echo $rowi["periode"]; ?></td>
                      </tr>
                      <tr border=0>
                        <td>Deskripsi</td>
                        <td>:</td>
                        <td><?php echo $rowi["deskripsi"]; ?></td>
                      </tr>
                      <tr border=0>
                        <td>N-Cluster</td>
                        <td>:</td>
                        <td><?php echo $rowi["n_cluster"]; ?></td>
                      </tr>
                      <tr border=0>
                        <td>Threshold</td>
                        <td>:</td>
                        <td><?php echo $rowi["threshold"]; ?></td>
                      </tr>
                      <tr border=0>
                        <td>Cutoff Score</td>
                        <td>:</td>
                        <td><?php echo $rowi["cutoff_score"]; ?></td>
                      </tr>
                      <tr border=0>
                        <td>Json Structure</td>
                        <td>:</td>
                        <?php if(empty($rowi["structure_json"]))
                        {
                          ?><td><a href="" onclick="window.open('uploadjson.php?id_data=<?php echo $id_data; ?>','_blank','height=400,width=800,top=200,left=250')"><?php echo "Upload Indikator"; ?></a></td>
                     <?php
                    }
                        else
                      {
                        ?><td><a href=""onclick="window.open('viewjson.php?id_data=<?php echo $id_data; ?>','_blank','height=400,width=800,top=200,left=250')"><?php echo "View Json Structure"; ?></a></td>
                       <?php
                      }
                      ?>
                    </tr>
                    </table>
                    <table>
                      <tr>
                        <form action="visualisasi.php" method="POST">
                          <input type="hidden" name="id_data" value="<?php echo $id_data; ?>">
                        <input type="submit" name="submito" value=" Visualize Data ">
                        </form>
                      </tr>
                    </table>
                    <br>
                     <table class="table table-bordered">
                          <tr>
                             <th width="5%">ID Bank</th>
                               <th width="5%">Timestamp</th>
                               <th width="5%">Nama Bank</th>
                               <th width="5%">Ownership</th>
                               <th width="5%">Buku</th>
              <!--                 <th width="5%">DSIB Flag</th> -->
                               <th width="5%">DSIB Score</th>
                               <th width="5%">Size</th>
                                 <th width="5%">On Balance Sheet</th>
                                   <th width="5%">Off Balance sheet</th>
                                     <th width="5%">Total Kkom</th>
                                       <th width="5%">total KKon</th>
                                         <th width="5%">Posisi PSD</th>
                                           <th width="5%">Potential FE</th>
                                           <th width="5%">Interconnected</th>
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
                       <th width="5%">CAR</th>
                       <th width="5%">NPL Rasio</th>
                       <th width="5%">Assets</th>
                       <th width="5%">Kredit</th>
                       <th width="5%">NPL Nominal</th>
                       <th width="5%">Deposit</th>
                       <th width="5%">LDR</th>
                        </tr>
                        <?php
                        while($row = mysqli_fetch_array($result))
                        {
                        ?>
                        <tr>
                             <td><?php echo $row["id_bank"]; ?></td>
                             <td><?php echo $row["timestamp"]; ?></td>
                             <td><?php echo $row["nama_bank"]; ?></td>
                             <td><?php echo $row["ownership"]; ?></td>
                             <td><?php echo $row["buku"]; ?></td>
                             <td><?php echo $row["dsib_score"]; ?></td>
                             <td><?php echo $row["size"]; ?></td>
                             <td><?php echo $row["s1"]; ?></td>
                             <td><?php echo $row["s2"]; ?></td>
                             <td><?php echo $row["s3"]; ?></td>
                             <td><?php echo $row["s4"]; ?></td>
                             <td><?php echo $row["s5"]; ?></td>
                             <td><?php echo $row["s6"]; ?></td>
                             <td><?php echo $row["interconnect"]; ?></td>
                             <td><?php echo $row["ifsa"]; ?></td>
                             <td><?php echo $row["if_1"]; ?></td>
                             <td><?php echo $row["if_2"]; ?></td>
                             <td><?php echo $row["if_3"]; ?></td>
                             <td><?php echo $row["if_4"]; ?></td>
                             <td><?php echo $row["if_5"]; ?></td>
                             <td><?php echo $row["if_6"]; ?></td>
                             <td><?php echo $row["if_7"]; ?></td>
                             <td><?php echo $row["if_8"]; ?></td>
                             <td><?php echo $row["if_9"]; ?></td>
                             <td><?php echo $row["if_10"]; ?></td>
                             <td><?php echo $row["if_11"]; ?></td>
                             <td><?php echo $row["if_12"]; ?></td>
                             <td><?php echo $row["if_13"]; ?></td>
                             <td><?php echo $row["ifsl"]; ?></td>
                             <td><?php echo $row["il_1"]; ?></td>
                             <td><?php echo $row["il_2"]; ?></td>
                             <td><?php echo $row["il_3"]; ?></td>
                             <td><?php echo $row["il_4"]; ?></td>
                             <td><?php echo $row["il_5"]; ?></td>
                             <td><?php echo $row["il_6"]; ?></td>
                             <td><?php echo $row["ds"]; ?></td>
                             <td><?php echo $row["ds_1"]; ?></td>
                             <td><?php echo $row["ds_2"]; ?></td>
                             <td><?php echo $row["ds_3"]; ?></td>
                             <td><?php echo $row["complexity"]; ?></td>
                             <td><?php echo $row["complexity_c"]; ?></td>
                             <td><?php echo $row["c_1"]; ?></td>
                             <td><?php echo $row["c_2"]; ?></td>
                             <td><?php echo $row["complexity_cs"]; ?></td>
                             <td><?php echo $row["cs_1"]; ?></td>
                             <td><?php echo $row["cs_2"]; ?></td>
                             <td><?php echo $row["cs_3"]; ?></td>
                             <td><?php echo $row["cs_4"]; ?></td>
                             <td><?php echo $row["cs_5"]; ?></td>
                             <td><?php echo $row["cs_6"]; ?></td>
                             <td><?php echo $row["cs_7"]; ?></td>
                             <td><?php echo $row["complexity_sub"]; ?></td>
                             <td><?php echo $row["sub_1"]; ?></td>
                             <td><?php echo $row["sub_2"]; ?></td>
                             <td><?php echo $row["sub_3"]; ?></td>
                             <td><?php echo $row["sub_4"]; ?></td>
                             <td><?php echo $row["sub_5"]; ?></td>
                             <td><?php echo $row["sub_6"]; ?></td>
                             <td><?php echo $row["car"]; ?></td>
                             <td><?php echo $row["npl_rasio"]; ?></td>
                             <td><?php echo $row["assets"]; ?></td>
                             <td><?php echo $row["kredit"]; ?></td>
                             <td><?php echo $row["npl_nominal"]; ?></td>
                             <td><?php echo $row["deposit"]; ?></td>
                             <td><?php echo $row["ldr"]; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
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
