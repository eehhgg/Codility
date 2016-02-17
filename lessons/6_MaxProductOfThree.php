<?php

function solution($a) {
  $max = array_slice($a, 0, 3);
  sort($max);
  $min = array($max[0], $max[1]);
  $n = count($a);
  // find the max 3 and the min 2 values in the array
  for ($i = 3; $i < $n; $i++) {
    $v = $a[$i];
    if ($v > $max[2]) {
      $max[0] = $max[1];
      $max[1] = $max[2];
      $max[2] = $v;
    } elseif ($v > $max[1]) {
      $max[0] = $max[1];
      $max[1] = $v;
    } elseif ($v > $max[0]) {
      $max[0] = $v;
    }
    if ($v < $min[0]) {
      $min[1] = $min[0];
      $min[0] = $v;
    } elseif ($v < $min[1]) {
      $min[1] = $v;
    }
  }
  // return the max product of 3
  $p1 = $max[0] * $max[1] * $max[2];
  $p2 = $min[0] * $min[1] * $max[2];
  return max($p1, $p2);
}
