<?php include "php/session.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">-->
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script src="canvastoblob/js/canvas-to-blob.js"></script>
	 <script src="filesaver/FileSaver.min.js"></script>
  <script type="text/javascript" src="js/d3.min.js"></script>

	<!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- Fonts -->
	<!-- Scripts -->
  <script src="js/close_menu.js"></script>
  <!--conservative slider-->
  <!--<script>
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
</script>-->
<style type="text/css">
 		.blendCircle {
 			mix-blend-mode: multiply;
 		}
 	</style>
<script src="js/d3.tip.v0.6.3.js"></script>
	<title>Visualisasi DSIB</title>
</head>
<body>

<?php
if(isset($_POST['id_data']))
{
  $id_data = $_POST['id_data'];
  //echo $id_data;

}
//echo $_SESSION['amount1'];
//echo $_SESSION['amountt1'];
?>

  <?php include "php/header.php"; ?>
  <?php include "php/sidebar.php"; ?>
  <script>
  var clickedId = '<?php echo $_SESSION['kelkomponen']; ?>';
  var selected_ownership= '<?php echo $_SESSION['ownership']; ?>';
  var selected_buku = '<?php echo $_SESSION['buku']; ?>';
  var selected_dsib_flag = '<?php echo $_SESSION['dsib_flag']; ?>';
  var selected_month = '<?php echo $_SESSION['month']; ?>';
  var selected_year = '<?php echo $_SESSION['year']; ?>';
  var selected_id_data = '<?php echo $_SESSION['id_data'] ?>';

  var selected_carminvar = '<?php echo $_SESSION['carminvar'] ?>';
  var selected_carmaxvar = '<?php echo $_SESSION['carmaxvar'] ?>';
  var selected_nplrasiominvar = '<?php echo $_SESSION['nplrasiominvar'] ?>';
  var selected_nplrasiomaxvar = '<?php echo $_SESSION['nplrasiomaxvar'] ?>';
  var selected_assetsminvar = '<?php echo $_SESSION['assetsminvar'] ?>';
  var selected_assetsmaxvar = '<?php echo $_SESSION['assetsmaxvar'] ?>';
  var selected_kreditminvar = '<?php echo $_SESSION['kreditminvar'] ?>';
  var selected_kreditmaxvar = '<?php echo $_SESSION['kreditmaxvar'] ?>';
  var selected_nplnominalminvar = '<?php echo $_SESSION['nplnominalminvar'] ?>';
  var selected_nplnominalmaxvar = '<?php echo $_SESSION['nplnominalmaxvar'] ?>';
  var selected_depositminvar = '<?php echo $_SESSION['depositminvar'] ?>';
  var selected_depositmaxvar = '<?php echo $_SESSION['depositmaxvar'] ?>';
  var selected_ldrminvar = '<?php echo $_SESSION['ldrminvar'] ?>';
  var selected_ldrmaxvar = '<?php echo $_SESSION['ldrmaxvar'] ?>';

</script>


  <div class="container" style="width:800px;margin-top:90px;">
    <script type="text/javascript" src="js/stackbar.js"></script>
    <!--<?php
    if ($_SESSION['charttype'] == 'bar')
    {
      ?>
      <script type="text/javascript" src="js/stackbar.js"></script>
    <?php
    }
    else
    {
      ?>
      <script type="text/javascript" src="js/line.js"></script>
    <?php
    }
    ?>-->
  </div>
<!--  <div class="charto">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <?php echo get_radio_buttons4($_SESSION['charttype']); ?>
    </form>
  </div>-->
</body>
</html>
