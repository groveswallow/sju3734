<?php
/*
 * @Author: Tang
 * @Date: 2019-11-25 18:39:06
 * @LastEditors: Tang
 * @LastEditTime: 2020-04-06 21:22:55
 * @Description: 1.未解决用户希望看见所有癌症的结果。
 */
require_once("dbconfig.php");
$con = mysqli_connect($host, $usr, $password, $db);
$sql = "select BriCancer from cancer_type";
$re = mysqli_query($con, $sql);
$res_cancer = mysqli_fetch_all($re);
$res = array();
foreach ($res_cancer as $val_cancer) {
    $cancer = strtolower($val_cancer[0]);
    $res[] = strtoupper($cancer);
}
echo json_encode($res);
mysqli_close($con);
?>
