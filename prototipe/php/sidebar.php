
<i class="fa fa-bars toggle_menu"></i>
<div class="sidebar">

  <i class="fa fa-times"></i>


  <ul class="navigation_section" >
    <li class="navigation_item" id="profile">
      <a href="upload.php">Upload Data</a>
    </li>
    <li class="navigation_item" id="profile" selected>
      <a href="index.php">Visualisasi</a>
    </li>
    <li class="navigation_item" id="profile">
      <a href="index.php">Simulasi</a>
    </li>
    <li class="navigation_item" id="profile">
      <a href="index.php">Clustering</a>
    </li>
    <br>
    <li class="navigation_item" id="sort">
      <label><input type="checkbox"> Sort Values</label>
    </li>
    <li class="navigation_item" id="destroysession" style="color:black">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="submit" name="submito" value=" Reset Filter ">
        </form>
        <?php
        if(isset($_POST['submito'])){
        $_SESSION['kelkomponen'] = 'dsibscore';
        $_SESSION['kelkepemilikan'] = 'All';
        $_SESSION['kelbuku'] = 'All';
        $_SESSION['dsibflag'] = 'All';
        $_SESSION['waktu'] = date('Y-m');
        $_SESSION['month'] = date('m');
        $_SESSION['year'] = date('Y');
        }
        ?>
    </li>
    <li class="navigation_item" id="perbank" >
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
    </li>
    <li class="navigation_item" id="kelkomponen">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <select id=kelkomponenn name="kelkomponen[]" onchange="this.form.submit(); getClickedID();" style="color:black">
      <?php echo get_radio_buttons0($_SESSION['kelkomponen']); ?>
    </select>
      </form>
    </li>
    <li class="navigation_item" id="kelkepemilikan">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <select name="kelkepemilikan[]" onchange="this.form.submit();" style="color:black">
      <?php echo get_radio_buttons($_SESSION['kelkepemilikan']); ?>
    </select>
      </form>
    </li>
    <li class="navigation_item" id="kelbuku">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <select name="kelbuku[]" onchange="this.form.submit();" style="color:black">
      <?php echo get_radio_buttons2($_SESSION['kelbuku']); ?>
    </select>
      </form>
    </li>
    <li class="navigation_item" id="dsibflag">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <select name="dsibflag[]" onchange="this.form.submit();" style="color:black">
      <?php echo get_radio_buttons3($_SESSION['dsibflag']); ?>
    </select>
      </form>
    </li>
    <li class="navigation_item" id="waktu">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <label>Month</label>
        <input style="color:black"  onchange="this.form.submit();" type="month" value="<?php echo $_SESSION['year'] ?>-<?php echo $_SESSION['month'] ?>" name="waktu">
      </form>
    </li>
  </ul>
</div><!-- End of sidebar -->
