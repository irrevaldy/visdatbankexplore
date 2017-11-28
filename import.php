<?php

include "php/dbconnect.php";
require_once 'php/Classes/PHPExcel.php';

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
     $query2 = "SELECT * from snapshot_dsib";
     $result2 = mysqli_query($server, $query2);
     ?>

     
          <div class="table-responsive" id="bank_table">
               <table class="table table-bordered" >
                    <tr>
                      <th width="5%">ID Data</th>
                      <th width="25%">Periode</th>
                      <th width="30%">Deskripsi</th>
                      <th width="10%">N-cluster</th>
                      <th width="20%">Threshold</th>
                      <th width="5%">Cutoff Score</th>
                      <th width="15%">DSIB Structure</th>
                      <th width="5%">Modify</th>
                  </tr>
                  <?php
                  while($row = mysqli_fetch_array($result2))
                  {
                    $id_data = $row["id_data"];

                  ?>
                  <tr>
                       <td><a href="detail.php?id=<?php echo $id_data; ?>"><?php echo $row["id_data"]; ?></a></td>
                       <td><?php echo $row["periode"]; ?></td>
                       <td><?php echo $row["deskripsi"]; ?></td>
                       <td><?php echo $row["n_cluster"]; ?></td>
                       <td><?php echo $row["threshold"]; ?></td>
                       <td><?php echo $row["cutoff_score"]; ?></td>
                       <?php if(empty($row["structure_json"]))
                       {
                         ?><td><a href="" onclick="window.open('uploadjson.php?id_data=<?php echo $id_data; ?>','_blank','height=400,width=800,top=200,left=250')"><?php echo "Upload Json"; ?></a></td>
                    <?php
                   }
                       else
                     {
                       ?><td><a href=""onclick="window.open('viewjson.php?id_data=<?php echo $id_data; ?>','_blank','height=400,width=800,top=200,left=250')"><?php echo "View"; ?></a><br>
                         <a href="" onclick="window.open('uploadjson.php?id_data=<?php echo $id_data; ?>','_blank','height=400,width=800,top=200,left=250')">Edit</a></td>
                      <?php
                     }
                     ?>
                         <td><a href="" onclick="window.open('deletejson.php?id_data=<?php echo $id_data; ?>','_blank','height=400,width=800,top=200,left=250')">Delete</a></td>
                  </tr>
                <?php } ?>
               </table>
          </div>
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
