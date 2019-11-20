<?php 
require_once("dbconfig.php");
$con = mysqli_connect($host, $usr, $password,$db);
if (!$con){
    echo "<h1>数据库连接失败，请联系管理员：XXXXXXXXXX</h1>";
    $flag = 1;
  }
  else{  
    if($TF){
      sertf($TF,$con);
  }
  elseif($Gen){
    sergen($Gen,$con);
  }
  else {
    serpmid($Cancer,$con);
  }
if($flag == 0){
  echo " <script>
  $(function () {
    $('a#det').on('click', (function () {
      $(this).parent().children('td').eq(0).text();
    }))
  })
</script>";
}
}
  mysqli_close($con);
// $sql = "select * from brca_v1 where tf like '%p53%'";
// $sql = "show tables";
// $result = mysqli_query($con, $sql);
// $row = mysqli_fetch_assoc($result);
// $row = mysqli_fetch_row($result);
$T = $_POST['number'];
// $P = $_REQUEST['p'];
// $S = $_REQUEST['s'];
// $T = 3;
$P = [2,3];
$S = 1;
$res = array(
    'id' => 1,
    'name' => 'Tan',
    'price' => 32,
);
$res1 = array(
    'id' => 12,
    'name' => 'Tang',
    'price' => 33,
);
$r[] = $res;
$res2 = array(
    'id' => $T,
    'name' => $P,
    'price' => $S,
);
$r[] = $res2;
$i = 0;
$r[] = $res1;
$t= array();
echo json_encode($t);
?>