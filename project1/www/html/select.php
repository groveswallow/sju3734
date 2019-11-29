<?php 
require_once("dbconfig.php");
$con = mysqli_connect($host, $usr, $password,$db);
$sql = ""; //1.待完成，用表名解决
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
echo json_encode($row); //2.待完成，结果是字典，改成数组。
while($row){
echo "<option value='$row[0]'>$row[0]</option>";
$row = mysqli_fetch_assoc($result);
}
?>