<?php
include "dbconnect.php";

session_start();

if(empty($_SESSION['kelkomponen']))
{
  $_SESSION['kelkomponen'] = 'dsib_score';
}
if(empty($_SESSION['ownership']))
{
  $_SESSION['ownership'] = 'All';
}
if(empty($_SESSION['buku']))
{
  $_SESSION['buku'] = 'All';
}
if(empty($_SESSION['dsib_flag']))
{
  $_SESSION['dsib_flag'] = 'All';
}
if(empty($_SESSION['waktu']))
{
  $_SESSION['waktu'] = date("Y-m");
}
if(empty($_SESSION['month']))
{
  $_SESSION['month'] = date("m");
}
if(empty($_SESSION['year']))
{
  $_SESSION['year'] = date("Y");
}
if(empty($_SESSION['chartype']))
{
  $_SESSION['charttype'] = 'bar';
}
$query = "SELECT snapshot_dsib.id_data FROM snapshot_dsib order by id_data limit 1";
$get=mysqli_query($server, $query);
$row = mysqli_fetch_array($get);
if(empty($_SESSION['id_data']))
{
  $_SESSION['id_data'] = $row[0];
}
/*
$id_data = $_SESSION['id_data'];
$querycarmax = "SELECT bank.car FROM bank where id_data = '.$id_data.' order by car desc limit 1";
$getcarmax=mysqli_query($server, $querycarmax);
$rowcarmax = mysqli_fetch_array($getcarmax);
$querycarmin = "SELECT bank.car FROM bank where id_data = '.$id_data.' order by car asc limit 1";
$getcarmin=mysqli_query($server, $querycarmin);
$rowcarmin = mysqli_fetch_array($getcarmin);
*/
if(empty($_SESSION['carminvar']))
{
  $_SESSION['carminvar'] = 0;
}
if(empty($_SESSION['carmaxvar']))
{
  $_SESSION['carmaxvar'] = 138;
}
if(empty($_SESSION['nplrasiominvar']))
{
  $_SESSION['nplrasiominvar'] = 0;
}
if(empty($_SESSION['nplrasiomaxvar']))
{
  $_SESSION['nplrasiomaxvar'] = 19;
}
if(empty($_SESSION['assetsminvar']))
{
  $_SESSION['assetsminvar'] =0;
}
if(empty($_SESSION['assetsmaxvar']))
{
  $_SESSION['assetsmaxvar'] = 668289215;
}
if(empty($_SESSION['kreditminvar']))
{
  $_SESSION['kreditminvar'] = 0;
}
if(empty($_SESSION['kreditmaxvar']))
{
  $_SESSION['kreditmaxvar'] = 395695024;
}
if(empty($_SESSION['nplnominalminvar']))
{
  $_SESSION['nplnominalminvar'] = 0;
}
if(empty($_SESSION['nplnominalmaxvar']))
{
  $_SESSION['nplnominalmaxvar'] = 11690484;
}
if(empty($_SESSION['depositminvar']))
{
  $_SESSION['depositminvar'] = 0;
}
if(empty($_SESSION['depositmaxvar']))
{
  $_SESSION['depositmaxvar'] = 533865849;
}
if(empty($_SESSION['ldrminvar']))
{
  $_SESSION['ldrminvar'] = 0;
}
if(empty($_SESSION['ldrmaxvar']))
{
  $_SESSION['ldrmaxvar'] = 406;
}

function get_radio_buttons0($select)
{
  $btns=array('DSIB Score' => 'dsib_score','Size'=>'size', 'Interconnectedness' => 'interconnect', 'IFSA' => 'ifsa','IFSL' => 'ifsl', 'DS' => 'ds','Complexity' => 'complexity','Complexity-Complexity' => 'complexity_c', 'Country-Specific' => 'complexity_cs','Substitutability' => 'complexity_sub');
  $str='';
  while(list($k,$v)=each($btns))
  {
    if($select==$v)
    {
      $str.='&nbsp;<option selected value="'.$v.'"/>'.$k.'</option>';
    }
    else
    {
      $str.='&nbsp;<option value="'.$v.'"/>'.$k.'</option>';
    }
  }
  return $str;
}

function get_radio_buttons($select)
{

  $btns=array('All' => 'All','Bank Persero'=>'BANK PERSERO', 'Bank Asing' => 'BANK ASING', 'Bank Swasta Nasional' => 'BANK SWASTA NASIONAL','Bank Pembangunan Daerah' => 'BANK PEMBANGUNAN DAERAH', 'Bank Campuran' => 'BANK CAMPURAN');
  $str='';
  while(list($k,$v)=each($btns))
  {
    if($select==$v)
    {
      $str.='&nbsp;<option selected value="'.$v.'"/>'.$k.'</option>';
    }
    else
    {
      $str.='&nbsp;<option value="'.$v.'"/>'.$k.'</option>';
    }
  }
  return $str;
}

function get_radio_buttons2($select)
{

  $btns=array('All' => 'All','BUKU 1'=>'BUKU 1', 'BUKU 2' => 'BUKU 2', 'BUKU 3' => 'BUKU 3','BUKU 4' => 'BUKU 4');
  $str='';
  while(list($k,$v)=each($btns))
  {
    if($select==$v)
    {
      $str.='&nbsp;<option selected value="'.$v.'"/>'.$k.'</option>';
    }
    else
    {
      $str.='&nbsp;<option value="'.$v.'"/>'.$k.'</option>';
    }
  }
  return $str;
}

