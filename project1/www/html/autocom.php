<?php
//ｔｆ，ｈａｌｌｍａｒｋ，ｇｅｎｅ　未改写。
    require_once("dbconfig.php");
    $con = mysqli_connect($host, $usr, $password,$db);
    $val = array_keys($_POST)[0];
    if ($val == 'tf')
    {$sql = "select LongCancer from cancer_type where BriCancer like '%$_POST[$val]%'";}
    elseif($val == 'gene')
    {$sql = "select LongCancer from cancer_type where BriCancer like '%$_POST[$val]%'";}
    elseif($val == 'hallmark')
    {$sql = "select LongCancer from cancer_type where BriCancer like '%$_POST[$val]%'";}
    else
    {$sql = "select LongCancer from cancer_type where BriCancer like '%$_POST[$val]%'";}
    $result = mysqli_query($con, $sql);
    $res = mysqli_fetch_all($result);
    $i = 0;
    $final_res = array();
    foreach($res as $x){
        $final_res[$i] = $x[0];
        $i = $i + 1;
    }
    echo json_encode($final_res);
    mysqli_close($con);
?>