<?php 
require_once("dbconfig.php");
$con = mysqli_connect($host, $usr, $password,$db);
$sql = "select regulation_type from regulation_type;"; 
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
echo json_encode($row); 
while($row){
    $res = $row['regulation_type'];
    echo "<option value='$res'>$res</option>";
    $row = mysqli_fetch_assoc($result);
}
