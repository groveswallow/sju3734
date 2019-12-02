<?php 
    require_once("dbconfig.php");
    $con = mysqli_connect($host, $usr, $password,$db);
    $cancer_type = $_POST['cancer_type'];
    $tf = $_POST['tf'];
    $gene = $_POST['gene'];
    $hallmarl = $_POST['hallmark'];
    if ($cancer_type != null){
        $sql = "select LongCancer from cancer_type where BriCancer like '%$cancer_type%'";
    }
    elseif($tf != null){
        $sql = "select LongCancer from cancer_type where BriCancer like '%$cancer_type%'";
    }
    elseif($gene != null){
        $sql = "select LongCancer from cancer_type where BriCancer like '%$cancer_type%'";
    }
    else{
        $sql = "select hallmark from hallmark where hallmarrk like '%$hallmark%'";
    }
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
