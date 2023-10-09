<div class="container">
<div class="row">
<?php 
if (isset($_GET['ubah'])=='ubah-tipe') {
    $sqle = $con->query("SELECT*FROM tipe_kamar WHERE id_tipe='$_GET[idt]'");
    $edit = $sqle->fetch_array();
?>
<div class="col-md-4">
<h4>UBAH TIPE KAMAR</h4>
<br>
                <form action="" class="was-validated" method="POST">
                  <div class="form-group">
                    <label for="uname">Ubah Tipe Kamar</label>
                    <input type="text" class="form-control" id="uname" placeholder="Masukkan Tipe Kamar" name="ti" required value="<?=$edit['tipe_kamar']?>">
                  </div>
                  <input type="submit" class="btn btn-primary" name="btnedit">
                </form>
                <?php 
                    if (isset($_POST['btnedit'])) {
                        $sqlee = $con->query("UPDATE tipe_kamar SET tipe_kamar='$_POST[ti]' WHERE id_tipe='$_GET[idt]'");
                        if ($sqlee) {
                            echo "<script>document.location.href='?page=tipe-kamar';</script>";
                        }else{
                            echo "<script>document.location.href='?page=tipe-kamar';</script>";
                        }
                    }
                 ?>
</div>
<div class="col-md-8">
    <h4>DATA TIPE KAMAR</h4>
<br>
     <table id="example" class="table table-striped table-bordered" style="width:100%; font-size: 14px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Tipe Kamar</th>
                <th>Jumlah Kamar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
             <?php 
            $no = 0;
            $sql = $con->query("SELECT*FROM tipe_kamar");
            while ($tampil = $sql->fetch_array()) {
            ?>
            <tr>
                <td><?=$no=$no+1?></td>
                <td><?=$tampil['tipe_kamar']?></td>
                <td>200</td>
                <td style="text-align: center; font-size: 16px; margin: auto;"><a href="?page=tipe-kamar&ubah=ubah-tipe&idt=<?=$tampil['id_tipe']?>"><i class="fa-solid fa-pen-to-square"></i></a> | <a href="?page=tipe-kamar&hapus=hapus-tipe&idt=<?=$tampil['id_tipe']?>"><i class="fa-solid fa-trash-can"></i></a></td>
            </tr>
        <?php 
            }
            if ($_GET['hapus']=='hapus-tipe') {
                $sqlh = $con->query("DELETE FROM tipe_kamar WHERE id_tipe='$_GET[idt]'");
            if ($sqlh) {
                echo "data kehapus";
            }else{
                echo "data gak kehapus";
            }
            }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Tipe Kamar</th>
                <th>Jumlah Kamar</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>
<?php
    }else{
?>
<div class="col-md-12">
    <br>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
  Masukan Data
</button>
<br>
<br>
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Masukan Data</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="" class="was-validated" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="uname">Tipe Kamar</label>
                    <input type="text" class="form-control" id="uname" placeholder="Masukkan Tipe Kamar" name="tipe" required>
                  </div>
                  <input type="submit" class="btn btn-primary" name="btn">
                </form>
                <?php 
                    if (isset($_POST['btn'])) {
                        $sql = $con->query("INSERT INTO tipe_kamar VALUES('','$_POST[tipe]')");
                        if ($sql) {
                            echo "Data berhasil masuk";
                        }else{
                            echo "data gak masuk coy";
                        }
                    }
                ?>
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
<h4>DATA TIPE KAMAR</h4>
<br>
 <table id="example" class="table table-striped table-bordered" style="width:100%; font-size: 14px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Tipe Kamar</th>
                <th>Jumlah Kamar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
             <?php 
            $no = 0;
            $sql = $con->query("SELECT*FROM tipe_kamar");
            while ($tampil = $sql->fetch_array()) {
            ?>
            <tr>
                <td><?=$no=$no+1?></td>
                <td><?=$tampil['tipe_kamar']?></td>
                <td>200</td>
                <td style="text-align: center; font-size: 16px; margin: auto;"><a href="?page=tipe-kamar&ubah=ubah-tipe&idt=<?=$tampil['id_tipe']?>"><i class="fa-solid fa-pen-to-square text-warning"></i></a> | <a href="?page=tipe-kamar&hapus=hapus-tipe&idt=<?=$tampil['id_tipe']?>"><i class="fa-solid fa-trash-can text-danger"></i></a></td>
            </tr>
        <?php 
            }
            if (isset($_GET['hapus'])=='hapus-tipe') {
                $sqlh = $con->query("DELETE FROM tipe_kamar WHERE id_tipe='$_GET[idt]'");
            if ($sqlh) {
                echo "data kehapus";
            }else{
                echo "data gak kehapus";
            }
            }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Tipe Kamar</th>
                <th>Jumlah Kamar</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>
<?php } ?>
</div>
</div>