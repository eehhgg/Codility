
function solution(a) {
  if (a.length == 1) { return a[0]; }
  a.sort();
  for (i = 0; i <= a.length-3; i += 2) {
    if (a[i] != a[i+1]) { return a[i]; }
  }
  return a[a.length-1];
}
