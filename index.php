<?PHP

//KMP算法
//计算前缀表
function GetPreFixTable($string){
	$len = 0;//最长公共前后缀的长度
	$stringLen = strlen($string);//需要计算前缀表的字符串的长度
	$prefix = [-1,0];//前缀表初始化
	$i = 1;//从第二个字符开始
	while( $i < $stringLen) {
		if ($string[$len] == $string[$i]) {//如果最后一个字符与当前最长前缀长度的后一个字符相等，则公共前缀长度加一
			$len++;
			$prefix[$i] = $len;//写到前缀表
		}
		else {
			if ( $len > 0 ) {//如果不等
				if ( $string[$i] == $string[$len-1]) {
					$len = $prefix[$len-1];//错一位
					$prefix[$i] = $len;
				}
				else {
					$len = 0;
					$prefix[$i] = 0;
				}
			}
			else {
				$len = 0;
				$prefix[$i] = 0;
			}
		}
		$i++;
	}
	return $prefix;
}

function KmpSearch( $string, $search ) {
	echo "string: $string <br>";
	echo "search: $search <br>";
	$m = strlen($string);
	$n = strlen($search);
	$prefix = GetPreFixTable($search);
	
	echo "<pre>";
	echo "前缀表： <br>";
	print_r($prefix);
	echo "<br>";
	
	$i = $j = 0;
	while( $i < $m) {
		echo "匹配过程： j: $j --- $n ---i: $i <br>";
		if ($j == $n-1 && $string[$i] == $search[$j]){
			echo "KMP匹配的开始标是：" . ($i-$j) . "</br>";
			$j = $prefix[$j];
		}
		if ($string[$i] == $search[$j]) {
			$i++;
			$j++;
			
		}
		else {
			$j = $prefix[$j];
			if ($j == -1) {
				$j++;
				$i++;
			}

		}
	}
}
$string = "ACVABABCABAACCABABCABAAAA";
$param = "ABABCABAA";
KmpSearch($string,$param);
//echo "<pre>";
//var_dump($result);

?>
