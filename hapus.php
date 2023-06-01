<?php 
// koneksi database
include 'konfig.php';
 
// menangkap data id yang di kirim dari url
$sales_id = $_GET['sales_id'];
 
 
// menghapus data dari database
mysqli_query($conn,"delete from t_sales_dett where sales_id='$sales_id'");
{
// mengalihkan halaman kembali ke index.php
echo "<script>alert('Data berhasil dihapus.');window.location='test.php';</script>";
}
?>