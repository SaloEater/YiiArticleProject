<?php

function pow2($item)
{
    return $item*$item;
}

$arr = [1,2,3,4,5,6,7,8,9];

print_r(array_map("pow2",$arr));
