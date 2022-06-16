<!-- import excel ke mysql -->
<!-- www.malasngoding.com -->

<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
?>

<?php
// upload file xls
$target = basename($_FILES['filepegawai']['name']) ;
move_uploaded_file($_FILES['filepegawai']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['filepegawai']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filepegawai']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$motor     = $data->val($i, 1);
	$uangmuka  = $data->val($i, 2);
	$diskon   = $data->val($i, 3);
	$bulan11  = $data->val($i, 4);
	$bulan17  = $data->val($i, 5);
	$bulan23  = $data->val($i, 6);
	$bulan27  = $data->val($i, 7);
	$bulan29  = $data->val($i, 8);
	$bulan33  = $data->val($i, 9);
	$bulan35  = $data->val($i, 10);

	if($motor != "" && $uangmuka != "" && $diskon != "" && $bulan11 != "" && $bulan17 != "" && $bulan23 != "" && $bulan27 != "" && $bulan29 != "" && $bulan33 != "" && $bulan35 != ""){
		// input data ke database (table data_pegawai)
		mysqli_query($koneksi,"INSERT into credits values('','$motor','','','$uangmuka','$diskon','$bulan11','$bulan17','$bulan23','$bulan27','$bulan29','$bulan33','$bulan35')");
		$berhasil++;
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filepegawai']['name']);

// alihkan halaman ke index.php
header("location:index.php?berhasil=$berhasil");
?>