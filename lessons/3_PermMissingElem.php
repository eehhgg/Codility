<?php

/**
 * Finds the missing element in a permutation.
 * @param $a  A zero-indexed array consisting of N different integers in [1..(N+1)], where N is an integer within the range [0..100,000].
 * @return    The missing integer in the array.
 */
function solution($a) {
  $n = count($a);
  // if we find value V and V <= N, we will mark cell a[V-1] with a minus sign.
  // if V == N + 1, we will not mark any cell.
  for ($i = 0; $i < $n; $i++) {
    $mark = (int) (abs($a[$i]) - 1);
    if ($mark < $n) { $a[$mark] *= -1; }
  }
  // find the missing element
  for ($i = 0; $i < $n; $i++) {
    if ($a[$i] > 0) { return $i + 1; }
  }
  // all the cells were marked, so the missing element is N+1
  return $n + 1;
}
