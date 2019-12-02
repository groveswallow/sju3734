<?php 
require_once("dbconfig.php");
$con = mysqli_connect($host, $usr, $password,$db);
$sql = "select characteristics from characteristics";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
while($row){
$res = $row['characteristics'];
echo "<option value='$res'>$res</option>";
$row = mysqli_fetch_assoc($result);
}
?>