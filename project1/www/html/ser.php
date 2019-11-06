<?php
  $host="localhost";
  $usr="lcbb3734";
  $password=3734;
  $db="lcbb3734";
  $con=mysqli_connect($servername, $username, $password,$db);
  function sertf($TF,$con){
    $sql = "select * from lcbb3734 where tf like $TF";
    $result = mysqli_query($con, $sql);
    echo "<h1>$TF</h1>";
  }
  function sergen($Gen,$con){
    echo "<h1>$Gen</h1>";
  }
  function serpmid($PMID,$con){
    echo "<h1>$PMID</h1>";
  }
  if (!$con){
    echo "<h1>数据库连接失败，请联系管理员：XXXXXXXXXX</h1>";
  }
  $TF = $_REQUEST['TF'];
  $Gen = $_REQUEST['Gen'];
  $PMID = $_REQUEST['PMID'];
  if($TF){
    sertf($TF,$con);
  }
  elseif($Gen){
    sergen($Gen,$con);
  }
  else {
    serpmid($PMID,$con);
  }
  mysqli_close($con);
?>