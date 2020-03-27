<?php
/*
 * @Author: Tang
 * @Date: 2019-11-25 18:39:06
 * @LastEditors: Tang
 * @LastEditTime: 2020-03-27 19:34:35
 * @Description: 1.未解决用户希望看见所有癌症的结果。
 */
require_once("dbconfig.php");
$con = mysqli_connect($host, $usr, $password, $db);
$cancer_type = $_POST['cancer_type'];
$sql = "select tf,gene,characteristics,regulation_type,hallmark,pmid,title from $cancer_type";
$re = mysqli_query($con, $sql);
$res_cancer = mysqli_fetch_all($re);
foreach($res_cancer as $val_cancer){
    $r = array(
        'cancer' => $cancer_type,
        'tf' => $val_cancer[0],
        'gene' => $val_cancer[1],
        'characteristics' => $val_cancer[2],
        'regulation_type' => $val_cancer[3],
        'hallmark' => $val_cancer[4],
        'pmid' => $val_cancer[5],
        'title' => $val_cancer[6]
    );
    $res[] = $r;
}
echo json_encode($res);
mysqli_close($con);
?>
