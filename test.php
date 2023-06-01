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
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
    <div class="layer" id="layers">
    <center><h4>DAFTAR PESANAN BARANG</h4></center>
    <center><div class="col-md-7" style="max-width:1000px;" >
    <div class="card card-warning" style="height: auto;">
    <div class="card-header" style="background-color:#7145AA" >
                 <h3 class="card-title" style="color:white">Form Input Pembelian Barang</h3>
     </div>
     <div class="card-body">
      
 <!-- Pilih Customer -->
 <?php
 function get(){
	// Build up DB connection including cofiguration file
	require ("konfig.php");
	//Assign an empty variable to store the fetched items
	$output = '';
	//SQL query to fetch the phone brands to the input field
	$sql = "SELECT * FROM m_customer ORDER BY id";
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

     <!-- Kode Transaksi -->
     <?php
	include 'konfig.php';
	$query = mysqli_query($conn, "SELECT max(kodex) as kodeTerbesar FROM t_sales");
	$data = mysqli_fetch_array($query);
	$kodeBarang = $data['kodeTerbesar'];
	$urutan = (int) substr($kodeBarang, 7, 4);
	$urutan++;
	$huruff = "20".date('ym')."-";
	$kodeBarang = $huruff .sprintf("%04s", $urutan);
	?>
        <!--Form Control  -->
        <form action="action_input_utama.php" method="POST" name="formhitung">
      <div class="keterangan" style="margin-right:450px;">
        <table class="formtrans" width="450" border="0" cellpadding="0" cellspacing="0">
        <tr height="46">
            <td> </td>
            <th>Transaksi</th>
        </tr>
        <tr height="46">
            <td> </td>
            <th>NO</th>
            <td><input type="text" class="form-control" maxlength="200" name="kodex" required="required" value="<?php echo $kodeBarang ?>" readonly/></td>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Tanggal</th>
            <td><input class="form-control" type="date" width="20px" name="tgl"/></td>
        </tr>
        <tr height="46">
        </tr>
        <tr height="46">
            <td> </td>
            <th>Customer</th>
            <td><span class="btn btn-success col fileinput-button" type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal2" style="max-width: 150px;">
                        <i class="fas fa-plus"></i>
                        <span>Tambah</span>
                      </span></a></td>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Kode</th>
            <td><select name="kode" id="kodes" class="form-control" onchange="isi_otomatis()" autocomplete="off" >
					<option value="">Pilih Kode Customer</option>
					<!-- load the PHP function to fetch the brand names -->
					<?php echo get(); ?>
				</select></td>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Nama</th>
            <td><input class="form-control" type="text" name="name" id="name" maxlength="12" autocomplete="off" value="Nama Customer" readonly/></td>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Telepon</th>
            <td><input class="form-control" type="text" width="20px" name="telp" id="telp" autocomplete="off" value="No Telepon" readonly/></td>
        </tr>
        <tr height="40"></tr>
    </table>
    </div>
     <div class="table table-bordered border-primary" style="overflow:auto;">
    <table id="exampler" style="max-width:1000px;">
   <thead>
     <tr>
       <th colspan="2" rowspan="2">
       <button type="button" type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning"><i class="fas fa-plus">Tambah</i></button>
      </th>
       <th rowspan="2">No</th>
       <th rowspan="2">Kode Barang</th>
       <th rowspan="2">Nama Barang</th>
       <th rowspan="2">QTY</th>
       <th rowspan="2">Harga Bandrol</th>
       <th colspan="2">Diskon</th>
       <th rowspan="2">Harga Diskon</th>
       <th rowspan="2">Total</th>
     </tr>
     <tr>
       <th scope="col">(%)</th>
       <th scope="col">(Rp)</th>
    </tr>
   </thead>
   <tbody class="table-group-divider">
   <?php
include 'konfig.php';
$query = mysqli_query($conn, "SELECT * FROM t_sales_dett INNER JOIN m_barang ON t_sales_dett.kode = m_barang.kode");
$no = 1;
$total = 0;
$jum = 0;
foreach ($query as $row):
  $total += $row['total'];
  $jum += $row['qty'];
  ?>
	<tr>
  <td><a style="color:blue;" href="<?php echo "edit.php?sales_id=$row[sales_id]";?>" class="btn btn-warning btn-xs edit_data">Ubah</a></td>
  <td><a style="color:white;" href="<?php echo "hapus.php?sales_id=$row[sales_id]";?>" class="btn btn-danger btn-xs hapus_data" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a></td>
    <td><?= $no++; ?></td>
		<td><?= $row['kode']; ?></td>
    <td><?= $row['nama']; ?></td>
    <td><?= $row['qty']; ?></td>
    <td><?= $row['harga_bandrol']; ?></td>
    <td><?= $row['diskon_pct']; ?></td>
    <td><?= $row['diskon_nilai']; ?></td>
  <td><?= $row['harga_diskon']; ?></td>
  <td><?= $row['total'];?></td>
  </tr>
  <?php endforeach; ?>
   </tbody>
 </table>
 </div>
<br/>
<div class="accept">
<label class="sub">Sub Total</label>
<input type="hidden" class="form-control" maxlength="200" name="jum" value="<?= $jum;?>"/>
<input type="text" class="form-control" maxlength="200" name="sub" onFocus="startCalc2();" onBlur="stopCalc2();" value="<?= $total; ?>" readonly/>
 </div>
 <div class="accept">
<label class="sub">Diskon</label>
<input type="text" class="form-control" maxlength="200" name="dis" placeholder="input diskon" onFocus="startCalc2();" onBlur="stopCalc2();"/>
 </div>
 <div class="accept">
<label class="sub">Ongkir</label>
<input type="text" class="form-control" maxlength="200" name="ong" placeholder="input ongkir" onFocus="startCalc2();" onBlur="stopCalc2();"/>
 </div>
 <div class="accept">
<label class="sub">Total Bayar</label>
<input type="text" class="form-control" maxlength="200" name="tot" value="0" readonly />
 </div>

<div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-left:100px;margin-bottom:30px;margin-top:20px;">
                      <button class="btn btn-primary mr-2" style="background-color:yellow;color:black" type="submit" name="Submit" value="Submit"><b>Submit</b></button>
                      <a href="index.php"><input type="button" class="btn btn-primary" name="reset" value="Batal"></td></a>  
                    </div>

</div>

<script>
function startCalc2(){
interval2 = setInterval("calc2()",1);}
function calc2(){
pertama = document.formhitung.sub.value;
kedua = document.formhitung.dis.value;
ketiga = document.formhitung.ong.value;
document.formhitung.tot.value = (pertama * 1) - (kedua * 1) - (ketiga * 1);}
function stopCalc2(){
clearInterval(interval2);}
</script>
 </form>
 </div>
 </div>
</div>
</center>
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
<!-- AdminLTE for demo purposes -->
<script src="scroll.js"></script>
<!-- Page specific script -->
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>
  $(document).ready(function () {
    $('#exampler').DataTable({
        scrollX: true,
    });
});
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            function isi_otomatis(){
                var kode = $("#kodes").val();
                $.ajax({
                    url: 'ajax.php',
                    data:"kode="+kode ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#kodes').val(obj.kode);
                    $('#name').val(obj.name);
                    $('#telp').val(obj.telp);
                });
            }
        </script>
</body>
</html>

  <!-- Input Barang -->
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

    <div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog" style="max-width:500px;margin-top: 250px;">
  <div class="modal-content">
   <div class="modal-header" style="background-color:#7145AA">
    <h4 class="modal-title" style="color: white;">Input Data Barang</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>   
  </div>
   <div class="model-body"> 
   <form action="action_input_barang.php" method="POST" name="autoSumFor">
    <table class="tabbar" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top: 20px;">
        <tr height="46">
            <td> </td>
            <th>Kode Barang</th>
            <td> <select name="kode" id="kode" class="form-control" style="max-width: 250px;margin-left:15px;" onchange="isi_otomatis2()" autocomplete="off">
					<option value="">Pilih Kode Barang</option>
					<!-- load the PHP function to fetch the brand names -->
					<?php echo get_barang(); ?>
				</select></td>
        </tr>     
        <tr height="46">
            <td> </td>
            <th>Nama Barang</th>
            <td><input type="text" class="form-control" style="max-width: 250px; margin-left: 15px;" size="50" maxlength="200" name="nama" id="nama" placeholder="Nama Barang" autocomplete="off" readonly/></td>
        </tr>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Qty</th>
            <td><input type="number" class="form-control" style="max-width: 250px; margin-left: 15px;" size="50" maxlength="200" name="qty" id="qty" placeholder="Jumlah" onFocus="startCalc();" onBlur="stopCalc();"/></td>
        </tr>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Harga Bandrol</th>
            <td><input type="number" class="form-control" style="max-width: 250px; margin-left: 15px;" size="50" maxlength="200" name="harga_bandrol" id="harga" placeholder="Harga Bandrol" autocomplete="off" onFocus="startCalc();" onBlur="stopCalc();" readonly/></td>
        </tr>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Diskon (%)</th>
            <td><input type="number" class="form-control" style="max-width: 250px; margin-left: 15px;" size="50" maxlength="200" name="diskon_pct" id="diskon_pct" placeholder="Diskon (%)" onFocus="startCalc();" onBlur="stopCalc();"/></td>
        </tr>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Diskon (Rp)</th>
            <td><input type="number" class="form-control" style="max-width: 250px; margin-left: 15px;" size="50" maxlength="200" name="diskon_nilai" id="diskon_nilai" placeholder="Diskon (Rp)" onFocus="startCalc();" onBlur="stopCalc();" readonly/></td>
        </tr>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Harga Diskon</th>
            <td><input type="number" class="form-control" style="max-width: 250px; margin-left: 15px;" size="50" maxlength="200" name="harga_diskon" id="harga_diskon" placeholder="Harga Diskon" onFocus="startCalc();" onBlur="stopCalc();"/></td>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Total</th>
            <td><input type="number" class="form-control" style="max-width: 250px; margin-left: 15px;" size="50" maxlength="200" name="total" id="total" value="0" readonly/></td>
        </tr>
        <tr height="46">
            <td> </td>
            <td> </td>
            <td><input type="submit" style="margin-left: 15px;" name="Submit" value="Submit"></td>
        </tr>
    </table>
</form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
   </div>
  </div>
 </div>
</div>



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
    <!-- Input Customer -->

   


<!-- <script>  
$(document).ready(function(){
// Begin Aksi Insert
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#nama_barang').val() == "")  
  {  
   alert("Mohon Isi Nama Barang");  
  }  
  else if($('#harga_beli').val() == '')  
  {  
   alert("Mohon Isi Harga beli");  
  }  
  else if($('#harga_jual').val() == '')  
  {  
   alert("Mohon Isi Harga "); 
  }  
 
  else  
  {  
   $.ajax({  
    url:"proses_tambah.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#tambah').val("menambahkan");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });  
  }  
 });
});
//END Aksi Insert
</script> -->


<div id="add_data_Modal2" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header" style="background-color:#7145AA">
    <h4 class="modal-title" style="color: white;">Input Data Customer</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>   
  </div>
   <div class="model-body"> 
   <form action="action_input_laporan.php" method="POST" name="form-input-data">
    <table class="tabcus" width="400" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-top: 20px;">
        <tr height="46">
            <td> </td>
            <th>Kode</th>
            <td><input type="text" class="form-control" style="max-width: 250px; margin-left: 15px;" size="50" maxlength="10" name="kode" placeholder="input kode customer"/></td>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Nama</th>
            <td><input type="text" class="form-control" style="max-width: 250px; margin-left: 15px;" size="50" maxlength="200" name="name" placeholder="input nama customer"/></td>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Telepon</th>
            <td><input type="number" class="form-control" style="max-width: 250px; margin-left: 15px;" size="50" maxlength="200" name="telp" placeholder="input no telepon"/></td>
        </tr>
        <tr height="46">
            <td> </td>
            <td> </td>
            <td><input type="submit" style="margin-left: 15px;" name="Submit" value="Submit"></td>
        </tr>
    </table>
</form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
   </div>
  </div>
 </div>
</div>





<!-- <script>  
$(document).ready(function(){
// Begin Aksi Insert2
 $('#insert_form2').on("submit", function(event){  
  event.preventDefault();  
  if($('#kode').val() == "")  
  {  
   alert("Mohon Isi Kode Customer!");  
  }  
  else if($('#namcus').val() == '')  
  {  
   alert("Mohon Isi Nama Customer!");  
  }  
  else if($('#telp').val() == '')  
  {  
   alert("Mohon Isi No Telepon!"); 
  }  
 
  else  
  {  
   $.ajax({  
    url:"action_input_laporan.php",  
    method:"POST",  
    data:$('#insert_form2').serialize(),  
    beforeSend:function(){  
     $('#tambah2').val("menambahkan");  
    },  
    success:function(data){  
     $('#insert_form2')[0].reset();  
     $('#add_data_Modal2').modal('hide');  
     $('#sales_table').html(data);  
    }  
   });  
  }  
 });
});
//END Aksi Insert
</script> -->
