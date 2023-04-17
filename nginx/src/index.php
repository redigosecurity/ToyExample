<?php
function add($num1, $num2) {
    while ($num2 != 0) {
      $carry = $num1 & $num2; // calculate the carry
      $num1 = $num1 ^ $num2; // calculate the sum without carry
      $num2 = $carry << 1; // shift the carry to the left
    }
    return $num1;
  }
  


if (isset($_GET['a']) && isset($_GET['b'])) {
    $a = intval($_GET['a']);
    $b = intval($_GET['b']);
    $result = add($a, $b);
    echo $result;
} else {

}
