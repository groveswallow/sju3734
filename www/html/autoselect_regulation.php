<?php
/*
 * @Author: Tang
 * @Date: 2020-04-29 00:52:32
 * @LastEditors: Tang
 * @LastEditTime: 2020-05-25 18:54:36
 * @Description: 
 */
//以后可以尝试解决分号问题。
function unique($arr)
{
    $arr = array_values(array_unique($arr));
    $len = count($arr);
    for ($x = 0; $x < $len - 1; $x++) {
        for ($y = $x + 1; $y < $len; $y++) {
            if ($arr[$x] == '') {
                break;
            }
            if (stristr("N/A", $arr[$x])) {
                $arr[$x] = '';
                break;
            }
            if ($arr[$y] == '') {
                continue;
            }
            if (stristr($arr[$x], $arr[$y])) {
                $arr[$y] = '';
            }
            if (stristr($arr[$y], $arr[$x])) {
                $arr[$x] = '';
            }
        }
    }
    if (stristr("N/A", $arr[$len - 1])) {
        $arr[$len - 1] = '';
    }
    $arr = array_values(array_filter($arr));
    return $arr;
}

function getdata($sql, $con, $key)
{
    $i = 0;
    $res = array();
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    while ($row) {
        $var = explode(";", $row[$key]);
        if (count($var) == 1) {
            $res[$i] = $row[$key];
            $i = $i + 1;
        } else {
            for($y = 0;$y < count($var);$y = $y + 1) {
                $res[$i] = trim($var[$y]);
                $i = $i + 1;
            }
        }
        $row = mysqli_fetch_assoc($result);
    }
    return $res;
}
require_once("dbconfig.php");
$tf = $_POST['tf'];
$cancer = $_POST['cancer']; //所有的数据来自33个以cancer名字命名的数据表
$characteristics = $_POST['characteristics'];
$con = mysqli_connect($host, $usr, $password, $db);
$fin_res = array(); //最终返回给前端的结果，包含两个列表，一个是characteristics,一个是regulation_type。
$fin_res[0] = [];
$sql = "select BriCancer from cancer_type where LongCancer like '%$cancer%'";
$re = mysqli_query($con, $sql);
$res_cancer = mysqli_fetch_assoc($re);
$cancer = strtolower($res_cancer['BriCancer']); //取得相应cancer的表名
$sql = "select tf_name from tfname where tf_class like '%$tf%'";
$tf_array = getdata($sql, $con, 'tf_name');
foreach ($tf_array as $tf) {
    $sql = "select regulation_type from $cancer where tf like '$tf' and characteristics like '%$characteristics%'"; //从表中取得数据
    $a1 = getdata($sql, $con, 'regulation_type');
    if(count($a1) == 0){
        continue;
    }
    $a1 = unique($a1);
    $fin_res[0] = array_merge($fin_res[0],$a1);
}
if (count($fin_res[0]) == 0) {
    echo null;
} else {
    $fin_res[0] = unique($fin_res[0]);
    echo json_encode($fin_res); //返回两个列表的数据。
}
