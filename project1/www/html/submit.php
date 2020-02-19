<?php
/*
 * @Author: Tang
 * @Date: 2020-02-19 18:06:59
 * @LastEditors: Tang
 * @LastEditTime: 2020-02-19 23:51:20
 * @Description: 
 */
function getDirSize($dir) 
{  
    $handle = opendir($dir); 
    $sizeResult = 0;
    while (false!==($FolderOrFile = readdir($handle))) 
    {  
        if($FolderOrFile != "." && $FolderOrFile != "..")  
        {  
            if(is_dir("$dir/$FolderOrFile")) 
            {  
                $sizeResult += getDirSize("$dir/$FolderOrFile");  
            } 
            else 
            {  
                $sizeResult += filesize("$dir/$FolderOrFile");  
            } 
        }     
    } 
    closedir($handle); 
    return $sizeResult; 
} 
function trans_byte($byte)
{
    $KB = 1024;
    $MB = 1024 * $KB;
    $GB = 1024 * $MB;
    $TB = 1024 * $GB;
    if ($byte < $KB) {
        return $byte . "B";
    } elseif ($byte < $MB) {
        return round($byte / $KB, 2) . "KB";
    } elseif ($byte < $GB) {
        return round($byte / $MB, 2) . "MB";
    } elseif ($byte < $TB) {
        return round($byte / $GB, 2) . "GB";
    } else {
        return round($byte / $TB, 2) . "TB";
    }
}
// $pmid = 1;
// $tf = 1;
// $cancer = 1;
// $gene = 1;
// $hallmark = 1;
// $regulation_type = 1;
// $email = 1;
$pmid = $_POST['pmid'];
$tf = $_POST['tf'];
$cancer = $_POST['cancer'];
$gene = $_POST['gene'];
$hallmark = $_POST['hallmark'];
$regulation_type = $_POST['regulation_type'];
$email = $_POST['email'];
$ti = date('Y-m-d-H:i:s');
$txt = "
pmid : $pmid\n
tf : $tf\n
cancer : $cancer\n
gene : $gene\n
hallmark : $hallmark\n
regulation_type : $regulation_type\n
email : $email\n
time : $ti";
if (getDirSize('/home/tan/sju3734/project1/www/html/Submit') < 1024*1024*1024){
    $f = fopen("/home/tan/sju3734/project1/www/html/Submit/$ti.txt",'w');
    fwrite($f,$txt);
    fclose($f);
    echo 2;
}
else{
    echo null;
}

?>