<?php 
require_once("dbconfig.php");
$con = mysqli_connect($host, $usr, $password,$db);
$sql = "select regulation_type from regulation_type;"; 
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$res = array();
$i = 0;
while($row){
$res[$i] = $row['regulation_type'];
// echo "<option value='$res'>$res</option>";
$row = mysqli_fetch_assoc($result);
$i = $i + 1;
}
echo json_encode([[1,2],[3,4]]);
?>
