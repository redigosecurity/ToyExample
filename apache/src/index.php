<?php

function add($num1, $num2) {
    $sum = '';
    $carry = 0;
  
    // Pad the shorter number with leading zeros
    $num1 = str_pad($num1, strlen($num2), '0', STR_PAD_LEFT);
    $num2 = str_pad($num2, strlen($num1), '0', STR_PAD_LEFT);
  
    // Loop through the digits of the numbers from right to left
    for ($i = strlen($num1) - 1; $i >= 0; $i--) {
      $digit1 = (int)$num1[$i];
      $digit2 = (int)$num2[$i];
      $digitSum = $digit1 + $digit2 + $carry;
      $carry = 0;
  
      // If the sum is greater than 9, we need to carry over
      if ($digitSum > 9) {
        $digitSum -= 10;
        $carry = 1;
      }
  
      $sum = (string)$digitSum . $sum;
    }
  
    // If there is still a carry left, add it to the result
    if ($carry) {
      $sum = '1' . $sum;
    }
  
    return $sum;
  }

if (isset($_GET['a']) && isset($_GET['b'])) {
    $a = $_GET['a'];
    $b = $_GET['b'];
    $result = add($a,$b);
    echo $result;
} else {
   
}
?>
