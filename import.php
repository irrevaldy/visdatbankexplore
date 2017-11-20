<?php

include "php/dbconnect.php";
require_once 'Classes/PHPExcel.php';

 if(!empty($_FILES['bank_file']['name']))
 {
   $output = '';
   $extension = explode(".", $_FILES['bank_file']['name']);
   if($extension[1] == 'xls' || $extension[1] == 'xlsx')
   {
     $excel = PHPExcel_IOFactory::load($_FILES['bank_file']['tmp_name']);

     $excel->setActiveSheetIndex(0);

     echo "<table>";

     //first row of data series
     $i = 3;

     $identifikasi_data = $excel->getActiveSheet()->getCell('B3')->getFormattedValue();
     $periodes = $excel->getActiveSheet()->getCell('B4')->getFormattedValue();
     $old_date_timestamp = strtotime($periodes);
     $periode = date('Y-m-d', $old_date_timestamp);
     $deskripsi = $excel->getActiveSheet()->getCell('B5')->getFormattedValue();
     $ncluster = $excel->getActiveSheet()->getCell('B6')->getFormattedValue();
     $threshold = $excel->getActiveSheet()->getCell('B7')->getFormattedValue();
     $cutoffscore = $excel->getActiveSheet()->getCell('B8')->getFormattedValue();

     $sql="insert into snapshot_dsib(id_data, periode, deskripsi, n_cluster, threshold, cutoff_score, structure_json) values('$identifikasi_data','$periode','$deskripsi','$ncluster','$threshold','$cutoffscore','')";
     $result = mysqli_query($server, $sql);

     $i = 14;
     while( $excel->getActiveSheet()->getCell('A'.$i)->getValue() != "")
     {
         $timestampold = $excel->getActiveSheet()->getCell('A'.$i)->getFormattedValue();
         $old_date_timestamp = strtotime($timestampold);
         $timestamp = date('Y-m-d h:m:s', $old_date_timestamp);
         $idbank = $excel->getActiveSheet()->getCell('B'.$i)->getFormattedValue();
         $namabank = $excel->getActiveSheet()->getCell('C'.$i)->getFormattedValue();
         $ownership = $excel->getActiveSheet()->getCell('D'.$i)->getFormattedValue();
         $buku = $excel->getActiveSheet()->getCell('E'.$i)->getFormattedValue();
         //$dsib_flag = $excel->getActiveSheet()->getCell('F'.$i)->getFormattedValue();
         $dsib_score = $excel->getActiveSheet()->getCell('F'.$i)->getFormattedValue();
         $size = $excel->getActiveSheet()->getCell('G'.$i)->getFormattedValue();
         $s1 = $excel->getActiveSheet()->getCell('H'.$i)->getFormattedValue();
         $s2 = $excel->getActiveSheet()->getCell('I'.$i)->getFormattedValue();
         $s3 = $excel->getActiveSheet()->getCell('J'.$i)->getFormattedValue();
         $s4 = $excel->getActiveSheet()->getCell('K'.$i)->getFormattedValue();
         $s5 = $excel->getActiveSheet()->getCell('L'.$i)->getFormattedValue();
         $s6 = $excel->getActiveSheet()->getCell('M'.$i)->getFormattedValue();
         $interconnect = $excel->getActiveSheet()->getCell('N'.$i)->getFormattedValue();
         $ifsa = $excel->getActiveSheet()->getCell('O'.$i)->getFormattedValue();
         $if_1 = $excel->getActiveSheet()->getCell('P'.$i)->getFormattedValue();
         $if_2 = $excel->getActiveSheet()->getCell('Q'.$i)->getFormattedValue();
         $if_3 = $excel->getActiveSheet()->getCell('R'.$i)->getFormattedValue();
         $if_4 = $excel->getActiveSheet()->getCell('S'.$i)->getFormattedValue();
         $if_5 = $excel->getActiveSheet()->getCell('T'.$i)->getFormattedValue();
         $if_6 = $excel->getActiveSheet()->getCell('U'.$i)->getFormattedValue();
         $if_7 = $excel->getActiveSheet()->getCell('V'.$i)->getFormattedValue();
         $if_8 = $excel->getActiveSheet()->getCell('W'.$i)->getFormattedValue();
         $if_9 = $excel->getActiveSheet()->getCell('X'.$i)->getFormattedValue();
         $if_10 = $excel->getActiveSheet()->getCell('Y'.$i)->getFormattedValue();
         $if_11 = $excel->getActiveSheet()->getCell('Z'.$i)->getFormattedValue();
         $if_12 = $excel->getActiveSheet()->getCell('AA'.$i)->getFormattedValue();
         $if_13 = $excel->getActiveSheet()->getCell('AB'.$i)->getFormattedValue();
         $ifsl = $excel->getActiveSheet()->getCell('AC'.$i)->getFormattedValue();
         $il_1 = $excel->getActiveSheet()->getCell('AD'.$i)->getFormattedValue();
         $il_2 = $excel->getActiveSheet()->getCell('AE'.$i)->getFormattedValue();
         $il_3 = $excel->getActiveSheet()->getCell('AF'.$i)->getFormattedValue();
         $il_4 = $excel->getActiveSheet()->getCell('AG'.$i)->getFormattedValue();
         $il_5 = $excel->getActiveSheet()->getCell('AH'.$i)->getFormattedValue();
         $il_6 = $excel->getActiveSheet()->getCell('AI'.$i)->getFormattedValue();
         $ds = $excel->getActiveSheet()->getCell('AJ'.$i)->getFormattedValue();
         $ds_1 = $excel->getActiveSheet()->getCell('AK'.$i)->getFormattedValue();
         $ds_2 = $excel->getActiveSheet()->getCell('AL'.$i)->getFormattedValue();
         $ds_3 = $excel->getActiveSheet()->getCell('AM'.$i)->getFormattedValue();
         $complexity = $excel->getActiveSheet()->getCell('AN'.$i)->getFormattedValue();
         $complexity_c = $excel->getActiveSheet()->getCell('AO'.$i)->getFormattedValue();
         $c_1 = $excel->getActiveSheet()->getCell('AP'.$i)->getFormattedValue();
         $c_2 = $excel->getActiveSheet()->getCell('AQ'.$i)->getFormattedValue();
         $complexity_cs = $excel->getActiveSheet()->getCell('AR'.$i)->getFormattedValue();
         $cs_1 = $excel->getActiveSheet()->getCell('AS'.$i)->getFormattedValue();
         $cs_2 = $excel->getActiveSheet()->getCell('AT'.$i)->getFormattedValue();
         $cs_3 = $excel->getActiveSheet()->getCell('AU'.$i)->getFormattedValue();
         $cs_4 = $excel->getActiveSheet()->getCell('AV'.$i)->getFormattedValue();
         $cs_5 = $excel->getActiveSheet()->getCell('AW'.$i)->getFormattedValue();
         $cs_6 = $excel->getActiveSheet()->getCell('AX'.$i)->getFormattedValue();
         $cs_7 = $excel->getActiveSheet()->getCell('AY'.$i)->getFormattedValue();
         $complexity_sub = $excel->getActiveSheet()->getCell('AZ'.$i)->getFormattedValue();
         $sub_1 = $excel->getActiveSheet()->getCell('BA'.$i)->getFormattedValue();
         $sub_2 = $excel->getActiveSheet()->getCell('BB'.$i)->getFormattedValue();
         $sub_3 = $excel->getActiveSheet()->getCell('BC'.$i)->getFormattedValue();
         $sub_4 = $excel->getActiveSheet()->getCell('BD'.$i)->getFormattedValue();
         $sub_5 = $excel->getActiveSheet()->getCell('BE'.$i)->getFormattedValue();
         $sub_6 = $excel->getActiveSheet()->getCell('BF'.$i)->getFormattedValue();
         $car = $excel->getActiveSheet()->getCell('BG'.$i)->getFormattedValue();
         $npl_rasio = $excel->getActiveSheet()->getCell('BH'.$i)->getFormattedValue();
         $assets = $excel->getActiveSheet()->getCell('BI'.$i)->getFormattedValue();
         $kredit = $excel->getActiveSheet()->getCell('BJ'.$i)->getFormattedValue();
         $npl_nominal = $excel->getActiveSheet()->getCell('BK'.$i)->getFormattedValue();
         $deposit = $excel->getActiveSheet()->getCell('BL'.$i)->getFormattedValue();
         $ldr = $excel->getActiveSheet()->getCell('BM'.$i)->getFormattedValue();

         $sql1="insert into bank(id_bank, id_data, timestamp, nama_bank, ownership, buku, dsib_flag, dsib_score, size, s1, s2, s3, s4, s5, s6, interconnect, ifsa, if_1, if_2, if_3, if_4, if_5, if_6, if_7, if_8, if_9, if_10, if_11, if_12, if_13, ifsl, il_1, il_2, il_3, il_4, il_5, il_6, ds, ds_1, ds_2, ds_3, complexity, complexity_c, c_1, c_2, complexity_cs, cs_1, cs_2, cs_3, cs_4, cs_5, cs_6, cs_7, complexity_sub, sub_1, sub_2, sub_3, sub_4, sub_5, sub_6, car, npl_rasio, assets, kredit, npl_nominal, deposit, ldr) values('$idbank','$identifikasi_data','$timestamp','$namabank','$ownership','$buku','1','$dsib_score','$size','$s1','$s2','$s3','$s4','$s5','$s6','$interconnect','$ifsa','$if_1','$if_2','$if_3','$if_4','$if_5','$if_6','$if_7','$if_8','$if_9','$if_10','$if_11','$if_12','$if_13','$ifsl','$il_1','$il_2','$il_3','$il_4','$il_5','$il_6','$ds','$ds_1','$ds_2','$ds_3','$complexity','$complexity_c','$c_1','$c_2','$complexity_cs','$cs_1','$cs_2','$cs_3','$cs_4','$cs_5','$cs_6','$cs_7','$complexity_sub','$sub_1','$sub_2','$sub_3','$sub_4','$sub_5','$sub_6','$car','$npl_rasio','$assets','kredit','$npl_nominal','$deposit','$ldr')";
         $result1 = mysqli_query($server, $sql1);

         $i++;
     }
     $query2 = "SELECT bank.id_data, snapshot_dsib.periode, snapshot_dsib.deskripsi, snapshot_dsib.n_cluster, snapshot_dsib.threshold, snapshot_dsib.cutoff_score, bank.id_bank, bank.timestamp, bank.nama_bank, bank.ownership, bank.buku, bank.dsib_score, bank.size, bank.s1, bank.s2, bank.s3, bank.s4, bank.s5, bank.s6, bank.interconnect, bank.ifsa, bank.if_1, bank.if_2, bank.if_3, bank.if_4, bank.if_5, bank.if_6, bank.if_7, bank.if_8, bank.if_9, bank.if_10, bank.if_11, bank.if_12, bank.if_13, bank.ifsl, bank.il_1, bank.il_2, bank.il_3, bank.il_4, bank.il_5, bank.il_6, bank.ds, bank.ds_1, bank.ds_2, bank.ds_3, bank.complexity, bank.complexity_c, bank.c_1, bank.c_2, bank.complexity_cs, bank.cs_1, bank.cs_2, bank.cs_3, bank.cs_4, bank.cs_5, bank.cs_6, bank.cs_7, bank.complexity_sub, bank.sub_1, bank.sub_2, bank.sub_3, bank.sub_4, bank.sub_5, bank.sub_6, bank.car, bank.npl_rasio, bank.assets, bank.kredit, bank.npl_nominal, bank.deposit, bank.ldr FROM bank, snapshot_dsib WHERE bank.id_data = snapshot_dsib.id_data order by bank.timestamp desc, bank.id_bank asc";
     $result2 = mysqli_query($server, $query2);
     ?>

     <div class="table-responsive" id="bank_table">
          <table class="table table-bordered">
               <tr>
                    <th width="5%">ID Data</th>
                    <th width="25%">Periode</th>
                    <th width="35%">Deskripsi</th>
                    <th width="10%">N-cluster</th>
                    <th width="20%">Threshold</th>
                    <th width="5%">Cutoff Score</th>
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
                                   <th width="5%">Interconnectedness</th>
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
               while($row = mysqli_fetch_array($result2))
               {
               ?>
               <tr>
                    <td><?php echo $row["id_data"]; ?></td>
                    <td><?php echo $row["periode"]; ?></td>
                    <td><?php echo $row["deskripsi"]; ?></td>
                    <td><?php echo $row["n_cluster"]; ?></td>
                    <td><?php echo $row["threshold"]; ?></td>
                    <td><?php echo $row["cutoff_score"]; ?></td>
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
   <?php
   }
   else
   {
        echo "Wrong data type. Insert XLS!";
   }
 }
 else
 {
      echo "There is no data to display";
 }
 ?>
