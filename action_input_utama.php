<?php
//cek button    
    if ($_POST['Submit'] == "Submit") {
    $kode    = $_POST['kodex'];
    $tgl           = $_POST['tgl'];
    $cust_id     = $_POST['kode'];
    $jumlah      = $_POST['jum'];
    $subtotal    = $_POST['sub'];
    $diskon           = $_POST['dis'];
    $ongkir     = $_POST['ong'];
    $total_bayar   = $_POST['tot'];
    //validasi data data kosong
    if (empty($_POST['kodex'])||empty($_POST['tgl'])||empty($_POST['kode'])||empty($_POST['sub'])||empty($_POST['jum'])||empty($_POST['dis'])||empty($_POST['ong'])||empty($_POST['tot'])) {
        ?>
            <script language="JavaScript">
                alert('Data Harap Dilengkapi!');
                document.location='test.php';
            </script>
        <?php
    }
    else {
    include 'konfig.php';
    //cek NIP di database
    $cek=mysqli_num_rows (mysqli_query($conn,"SELECT kodex FROM t_sales WHERE kodex='$_POST[kodex]'"));
    if ($cek > 0) {
    ?>
        <script language="JavaScript">
        alert('No Pengujian sudah dipakai!, silahkan ganti No Pengujian yang lain');
        document.location='test.php';
        </script>
    <?php
    }
    //Masukan data ke Table
    $input    ="INSERT INTO t_sales (kodex,tgl,cust_id,jumlah,subtotal,diskon,ongkir,total_bayar) VALUES ('$kode','$tgl','$cust_id','$jumlah','$subtotal','$diskon','$ongkir','$total_bayar')";
    $query_input =mysqli_query($conn,$input);
    if ($query_input) {
    //Jika Sukses
    ?>
        <script language="JavaScript">
        alert('Input Data Berhasil');
        document.location='test.php';
        </script>
    <?php
    }
    else {
    //Jika Gagal
    echo "Input Data Gagal!, Silahkan diulangi!";
    }
//Tutup koneksi engine MySQL
    mysqli_close($conn);
    }
}
?>

