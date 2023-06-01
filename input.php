<?php 

include 'konfig.php';
?>


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
    <div class="layer" id="layers">
    <center><h4>DAFTAR PESANAN BARANG</h4></center>
    <center><div class="col-md-7" style="max-width:1000px;" >
    <div class="card card-warning" style="height: 850px;">
    <div class="card-header" style="background-color:#7145AA" >
                 <h3 class="card-title" style="color:white">Form Input Pembelian Barang</h3>
     </div>
     <div class="card-body">
        <!-- No Transaksi -->
     <?php
	include 'konfig.php';
	$query = mysqli_query($conn, "SELECT max(kode) as kodeTerbesar FROM t_sales");
	$data = mysqli_fetch_array($query);
	$kodeBarang = $data['kodeTerbesar'];
	$urutan = (int) substr($kodeBarang, 3, 3);
	$urutan++;
	$huruf = "20".date('ym');
	$kodeBarang = $huruf ."-" .sprintf("%04s", $urutan);
	?>

        <!--Form Control  -->
        <form action="action_input_laporan.php" method="POST" name="form-input-data">
      <div class="keterangan" style="margin-right:450px;">
        <table width="450" border="0" cellpadding="0" cellspacing="0">
        <tr height="46">
            <td> </td>
            <th>Transaksi</th>
        </tr>
        <tr height="46">
            <td> </td>
            <th>NO</th>
            <td><input type="text" class="form-control" maxlength="200" name="kode" required="required" value="<?php echo $kodeBarang ?>" readonly/></td>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Tanggal</th>
            <td><input class="form-control" type="date" width="20px" name="tanggal"/></td>
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
            <td><select name="product_name" class="form-control" readonly>
            </select></td>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Nama</th>
            <td><input class="form-control" type="text" name="jumlah" maxlength="12" readonly/></td>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Telepon</th>
            <td><input class="form-control" type="text" width="20px" name="tanggal" readonly/></td>
        </tr>
        <tr height="40"></tr>
    </table>
    </div>
     <div class="table table-bordered border-primary" style="overflow:auto;">
    <table id="example" style="max-width:1000px;">
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
   </tbody>
 </table>
 </form>
 </div>
 <div class="accept">
<label class="sub">Sub Total</label>
<input type="text" class="form-control" maxlength="200" name="judul"/>
 </div>
 <div class="accept">
<label class="sub">Diskon</label>
<input type="text" class="form-control" maxlength="200" name="judul"/>
 </div>
 <div class="accept">
<label class="sub">Ongkir</label>
<input type="text" class="form-control" maxlength="200" name="judul"/>
 </div>
 <div class="accept">
<label class="sub">Total Bayar</label>
<input type="text" class="form-control" maxlength="200" name="judul"/>
 </div>
 <div class="opsi">
<input type="submit" name="Submit" value="Simpan">   
<a href="#"><input type="button" name="reset" value="Batal"></td></a>
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


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            function isi_otomatis(){
                var username = $("#username").val();
                $.ajax({
                    url: 'ajax.php',
                    data:"username="+username ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#level').val(obj.level);
                });
            }
        </script>
</body>
</html>

 <!-- Input Barang -->
 <?php
 function get_brand(){
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
			$output .= '<option value="'.$row["nama"].'">'.$row["nama"].'</option>';
		}
	}
	//return the output results to be displayed
	return $output;

}

?>

<div >
<div id="add_data_Modal" class="modal fade">
    <center><div class="col-md-7" style="max-width:500px;margin-top: 250px;" >
    <div class="card card-warning" style="height: auto;">
    <div class="card-header" style="background-color:#7145AA" >
    <a href="input.php" class="close"><button type="button" class="close">&times;</button></a>
    <h3 class="card-title" style="color:white">Form Input Customer</h3>
     </div>
     <div class="card-body"> 
        <!--Form Control  -->
 <form  id="insert_form" method="POST" name="form-input-data">
      <div class="keterangan" style="margin-right:450px;">
        <table width="450" border="0" cellpadding="0" cellspacing="0">
        <tr height="46">
            <td> </td>
            <th>Nama Barang</th>
            <td> <select name="name" id="name" class="form-control">
					<option value=""></option>
					<!-- load the PHP function to fetch the brand names -->
					<?php echo get_brand(); ?>
				</select></td>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Qty</th>
            <td><input type="text" class="form-control" maxlength="200" name="judul"/></td>
        </tr>
    </table>
    </div>
 </div>
 <div class="opsi2" style="margin-right: 50px;">
<input type="submit" name="Submit" value="Simpan">   
<a href="input.php"><input type="button" name="reset" value="Batal"></td></a>
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

    <!-- Input Customer -->

    <div id="add_data_Modal2" class="modal fade">
    <center><div class="col-md-7" style="max-width:500px;margin-top: 250px;" >
    <div class="card card-warning" style="height: auto;">
    <div class="card-header" style="background-color:#7145AA" >
                 <h3 class="card-title" style="color:white">Form Input Customer</h3>
                 <a href="input.php" class="close"><button type="button" class="close">&times;</button></a>
     </div>
     <div class="card-body">
        <!--Form Control  -->
        <form action="action_input_laporan.php" method="POST" name="form-input-data">
      <div class="keterangan" style="margin-right:450px;">
        <table width="450" border="0" cellpadding="0" cellspacing="0">
        <tr height="46">
            <td> </td>
            <th>Kode</th>
            <td><input type="text" class="form-control" size="50" maxlength="10" name="kode"/></td>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Nama</th>
            <td><input type="text" class="form-control" size="50" maxlength="200" name="name"/></td>
        </tr>
        <tr height="46">
            <td> </td>
            <th>Telepon</th>
            <td><input class="form-control" type="number" id="telp" name="telp" maxlength="20" /></td>
        </tr>
        <tr height="46">
            <td> </td>
            <td> </td>
            <td><input type="submit" name="Submit" value="Submit">   
            <input type="reset" name="reset" value="Cancel"></td>
        </tr>
    </table>
</form>
     </div>
 <br/>
 <br/>
 </div>
 </div>
</div>
</center>
 </div>
    </div>


<script>  
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
    url:"action_input_laporan.php",  
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
</script>

<script>  
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
</script>