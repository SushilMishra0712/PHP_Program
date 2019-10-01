<?php
// declare example array to be sorted
$arr1 = array("data","is","not","same","as","of","information","this","is","string");
// sort array and print
print_r(mergeRec($arr1));
// Recrusive mergesort function
function mergeRec($list) {
  // base case
	if(sizeof($list) == 1) { 
        return $list;
    }
	// find middle index
	$middle = sizeof($list) / 2;
	$leftList = mergeRec(array_slice($list, 0, $middle));
	$rightList = mergeRec(array_slice($list, $middle));
	return merge($leftList, $rightList);
}
// merge 2 sorted arrays
function merge($leftList, $rightList) {
	$mergedArr = array();
	// while both arrays are still full
	while(sizeof($rightList) > 0 && sizeof($leftList))
	{
		if($leftList[0] > $rightList[0]) {
			array_push($mergedArr, array_shift($rightList));
		}
		else {
			array_push($mergedArr, array_shift($leftList));
		}
	}
	while(sizeof($rightList) > 0) {
		array_push($mergedArr, array_shift($rightList));
	}
	while(sizeof($leftList) > 0) {
		array_push($mergedArr, array_shift($leftList));
	}
	return $mergedArr;
}
?>