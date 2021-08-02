<?php
$pro="simpan";

if($_GET["pro"]=="ubah"){
	$id=$_GET["kode"];
	$sql="select * from `$tbauthor` where `id`='$id'";
	$d=getField($conn,$sql);
				$id=$d["id"];
				$id0=$d["id"];
				$name=$d["name"];
				$pro="ubah";		
}
?>
<div class="hero-unit">
  <h3>Masukan Data author</h3>

<form action="" method="post" enctype="multipart/form-data">
<table class="table table-striped table-bordered table-hover">
<tr>
<td width="20%"><label for="name">Nama author</label>
<td width="1%">:<td width="349"><input required name="name" class="span3"  type="text" id="name" value="<?php echo $name;?>" size="25" />
</td>
</tr>

<tr>
<td>
<td>
<td colspan="2"><input name="Simpan" type="submit" class="btn btn-primary" id="Simpan" value="Simpan" class="btn btn-primary"/>
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id0" type="hidden" id="id0" value="<?php echo $id0;?>" />
</td></tr>
</table>
</form>


<h3>Lihat Data author </h3>
<table class="table table-bordered table-hover" style="font-size:13px">
  <tr bgcolor="#cccccc">
    <th width="3%">No</td>
	<th width="3%">IDauthor</td>
    <th width="15%">Nama author</td>
    <th width="5%">Menu</td>
</tr>
  
  
<?php  
  $sql="select * from `$tbauthor` order by `id` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
$no=1;
			$arr=getData($conn,$sql);
			foreach($arr as $d) {						
				$id=$d["id"];
				$name=$d["name"];
				
				
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$id</td>
				<td>$name</td>
			
				
				<td><div align='center'>
<a href='?mnu=author&pro=ubah&kode=$id'>ubah</a>
<a href='?mnu=author&pro=hapus&kode=$id'><label alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $name pada data author ?..\")'>Hapus</label></a></div></td>
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
	$name=strip_tags($_POST["name"]);;
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbauthor` (
`name` 
) VALUES (
'$name'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data \"$name\" berhasil disimpan !');document.location.href='?mnu=author';</script>";}
		else{echo"<script>alert('Data \"$name\" gagal disimpan...');document.location.href='?mnu=author';</script>";}
	}
	else{
	$sql="update `$tbauthor` set 
	`name`='$name'
	 where `id`='$id0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data \"$name\" berhasil diubah !');document.location.href='?mnu=author';</script>";}
		else{echo"<script>alert('Data \"$name\" gagal diubah...');document.location.href='?mnu=author';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id=$_GET["kode"];
$sql="delete from `$tbauthor` where `id`='$id'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data \"$name\" berhasil dihapus !');document.location.href='?mnu=author';</script>";}
	else{echo"<script>alert('Data \"$name\" gagal dihapus...');document.location.href='?mnu=author';</script>";}
}
?>

