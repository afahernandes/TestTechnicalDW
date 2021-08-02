<?php 
$kata="tahu3n menj2elang sel1amat ba4ru";
$hasil=urutKata($kata);
echo $hasil;

function urutKata($input){
$hasil="";
$arr=explode(" ",$input);
for ($i = 0; $i < count($arr); $i++) {
		$num[$i] = preg_replace('/[^0-9]/', '', $arr[$i]);  		
			
}

$n = count($num);
        for ($i = 1; $i < $n; $i++) {
            for ($j = $n - 1; $j >= $i; $j--) {
                if($num[$j-1] > $num[$j]) {
                    $tmp = $arr[$j - 1];
                    $arr[$j - 1] = $arr[$j];
                    $arr[$j] = $tmp;
                }
		}
}

$hasil=implode(" ",$arr);
return $hasil;
}	
?>