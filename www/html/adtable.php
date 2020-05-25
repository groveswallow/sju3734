<?php
/*
 * @Author: Tang
 * @Date: 2020-02-13 19:47:53
 * @LastEditors: Tang
 * @LastEditTime: 2020-05-25 20:21:23
 * @Description: 由于characteristics以及regulation_type均是多选，由此导致的双循环太费时间了，考虑单选。目前先以多选进解决。
 */
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
            for ($y = 0; $y < count($var); $y = $y + 1) {
                $res[$i] = trim($var[$y]);
                $i = $i + 1;
            }
        }
        $row = mysqli_fetch_assoc($result);
    }
    return $res;
}
require_once("dbconfig.php");
$con = mysqli_connect($host, $usr, $password, $db);
$tf = $_POST['tf'];
$cancer_type = $_POST['cancer_type'];
$gene = $_POST['gene'];
$hallmark = $_POST['hallmark'];
$regulation_type = $_POST['regulation_type'];
$characteristics = $_POST['characteristics'];
// $tf = "TP53";
// $cancer_type = "Breast invasive carcinoma";
// $gene = "";
// $hallmark = "";
// $regulation_type = "";
// $characteristics = "regulate";
$res = array();
$sql = "select BriCancer from cancer_type where LongCancer like '%$cancer_type%'";
$re = mysqli_query($con, $sql);
$cancer = mysqli_fetch_assoc($re);
$cancer = strtolower($cancer['BriCancer']);
$sql = "select tf_name from tfname where tf_class like '%$tf%'";
$tf_array = getdata($sql, $con, 'tf_name');
foreach ($tf_array as $tf) {
    $sql = "select tf,gene,characteristics,regulation_type,hallmark,pmid,title from $cancer where tf like '%$tf%' and hallmark like '%$hallmark%'
            and gene like '%$gene%' and regulation_type like '%$regulation_type%' and characteristics like '%$characteristics%'";
    $re = mysqli_query($con, $sql);
    $res_tf = mysqli_fetch_all($re);
    foreach ($res_tf as $val_tf) {
        $r = array(
            'cancer' => strtoupper($cancer),
            'tf' => $tf,
            'gene' => $val_tf[1],
            'characteristics' => $val_tf[2],
            'regulation_type' => $val_tf[3],
            'hallmark' => $val_tf[4],
            'pmid' => $val_tf[5],
            'title' => $val_tf[6]
        );
        $res[] = $r;
    }
}
mysqli_close($con);
if (count($res) == 0) {
    echo null;
} else {
    echo json_encode($res);
}
