

<?php
function tgl_indo($tanggal){
  $bulan=array(
    1=>'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan=explode('-',$tanggal);
  return $pecahkan[2].''.$bulan[(int)$pecahkan[1]].''.$pecahkan[0];
}
echo tgl_indo(date('Y-m-d'));
?>


<form action="transaksi.php" style="text-align: left;">
        <input type="text" name="cari" value="<?php if(isset($_GET['cari'])){echo $_GET['cari'];}?>">
        <button type="submit">cari</button>
     </form>


if(isset($_GET['cari'])){
  $pencarian = $_GET['cari'];
  $query = "select * from t_sales INNER JOIN m_customer where kodex like '%".$pencarian."%' or tgl like '%".$pencarian."%' or name like '%".$pencarian."%' or subtotal like '%".$pencarian."%' or diskon like '%".$pencarian."%' or ongkir like '%".$pencarian."%' or total_bayar like '%".$pencarian."%' ON t_sales.cust_id = m_customer.kode" ;
}else{}