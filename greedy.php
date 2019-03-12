<?PHP


//贪心算法
//找零问题，优先最大面额的纸币
function Greedy($money, $arr) {
	$moncount = [];
	$i = 0;
	foreach($arr as $k=>$v) {
		while($money >= $v) {
			$money -= $v;
			$i++;
		}
		$moncount["$v"] = $i;
		$i = 0;
	}
	return $moncount;
}

//贪心算法
function Greedy2($money, $arr) {
	$base = 0;
	$moncount = [];
	foreach($arr as $k=>$v) {
		$base = $money / $v;
		if ($money > 0) {
			$money = $money % $v;
		}
		$moncount["$v"] = $base;
	}
	
	return $moncount;
}
//纸币面额数组
$arr = [100,50,20,10,5,1,0.5,0.1];
//金额
$money = 2333333333;

$result = Greedy($money, $arr);
echo "<pre>";
print_r($result);
echo "<br>";

$result2 = Greedy2($money, $arr);
echo "<pre>";
print_r($result2);
?>