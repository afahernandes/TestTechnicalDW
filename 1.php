<?php 
$password="123Qwer_";
$hs=cekPassword($password);
echo "password : $password ==>"; 
var_dump($hs) ;
echo"<hr>";
if($hs=="true"){
$biodata=biodata();
echo $biodata;
}	

function CekPassword($input){
$hasil=false;
$pattern = "/(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])/";
 $cocok=preg_match($pattern,$input);
if($cocok>0){
	$hasil=true;	
}
return 	$hasil;
}	

function biodata(){
$data="
<br><b>Nama		 : </b> Ahmad Fatoni<br>
<b>Jenis Kelamin : </b> Laki - Laki<br>
<b>Hobby		 : </b> Programmming<br>
<b>Note 		 : </b> - <br>
";

return $data;	
}
?>