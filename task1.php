<?php
/* 1-e задание */
function fibonachiNum() {
    $a = 0;
    $b = 1;
    echo $a.' ';
    echo $b.' ';
    for ($i = 3;$i<=64;$i++) {
        echo(($a+$b).' ');
        $c = $b;
       	$b = $a + $b;
       	$a = $c;
    }
}
fibonachiNum();
