<!--author:Tang-->
<!--Last date:2019.9.2-->
<!--verison:1.0-->
<!DOCTYPE html> 
<html lang="zh-CN">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>搜索结果</title>
  <link href="../bs/css/bootstrap.css" rel="stylesheet">
  <script src="../bs/js/jquery.min.js"></script>
  <script src="../bs/js/bootstrap.js"></script>
  <script src="../bs/js/holder.js"></script>
</head>
<style>
  .demo {
    display: inline-block;
    *display: inline;
    *zoom: 1;
    overflow: hidden;
    -ms-text-overflow: ellipsis;
    text-overflow: ellipsis;
  }

  .demo:hover {
    height: auto;
    word-break: break-all;
    white-space: pre-wrap;
    text-decoration: none;
  }
  .center {
    position: fixed;
    top: 50%;
    left: 50%;
    background-color: #65;
    width: 95%;
    height: 95%;
    -webkit-transform: translateX(-50%) translateY(-50%);
  }
</style>

<body>
<script src="../bs/js/jquery.min.js"></script>
<script src="../bs/js/bootstrap.js"></script>
<script src="../bs/js/holder.js"></script>
<?php   header("Content-type: text/html; charset=utf-8");
        // phpinfo();
        $s=$_POST["ser"];
        print($s);
        if (empty($s)){
          echo "<H1>you don't input anything</H1>";}
        elseif (preg_match('.[^a-zA-Z0-9].',$s)==1) {
          print("<H1>error,your input including invalidd symbol!Please input again!</H1>");
        }
        else 
          { exec("python3 /home/tan/sju3734/project1/www/html/lib/seek.py $s",$out,$return);};
        if ($out[0]=='0' or $out==null)
        {  
          echo '<h1>we don\'t find the data</h1>'; 
          echo $out;      
          }
        else{?>
        <div class="center"style="overflow: scroll" >
                <div class="table">
                  <table class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th>PMID</th>
                        <th>TF</th>
                        <th>characteristics</th>
                        <th>gene</th>
                        <th>regulation_type</th>
                        <th>cancer_hallmark</th>
                        <th>original_text</th>
                        <th>title</th>
                      </tr>
                    </thead>                        
                    <?php $p=1;
                    foreach($out as $val){ ?>
                       <?php  if( $p==1){?>
                          <tbody><td><?php echo $val;?></td>    
                       <?php $p=$p+1;}
                        elseif ($p==8) { $p=1;?> 
                        <td><?php echo $val;?></td></tbody>
                        <?php }
                        else { ?>  
                         <td><?php echo $val;?></td>
                        <?php $p=$p+1;};?>
                    <?php }?>                 
                 </table>
                </div>
                </div> 
          <?php };
        ?>
</body>
</html>