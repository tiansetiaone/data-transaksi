<?php
//cek button    
    if ($_POST['Submit'] == "Submit") {
    $kode    = $_POST['kode'];
    $name           = $_POST['name'];
    $telp     = $_POST['telp'];
    //validasi data data kosong
    if (empty($_POST['kode'])||empty($_POST['name'])||empty($_POST['telp'])) {
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
    $cek=mysqli_num_rows (mysqli_query($conn,"SELECT kode FROM m_customer WHERE kode='$_POST[kode]'"));
    if ($cek > 0) {
    ?>
        <script language="JavaScript">
        alert('No Pengujian sudah dipakai!, silahkan ganti No Pengujian yang lain');
        document.location='test.php';
        </script>
    <?php
    }
    //Masukan data ke Table
    $input    ="INSERT INTO m_customer (kode,name,telp) VALUES ('$kode','$name','$telp')";
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

