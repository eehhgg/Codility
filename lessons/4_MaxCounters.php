<?php

function solution($n, $ops) {
  // initialize
  $lowerLimit = 0;
  $max = 0;
  $counters = array();
  for ($i = 0; $i < $n; $i++) { $counters[$i] = 0; }
  // process operations
  $numOps = count($ops);
  for ($i = 0; $i < $numOps; $i++) {
    $op = $ops[$i];
    if ($op <= $n) {
      $counters[$op-1] = max( $counters[$op-1]+1, $lowerLimit+1 );
      $max = max( $max, $counters[$op-1] );
    } else {
      $lowerLimit = $max;
    }
  }
  // enforce the lower limit on all the counters
  for ($i = 0; $i < $n; $i++) {
    $counters[$i] = max( $counters[$i], $lowerLimit );
  }
  return $counters;
}
