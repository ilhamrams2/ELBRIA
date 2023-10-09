<div class="container">
<div class="row">
<?php
if (isset($_GET['ubah'])=='ubah-reservasi') {
    $sqlp = $con->query("SELECT*FROM pemesanan WHERE id_pesanan='isset(idt]'");
    $tamps = $sqlp->fetch_array();
    $kdd = $tamps['nama_kamar'];
    $kd = $tamps['tipe_kamar'];
    $kddd = $tamps['id_user'];
?>
<div class="col-md-4">
<h4>UBAH DATA PEMESANAN</h4>
<br>
  <form action="" method="POST" class="was-validated" enctype="multipart/form-data">
        <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="uname">Nama Kamar</label>
                    <select type="text" class="form-control" id="uname" name="nama" required>
                        <?php 
                            $nmakamar = $con->query("SELECT*FROM tb_kamar");
                            while ($kamarnm = $nmakamar->fetch_array()) {
                        ?>
                             <option value='<?=$kamarnm["id_kamar"]?>'<?php if($kamarnm["id_kamar"]==$kdd){ echo 'selected';} ?> ><?=$kamarnm["nama_kamar"]?></option>
                        <?php
                            }
                         ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="uname">nama Pemesan</label>
                    <select type="text" class="form-control" id="uname" name="namap" required>
                        <?php 
                            $nmakamar = $con->query("SELECT*FROM login_user");
                            while ($kamarnm = $nmakamar->fetch_array()) {
                        ?>
                             <option value='<?=$kamarnm["id_user"]?>'<?php if($kamarnm["id_user"]==$kddd){ echo 'selected';} ?> ><?=$kamarnm["nama_user"]?></option>
                        <?php
                            }
                         ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="pwd">Tipe Kamar</label>
                    <select type="text" class="form-control"  name="tipe" required>
                        <?php 
                            $tipe = $con->query("SELECT*FROM tipe_kamar");
                            while ($tipetam = $tipe->fetch_array()) {
                        ?>
                            <option value='<?=$tipetam["tipe_kamar"]?>'<?php if($tipetam["tipe_kamar"]==$kd){ echo 'selected';} ?> ><?=$tipetam["tipe_kamar"]?></option>
                        <?php
                            } 
                         ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="pwd">Chek In</label>
                    <input type="date" class="form-control"  name="in" required value="<?=$tamps['tgl_masuk']?>">
                  </div>
                </div>
               <div class="col-md-6">
                  <div class="form-group">
                    <label for="pwd">Chek Out</label>
                    <input type="date" class="form-control"  name="out" required value="<?=$tamps['tgl_keluar']?>">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                    <label for="pwd">Jumlah Kamarr</label>
                    <input type="number" class="form-control"  name="jumlah" required value="<?=$tamps['jumlah_kamar']?>">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                    <label for="pwd">Nama Pemesan</label>
                    <input type="text" class="form-control"  name="pesanan" required value="<?=$tamps['nama_pemesan']?>">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                    <label for="pwd">Nama Tamu</label>
                    <input type="text" class="form-control"  name="tamu" required value="<?=$tamps['nama_tamu']?>">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                    <label for="pwd">Email</label>
                    <input type="email" class="form-control"  name="email" required value="<?=$tamps['email']?>">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                    <label for="pwd">No Handphone</label>
                    <input type="text" class="form-control"  name="hp" required value="<?=$tamps['no_hp']?>">
                  </div>
               </div>
               <div class="col-md-12">
                  <input type="submit" class="btn btn-primary" name="btnedit" value="UBAH"></input>
              </div>
        </div>
        <?php
        if (isset($_POST['btnedit'])) {
            date_default_timezone_set('Asia/Jakarta');
            $time = date("G:i:s");
            $sqli = $con->query("UPDATE pemesanan SET id_user='$_POST[namap]', id_kamar='$_POST[nama]', nama_pemesan='$_POST[pesanan]', nama_tamu='$_POST[tamu]', email='$_POST[email]', no_hp='$_POST[hp]', tipe_kamar='$_POST[tipe]', tgl_masuk='$_POST[in]', tgl_keluar='$_POST[out]', jumlah_kamar='$_POST[jumlah]', Jam_pesan='$time' WHERE id_pesanan='isset(idt]'");
            if ($sqli) {
                echo "<script>document.location.href='?page=reservasi';</script>";
            }else{
                echo "data tidak masuk";
            }
        }

         ?>
    </form>
</div>
<div class="col-md-8" style="">
<h4>DATA PEMESANAN</h4>
<br>
  <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%; font-size: 14px;">
        <thead style="font-size: 12px;">
            <tr>
                <th>No</th>
                <th>Waktu Pemesanan</th>
                <th>No Pesanan</th>
                <th>Kamar</th>
                <th>Nama Pemesan</th>
                <th>Nama Tamu</th>
                <th>Email</th>
                <th>NO Handphone</th>
                <th>Tipe Kamar</th>
                <th>Chek In</th>
                <th>Chek Out</th>
                <th>Jumlah Kamar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody style="font-size: 12px;">
             <?php 
            $no = 0;
            $sql = $con->query("SELECT*FROM pemesanan");
            while ($tampil = $sql->fetch_array()) {
            ?>
            <tr>
                <td><?=$no=$no+1?></td>
                <td><?=$tampil['Jam_pesan']?></td>
                <td><a href="?page=bayar&idp=<?=$tampil['id_pesanan']?>"><?=$tampil['id_pesanan']?></a></td>
                <td><?=$tampil['id_kamar']?></td>
                <td><?=$tampil['nama_pemesan']?></td>
                <td><?=$tampil['nama_tamu']?></td>
                <td><?=$tampil['email']?></td>
                <td><?=$tampil['no_hp']?></td>
                <td><?=$tampil['tipe_kamar']?></td>
                <td><?=$tampil['tgl_masuk']?></td>
                <td><?=$tampil['tgl_keluar']?></td>
                <td><?=$tampil['jumlah_kamar']?></td>
                <td style="text-align: center; font-size: 16px; margin: auto;"><a href="?page=reservasi&ubah=ubah-reservasi&idt=<?=$tampil['id_pesanan']?>"><i class="fa-solid fa-pen-to-square"></i></a>|<a href="?page=reservasi&hapus=hapus-reservasi&idt=<?=$tampil['id_pesanan']?>"><i class="fa-solid fa-trash-can"></i></a></td>
            </tr>
        <?php 
            }
            if (isset($_GET['hapus'])=='hapus-reservasi') {
                $sqlh = $con->query("DELETE FROM pemesanan WHERE id_pesanan='$_GET[idt]'");
            if ($sqlh) {
                echo "<script>document.location.href='?page=reservasi';</script>";
            }else{
                echo "GAGAL MENGHAPUS";
            }
            }
        ?>
        </tbody>
        <!-- <tfoot>
            <tr>
                <th>No</th>
                <th>Kamar</th>
                <th>Nama Pemesan</th>
                <th>Nama Tamu</th>
                <th>Email</th>
                <th>NO Handphone</th>
                <th>Tipe Kamar</th>
                <th>Chek In</th>
                <th>Chek Out</th>
                <th>Jumlah Kamar</th>
                <th>Aksi</th>
            </tr>
        </tfoot> -->
    </table>
    </div>
<?php 
}else{
?>
<div class="col-md-12">
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
  MASUKAN DATA
</button>
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">MASUKAN DATA</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="" method="POST" class="was-validated" enctype="multipart/form-data">
        <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="uname">Nama Kamar</label>
                    <select type="text" class="form-control" id="uname" name="nama" required>
                        <?php 
                            $nmakamar = $con->query("SELECT*FROM tb_kamar");
                            while ($kamarnm = $nmakamar->fetch_array()) {
                        ?>
                             <option value="<?=$kamarnm['id_kamar']?>"><?=$kamarnm['nama_kamar']?></option>
                        <?php
                            }
                         ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="uname">nama Pemesan</label>
                    <select type="text" class="form-control" id="uname" name="namap" required>
                        <?php 
                            $nmakamar = $con->query("SELECT*FROM login_user");
                            while ($kamarnm = $nmakamar->fetch_array()) {
                        ?>
                             <option value="<?=$kamarnm['id_user']?>"><?=$kamarnm['nama_user']?></option>
                        <?php
                            }
                         ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="pwd">Tipe Kamar</label>
                    <select type="text" class="form-control"  name="tipe" required>
                        <?php 
                            $tipe = $con->query("SELECT*FROM tipe_kamar");
                            while ($tipetam = $tipe->fetch_array()) {
                        ?>
                            <option value="<?=$tipetam['tipe_kamar']?>"><?=$tipetam['tipe_kamar']?></option>
                        <?php
                            } 
                         ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="pwd">Chek In</label>
                    <input type="date" class="form-control"  name="in" required>
                  </div>
                </div>
               <div class="col-md-6">
                  <div class="form-group">
                    <label for="pwd">Chek Out</label>
                    <input type="date" class="form-control"  name="out" required>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                    <label for="pwd">Jumlah Kamarr</label>
                    <input type="number" class="form-control"  name="jumlah" required>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                    <label for="pwd">Nama Pemesan</label>
                    <input type="text" class="form-control"  name="pesanan" required>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                    <label for="pwd">Nama Tamu</label>
                    <input type="text" class="form-control"  name="tamu" required>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                    <label for="pwd">Email</label>
                    <input type="email" class="form-control"  name="email" required>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                    <label for="pwd">No Handphone</label>
                    <input type="text" class="form-control"  name="hp" required>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="form-group form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="remember" required> I agree on blabla.
                    </label>
                  </div>
                  <input type="submit" class="btn btn-primary" name="btn"></input>
              </div>
        </div>
        <?php
        if (isset($_POST['btn'])) {
          date_default_timezone_set('Asia/Jakarta');
            $time = date("G:i:s");
            $sqli = $con->query("INSERT INTO pemesanan VALUES('','$_POST[namap]','$_POST[nama]','$_POST[pesanan]','$_POST[tamu]','$_POST[email]','$_POST[hp]','$_POST[tipe]','$_POST[in]','$_POST[out]','$_POST[jumlah]','$time')");
            if ($sqli) {
                echo "<script>document.location.href='?page=reservasi';</script>";
            }else{
                echo "data tidak masuk";
            }
        }

         ?>
    </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</div>

<div class="col-md-12">
<br>
<h4>DATA PEMESANAN</h4>
<br>
  <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%; font-size: 14px;">
        <thead style="font-size: 12px;">
            <tr>
                <th>No</th>
                <th>Waktu Pemesanan</th>
                <th>No Pesanan</th>
                <th>Kamar</th>
                <th>Nama Pemesan</th>
                <th>Nama Tamu</th>
                <th>Email</th>
                <th>NO Handphone</th>
                <th>Tipe Kamar</th>
                <th>Chek In</th>
                <th>Chek Out</th>
                <th>Jumlah Kamar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody style="font-size: 12px;">
             <?php 
            $no = 0;
            $sql = $con->query("SELECT*FROM pemesanan");
            while ($tampil = $sql->fetch_array()) {
            ?>
            <tr>
                <td><?=$no=$no+1?></td>
                <td><?=$tampil['Jam_pesan']?></td>
                <td><a href="?page=bayar&idp=<?=$tampil['id_pesanan']?>"><?=$tampil['id_pesanan']?></a></td>
                <td><?=$tampil['id_kamar']?></td>
                <td><?=$tampil['nama_pemesan']?></td>
                <td><?=$tampil['nama_tamu']?></td>
                <td><?=$tampil['email']?></td>
                <td><?=$tampil['no_hp']?></td>
                <td><?=$tampil['tipe_kamar']?></td>
                <td><?=$tampil['tgl_masuk']?></td>
                <td><?=$tampil['tgl_keluar']?></td>
                <td><?=$tampil['jumlah_kamar']?></td>
                <td style="text-align: center; font-size: 16px; margin: auto;"><a href="?page=reservasi&ubah=ubah-reservasi&idt=<?=$tampil['id_pesanan']?>"><i class="fa-solid fa-pen-to-square text-warning"></i></a>|<a href="?page=reservasi&hapus=hapus-reservasi&idt=<?=$tampil['id_pesanan']?>"><i class="fa-solid fa-trash-can text-danger"></i></a></td>
            </tr>
        <?php 
            }
            if (isset($_GET['hapus'])=='hapus-reservasi') {
                $sqlh = $con->query("DELETE FROM pemesanan WHERE id_pesanan='isset(idt]'");
            if ($sqlh) {
                echo "<script>document.location.href='?page=reservasi';</script>";
            }else{
                echo "GAGAL MENGHAPUS";
            }
            }
        ?>
        </tbody>
        <!-- <tfoot>
            <tr>
                <th>No</th>
                <th>Kamar</th>
                <th>Nama Pemesan</th>
                <th>Nama Tamu</th>
                <th>Email</th>
                <th>NO Handphone</th>
                <th>Tipe Kamar</th>
                <th>Chek In</th>
                <th>Chek Out</th>
                <th>Jumlah Kamar</th>
                <th>Aksi</th>
            </tr>
        </tfoot> -->
    </table>
    </div>
</div>
</div>
<?php } ?>