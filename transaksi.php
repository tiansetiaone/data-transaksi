<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. MITRA SINERJI TEKNOINDO | DATA TRANSAKSI</title>
      <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Icon -->
  <link href='dist/img/icon.png' rel='shortcut icon'>
  <!-- CSS Default -->
  <link rel="stylesheet" type="text/css" href="dist/css/styles.css">
  <script src="dist/js/jquery.min.js"></script>  
  <script src="dist/js/bootstrap.min.js"></script> 
</head>
<style>
    body {
      background-image : url("https://browsecat.art/sites/default/files/solid-color-wallpapers-120629-1733273-6075589.png");
      background-size : 2000pt 1000pt;
      background-position : center center;
    }
  </style> 
<body>
<?php include 'top.php'; ?>
    <div class="layer">
    <center><h4>DAFTAR TRANSAKSI</h4></center>
    <center><div class="col-md-7" style="width:auto">
    <div class="card card-warning">
    <div class="card-header" style="background-color:#7145AA" >
                 <h3 class="card-title" style="color:white">Form Daftar Transaksi</h3>
     </div>
     <div class="card-body">
     <div class="table table-bordered border-primary" style="overflow:auto;width: 100%;">
     <center><table id="example">
   <thead>
     <tr>
       <th scope="col">No</th>
       <th scope="col">No Transaksi</th>
       <th scope="col" width="70">Tanggal</th>
       <th scope="col">Nama Customer</th>
       <th scope="col">Jumlah Barang</th>
       <th scope="col">Sub Total</th>
       <th scope="col">Diskon</th>
       <th scope="col">Ongkir</th>
       <th scope="col">Total</th>
     </tr>
   </thead>
   <tbody class="table-group-divider">
    <?php
function tgl_indo($tanggal){
  $bulan=array(
    1=>'Jan',
    'Feb',
    'Mar',
    'Apr',
    'Mei',
    'Jun',
    'Jul',
    'Agu',
    'Sep',
    'Okt',
    'Nov',
    'Des'
  );
  $pecahkan=explode('-',$tanggal);
  return $pecahkan[2].'-'.$bulan[(int)$pecahkan[1]].'-'.$pecahkan[0];
};
?>
 <?php
include 'konfig.php';
$query = mysqli_query($conn, "SELECT * FROM t_sales INNER JOIN m_customer ON t_sales.cust_id = m_customer.kode");
$no = 1;
foreach ($query as $row):
  ?>
	<tr>
    <td><?= $no++; ?></td>
		<td><?= $row['kodex']; ?></td>
    <td><?= tgl_indo($row['tgl']); ?></td>
    <td><?= $row['name']; ?></td>
    <td><?= $row['jumlah']; ?></td>
    <td><?= $row['subtotal']; ?></td>
    <td><?= $row['diskon']; ?></td>
  <td><?= $row['ongkir']; ?></td>
  <td><?= $row['total_bayar'];?></td>
  </tr>
  <?php endforeach; ?>
   </tbody>
   <tfoot>
        <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <th colspan="4">Grand Total</th>
        <?php
include 'konfig.php';
$sql3 = mysqli_query($conn, "SELECT SUM(total_bayar)
FROM t_sales");
while($data3 = mysqli_fetch_array($sql3)) {
 ?>
<td><?php echo $data3['SUM(total_bayar)'] ;?></td>
<?php
}
?>
        </tr>
    </tfoot>
 </table>
 </center>
 </div>
 <br/>
 <br/>
 </div>
 </div>
               </div></center>
 </div>
    </div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- Page specific script -->
<script>
  $(document).ready(function () {
    $('#example').DataTable({
        scrollX: true,
    });
});
</script>
</body>
</html>
