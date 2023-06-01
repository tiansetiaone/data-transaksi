<?php
//cek button    
    if ($_POST['Submit'] == "Submit") {
    $kode            = $_POST['kode'];
    $harga_bandrol    = $_POST['harga_bandrol'];
    $qty           = $_POST['qty'];
    $diskon_pct     = $_POST['diskon_pct'];
    $diskon_nilai    = $_POST['diskon_nilai'];
    $harga_diskon           = $_POST['harga_diskon'];
    $total     = $_POST['total'];
    //validasi data data kosong
    if (empty($_POST['kode'])||empty($_POST['harga_bandrol'])||empty($_POST['qty'])||empty($_POST['diskon_pct']||empty($_POST['diskon_nilai'])||empty($_POST['harga_diskon'])||empty($_POST['total']))) {
        ?>
            <script language="JavaScript">
                alert('Data Harap Dilengkapi!');
                document.location='test.php';
            </script>
        <?php
    }
    else {
    include 'konfig.php';
    //Masukan data ke Table
    $input    ="INSERT INTO t_sales_dett (kode,harga_bandrol,qty,diskon_pct,diskon_nilai,harga_diskon,total) VALUES ('$kode','$harga_bandrol','$qty','$diskon_pct','$diskon_nilai','$harga_diskon','$total')";
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

