<?php

function solution($s, $p, $q) {
  // define nucleotides from lowest to highest impact factor
  $chars = array( 1 => 'A', 2 => 'C', 3 => 'G', 4 => 'T' );
  // calculate char sums
  $charSums = getCharSums($chars, $s);
  // answer queries
  $answers = array();
  $m = count($p);
  for ($i = 0; $i < $m; $i++) {
    $answers[$i] = answerQuery($chars, $charSums, $p[$i], $q[$i]);
  }
  return $answers;
}

function getCharSums($chars, $s) {
  // initialize
  $charSums = array();
  foreach ($chars as $char) {
    $charSums[$char] = array();
    $charSums[$char][0] = 0;
  }
  // calculate char sums
  $char = $s[0];
  $charSums[$char][0] = 1;
  $n = strlen($s);
  for ($i = 1; $i < $n; $i++) {
    foreach ($chars as $char) {
      $charSums[$char][$i] = $charSums[$char][$i-1];
    }
    $char = $s[$i];
    $charSums[$char][$i] = $charSums[$char][$i-1] + 1;
  }
  return $charSums;
}

function answerQuery($chars, $charSums, $a, $b) {
  // find the nucleotide with the lowest impact factor within the interval [a,b]
  foreach ($chars as $impact => $char) {
    $prevSum = ( $a == 0 ? 0 : $charSums[$char][$a-1] );
    if ( $charSums[$char][$b] > $prevSum ) { return $impact; }
  }
}
