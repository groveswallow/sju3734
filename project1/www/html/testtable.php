<?php 
require_once("dbconfig.php");
$con = mysqli_connect($host, $usr, $password,$db);
// $tf = $_POST['tf'];
// $cancer_type = $_POST['cancer_type'];
$sql = "select LongCancer from cancer_type where BriCancer like '%00%'";
$re = mysqli_query($con, $sql);
$res = mysqli_fetch_all($re);
echo var_dump($res[0]);
mysqli_close($con);
?>