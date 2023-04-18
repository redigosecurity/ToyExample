<?php
function add1($num1, $num2) {
    while ($num2 != 0) {
      $carry = $num1 & $num2; // calculate the carry
      $num1 = $num1 ^ $num2; // calculate the sum without carry
      $num2 = $carry << 1; // shift the carry to the left
    }
    return $num1;
  }

  function add2($num1, $num2) {
    if ($num2 == 0) {
      return $num1;
    } else {
      $sum = $num1 ^ $num2; // calculate the sum without carry
      $carry = ($num1 & $num2) << 1; // calculate the carry and shift it to the left
      return add2($sum, $carry); // recursively add the sum and the carry
    }
  }
  
  function add3($num1, $num2) {
    if ($num2 == 0) {
      return $num1;
    } else {
      $sum = $num1 ^ $num2; // calculate the sum without carry
      $carry = ($num1 & $num2) << 1; // calculate the carry and shift it to the left
      return add3($sum, $carry); // recursively add the sum and the carry
    }
  }
  


if (isset($_GET['a']) && isset($_GET['b'])) {
    $a = intval($_GET['a']);
    $b = intval($_GET['b']);
    $functions = array('add1', 'add2', 'add3');
    $selectedFunction = $functions[array_rand($functions)];
    $result = $selectedFunction($a, $b);
    echo $result;
} else {

}
