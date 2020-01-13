<?php 
/*
 * @Author: Tang
 * @Date: 2019-11-25 18:39:06
 * @LastEditors  : Tang
 * @LastEditTime : 2020-01-02 18:06:57
 * @Description: 
 */
// require_once("dbconfig.php");
// $con = mysqli_connect($host, $usr, $password,$db);
// $tf = $_POST['tf'];
// $cancer_type = $_POST['cancer_type'];
// $sql = "select LongCancer from cancer_type where BriCancer like '%$_POST[$val]%'";
// $re = mysqli_query($con, $sql);
// $res = mysqli_fetch_all($result);



// mysqli_close($con);
// $sql = "select * from brca_v1 where tf like '%p53%'";
// $sql = "show tables";
// $result = mysqli_query($con, $sql);
// $row = mysqli_fetch_assoc($result);
// $row = mysqli_fetch_row($result);
// $T = $_POST['number'];
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
$res = array(
    'id' => $T,
    'name' => $P,
    'price' => $S,
);
$r[] = $res;
$i = 0;
$r[] = $res1;
$t= array();
echo json_encode($r);
?>