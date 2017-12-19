<script type="text/javascript">
    var datefield=document.createElement("input")
    datefield.setAttribute("type", "month")
    if (datefield.type!="month"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
        document.write('<link href="js/jqueryui/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        document.write('<script src="js/jqueryui/jquery.min.js"><\/script>\n')
        document.write('<script src="js/jqueryui/jquery-ui.min.js"><\/script>\n')
    }
</script>

<script>
if (datefield.type!="month"){ //if browser doesn't support input type="date", initialize date picker widget:
    jQuery(function($){ //on document.ready
        $('#month').datepicker();
    })
}
</script>

<i class="fa fa-bars toggle_menu"></i>
<div class="sidebar" height="100%">
  <i class="fa fa-times"></i>
  <ul class="navigation_section" >
    <li class="navigation_item" id="profile">
      <a href="index.php">Upload Data</a>
    </li>
    <li class="navigation_item" id="profile" selected>
      <a href="visualisasi.php">Visualisasi</a>
    </li>
    <?php
    if (strpos($_SERVER['SCRIPT_NAME'], 'visualisasi.php') !== false)
    {
      ?>
      <li class="navigation_item" id="sort">
        <label><input type="checkbox">Sort Values</label>
          </li>
          <li class="navigation_item" id="export">
            <button id='saveButton'>Export to PNG</button>
              </li>
    <li class="navigation_item" id="destroysession" style="color:black">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="submit" name="submito" value=" Reset Filter ">
        </form>
        <?php
        if(isset($_POST['submito'])){
        $_SESSION['kelkomponen'] = 'dsib_score';
        $_SESSION['ownership'] = 'All';
        $_SESSION['buku'] = 'All';
        $_SESSION['dsib_flag'] = 'All';
        $_SESSION['waktu'] = date('Y-m');
        $_SESSION['month'] = date('m');
        $_SESSION['year'] = date('Y');
        $_SESSION['charttype'] = 'bar';
        }
        ?>
    </li>
<!--  <li class="navigation_item" id="perbank" >
    <form>
      <div class="multiselect">
        <div class="selectBox" onclick="showCheckboxes()">
          <select>
            <option>Choose BankID</option>
          </select>
          <div class="overSelect"></div>
        </div>
        <div id="checkboxes" onselect="getSelectValue()">
          <?php
          for($i=1; $i < 117; $i++)
          {
            ?>
            <label for=<?php echo $i; ?>><input type="checkbox" name="checkbox" class="checks" value="<?php echo $i; ?>" id="<?php echo $i; ?>"/><?php echo $i; ?></label>
            <?php
          }
          ?>
        </div>
      </div>
    </form>
  </li>-->
  <!--<li class="navigation_item" id="kelkomponen">
      <form action="<?php echo $_SERVER['PHP_SELF'],'?id_data='.$id_data; ?>" method="POST">
        <select id="kelkomponenn" name="kelkomponen[]" onchange="this.form.submit(); getClickedID();" style="color:black">
      <?php echo get_radio_buttons0($_SESSION['kelkomponen']); ?>
    </select>
      </form>
    </li>-->
    <li class="navigation_item" id="kelkepemilikan">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label>Kepemilikan</label>
        <select name="ownership[]" onchange="this.form.submit();" style="color:black">
      <?php echo get_radio_buttons($_SESSION['ownership']); ?>
    </select>
      </form>
    </li>
    <li class="navigation_item" id="kelbuku">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label>BUKU</label>
        <select name="buku[]" onchange="this.form.submit();" style="color:black">
      <?php echo get_radio_buttons2($_SESSION['buku']); ?>
    </select>
      </form>
    </li>

    <!--<li class="navigation_item" id="dsib_flag">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label>DSIB Flag</label>
        <select name="dsib_flag[]" onchange="this.form.submit();" style="color:black">
      <?php echo get_radio_buttons3($_SESSION['dsib_flag']); ?>
    </select>
      </form>
    </li>-->
  <li class="navigation_item" id="waktu">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label>Periode</label>
        <input style="color:black" id="month" onchange="this.form.submit();" type="month" value="<?php echo $_SESSION['year']; ?>-<?php echo $_SESSION['month']; ?>" name="waktu">
      </form>
    </li>
    <li class="navigation_item" id="id_data">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label>ID Data</label>
        <select name="id_data" onchange="this.form.submit();" style="color:black">
        <?php
        $query = "SELECT snapshot_dsib.id_data FROM snapshot_dsib order by id_data";
       $get=mysqli_query($server, $query);
       $option = '';
       while($row = mysqli_fetch_array($get))
      {
        if($row['id_data'] == $_SESSION['id_data'])
        {
          ?> <option selected value = "<?php echo $row['id_data']; ?>"> <?php echo $row['id_data']; ?></option> <?php
        }
        else
        {
          ?> <option value = "<?php echo $row['id_data']; ?>"> <?php echo $row['id_data']; ?></option> <?php
        }
      }
      ?>
      </select>
      </form>
    </li>

    <li class="navigation_item" id="slider">
      <link rel="stylesheet" type="text/css" href="css/slider.css">
      <div id="slidecontainer">
        <p>CAR % min: <span id="cmin"></span></p>
        <input type="range" min="0" max="138" value="<?php echo $_SESSION['carminvar'] ?>" class="slider1" id="carmin">
          <p>CAR % max: <span id="cmax"></span></p>
        <input type="range" min="0" max="138" value="<?php echo $_SESSION['carmaxvar'] ?>" class="slider" id="carmax">
            <p>NPL Rasio min: <span id="nrmin"></span></p>
        <input type="range" min="0" max="19" value="<?php echo $_SESSION['nplrasiominvar'] ?>" class="slider2" id="nplrasiomin">
        <p>NPL Rasio max: <span id="nrmax"></span></p>
        <input type="range" min="0" max="19" value="<?php echo $_SESSION['nplrasiomaxvar'] ?>" class="slider3" id="nplrasiomax">
        <p>Assets min: <span id="amin"></span></p>
        <input type="range" min="0" max="668289155" value="<?php echo $_SESSION['assetsminvar'] ?>" class="slider4" id="assetsmin">
        <p>Assets max: <span id="amax"></span></p>
        <input type="range" min="0" max="668289155" value="<?php echo $_SESSION['assetsmaxvar'] ?>" class="slider5" id="assetsmax">
        <p>Kredit min: <span id="kmin"></span></p>
        <input type="range" min="0" max="395696024" value="<?php echo $_SESSION['kreditminvar'] ?>" class="slider6" id="kreditmin">
        <p>Kredit max: <span id="kmax"></span></p>
        <input type="range" min="0" max="395696024" value="<?php echo $_SESSION['kreditmaxvar'] ?>" class="slider7" id="kreditmax">
        <p>NPL Nominal min: <span id="nnmin"></span></p>
        <input type="range" min="0" max="11690484" value="<?php echo $_SESSION['nplnominalminvar'] ?>" class="slider8" id="nplnominalmin">
        <p>NPL Nominal max: <span id="nnmax"></span></p>
        <input type="range" min="0" max="11690484" value="<?php echo $_SESSION['nplnominalmaxvar'] ?>" class="slider9" id="nplnominalmax">
        <p>Deposit min: <span id="dmin"></span></p>
        <input type="range" min="0" max="533865849" value="<?php echo $_SESSION['depositminvar'] ?>" class="slider10" id="depositmin">
        <p>Deposit max: <span id="dmax"></span></p>
        <input type="range" min="0" max="533865849" value="<?php echo $_SESSION['depositmaxvar'] ?>" class="slider11" id="depositmax">
        <p>LDR min: <span id="lmin"></span></p>
        <input type="range" min="0" max="406" value="<?php echo $_SESSION['ldrminvar'] ?>" class="slider12" id="ldrmin">
            <p>LDR max: <span id="lmax"></span></p>
        <input type="range" min="0" max="406" value="<?php echo $_SESSION['ldrmaxvar'] ?>" class="slider13" id="ldrmax">
      </div>

      <script type="text/javascript" src="js/slider.js"></script>
      <form name="myform" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="DoSubmit();" method="POST">

      <input type="hidden" name="carminvar" value="0" />
      <input type="hidden" name="carmaxvar" value="0" />
      <input type="hidden" name="nplrasiominvar" value="0" />
      <input type="hidden" name="nplrasiomaxvar" value="0" />
      <input type="hidden" name="assetsminvar" value="0" />
      <input type="hidden" name="assetsmaxvar" value="0" />
      <input type="hidden" name="kreditminvar" value="0" />
      <input type="hidden" name="kreditmaxvar" value="0" />
      <input type="hidden" name="nplnominalminvar" value="0" />
      <input type="hidden" name="nplnominalmaxvar" value="0" />
      <input type="hidden" name="depositminvar" value="0" />
      <input type="hidden" name="depositmaxvar" value="0" />
      <input type="hidden" name="ldrminvar" value="0" />
      <input type="hidden" name="ldrmaxvar" value="0" />

      <input type="submit" name="submit" />
      </form>

</li>


    <br/>
    <br/>

      <li class="navigation_item" id="null1">
      </li>
          <li class="navigation_item" id="null2"></li>
    <?php
    }
    ?>-->
  </ul>
</div><!-- End of sidebar -->
