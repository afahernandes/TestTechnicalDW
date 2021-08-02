 
 <?php 
 	$idc=$_GET["kd"];
	$sql="select * from `$tbcourse` where `id`='$idc'";
	$d=getField($conn,$sql);
				$id=$d["id"];
				$name=$d["name"];
				$id_author=$d["id_author"];
				$duration=$d["duration"];
				$description=$d["description"];
				$thumbnail=$d["thumbnail"];
				$thumbnail0=$d["thumbnail"];
 ?>
 
 
 <div class="hero-unit">
 <div class="row">
	<div class="span3">
       <img src="gambar/<?php echo $thumbnail;?>"	style="width:100%;height:300px;">
        
	 
	 </div>

	  <div class="span6">
               
		  <h1><?php echo $name;?></h1>
            <p><?php echo $description;?></p>
			
			<h3>Lihat Data Content </h3>
<table class="table table-bordered table-hover" style="font-size:13px">
  <tr bgcolor="#cccccc">
    <th width="3%">No</td>
	<th width="15%">ID Content</td>
    <th width="15%">Nama Content</td>
    <th width="15%">Video Link</td>
    <th width="15%">Type</td>
</tr>
  
  
<?php  
  $sql="select * from `$tbcontent` where id_course='$idc' order by `id` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
$no=1;
			$arr=getData($conn,$sql);
			foreach($arr as $d) {						
				$id=$d["id"];
				$name=$d["name"];
				$video_link=$d["video_link"];
				$type=$d["type"];
				
				
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$id</td>
				<td>$name</td>
				<td>$video_link</td>
				<td>$type</td>
			
				
				</tr>";
				
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data Content belum tersedia...</blink></td></tr>";}
?>
</table>
      </div>    
	</div>  
	  
</div>