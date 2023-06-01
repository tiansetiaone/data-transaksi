<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. MITRA SINERJI TEKNOINDO | INPUT PEMBELIAN BARANG</title>
      <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Icon -->
  <link href='dist/img/icon.png' rel='shortcut icon'>
  <!-- CSS Default -->
  <link rel="stylesheet" type="text/css" href="dist/css/styles1.css">
</head>
<body>
<!-- Form Input Barang Pop Up-->
<div class="layer">
    <center><div class="col-md-7" style="max-width:500px;" >
    <div class="card card-warning" style="height: auto;">
    <div class="card-header" style="background-color:#7145AA" >
                 <h3 class="card-title" style="color:white">Form Input Customer</h3>
     </div>
     <div class="card-body">
        <!--Form Control  -->
        <form action="action_input_laporan.php" method="POST" name="form-input-data">
      <div class="keterangan" style="margin-right:450px;">
        <table width="450" border="0" cellpadding="0" cellspacing="0">
        <tr height="46">
            <td> </td>
            <th>Nama Barang</th>
            <td><input class="form-control" type="text" name="supplier" maxlength="20" /></td>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Qty</th>
            <td><input type="text" class="form-control" maxlength="200" name="judul"/></td>
        </tr>
        <button type="button" type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning"><i class="fas fa-plus">Tambah</i></button>
    </table>
    </div>
 </div>
 <div class="opsi2" style="margin-right: 50px;">
<input type="submit" name="Submit" value="Simpan">   
<input type="reset" name="reset" value="Batal"></td>
</div>
</form>
 <br/>
 <br/>
 </div>
 </div>
</div>
</center>
 </div>
    </div>

    <div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Input Data Dengan Menggunakan Modal Bootstrap</h4>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form" enctype="multipart/form-data">
     <label>Nama Barang</label>
     <input type="text" name="nama_barang" id="nama_barang"  autofocus="" class="form-control" required="" />
     <br />
     <label>Stok</label>
     <input type="number" name="stok" id="stok" class="form-control" required="" />
     <br />
     <label>Harga Beli</label>
     <input type="number" name="harga_beli" id="harga_beli" class="form-control" required="" />
     <br />
     <label>Harga Jual</label>
     <input type="number" name="harga_jual" id="harga_jual" class="form-control" required="" />
     <br />
     <label>Foto Barang</label>
     <input type="file" name="foto_barang" id="foto_barang" class="form-control" required=""/>
     <br />
     <input type="submit" name="tambah" id="tambah" value="Tambah Produk" class="btn btn-success" />
    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
   </div>
  </div>
 </div>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

 <!-- <?php
 include 'konfig.php';
 $query = "SELECT * FROM ncc_list";
 $exe = mysqli_query($conn,$query);
 $no = 1;
 while($row = mysqli_fetch_array($exe)){
   ?>
     <tr>
     <td><?php echo $no++; ?></td>
         <td><?php echo $row['branch_company']; ?></td><td><?php echo $row['product_name']; ?></td><td><?php echo $row['date']; ?></td><td><?php echo $row['customer']; ?></td><td><?php echo $row['model']; ?></td><td><?php echo $row['phenomenon']; ?></td><td><?php echo $row['root_cause']; ?></td><td><?php echo $row['occurence']; ?></td>
     </tr>
     <?php $no++;}
 echo "</tr></table>";
 ?> -->