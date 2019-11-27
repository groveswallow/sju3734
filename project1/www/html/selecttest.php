<?php 
require_once("dbconfig.php");
$con = mysqli_connect($host, $usr, $password,$db);
$sql = "show tables";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
echo json_encode($row);
while($row){
echo "<option value='$row[0]'>$row[0]</option>";
$row = mysqli_fetch_assoc($result);
}
?>