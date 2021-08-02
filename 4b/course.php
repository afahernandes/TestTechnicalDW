<?php
$pro="simpan";
$thumbnail0="avatar.jpg";
$thumbnail="avatar.jpg";


if($_GET["pro"]=="ubah"){
	$id=$_GET["kode"];
	$sql="select * from `$tbcourse` where `id`='$id'";
	$d=getField($conn,$sql);
				$id=$d["id"];
				$id0=$d["id"];
				$name=$d["name"];
				$thumbnail=$d["thumbnail"];
				$id_author=$d["id_author"];
				$duration=$d["duration"];
				$description=$d["description"];
				$thumbnail=$d["thumbnail"];
				$thumbnail0=$d["thumbnail"];
				$pro="ubah";		
}
?>
<div class="hero-unit">
  <h3>Masukan Data Course</h3>

<form action="" method="post" enctype="multipart/form-data">
<table class="table table-striped table-bordered table-hover">
<tr>
<td width="20%"><label for="name">Nama course</label>
<td width="1%">:<td width="349"><input required name="name" class="span3"  type="text" id="name" value="<?php echo $name;?>" size="25" />
</td>
</tr>


<tr>
<td height="24"><label for="id_author">Pilih Author</label>
<td>:<td>
<select class="form-control" name="id_author">

<?php  
  $sql="select * from `$tbauthor`";
	$arr=getData($conn,$sql);
		foreach($arr as $d) {						
				$id_author0=$d["id"];
				$nama_author=$d["name"];
	echo "<option value='$id_author0'"; if($id_author0==$id_author){echo"selected";} echo">$nama_author</option>";
				}
				?>

	
</select>
</td>
</tr>
 
<tr>
<td><label for="duration">Duration</label>
<td>:<td colspan="2">

<input name="duration" required type="text" class="span3"  id="duration" value="<?php echo $duration;?>" size="20" />
</td></tr>

<tr>
<td height="24"><label for="description">Description</label>
<td>:<td><input name="description" class="span3"  required type="text" id="description" value="<?php echo $description;?>" size="20" />
</td>
</tr>



<tr>
  <td height="24"><label for="description">Thumbnail</label>
    <td>:<td colspan="2">
        <input  name="thumbnail" type="file" id="thumbnail" size="20" /> 
      => <?php echo $thumbnail0;?></td>
</tr>
<tr>
<td>
<td>
<td colspan="2"><input name="Simpan" type="submit" class="btn btn-primary" id="Simpan" value="Simpan" class="btn btn-primary"/>
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="thumbnail0" type="hidden" id="thumbnail0" value="<?php echo $thumbnail0;?>" />
        <input name="id0" type="hidden" id="id0" value="<?php echo $id0;?>" />
</td></tr>
</table>
</form>


<h3>Lihat Data course </h3>
<table class="table table-bordered table-hover" style="font-size:13px">
  <tr bgcolor="#cccccc">
    <th width="3%">No</td>
    <th width="15%">Thubnail</td>
	<th width="3%">IDcourse</td>
    <th width="15%">Nama course</td>
    <th width="15%">Author</td>
    <th width="15%">Durasi</td>
    <th width="20%">Deskripsi</td>
    <th width="5%">Menu</td>
</tr>
  
  </div>
<?php  
  $sql="select * from `$tbcourse` order by `id` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
$no=1;
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
				
				
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td><div align='center'><a href='#' onclick='buka(\"pengujian/zoom.php?id=$id_pengujian\")'>
				<img src='$YPATH/$thumbnail' width='40' height='40' /></a></div>
				</td>
				<td>$id</td>
				<td>$name</td>
				<td>$nama_author</td>
				<td>$duration</td>
				<td>$description</td>
			
				
				<td><div align='center'>
<a href='?mnu=course&pro=ubah&kode=$id'>ubah</a>
<a href='?mnu=course&pro=hapus&kode=$id'><label alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $name pada data course ?..\")'>Hapus</label></a></div></td>
				</tr>";
				
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data user belum tersedia...</blink></td></tr>";}
?>
</table>


<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id0=strip_tags($_POST["id0"]);
	$name=strip_tags($_POST["name"]);
	$id_author=strip_tags($_POST["id_author"]);
	$duration=strip_tags($_POST["duration"]);
	$description=strip_tags($_POST["description"]);
	$thumbnail0=strip_tags($_POST["thumbnail0"]);
	if ($_FILES["thumbnail"] != "") {
		@copy($_FILES["thumbnail"]["tmp_name"],"$YPATH/".$_FILES["thumbnail"]["name"]);
		$thumbnail=$_FILES["thumbnail"]["name"];
		} 
	else {$thumbnail=$thumbnail0;}
	if(strlen($thumbnail)<1){$thumbnail=$thumbnail0;}
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbcourse` (
`name` ,
`thumbnail` ,
`id_author` ,
`duration`,
`description`
) VALUES (
'$name',
'$thumbnail', 
'$id_author',
'$duration',
'$description'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data \"$name\" berhasil disimpan !');document.location.href='?mnu=course';</script>";}
		else{echo"<script>alert('Data \"$name\" gagal disimpan...');document.location.href='?mnu=course';</script>";}
	}
	else{
	$sql="update `$tbcourse` set 
	`name`='$name',
	`thumbnail`='$thumbnail',
	`id_author`='$id_author' ,
	`duration`='$duration',
	`description`='$description'
	 where `id`='$id0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data \"$name\" berhasil diubah !');document.location.href='?mnu=course';</script>";}
		else{echo"<script>alert('Data \"$name\" gagal diubah...');document.location.href='?mnu=course';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id=$_GET["kode"];
$sql="delete from `$tbcourse` where `id`='$id'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data \"$name\" berhasil dihapus !');document.location.href='?mnu=course';</script>";}
	else{echo"<script>alert('Data \"$name\" gagal dihapus...');document.location.href='?mnu=course';</script>";}
}
?>

