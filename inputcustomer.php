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
<div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Laporan Pengujian</h6>
            </div>
            <?php 
            if(isset($_GET['pesan'])){
                echo '<i class="fas fa-info-circle"></i> '.$_GET['pesan'].'';
            }
            ?>
            <div style="border:0; padding:10px; width:760px; height:auto;">
<form action="action_input_laporan.php" method="POST" name="form-input-data">
    <table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr height="46">
                <td width="10%"> </td>
                <td width="25%"> </td>
                <td width="65%"><font color="orange" size="2">Form Laporan Pengujian</font></td>
        </tr>
        <tr height="46">
            <td> </td>
            <td>No Pengujian</td>
            <td><input type="text" class="form-control" size="50" maxlength="10" name="kode"/></td>
        </tr>
        <tr height="46">
            <td> </td>
            <td>Judul Pengujian</td>
            <td><input type="text" class="form-control" size="50" maxlength="200" name="name"/></td>
        </tr>
        <tr height="46">
            <td> </td>
            <td>Judul Pengujian</td>
            <td><input type="text" class="form-control" size="50" maxlength="200" name="telp"/></td>
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
