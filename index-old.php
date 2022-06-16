<!DOCTYPE html>
<html>
<head>
	<title>Import Excel Ke MySQL dengan PHP - www.malasngoding.com</title>
</head>
<body>
	<style type="text/css">
		body{
			font-family: sans-serif;
		}

		p{
			color: green;
		}
	</style>
	<h2>IMPORT EXCEL KE MYSQL DENGAN PHP</h2>
	<h3>www.malasngoding.com</h3>

	<?php 
	if(isset($_GET['berhasil'])){
		echo "<p>".$_GET['berhasil']." Data berhasil di import.</p>";
	}
	?>

	<a href="upload.php">IMPORT DATA</a>
	<table border="1">
		<tr>
			<th>No</th>
			<th>Motor</th>
			<th>Uang Muka</th>
			<th>Diskon</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$no=1;
		$data = mysqli_query($koneksi,"select * from credits");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<th><?php echo $no++; ?></th>
				<th><?php echo $d['post_id']; ?></th>
				<th><?php echo $d['uang_muka']; ?></th>
				<th><?php echo $d['diskon']; ?></th>
			</tr>
			<?php 
		}
		?>

	</table>

	<a href="https://www.malasngoding.com/import-excel-ke-mysql-dengan-php">www.malasngoding.com</a>

</body>
</html>