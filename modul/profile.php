<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<style>
    .navbar{
        background-color: black !important;
    }
</style>
<style>
.paok{
    text-transform: capitalize;
}  
</style>
</head>
<div class="container-fluid paok">
    <br>
    <br>
    <br>
    <br>
<div class="row">
<div class="col-xl-10 m-auto">
<div class="table-responsive">
<table id="example" class="table table-striped table-bordered table-hover table-responsiv" style="width:100%; font-size: 14px; font-size: 11px;">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>No Pemesanan</th>
                <th>Waktu Pemesanan</th>
                <th>Nama Pemesan</th>
                <th>Nama Tamu</th>
                <th>Malam</th>
                <th>Jumlah Kamar</th>
                <th>Harga</th>
                <th>Nama Kamar</th>
                <th>Tioe Kamar</th>
                <th class="text-white bg-success">Chek-In</th>
                <th class="text-white bg-primary">Chek-Out</th>
                <th class="text-white bg-info">Bayar</th>
                <!-- <th class="text-white bg-warning">Aksi</th> -->
            </tr>
        </thead>
        <tbody>
             <?php 
            $no = 0;
            $idd = $_GET['profi'];
            $sqs = $con->query("SELECT*FROM pemesanan WHERE id_user='$idd' ORDER BY id_pesanan DESC");
            while ($tampil = $sqs->fetch_array()) {
            $kmr = $tampil['id_kamar'];
            $idn = $tampil['id_user'];
            ?>
            <tr>
                <td><?=$no=$no+1?></td>
                <td><?=$tampil['id_pesanan']?></td>
                <td><?=$tampil['Jam_pesan']?></td>
                <?php 
                    $kamar = $con->query("SELECT*FROM login_user WHERE id_user = '$idn'");
                    while ($tpk = $kamar->fetch_array()) {
                ?>
                <td><?=$tpk['nama_user']?></td>
                <?php
                    }
                 ?>
                 <td><?=$tampil['nama_tamu']?></td>
                 <td>
                    <?php 
                    date_default_timezone_set('Asia/Jakarta');
                    $trans = rand(1000,100000);
                    $a = $tampil['tgl_keluar'];
                    $b = $tampil['tgl_masuk'];
                    $in = explode('-',$b);
                    $out = explode('-',$a);
                    $date1 = mktime(0, 0, 0, $in[1], $in[2], $in[0]);
                    $date2 = mktime(0, 0, 0, $out[1], $out[2], $out[0]);
                    $interval = ($date2-$date1)/(3600*24);
                    // $timestamp = strtotime($a);
                    // $timestamps = strtotime($b); 
                    // $msk = idate('d', $timestamp);
                    // $kluar = idate('d', $timestamps);
                    // $malam = $msk - $kluar;
                    echo $interval;
                ?>
                 </td>
                 <td>
                     <?=$tampil['jumlah_kamar'];?>
                 </td>
                <?php 
                    $kamar = $con->query("SELECT*FROM tb_kamar WHERE id_kamar = '$kmr'");
                    while ($tpk = $kamar->fetch_array()) {
                    $a = $tampil['jumlah_kamar'];
                    $b = $tpk['harga_kamar'];
                    $c = $a * $b * $interval;
                ?>
                <td><?php echo "Rp." , number_format($c,0,".",".");; ?></td>
                <td><?=$tpk['nama_kamar']?></td>
                <td><?=$tpk['tipe_kamar']?></td>
                <?php
                    }
                 ?>
                 <td class="text-white bg-success"><?=$tampil['tgl_masuk']?></td>
                 <td class="text-white bg-primary"><?=$tampil['tgl_keluar']?></td>
                 <td class="bg-info"><a class="text-white" style="font-weight: bold;" href="fpdf/buktireservasi.php?isd=<?=$tampil['id_pesanan']?>" target="_blank"><button class="btn btn-warning" style="font-size: 9px;">CETAK</button></a></td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
            <!-- <tr>
                <th>No</th>
                <th>No Pemesanan</th>
                <th>Nama Kamar</th>
                <th>Nama Pemesan</th>
                <th>Chek-In</th>
                <th>Chek-Out</th>
            </tr> -->
        </tfoot>
    </table>
</div>
</div>
</div>
</div>
<br>
<br>