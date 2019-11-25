/*
 * @Author: Tang
 * @Date: 2019-11-25 11:20:19
 * @LastEditors: Tang
 * @LastEditTime: 2019-11-25 11:25:12
 * @Description: 
 */
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
    $t= array();
    echo json_encode($r);
 ?>
