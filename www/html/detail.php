<?php 
/*
 * @Author: Tang
 * @Date: 2020-02-07 11:49:12
 * @LastEditors: Tang
 * @LastEditTime: 2020-04-21 20:18:36
 * @Description: 
 */
require_once('dbconfig.php');
$con = mysqli_connect($host, $usr, $password, $db);
$tf = $_POST['tf'];
$cancer = strtolower($_POST['cancer_type']);
$gene = strtolower($_POST['gene']);
// $tf = 'p53';
// $cancer = 'brca';
// $gene = 'gadd45a';
$sql = "select * from $cancer where tf like '%$tf%' and gene like '%$gene%'";
$re = mysqli_query($con, $sql);
$res = mysqli_fetch_all($re);
$pmid = $res[0][0];
$characteristics = $res[0][2];
$gene = $res[0][3];
$regulation_type = $res[0][4];
$cancer_hallmark = $res[0][5];
$original_text = $res[0][6];
$title = $res[0][7];
$searchid = "";
$flag = 0;
$f = fopen('/home/tang/sju3734/project1/www/html/lib/newpy/TissgDB_basic_uniq.txt','r');
while($s = fgets($f)){
    $str = nl2br($s);
    $ay = explode("\t",$str);
    if($ay[0] == $gene){
        $searchid = $ay[1];
        $flag = 1;
    break;
    }
}
$sql = "select LongCancer from cancer_type where BriCancer like '%$cancer%'";
$re = mysqli_query($con, $sql);
$res = mysqli_fetch_all($re);
$LongCancer = $res[0][0];
$r = array(
    'pmid' => $pmid,
    'characteristics' => $characteristics,
    'gene' => $gene,
    'regulation_type' => $regulation_type,
    'hallmark' => $cancer_hallmark,
    'title' => $title,
    'original_text' => $original_text,
    'searchid' => $searchid,
    'longcancer' => $LongCancer
);
echo json_encode($r);
?>