<?php

//membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "dbmitra");

//variabel nim yang dikirimkan form.php
$kode = $_GET['kode'];

//mengambil data
$query = mysqli_query($koneksi, "select * from m_customer where kode='$kode'");
$userid = mysqli_fetch_array($query);
$data = array(
            'kode'      =>  @$userid['kode'],        
            'name'     =>  @$userid['name'],
            'telp'      =>  @$userid['telp'],);
           
//tampil data
echo json_encode($data);
?>