function get_radio_buttons3($select)
{

  $btns=array('All' => 'All','DSIB'=>'1', 'Non-DSIB' => '0');
  $str='';
  while(list($k,$v)=each($btns))
  {
    if($select==$v)
    {
      $str.='&nbsp;<option selected value="'.$v.'"/>'.$k.'</option>';
    }
    else
    {
      $str.='&nbsp;<option value="'.$v.'"/>'.$k.'</option>';
    }
  }
  return $str;
}

function get_radio_buttons4($radio)
{

  $btns=array('Bar' => 'bar','Line'=>'line');
  $str='';
  while(list($k,$v)=each($btns))
  {
    if($radio==$v)
    {
      $str.='&nbsp;&nbsp;<input type="radio" checked onchange="this.form.submit();" name="charttype[]" value="'.$v.'"/>'.$k;
    }
    else
    {
      $str.='&nbsp;&nbsp;<input type="radio" onchange="this.form.submit();" name="charttype[]" value="'.$v.'"/>'.$k;
    }
  }
  return $str;
}

if(isset($_POST['kelkomponen']))
{
  $selected_kelkomponen= $_POST['kelkomponen'][0];
  $_SESSION['kelkomponen'] = $selected_kelkomponen;

}
if(isset($_POST['ownership']))
{
  $selected_ownership= $_POST['ownership'][0];
  $_SESSION['ownership'] = $selected_ownership;

}
if(isset($_POST['buku']))
{
  $selected_buku= $_POST['buku'][0];
  $_SESSION['buku'] = $selected_buku;

}
if(isset($_POST['dsib_flag']))
{
  $selected_dsib_flag= $_POST['dsib_flag'][0];
  $_SESSION['dsib_flag'] = $selected_dsib_flag;
}
if(isset($_POST['waktu']))
{
  $selected_waktu= $_POST['waktu'];
  $selected_month= date('m', strtotime($_SESSION['waktu']));
  $selected_year = date('Y', strtotime($_SESSION['waktu']));
  $_SESSION['waktu'] = $selected_waktu;
  $_SESSION['month'] = date('m', strtotime($_SESSION['waktu']));
  $_SESSION['year'] = date('Y', strtotime($_SESSION['waktu']));
}
if(isset($_POST['charttype']))
{
  $selected_charttype= $_POST['charttype'][0];
  $_SESSION['charttype'] = $selected_charttype;
}

if(isset($_POST['id_data']))
{
  $selected_id_data = $_POST['id_data'];
  $_SESSION['id_data'] = $selected_id_data;
}

if(isset($_POST['carminvar']))
{
  $varcarmin = $_POST['carminvar'];
  $_SESSION['carminvar'] = $varcarmin;
}
if(isset($_POST['carmaxvar']))
{
  $varcarmax = $_POST['carmaxvar'];
  $_SESSION['carmaxvar'] = $varcarmax;
}
if(isset($_POST['nplrasiominvar']))
{
  $varnplrasiomin = $_POST['nplrasiominvar'];
  $_SESSION['nplrasiominvar'] = $varnplrasiomin;
}
if(isset($_POST['nplrasiomaxvar']))
{
  $varnplrasiomax = $_POST['nplrasiomaxvar'];
  $_SESSION['nplrasiomaxvar'] = $varnplrasiomax;
}
if(isset($_POST['assetsminvar']))
{
  $varassetsmin = $_POST['assetsminvar'];
  $_SESSION['assetsminvar'] = $varassetsmin;
}
if(isset($_POST['assetsmaxvar']))
{
  $varassetsmax = $_POST['assetsmaxvar'];
  $_SESSION['assetsmaxvar'] = $varassetsmax;
}
if(isset($_POST['kreditminvar']))
{
  $varkreditmin = $_POST['kreditminvar'];
  $_SESSION['kreditminvar'] = $varkreditmin;
}
if(isset($_POST['kreditmaxvar']))
{
  $varkreditmax = $_POST['kreditmaxvar'];
  $_SESSION['kreditmaxvar'] = $varkreditmax;
}
if(isset($_POST['nplnominalminvar']))
{
  $varnplnominalmin = $_POST['nplnominalminvar'];
  $_SESSION['nplnominalminvar'] = $varnplnominalmin;
}
if(isset($_POST['nplnominalmaxvar']))
{
  $varnplnominalmax = $_POST['nplnominalmaxvar'];
  $_SESSION['nplnominalmaxvar'] = $varnplnominalmax;
}
if(isset($_POST['depositminvar']))
{
  $vardepositmin = $_POST['depositminvar'];
  $_SESSION['depositminvar'] = $vardepositmin;
}
if(isset($_POST['depositmaxvar']))
{
  $vardepositmax = $_POST['depositmaxvar'];
  $_SESSION['depositmaxvar'] = $vardepositmax;
}
if(isset($_POST['ldrminvar']))
{
  $varldrmin = $_POST['ldrminvar'];
  $_SESSION['ldrminvar'] = $varldrmin;
}
if(isset($_POST['ldrmaxvar']))
{
  $varldrmax = $_POST['ldrmaxvar'];
  $_SESSION['ldrmaxvar'] = $varldrmax;
}
?>
