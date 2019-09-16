
<!--author:Tang-->
<!--Last date:2019.9.2-->
<!--verison:1.0-->
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>搜索结果</title>
    <link href="./bs/css/bootstrap.css" rel="stylesheet">
      <script src="./bs/js/bootstrap.js"></script>
      <script src="./bs/js/jquery.min.js"></script>
    <script src="./bs/js/holder.js"></script>
  </head>
  <body>
  <?php
        $s=$_POST["ser"];
        if (empty($_POST["ser"])){
          echo "<H1>you don't input anything</H1>";}
        else{
        echo gettype($_POST["ser"]);
        // exec("python3 /home/tan/sju3734/project1/www/html/lib/seek.py $s",$out,$status);
        // echo $out[0].$out[1];  
        // echo $status;
        }
        ?>
    </body>
    </html>