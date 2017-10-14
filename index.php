<?php include "php/session.php"; ?>
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
  <script>
var expanded = false;
  function showCheckBoxes() {
    var checkboxes = document.getElementById("checkboxes");
    if(!expanded) {
      checkboxes.style.display = "block";
      expanded = true;
    }
    else {
      checkboxes.style.display = "none";
      expanded = false;
    }
  }
    function chartfunc() {
    var charttype = 'bar';
    if(document.getElementById("bar").checked)
    {
      charttype = document.getElementById("bar").value;

    }
    else if(document.getElementById("line").checked)
    {
      charttype = document.getElementById("line").value;

    }
    document.write(chartype);
  }
  </script>
  <script src="js/d3.tip.v0.6.3.js"></script>
	<title>Visualisasi DSIB</title>
</head>
<body>
  <?php include "php/header.php"; ?>
  <?php include "php/sidebar.php"; ?>
  <script>
  var clickedId = '<?php echo $_SESSION['kelkomponen']; ?>';
  var selected_kelkepemilikan = '<?php echo $_SESSION['kelkepemilikan']; ?>';
  var selected_kelbuku = '<?php echo $_SESSION['kelbuku']; ?>';
  var selected_dsibflag = '<?php echo $_SESSION['dsibflag']; ?>';
  var selected_month = '<?php echo $_SESSION['month']; ?>';
  var selected_year = '<?php echo $_SESSION['year']; ?>';
  </script>
  <div class="main">
    <?php
    if ($_SESSION['charttype'] == 'bar')
    {
      ?>
      <script type="text/javascript" src="js/bargraph.js"></script>
    <?php
    }
    else
    {
      ?>
      <script type="text/javascript" src="js/line.js"></script>
    <?php
    }
    ?>
  </div>
  <div class="charto">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <?php echo get_radio_buttons4($_SESSION['charttype']); ?>
    </form>
  </div>
  <script>
  var expanded = false;
  function showCheckboxes() {
    var checkboxes = document.getElementById("checkboxes");
    if(!expanded) {
      checkboxes.style.display = "block";
      expanded = true;
    }
    else {
      checkboxes.style.display = "none";
      expanded = false;
    }
  }
  </script>
</body>
</html>
