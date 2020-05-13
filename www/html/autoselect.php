<?php
/*
 * @Author: Tang
 * @Date: 2020-04-29 00:52:32
 * @LastEditors: Tang
 * @LastEditTime: 2020-04-29 09:53:58
 * @Description: 
 */
require_once("dbconfig.php");
// $tf = $_POST['tf'];
// $cancer = $_POST['cancer'];
$con = mysqli_connect($host, $usr, $password, $db);
$sql = "select characteristics from characteristics";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$res = array();
$fin_res = array();
$i = 0;
while ($row) {
    $res[$i] = $row['characteristics'];
    $row = mysqli_fetch_assoc($result);
    $i = $i + 1;
}
$fin_res[0] = $res;
$sql = "select regulation_type from regulation_type;";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$res = array();
$i = 0;
while ($row) {
    $res[$i] = $row['regulation_type'];
    $row = mysqli_fetch_assoc($result);
    $i = $i + 1;
}
$fin_res[1] = $res;
echo json_encode($fin_res);
?>