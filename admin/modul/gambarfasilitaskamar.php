<div class="container">
<br>
<div class="row">
<?php 
     if (isset($_GET['ubah'])=='ubah-gambar') {
        $sqlu = $con->query("SELECT*FROM gambar_fasilitas WHERE id_gambar='$_GET[idt]'");
        $tamp = $sqlu->fetch_array();
        $kd = $tamp['id_kamar'];
?>
<div class="col-md-4">
<h4 style="text-transform: uppercase;">Ubah Fasilitas Kamar</h4>
<br>
    <form action="" class="was-validated" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="uname">Nama Kamar</label>
                    <select type="number" class="form-control" name="angkah">
                        <?php 
                            $sqlop = $con->query("SELECT*FROM tb_kamar");
                            while ($tampil = $sqlop->fetch_array()) {
                        ?>
                                <option value='<?=$tampil["id_kamar"]?>'<?php if($tampil["id_kamar"]==$kd){ echo 'selected';} ?> ><?=$tampil["nama_kamar"]?></option>
                        <?php
                            }
                         ?>
                    </select> 
                  </div>
                   <div class="form-group">
                    <img src="../gambar/<?=$tamp['gambar_fasilitas']?>" class="img-fluid">
                  </div>
                  <div class="form-group">
                    <label for="uname">Fasilitas Kamar</label>
                    <input type="file" class="form-control" id="uname" placeholder="Masukkan Tipe Kamar" name="gbr" multiple>
                  </div>
                  <input type="submit" class="btn btn-primary" name="buttonedit">
                </form>
                <?php 
                    if (isset($_POST['buttonedit'])) {
                     $a = $_POST['angkah'];
                     $name = $_FILES['gbr']['name'];
                     $file = $_FILES['gbr']['tmp_name'];
                     move_uploaded_file($file,"../gambar/$name");
                     if (empty($_FILES['gbr']['name'])) {
                        $sqli = $con->query("UPDATE gambar_fasilitas set id_kamar='$a' WHERE id_gambar='$_GET[idt]'");
                     }else{
                        $sqli = $con->query("UPDATE gambar_fasilitas set id_kamar='$a', gambar_fasilitas='$name' WHERE id_gambar='$_GET[idt]'");
                     }
                     
                        if ($sqli) {
                           echo "<script>document.location.href='?page=gf-kamar';</script>";
                        }else{
                            echo "<script>document.location.href='?page=gf-kamar';</script>";
                        }
                }
                 ?>
                 <br>
</div>
<div class="col-md-8">
<h4 style="text-transform: uppercase;">Data Fasilitas Kamar</h4>
<br>
  <table id="example" class="table table-striped table-bordered" style="width:100%; font-size: 14px;">
        <thead>
            <tr>
                <th>No</th>
                <th>id_kamar</th>
                <th>Gambar Fasilitas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
             <?php 
            $no = 0;
            $sql = $con->query("SELECT*FROM gambar_fasilitas");
            while ($tampil = $sql->fetch_array()) {
            ?>
            <tr>
                <td><?=$no=$no+1?></td>
                <td><?=$tampil['id_kamar']?></td>
                <td><img src="../gambar/<?=$tampil['gambar_fasilitas']?>" width="100" heigth="100"></td>
                <td style="text-align: center; font-size: 16px; margin: auto;"><a href="?page=gf-kamar&ubah=ubah-gambar&idt=<?=$tampil['id_gambar']?>"><i class="fa-solid fa-pen-to-square"></i></a> | <a href="?page=gf-kamar&hapus=hapus-gambar&idt=<?=$tampil['id_gambar']?>"><i class="fa-solid fa-trash-can"></i></a></td>
            </tr>
        <?php 
            }
            if ($_GET['hapus']=='hapus-gambar') {
                $sqlh = $con->query("DELETE FROM gambar_fasilitas WHERE id_gambar='$_GET[idt]'");
            if ($sqlh) {
                echo "<script>document.location.href='?page=gf-kamar';</script>";
            }else{
                echo "<script>document.location.href='?page=gf-kamar';</script>";
            }
            }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>ID Kamar</th>
                <th>Gambar Fasilitas</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>
<?php
    }else{
?>
<div class="col-md-12">
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
  Masukan Data
</button>
<br>
<br>
<!-- The Modal -->
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
                    <label for="uname">Nama Kamar</label>
                    <select type="number" class="form-control" name="angkah" required>
                        <?php 
                            $sqlop = $con->query("SELECT*FROM tb_kamar");
                            while ($tampil = $sqlop->fetch_array()) {
                        ?>
                                <option value="<?=$tampil['id_kamar']?>"><?=$tampil['nama_kamar']?></option>
                        <?php
                            }
                         ?>
                    </select> 
                  </div>
                  <div class="form-group">
                    <label for="uname">Fasilitas Kamar</label>
                    <input type="file" class="form-control" id="uname" placeholder="Masukkan Tipe Kamar" name="gbr[]" multiple required>
                  </div>
                  <input type="submit" class="btn btn-primary" name="button">
                </form>
                <?php 
                    if (isset($_POST['button'])) {
                    $tempat = "../gambar/";
                    $count = count($_FILES['gbr']['name']);
                    for ($i=0; $i < $count; $i++) { 
                        $gambar    = $_FILES['gbr']['name'][$i];
                        $file    = $_FILES['gbr']['tmp_name'][$i];
                        move_uploaded_file($file,$tempat.$gambar);
                        $sqli = $con->query("INSERT INTO gambar_fasilitas VALUES('','$_POST[angkah]','$gambar')");
                    }
                    if ($sqli) {
                       echo "kamu masukin data";
                    }else{
                        echo "awdkowakdoawdk";
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
<h4 style="text-transform: uppercase;">Data Fasilitas Kamar</h4>
<br>
  <table id="example" class="table table-striped table-bordered" style="width:100%; font-size: 14px;">
        <thead>
            <tr>
                <th>No</th>
                <th>id_kamar</th>
                <th>Gambar Fasilitas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
             <?php 
            $no = 0;
            $sql = $con->query("SELECT*FROM gambar_fasilitas");
            while ($tampil = $sql->fetch_array()) {
            ?>
            <tr>
                <td><?=$no=$no+1?></td>
                <td><?=$tampil['id_kamar']?></td>
                <td><img src="../gambar/<?=$tampil['gambar_fasilitas']?>" width="100" heigth="100"></td>
                <td style="text-align: center; font-size: 16px; margin: auto;"><a href="?page=gf-kamar&ubah=ubah-gambar&idt=<?=$tampil['id_gambar']?>"><i class="fa-solid fa-pen-to-square text-warning"></i></a> | <a href="?page=gf-kamar&hapus=hapus-gambar&idt=<?=$tampil['id_gambar']?>"><i class="fa-solid fa-trash-can text-danger"></i></a></td>
            </tr>
        <?php 
            }
            if (isset($_GET['hapus'])=='hapus-gambar') {
                $sqlh = $con->query("DELETE FROM gambar_fasilitas WHERE id_gambar='$_GET[idt]'");
            if ($sqlh) {
                echo "<script>document.location.href='?page=gf-kamar';</script>";
            }else{
                echo "<script>document.location.href='?page=gf-kamar';</script>";
            }
            }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>ID Kamar</th>
                <th>Gambar Fasilitas</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>
</div>
</div>
<?php } ?>