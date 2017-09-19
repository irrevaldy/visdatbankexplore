<?php
 if(!empty($_FILES["bank_file"]["name"]))
 {
      $connect = mysqli_connect("localhost", "root", "", "systemicriskbi");
      $output = '';
      $allowed_ext = array("csv");
      $extension = end(explode(".", $_FILES["bank_file"]["name"]));
      if(in_array($extension, $allowed_ext))
      {
           $file_data = fopen($_FILES["bank_file"]["tmp_name"], 'r');
           fgetcsv($file_data);
           while($row = fgetcsv($file_data))
           {
                $timestamp = mysqli_real_escape_string($connect, $row[0]);
                $idbank = mysqli_real_escape_string($connect, $row[1]);
                $kelkepemilikan = mysqli_real_escape_string($connect, $row[2]);
                $kelbuku = mysqli_real_escape_string($connect, $row[3]);
                $dsibflag = mysqli_real_escape_string($connect, $row[4]);
                  $dsibscore = mysqli_real_escape_string($connect, $row[5]);
                $query = "
                INSERT INTO indikatorresiko
                     (timestamp, idbank, kel.kepemilikan, kel.buku, dsibflag, dsibscore)
                     VALUES ('$timestamp', '$idbank', '$kelkepemilikan', '$kelbuku', '$dsibflag','$dsibscore')
                ";
                mysqli_query($connect, $query);
           }
           $select = "SELECT * FROM indikatorresiko ORDER BY id DESC";
           $result = mysqli_query($connect, $select);
           $output .= '
                <table class="table table-bordered">
                     <tr>
                          <th width="5%">Timestamp</th>
                          <th width="25%">ID Bank</th>
                          <th width="35%">Kel.Kepemilikan</th>
                          <th width="10%">Kel. Buku</th>
                          <th width="20%">DSIB Flag</th>
                          <th width="5%">DSIB Score</th>
                     </tr>
           ';
           while($row = mysqli_fetch_array($result))
           {
                $output .= '
                     <tr>
                          <td>'.$row["timestamp"].'</td>
                          <td>'.$row["idbank"].'</td>
                          <td>'.$row["kel.kepemilikan"].'</td>
                          <td>'.$row["kel.buku"].'</td>
                          <td>'.$row["dsibflag"].'</td>
                          <td>'.$row["dsibscore"].'</td>  
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
