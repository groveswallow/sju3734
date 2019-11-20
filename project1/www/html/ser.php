<?php
  function sertf($TF,$con){
    $sql = "select * from brca_v1 where tf like '%$TF%'";
    $result = mysqli_query($con, $sql);
    $r_number = mysqli_num_rows($result);
    echo "<h1><span class='glyphicon glyphicon-search' aria-hidden='true' style='font-size：30px;'></span>The Result of Search</h1>";
    echo "<hr>";
    if($r_number == 0){
      echo "<h2>We don not find anything.</h2> ";
    }
    else{
      echo "<div class='table'>
      <p>There are ".$r_number." results about <b>".$TF."</b></p>
      <table class='table table-hover table-bordered'>
        <thead>
          <tr>
            <th>TF</th>
            <th>Gene</th>
            <th>Characteristics</th>
            <th>Regulation_type</th>
            <th>Cancer_hallmark</th>
            <th>Details</th>
          </tr>
        </thead>";
    while($row = mysqli_fetch_assoc($result))
     {
      echo "<tbody>";
      echo "<td><b>".$row['tf']."</b></td>";
      echo "<td>".$row['gene']."</td>";
      // echo "<td>".$row['cancer_name']."</td>";
      echo "<td>".$row['characteristics']."</td>";
      echo "<td>".$row['regulation_type']."</td>";
      echo "<td>".$row['cancer_hallmark']."</td>";
      echo "<td><a id='det'>details.....</a></td>";
      echo "</tbody>";
    }
    echo "</tbody></table></div>";
    }
  }

  function sergen($Gen,$con){
    $sql = "select * from b这是一段测试用的文本，没有实际意义，只是想达到显示效果。rca_v1 where gene like $Gen";
    $result = mysqli_query($con, $sql);
    $r_number = mysqli_num_rows($result);
    echo "<h1><span class='glyphicon glyphicon-search' aria-hidden='true' style='font-size：30px;'></span>The Result of Search</h1>";
    echo "<hr>";
    if($r_number == 0){
      echo "<h2>We don not find anything.</h2> ";
    }
    else{
      echo "<div class='table'>
      <p>There are ".$r_number." results about <b>".$Gen."</b></p>
      <table class='table table-hover table-bordered'>
        <thead>
          <tr>
            <th>TF</th>
            <th>gene</th>
            <th>Characteristics</th>
            <th>Regulation_type</th>
            <th>Cancer_hallmark</th>
            <th>Details</th>
          </tr>
        </thead>";
    while($row = mysqli_fetch_assoc($result))
     {
      echo "<tbody>";
      echo "<td><b>".$row['gene']."</b></td>";
      echo "<td>".$row['tf']."</td>";
      // echo "<td>".$row['cancer_name']."</td>";
      echo "<td>".$row['characteristics']."</td>";
      echo "<td>".$row['regulation_type']."</td>";
      echo "<td>".$row['cancer_hallmark']."</td>";
      echo "<td><a id='det'>details.....</a></td>";
      echo "</tbody>";
    }
    echo "</tbody></table></div>";
    }
  }
  function serpmid($Cancer,$con){
    $sql = "select * from brca_v1 where cancer like $Cancer";
    $result = mysqli_query($con, $sql);
    $r_number = mysqli_num_rows($result);
    echo "<h1><span class='glyphicon glyphicon-search' aria-hidden='true' style='font-size：30px;'></span>The Result of Search</h1>";
    echo "<hr>";
    if($r_number == 0){
      echo "<h2>We don not find anything.</h2> ";
    }
    else{
      echo "<div class='table'>
      <p>There are ".$r_number." results about <b>".$Cancer."</b></p>
      <table class='table table-hover table-bordered'>
        <thead>
          <tr>
            <th>TF</th>
            <th>gene</th>
            <th>Characteristics</th>
            <th>Regulation_type</th>
            <th>Cancer_hallmark</th>
            <th>Details</th>
          </tr>
        </thead>";
    while($row = mysqli_fetch_assoc($result))
     {
      echo "<tbody>";
      // echo "<td><b>".$row['cancer_name']."</b></td>";
      echo "<td>".$row['tf']."</td>";
      echo "<td>".$row['gene']."</td>";
      echo "<td>".$row['characteristics']."</td>";
      echo "<td>".$row['regulation_type']."</td>";
      echo "<td>".$row['cancer_hallmark']."</td>";
      echo "<td><a id='det'>details.....</a></td>";
      echo "</tbody>";
    }
    echo "</tbody></table></div>";
    }
  }
  $host = "localhost";
  $usr = "lcbb3734";
  $password = 3734;
  $db = "lcbb3734";
  $con = mysqli_connect($host, $usr, $password,$db);
  $TF = $_REQUEST['TF'];
  $Gen = $_REQUEST['Gen'];
  $Cancer = $_REQUEST['Cancer'];
  $flag = 0;
  if (!$con){
    echo "<h1>数据库连接失败，请联系管理员：XXXXXXXXXX</h1>";
    $flag = 1;
  }
  else{  
    if($TF){
      sertf($TF,$con);
  }
  elseif($Gen){
    sergen($Gen,$con);
  }
  else {
    serpmid($Cancer,$con);
  }
if($flag == 0){
  echo " <script>
  $(function () {
    $('a#det').on('click', (function () {
      $(this).parent().children('td').eq(0).text();
    }))
  })
</script>";
}
}
  mysqli_close($con);
?>