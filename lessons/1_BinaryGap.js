
function getBinaryString(n) {
  var str = '';
  while (n > 0) {
    if (n & 1) { str += '1'; } else { str += '0'; }
    n = n >> 1;
  }
  return str;
}

function solution(n) {
  var str = getBinaryString(n), maxGap = 0, gap = 0, status = 0;
  for (i = 1; i < str.length; i++) {
    // find starting point
    if ( status == 0 ) {
      if ( (str[i-1] == '1') && (str[i] == '0') ) {
        status = 1;
        gap = 1;
      }
      continue;
    }
    // count zeroes in potential gap
    if ( str[i] == '0' ) {
      gap++;
      continue;
    }
    // gap found
    if (gap > maxGap) { maxGap = gap; }
    gap = 0;
    status = 0;
  }
  return maxGap;
}
