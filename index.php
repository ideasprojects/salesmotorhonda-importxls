<!DOCTYPE html>
<html>
<head>
	<title>Import Data Kredit</title>
</head>

<?php 
include 'koneksi.php';
?>

<form method="post" enctype="multipart/form-data" action="upload_aksi.php">
	Pilih File: 
	<input name="filepegawai" type="file" required="required"> 
	<input name="upload" type="submit" value="Import">
</form>

<br/><br/>

</body>
</html>