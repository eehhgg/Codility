
function solution(a, k) {
  k = k % a.length;
  var b = [], start = a.length - k;
  for (i = start; i < a.length; i++) { b.push( a[i] ); }
  for (i = 0; i < start; i++) { b.push( a[i] ); }
  return b;
}
