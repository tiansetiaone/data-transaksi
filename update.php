<?php 

error_reporting();
if ($_POST['Submit'] == "Submit") {
  $sales_id     =$_POST['sales'];
  $kode            = $_POST['kode'];
  $harga_bandrol    = $_POST['harga_bandrol'];
  $qty           = $_POST['qty'];
  $diskon_pct     = $_POST['diskon_pct'];
  $diskon_nilai    = $_POST['diskon_nilai'];
  $harga_diskon           = $_POST['harga_diskon'];
  $total     = $_POST['total'];
    include 'konfig.php';
    mysqli_query($conn,"UPDATE t_sales_dett SET kode = '$kode', harga_bandrol = '$harga_bandrol', qty = '$qty', diskon_pct = '$diskon_pct', diskon_nilai = '$diskon_nilai', harga_diskon = '$harga_diskon',total ='$total' where sales_id='$sales_id'") or die(mysqli_error($conn));
      // periska query apakah ada error
     {
        echo "<script>alert('Data berhasil diubah.');window.location='test.php';</script>";
      }
    }
    ?>