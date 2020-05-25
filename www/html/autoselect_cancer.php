<?php
/*
 * @Author: Tang
 * @Date: 2020-04-29 00:52:32
 * @LastEditors: Tang
 * @LastEditTime: 2020-05-25 12:41:54
 * @Description: 
 */
require_once("dbconfig.php");
// $tf = $_POST['tf'];
// $cancer = $_POST['cancer'];
$con = mysqli_connect($host, $usr, $password, $db);
$sql = "select LongCancer from cancer_type";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$res = array();
$fin_res = array();
$i = 0;
while ($row) {
    $res[$i] = $row['LongCancer'];
    $row = mysqli_fetch_assoc($result);
    $i = $i + 1;
}
$fin_res[0] = $res;
echo json_encode($fin_res);
?>