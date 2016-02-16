<?php

function solution($a) {
  $n = count($a);
  // find the minimal slice of length 2
  $minSum2 = $a[0] + $a[1];
  $minIndex2 = 0;
  for ($i = 1; $i <= $n-2; $i++) {
    $sum = $a[$i] + $a[$i+1];
    if ($sum < $minSum2) {
      $minSum2 = $sum;
      $minIndex2 = $i;
    }
  }
  if ($n == 2) { return $minIndex2; }
  // find the minimal slice of length 3
  $minSum3 = $a[0] + $a[1] + $a[2];
  $minIndex3 = 0;
  for ($i = 1; $i <= $n-3; $i++) {
    $sum = $a[$i] + $a[$i+1] + $a[$i+2];
    if ($sum < $minSum3) {
      $minSum3 = $sum;
      $minIndex3 = $i;
    }
  }
  // return the starting position of the minimal slice
  // minSum2/2 < minSum3/3 === 3*minSum2 < 2*minSum3
  $minSum2 *= 3;
  $minSum3 *= 2;
  if ($minSum2 < $minSum3) { return $minIndex2; }
  if ($minSum2 == $minSum3) { return min($minIndex2, $minIndex3); }
  return $minIndex3;
}
