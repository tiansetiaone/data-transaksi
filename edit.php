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
<?php 
include "konfig.php";
$sales_id = $_GET['sales_id'];
$query_mysql = mysqli_query($conn,"SELECT * FROM t_sales_dett INNER JOIN m_barang ON t_sales_dett.kode = m_barang.kode where sales_id=$sales_id")or die(mysqli_error($conn));
$no = 1;
while($data = mysqli_fetch_array($query_mysql)){
?>
 <?php
 function get_barang(){
	// Build up DB connection including cofiguration file
	require ("konfig.php");
	//Assign an empty variable to store the fetched items
	$output = '';
	//SQL query to fetch the phone brands to the input field
	$sql = "SELECT * FROM m_barang ORDER BY id";
	// execution of the query. Output a boolean value
	$res = mysqli_query($conn , $sql);
	// Check whether there are results or not
	if(mysqli_num_rows($res)>0){
		while ($row = mysqli_fetch_array($res)) {
			//Concatenate fetched items to the output variable with HTML option tags to display
			$output .= '<option value="'.$row["kode"].'">'.$row["kode"].'</option>';
		}
	}
	//return the output results to be displayed
	return $output;

}

?>
    <div class="layer" id="layers">
    <center><h4>UBAH DAFTAR PESANAN BARANG</h4></center>
    <center><div class="col-md-7" style="width:auto;" >
    <div class="card card-warning" style="width:auto;height: auto;">
    <div class="card-header" style="background-color:#7145AA" >
                 <h3 class="card-title" style="color:white">Form Edit Barang</h3>
     </div>
     <div class="card-body">
   <form action="update.php" method="POST" name="autoSumFor">
    <table width="auto" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top: 20px;">
    <tr><input type="hidden" class="form-control" style="max-width: 250px; margin-left: 15px;" size="50" maxlength="200" name="sales" id="sales" value="<?php echo $data['sales_id'];?>" /></tr>
        <tr height="46">
            <td> </td>
            <th>Kode Barang</th>
            <td><select name="kode" id="kode" class="form-control" style="max-width: 250px; margin-left: 15px;" onchange="isi_otomatis2()" autocomplete="off">
					<option value=""><?php echo $data['kode'];?></option>
					<!-- load the PHP function to fetch the brand names -->
					<?php echo get_barang(); ?>
				</select></td>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Nama Barang</th>
            <td><input type="text" class="form-control" style="max-width: 250px; margin-left: 15px;" size="50" maxlength="200" name="nama" id="nama" placeholder="Nama Barang" autocomplete="off" readonly value="<?php echo $data['nama'];?>" /></td>
        </tr>     
        <tr height="46">
            <td> </td>
            <th>Harga Bandrol</th>
            <td><input type="number" class="form-control" style="max-width: 250px; margin-left: 15px;" size="50" maxlength="200" name="harga_bandrol" id="harga" placeholder="Harga Bandrol" autocomplete="off" onFocus="startCalc();" onBlur="stopCalc();"value="<?php echo $data['harga_bandrol'];?>" readonly/></td>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Qty</th>
            <td><input type="number" class="form-control" style="max-width: 250px; margin-left: 15px;" size="50" maxlength="200" name="qty" id="qty" placeholder="Jumlah" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $data['qty'];?>"/></td>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Diskon (%)</th>
            <td><input type="number" class="form-control" style="max-width: 250px; margin-left: 15px;" size="50" maxlength="200" name="diskon_pct" id="diskon_pct" placeholder="Diskon (%)" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $data['diskon_pct'];?>" /></td>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Diskon (Rp)</th>
            <td><input type="number" class="form-control" style="max-width: 250px; margin-left: 15px;" size="50" maxlength="200" name="diskon_nilai" id="diskon_nilai" placeholder="Diskon (Rp)" onFocus="startCalc();" onBlur="stopCalc();"value="<?php echo $data['diskon_nilai'];?>" readonly /></td>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Harga Diskon</th>
            <td><input type="number" class="form-control" style="max-width: 250px; margin-left: 15px;" size="50" maxlength="200" name="harga_diskon" id="harga_diskon" placeholder="Harga Diskon" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $data['harga_diskon'];?>" readonly/></td>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Total</th>
            <td><input type="number" class="form-control" style="max-width: 250px; margin-left: 15px;" size="50" maxlength="200" name="total" id="total" value="<?php echo $data['total'];?>" readonly/></td>
        </tr>
        <tr height="46">
            <td> </td>
            <td> </td>
            <td><input type="submit" style="margin-left: 15px;" name="Submit" value="Submit"><a href="test.php"><input type="button" name="Batal" value="Batal" style="margin-left: 10px;"></a></td>

        </tr>
    </table>
    
</form>
</div>
 </div>
</div>
</center>
 </div>
    </div>
<?php } ?>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
            function isi_otomatis2(){
                var kode = $("#kode").val();
                $.ajax({
                    url: 'ajax_barang.php',
                    data:"kode="+kode ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#kode').val(obj.kode);
                    $('#nama').val(obj.nama);
                    $('#harga').val(obj.harga);
                });
            }
        </script>

<script>
function startCalc(){
interval = setInterval("calc()",1);}
function calc(){
one = document.autoSumFor.qty.value;
two = document.autoSumFor.harga_bandrol.value;
three = document.autoSumFor.diskon_pct.value;
four = document.autoSumFor.diskon_nilai.value = (two * 1) * (three * 1) / 100;
five = document.autoSumFor.harga_diskon.value = (two * 1) - (four * 1) ;
document.autoSumFor.total.value = (one * 1) * (five * 1);}
function stopCalc(){
clearInterval(interval);}
</script>

<script src="
http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>