<?php
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
if(empty($_SESSION['dsibflag']))
{
  $_SESSION['dsibflag'] = 'All';
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

  $btns=array('All' => 'All','Buku 1'=>'BUKU 1', 'Buku 2' => 'BUKU 2', 'Buku 3' => 'BUKU 3','Buku 4' => 'BUKU 4');
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
if(isset($_POST['dsibflag']))
{
  $selected_dsibflag= $_POST['dsibflag'][0];
  $_SESSION['dsibflag'] = $selected_dsibflag;
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
?>
