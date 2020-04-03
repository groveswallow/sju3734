<?php 
/*
 * @Author: Tang
 * @Date: 2020-03-31 11:12:29
 * @LastEditors: Tang
 * @LastEditTime: 2020-03-31 12:07:03
 * @Description: 
 */
$f = fopen('/home/tang/sju3734/project1/www/html/lib/newpy/TissgDB_basic_uniq.txt','r');
$searchid = "";
$gene = "GADD45A";
while($s = fgets($f)){
    $str = nl2br($s);
    $ay = explode("\t",$str);
    if($ay[0] == $gene){
        $searchid = $ay[1];
        $flag = 1;
    break;
    }
}
echo $searchid; 
fclose($f);
