<?php 
$nilai=9;
$hasil=cetak_gambar($nilai);
echo $hasil;

function cetak_gambar($input){
$hasil="";
if($input%2 == 0){
$hasil="Input harus bilangan ganjil";	
}else{	
$gab="";

	for ($i = 1; $i <= $input; $i++) {
		for ($j = 1; $j <= $input; $j++){ 
			if($i%2!=0){
				$gab.= " * ";		
			}else{
				if($j==1 || $j== $input){
				//	echo $j;
					$gab.= " * ";		
				
				}else{
					$gab.= " = ";		
				}
			}			
		}
		$gab.="<br>";
	}
$hasil=$gab;
}
return $hasil;
}	
?>