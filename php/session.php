<?php
session_start();

if(empty($_SESSION['kelkomponen']))
{
  $_SESSION['kelkomponen'] = 'dsibscore';
}
if(empty($_SESSION['kelkepemilikan']))
{
  $_SESSION['kelkepemilikan'] = 'All';
}
if(empty($_SESSION['kelbuku']))
{
  $_SESSION['kelbuku'] = 'All';
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
  $btns=array('DSIB Score' => 'dsibscore','Size'=>'sizescore', 'Interconnectedness' => 'interconnectedness', 'IFSA' => 'ifsascore','IFSL' => 'ifsl', 'DS' => 'debts','Complexity' => 'complexitys','Complexity-Complexity' => 'complexitycs', 'Country-Specific' => 'countryss','Substitutability' => 'substitutabilityscore');
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

  $btns=array('All' => 'All','Bank Persero'=>'Bank Persero', 'Bank Asing' => 'Bank Asing', 'Bank Swasta Nasional' => 'Bank Swasta Nasional','BPD' => 'BPD', 'Bank Campuran' => 'Bank Campuran');
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

  $btns=array('All' => 'All','Buku 1'=>'1', 'Buku 2' => '2', 'Buku 3' => '3','Buku 4' => '4');
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
if(isset($_POST['kelkepemilikan']))
{
  $selected_kelkepemilikan= $_POST['kelkepemilikan'][0];
  $_SESSION['kelkepemilikan'] = $selected_kelkepemilikan;

}
if(isset($_POST['kelbuku']))
{
  $selected_kelbuku= $_POST['kelbuku'][0];
  $_SESSION['kelbuku'] = $selected_kelbuku;

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
?>
