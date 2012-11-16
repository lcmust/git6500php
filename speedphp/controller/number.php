<?php
class number extends spController
{
	function show(){
		$num = 3.1415;
		echo "pi原来数字是 $num";
		echo "<br>";
		$num = round($num);
		echo "pi经过四舍五入后，结果是：$num";
	}
}