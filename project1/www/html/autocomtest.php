<?php 
    $T = 3;
    $P = [2,3];
    $S = 1;
    $res = array(
        'id' => 1,
        'name' => 'Tan',
        'price' => 32,
    );
    $res1 = array(
        'id' => 12,
        'name' => 'Tang',
        'price' => 33,
    );
    $r[] = $res;
    $res2 = array(
        'id' => $T,
        'name' => $P,
        'price' => $S,
    );
    $r[] = $res2;
    $i = 0;
    $r[] = $res1;
    $t= ['t1','a2','b3','c5','h6','i8'];
    echo json_encode($t);
 ?>
