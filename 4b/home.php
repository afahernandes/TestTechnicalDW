<!-- Example row of columns -->
      <div class="row">
        
<?php  
  $sql="select * from `$tbcourse` order by `id` asc";
  $arr=getData($conn,$sql);
	foreach($arr as $d) {  
				$id=$d["id"];
				$name=$d["name"];
				$thumbnail=$d["thumbnail"];
				$id_author=$d["id_author"];
				
				$sql2="select * from `$tbauthor` where `id`='$id_author'";
				$d2=getField($conn,$sql2);
				$nama_author=$d2["name"];
				
				$duration=$d["duration"];
				$description=$d["description"];
	?>
		
		<div class="span3">
          <h2 style="color:#ffffff"><?php echo $name;?></h2>
		  <img src="gambar/<?php echo $thumbnail;?>"	style="width:100%;height:300px;">
           <p align="right" style="color:#fc8c03"> Author : <?php echo $nama_author;?></p>
           <p style="color:#ffffff"><?php echo $description;?></p>
          <p><a class="btn btn-warning" href="?mnu=detail&kd=<?php echo $id;?>">View details &raquo;</a></p>
        </div>
			<?php }?>  
	  
	  </div>
