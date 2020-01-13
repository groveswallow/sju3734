<?php
/*
 * @Author: Tang
 * @Date: 2019-11-25 18:39:06
 * @LastEditors  : Tang
 * @LastEditTime : 2020-01-02 18:15:04
 * @Description: 1.未解决用户希望看见所有癌症的结果。
 */
require_once("dbconfig.php");
$con = mysqli_connect($host, $usr, $password, $db);
// $tf = $_POST['tf'];
// $cancer_type = $_POST['cancer_type'];
$tf = 'p53';
$cancer_type = 'Breast invasive carcinoma';
$sql = "select BriCancer from cancer_type where LongCancer like '%$cancer_type%'";
$re = mysqli_query($con, $sql);
$res_cancer = mysqli_fetch_all($re);
if ($res_cancer == null) {
    echo 'did not find the cancer_type in our database,we will slove it as soon as we can\n';
} 
else {
    foreach ($res_cancer as $val_cancer) {
        $cancer = strtolower($val_cancer[0]);
        $sql = "select tf,gene,characteristics,regulation_type,hallmark from $cancer where tf like '%$tf%'";
        $re = mysqli_query($con, $sql);
        $res_tf = mysqli_fetch_all($re);
        foreach($res_tf as $val_tf){
            $r = array(
                'cancer' => $val_cancer[0],
                'tf' => $val_tf[0],
                'gene' => $val_tf[1],
                'characteristics' => $val_tf[2],
                'regulation_type' => $val_tf[3],
                'hallmark' => $val_tf[4],
            );
            $res[] = $r;
        }
        echo json_encode($res);
    }
}
mysqli_close($con);
