<?php
    function build_heap(&$array, $i, $t){
  $tmp_var = $array[$i]->getPriority();
  $j = $i * 2 + 1;

  while ($j <= $t)  {
   if($j < $t)
    if($array[$j]->getPriority() < $array[$j + 1]->getPriority()) {
     $j = $j + 1;
    }
   if($tmp_var < $array[$j]->getPriority()) {
    $array[$i] = $array[$j];
    $i = $j;
    $j = 2 * $i + 1;
   } else {
    $j = $t + 1;
   }
  }
  $array[$i] = $tmp_var;
 }

 function heap_sort(&$array) {
  //This will heapify the array

  $init = (int)floor((count($array) - 1) / 2);

  for($i=$init; $i >= 0; $i--){
   $count = count($array) - 1;
   build_heap($array, $i, $count);
  }

  //swaping of nodes
  for ($i = (count($array) - 1); $i >= 1; $i--)  {
   $tmp_var = $array[0];
   $array [0] = $array [$i];
   $array [$i] = $tmp_var;
   build_heap($array, 0, $i - 1);
  }

 }
 /*
$test = array(3, 4, 6, 7, 1, 2, 9, 1);
heap_sort($test);
var_dump($test);
*/
?>
