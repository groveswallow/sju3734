<?php
/*
 * @Author: Tang
 * @Date: 2020-02-13 19:47:53
 * @LastEditors: Tang
 * @LastEditTime: 2020-02-18 20:03:22
 * @Description: 由于characteristics以及regulation_type均是多选，由此导致的双循环太费时间了，考虑单选。目前先以多选进解决。
 */
require_once("dbconfig.php");
$con = mysqli_connect($host, $usr, $password, $db);
$tf = $_POST['tf'];
$cancer_type = $_POST['cancer_type'];
$gene = $_POST['gene'];
$hallmark = $_POST['hallmark'];
$regulation_type = $_POST['regulation_type'];
$characteristics = $_POST['characteristics'];
// $tf = 'BRCA1';
// $cancer_type = 'Breast invasive carcinoma';
// $gene = '';
// $hallmark = 'tumorigenesis';
// $regulation_type = ['negative','postive'];
// $characteristics = 'regulate';
if ($characteristics == null) {
    $characteristics = '';
}
if ($regulation_type == null) {
    $regulation_type = '';
}
$sql = "select BriCancer from cancer_type where LongCancer like '%$cancer_type%'";
$re = mysqli_query($con, $sql);
$res_cancer = mysqli_fetch_all($re);
if ($res_cancer == null) {
    echo null;
} 
elseif (gettype($characteristics) == 'array' and gettype($regulation_type) != 'array') {
    foreach ($res_cancer as $val_cancer) {
        $cancer = strtolower($val_cancer[0]);
        foreach ($characteristics as $char) {
            $sql = "select tf,gene,characteristics,regulation_type,hallmark from $cancer where tf like '%$tf%' and hallmark like '%$hallmark%'
            and gene like '%$gene%' and regulation_type like '%$regulation_type%' and characteristics like '%$char%'";
            $re = mysqli_query($con, $sql);
            $res_tf = mysqli_fetch_all($re);
            if ($res_tf == null){
                continue;
            }
            foreach ($res_tf as $val_tf) {
                $r = array(
                    'cancer' => $val_cancer[0],
                    'tf' => $tf,
                    'gene' => $val_tf[1],
                    'characteristics' => $val_tf[2],
                    'regulation_type' => $val_tf[3],
                    'hallmark' => $val_tf[4],
                );
                $res[] = $r;
            }
        }
    }
    echo json_encode($res);
} 
elseif (gettype($characteristics) != 'array' and gettype($regulation_type) == 'array') {
    foreach ($res_cancer as $val_cancer) {
        $cancer = strtolower($val_cancer[0]);
        foreach ($regulation_type as $regu) {
            $sql = "select tf,gene,characteristics,regulation_type,hallmark from $cancer where tf like '%$tf%' and hallmark like '%$hallmark%'
            and gene like '%$gene%' and regulation_type like '%$regu%' and characteristics like '%$characteristics%'";
            $re = mysqli_query($con, $sql);
            $res_tf = mysqli_fetch_all($re);
            if ($res_tf == null){
                continue;
            }
            foreach ($res_tf as $val_tf) {
                $r = array(
                    'cancer' => $val_cancer[0],
                    'tf' => $tf,
                    'gene' => $val_tf[1],
                    'characteristics' => $val_tf[2],
                    'regulation_type' => $val_tf[3],
                    'hallmark' => $val_tf[4],
                );
                $res[] = $r;
            }
        }
    }
    echo json_encode($res);
} 
elseif (gettype($characteristics) == 'array' and gettype($regulation_type) == 'array') {
    foreach ($res_cancer as $val_cancer) {
        $cancer = strtolower($val_cancer[0]);
        foreach ($regulation_type as $regu) {
            foreach ($characteristics as $char) {
                $sql = "select tf,gene,characteristics,regulation_type,hallmark from $cancer where tf like '%$tf%' and hallmark like '%$hallmark%'
                and gene like '%$gene%' and regulation_type like '%$regu%' and characteristics like '%$char%'";
                $re = mysqli_query($con, $sql);
                $res_tf = mysqli_fetch_all($re);
                if ($res_tf == null){
                    continue;
                }
                foreach ($res_tf as $val_tf) {
                    $r = array(
                        'cancer' => $val_cancer[0],
                        'tf' => $tf,
                        'gene' => $val_tf[1],
                        'characteristics' => $val_tf[2],
                        'regulation_type' => $val_tf[3],
                        'hallmark' => $val_tf[4],
                    );
                }
                $res[] = $r;
            }
        }
    }
    echo json_encode($res);
} 
else {
    foreach ($res_cancer as $val_cancer) {
        $cancer = strtolower($val_cancer[0]);
        $sql = "select tf,gene,characteristics,regulation_type,hallmark from $cancer where tf like '%$tf%' and hallmark like '%$hallmark%'
        and gene like '%$gene%' and regulation_type like '%$regulation_type%' and characteristics like '%$characteristics%'";
        $re = mysqli_query($con, $sql);
        $res_tf = mysqli_fetch_all($re);
        foreach ($res_tf as $val_tf) {
            $r = array(
                'cancer' => $val_cancer[0],
                'tf' => $tf,
                'gene' => $val_tf[1],
                'characteristics' => $val_tf[2],
                'regulation_type' => $val_tf[3],
                'hallmark' => $val_tf[4],
            );
            $res[] = $r;
        }
    }
    echo json_encode($res);
}
mysqli_close($con);
