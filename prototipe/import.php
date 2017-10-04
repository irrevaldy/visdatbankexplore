<?php

include "php/dbconnect.php";
 if(!empty($_FILES['bank_file']['name']))
 {
      $output = '';
      $extension = explode(".", $_FILES['bank_file']['name']);
      if($extension[1] == 'csv')
      {
           $file_data = fopen($_FILES["bank_file"]["tmp_name"], 'r');
           fgetcsv($file_data);
           while($row = fgetcsv($file_data))
           {
                $timestamp = mysqli_real_escape_string($server, $row[0]);
                $idbank = mysqli_real_escape_string($server, $row[1]);
                $kelkepemilikan = mysqli_real_escape_string($server, $row[2]);
                $kelbuku = mysqli_real_escape_string($server, $row[3]);
                $dsibflag = mysqli_real_escape_string($server, $row[4]);
                $dsibscore = mysqli_real_escape_string($server, $row[5]);
                  $sizescore = mysqli_real_escape_string($server, $row[6]);
                  $interconnectedness = mysqli_real_escape_string($server, $row[7]);
                  $onbs = mysqli_real_escape_string($server, $row[8]);
                  $offbs = mysqli_real_escape_string($server, $row[9]);
                  $totalkkom = mysqli_real_escape_string($server, $row[10]);
                  $totalkkon = mysqli_real_escape_string($server, $row[11]);
                  $posisipsd = mysqli_real_escape_string($server, $row[12]);
                  $potentialfe = mysqli_real_escape_string($server, $row[13]);
                  $ifsascore = mysqli_real_escape_string($server, $row[14]);
                  $penempatanpblkmd = mysqli_real_escape_string($server, $row[15]);
                  $kreditbdl = mysqli_real_escape_string($server, $row[16]);
                  $acceptancefob = mysqli_real_escape_string($server, $row[17]);
                  $undrawncletofi = mysqli_real_escape_string($server, $row[18]);
                  $securedds = mysqli_real_escape_string($server, $row[19]);
                  $senioruds = mysqli_real_escape_string($server, $row[20]);
                  $subordinatedds = mysqli_real_escape_string($server, $row[21]);
                  $commercialp = mysqli_real_escape_string($server, $row[22]);
                  $stock = mysqli_real_escape_string($server, $row[23]);
                  $netpceosftwofir = mysqli_real_escape_string($server, $row[24]);
                  $netpceosftwofirr = mysqli_real_escape_string($server, $row[25]);
                  $otcdnpfv = mysqli_real_escape_string($server, $row[26]);
                  $derivativepfe = mysqli_real_escape_string($server, $row[27]);
                  $ifsl = mysqli_real_escape_string($server, $row[28]);
                  $liabilitiesiddtdi = mysqli_real_escape_string($server, $row[29]);
                  $depositsdtndfi = mysqli_real_escape_string($server, $row[30]);
                  $undrawnclofofi = mysqli_real_escape_string($server, $row[31]);
                  $pinjamanyd = mysqli_real_escape_string($server, $row[32]);
                  $netnceosftwofi = mysqli_real_escape_string($server, $row[33]);
                    $otcdnnfv = mysqli_real_escape_string($server, $row[34]);
                      $debts = mysqli_real_escape_string($server, $row[35]);
                        $seniorudss = mysqli_real_escape_string($server, $row[36]);
                          $subordinateddss = mysqli_real_escape_string($server, $row[37]);
                            $equitymc = mysqli_real_escape_string($server, $row[38]);
                              $complexitys = mysqli_real_escape_string($server, $row[39]);
                                $complexitycs = mysqli_real_escape_string($server, $row[40]);
                                  $otcd = mysqli_real_escape_string($server, $row[41]);
                                    $securities = mysqli_real_escape_string($server, $row[42]);
                                      $countryss = mysqli_real_escape_string($server, $row[43]);
                                        $garansi = mysqli_real_escape_string($server, $row[44]);
                                          $lc = mysqli_real_escape_string($server, $row[45]);
                                            $pangsasbn = mysqli_real_escape_string($server, $row[46]);
                                              $rekdpk = mysqli_real_escape_string($server, $row[47]);
                                                $fask = mysqli_real_escape_string($server, $row[48]);
                                                  $kcdn = mysqli_real_escape_string($server, $row[49]);
                                                    $kcln = mysqli_real_escape_string($server, $row[50]);
                      $substitutabilityscore = mysqli_real_escape_string($server, $row[51]);
                        $nilairtgs = mysqli_real_escape_string($server, $row[52]);
                          $nilaisknbi = mysqli_real_escape_string($server, $row[53]);
                            $volumertgs = mysqli_real_escape_string($server, $row[54]);
                              $volumesknbi = mysqli_real_escape_string($server, $row[55]);
                                $kustodiannilai = mysqli_real_escape_string($server, $row[56]);
                                  $kustodianvolumeke = mysqli_real_escape_string($server, $row[57]);



                $query = "
                INSERT INTO indikatorresiko
                     (timestamp,idbank,kelkepemilikan,kelbuku,dsibflag, dsibscore,sizescore,interconnectedness,onbs,offbs,totalkkom,totalkkon,posisipsd,potentialfe,ifsascore,penempatanpblkmd,kreditbdl,acceptancefob,undrawncletofi,securedds,senioruds,subordinatedds,commercialp,stock,netpceosftwofir,netpceosftwofirr,otcdnpfv,derivativepfe,ifsl,liabilitiesiddtdi,depositsdtndfi,undrawnclofofi,pinjamanyd,netnceosftwofi,otcdnnfv,debts,seniorudss,subordinateddss,equitymc,complexitys,complexitycs,otcd,securities,countryss,garansi,lc,pangsasbn,rekdpk,fask,kcdn,kcln,substitutabilityscore,nilairtgs,nilaisknbi,volumertgs,volumesknbi,kustodiannilai,kustodianvolumeke)
                     VALUES ('$timestamp','$idbank','$kelkepemilikan','$kelbuku','$dsibflag','$dsibscore','$sizescore','$interconnectedness','$onbs','$offbs','$totalkkom','$totalkkon','$posisipsd','$potentialfe','$ifsascore','$penempatanpblkmd','$kreditbdl','$acceptancefob','$undrawncletofi','$securedds','$senioruds','$subordinatedds','$commercialp','$stock','$netpceosftwofir','$netpceosftwofirr','$otcdnpfv','$derivativepfe','$ifsl','$liabilitiesiddtdi','$depositsdtndfi','$undrawnclofofi','$pinjamanyd','$netnceosftwofi','$otcdnnfv','$debts','$seniorudss','$subordinateddss','$equitymc','$complexitys','$complexitycs','$otcd','$securities','$countryss','$garansi','$lc','$pangsasbn','$rekdpk','$fask','$kcdn','$kcln','$substitutabilityscore','$nilairtgs','$nilaisknbi','$volumertgs','$volumesknbi','$kustodiannilai','$kustodianvolumeke')";
                mysqli_query($server, $query);
           }
           $select = "SELECT * FROM indikatorresiko ORDER BY no DESC";
           $result = mysqli_query($server, $select);
           $output .= '
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
           ';
           while($row = mysqli_fetch_array($result))
           {
                $output .= '
                     <tr>
                          <td>'.$row["timestamp"].'</td>
                          <td>'.$row["idbank"].'</td>
                          <td>'.$row["kelkepemilikan"].'</td>
                          <td>'.$row["kelbuku"].'</td>
                          <td>'.$row["dsibflag"].'</td>
                          <td>'.$row["dsibscore"].'</td>
                          <td>'.$row["sizescore"].'</td>
                              <td>'.$row["interconnectedness"].'</td>
                              <td>'.$row["onbs"].'</td>
                              <td>'.$row["offbs"].'</td>
                              <td>'.$row["totalkkom"].'</td>
                              <td>'.$row["totalkkon"].'</td>
                              <td>'.$row["posisipsd"].'</td>
                              <td>'.$row["potentialfe"].'</td>
                              <td>'.$row["ifsascore"].'</td>
                              <td>'.$row["penempatanpblkmd"].'</td>
                              <td>'.$row["kreditbdl"].'</td>
                              <td>'.$row["acceptancefob"].'</td>
                              <td>'.$row["undrawncletofi"].'</td>
                              <td>'.$row["securedds"].'</td>
                              <td>'.$row["senioruds"].'</td>
                              <td>'.$row["subordinatedds"].'</td>
                              <td>'.$row["commercialp"].'</td>
                              <td>'.$row["stock"].'</td>
                              <td>'.$row["netpceosftwofir"].'</td>
                              <td>'.$row["netpceosftwofirr"].'</td>
                              <td>'.$row["otcdnpfv"].'</td>
                              <td>'.$row["derivativepfe"].'</td>
                              <td>'.$row["ifsl"].'</td>
                              <td>'.$row["liabilitiesiddtdi"].'</td>
                              <td>'.$row["depositsdtndfi"].'</td>
                              <td>'.$row["undrawnclofofi"].'</td>
                              <td>'.$row["pinjamanyd"].'</td>
                              <td>'.$row["netnceosftwofi"].'</td>
                              <td>'.$row["otcdnnfv"].'</td>
                              <td>'.$row["debts"].'</td>
                              <td>'.$row["seniorudss"].'</td>
                              <td>'.$row["subordinateddss"].'</td>
                              <td>'.$row["equitymc"].'</td>
                              <td>'.$row["complexitys"].'</td>
                              <td>'.$row["complexitycs"].'</td>
                              <td>'.$row["otcd"].'</td>
                              <td>'.$row["securities"].'</td>
                              <td>'.$row["countryss"].'</td>
                              <td>'.$row["garansi"].'</td>
                              <td>'.$row["lc"].'</td>
                              <td>'.$row["pangsasbn"].'</td>
                              <td>'.$row["rekdpk"].'</td>
                              <td>'.$row["fask"].'</td>
                              <td>'.$row["kcdn"].'</td>
                              <td>'.$row["kcln"].'</td>
                              <td>'.$row["substitutabilityscore"].'</td>
                              <td>'.$row["nilairtgs"].'</td>
                              <td>'.$row["nilaisknbi"].'</td>
                              <td>'.$row["volumertgs"].'</td>
                              <td>'.$row["volumesknbi"].'</td>
                              <td>'.$row["kustodiannilai"].'</td>
                              <td>'.$row["kustodianvolumeke"].'</td>
                     </tr>
                ';
           }
           $output .= '</table>';
           echo $output;
      }
      else
      {
           echo 'Error1';
      }
 }
 else
 {
      echo "Error2";
 }
 ?>
