<?php
function comp($prev, $item)
{
    return $prev*$item;
}

$arr = [1,2,3,4,5,6,7,8,9];

print_r(array_reduce($arr, "comp", 1));