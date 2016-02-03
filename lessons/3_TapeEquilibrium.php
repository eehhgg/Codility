<?php
function solution($a) {
  // initialize
  $length = count($a);
  $leftSum = $a[0];
  $rightSum = 0;
  for ($i = 1; $i < $length; $i++) { $rightSum += $a[$i]; }
  $minDiff = abs($leftSum - $rightSum);
  // find the minimal difference
  for ($i = 2; $i < $length; $i++) {
    $rightSum -= $a[$i-1];
    $leftSum += $a[$i-1];
    $diff = abs($leftSum - $rightSum);
    if ($diff < $minDiff) { $minDiff = $diff; }
  }
  return $minDiff;
}
