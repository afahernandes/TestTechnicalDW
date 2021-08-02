<?php
$pro="simpan";

if($_GET["pro"]=="ubah"){
	$id=$_GET["kode"];
	$sql="select * from `$tbcontent` where `id`='$id'";
	$d=getField($conn,$sql);
				$id=$d["id"];
				$id0=$d["id"];
				$name=$d["name"];
				$video_link=$d["video_link"];
				$type=$d["type"];
				$id_course=$d["id_course"];
				$pro="ubah";		
}
?>
<div class="hero-unit">
  <h3>Masukan Data content</h3>

<form action="" method="post" enctype="multipart/form-data">
<table class="table table-striped table-bordered table-hover">
<tr>
<td width="20%"><label for="name">Nama Content</label>
<td width="1%">:<td width="349"><input required name="name" class="span3" type="text" id="name" value="<?php echo $name;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="video_link">Video Link</label>
<td>:<td><input name="video_link" required type="text" class="span3"  id="video_link" value="<?php echo $video_link;?>" size="20" /></td>
</tr>


<tr>
<td height="24"><label for="type">Type</label>
<td>:<td><input name="type" required type="text" class="span3" id="type" value="<?php echo $type;?>" size="15" />
</td>
</tr>
 
<tr>
<td height="24"><label for="id_course">Pilih Course</label>
<td>:<td>
<select class="form-control" name="id_course">

<?php  
  $sql="select * from `$tbcourse`";
	$arr=getData($conn,$sql);
		foreach($arr as $d) {						
				$id_course0=$d["id"];
				$nama_course=strtoupper($d["name"]);
	echo "<option value='$id_course0'"; if($id_course0==$id_course){echo"selected";} echo">$nama_course</option>";
				}
				?>

	
</select>
</td>
</tr>



<tr>
<td>
<td>
<td colspan="2"><input name="Simpan" type="submit" id="Simpan" value="Simpan" class="btn btn-primary"/>
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id0" type="hidden" id="id0" value="<?php echo $id0;?>" />
</td></tr>
</table>
</form>


<h3>Lihat Data Content </h3>
<table class="table table-bordered table-hover" style="font-size:13px">
  <tr bgcolor="#cccccc">
    <th width="3%">No</td>
	<th width="15%">ID Content</td>
    <th width="15%">Nama Content</td>
    <th width="15%">Video Link</td>
    <th width="15%">Type</td>
    <th width="15%">Id Course</td>
    <th width="5%">Menu</td>
</tr>
  
  
<?php  
  $sql="select * from `$tbcontent` order by `id` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
$no=1;
			$arr=getData($conn,$sql);
		foreach($arr as $d) {						
				$id=$d["id"];
				$name=$d["name"];
				$video_link=$d["video_link"];
				$type=$d["type"];
				$id_course=$d["id_course"];
				
				
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$id</td>
				<td>$name</td>
				<td>$video_link</td>
				<td>$type</td>
				<td>$id_course</td>
			
				
				<td><div align='center'>
<a href='?mnu=content&pro=ubah&kode=$id'>ubah</a>
<a href='?mnu=content&pro=hapus&kode=$id'><label alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $name pada data content ?..\")'>Hapus</label></a></div></td>
				</tr>";
				
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data user belum tersedia...</blink></td></tr>";}
?>
</table>

</div>
<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id0=strip_tags($_POST["id0"]);
	$name=strip_tags($_POST["name"]);
	$video_link=strip_tags($_POST["video_link"]);
	$type=strip_tags($_POST["type"]);
	$id_course=strip_tags($_POST["id_course"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbcontent` (
`name` ,
`video_link` ,
`type` ,
`id_course`
) VALUES (
'$name',
'$video_link', 
'$type',
'$id_course'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data \"$name\" berhasil disimpan !');document.location.href='?mnu=content';</script>";}
		else{echo"<script>alert('Data \"$name\" gagal disimpan...');document.location.href='?mnu=content';</script>";}
	}
	else{
	$sql="update `$tbcontent` set 
	`name`='$name',
	`video_link`='$video_link',
	`type`='$type' ,
	`id_course`='$id_course'
	 where `id`='$id0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data \"$name\" berhasil diubah !');document.location.href='?mnu=content';</script>";}
		else{echo"<script>alert('Data \"$name\" gagal diubah...');document.location.href='?mnu=content';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id=$_GET["kode"];
$sql="delete from `$tbcontent` where `id`='$id'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data \"$name\" berhasil dihapus !');document.location.href='?mnu=content';</script>";}
	else{echo"<script>alert('Data \"$name\" gagal dihapus...');document.location.href='?mnu=content';</script>";}
}
?>

