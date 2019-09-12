<html>
<body>
<?php //改写成python
   $user="*"   //对应等级3 游客
   $password="*"
   $leve=3
function verify_usr(){
  global $user,$password,$leve;
  if (isset($_COOKIE["user"])){
  $user=$_COOKIE["user"];   //查询数据库相应权限 以及 数据库中是否对应用户及密码
  $password=$_COOKIE["password"];
  $leve=$_COOKIE["level"];
  }
  $con=mysql_connect("lcbb3734",$user,$password)
  if(!$con){
    $error=die('Could not connect:'.mysqlerror());
    echo "<h1>Please email xxxx@xxx.com to tell us this problem,we will fix it as soon !
    <br>
    error is : $error !</h1>";
  }

  mysql_close($con)
  }
  verify_usr();


?>

</body>
</html>
