
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
        if (empty($s)){
          echo "<H1>you don't input anything</H1>";}
        else
        {
        // echo gettype($_POST["ser"]);
        exec("python3 /home/tan/sju3734/project1/www/html/lib/seek.py $s",$out,$status);
        echo '<h3>搜索结果如下：</h3>';
        echo '<h2>'.$out[0].'</h2>';
        echo '<h2>'.$out[1].'</h2>'; 
        echo '<h2>'.$out[2].'</h2>'; 
        //echo $status;
        }
        ?>
    </body>
    </html>