<?php 
/*
 * @Author: Tang
 * @Date: 2020-03-31 11:12:29
 * @LastEditors: Tang
 * @LastEditTime: 2020-04-05 18:58:33
 * @Description: 
 */
require_once("dbconfig.php");
$con = mysqli_connect($host, $usr, $password, $db);
$sql = "select BriCancer from cancer_type";
$re = mysqli_query($con, $sql);
$res_cancer = mysqli_fetch_all($re);
$res = array();
$i = 0;
foreach ($res_cancer as $val_cancer) {
    $cancer = strtolower($val_cancer[0]);
    $sql = "update $cancer set hallmark = 'N/A' where hallmark  = 'unknown'";
    $re = mysqli_query($con, $sql);
}
mysqli_close($con);
?>