<?php

function even($item)
{
    return $item%2==0;
}

$arr = [1,2,3,4,5,6,7,8,9];

print_r(array_filter($arr, "even"));
