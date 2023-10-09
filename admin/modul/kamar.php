<style>
  li{
    list-style: none !important;
  }
</style>
<div class="container">
  <br>
  <div class="row">
<?php 
    if (isset($_GET['ubah'])=='ubah-kamar') {
        $sqle = $con->query("SELECT*FROM tb_kamar WHERE id_kamar='$_GET[idt]'");
        $tamp = $sqle->fetch_array();
        $ae = $tamp['tipe_kamar'];
?>
<div class="col-md-6">
  <h4>UBAH DATA KAMAR</h4>
<br>
  <form action="" method="POST" class="was-validated" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="pwd">Nama Kamar</label>
                    <input type="text" class="form-control" required name="nama" value="<?=$tamp['nama_kamar']?>">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Tipe Kamar</label>
                    <select type="text" class="form-control" required name="tipe">
                        <?php 
                            $tipe = $con->query("SELECT*FROM tipe_kamar");
                            while ($tipetam = $tipe->fetch_array()) {
                        ?>
                            <option value='<?=$tipetam["tipe_kamar"]?>'<?php if($tipetam["tipe_kamar"]==$ae){ echo 'selected';} ?> ><?=$tipetam["tipe_kamar"]?></option>
                        <?php
                            } 
                         ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="pwd">Harga Kamar</label>
                    <input type="number" class="form-control" required name="harga" value="<?=$tamp['harga_kamar']?>">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Gambar Kamar</label>
                    <input type="file" class="form-control" name="gbr">
                  </div>
                  <div class="form-group">
                    <img class="img-fluid" src="../gambar/<?=$tamp['gambar_kamar']?>" width="150">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Desk Kamar</label>
                    <textarea type="text" class="form-control" required name="desksingkat"><?=$tamp['desk_singkat']?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="pwd">Desk Kamar</label>
                    <textarea type="text" class="form-control" required name="desk"><?=$tamp['desk_kamar']?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="pwd">jumlah Kamar</label>
                    <input type="number" class="form-control" required name="jum" value="<?=$tamp['jumlah_kamar']?>">
                  </div>
                  <input type="submit" class="btn btn-primary" name="btnedit"></input>
        <?php
        if (isset($_POST['btnedit'])) {
            $name = $_FILES['gbr']['name'];
            $file = $_FILES['gbr']['tmp_name'];
            move_uploaded_file($file,"../gambar/$name");
            if (empty($_FILES['gbr']['name'])) {
               $sqli = $con->query("UPDATE tb_kamar SET nama_kamar='$_POST[nama]', tipe_kamar='$_POST[tipe]', harga_kamar='$_POST[harga]', desk_singkat='$_POST[desksingkat]', desk_kamar='$_POST[desk]',jumlah_kamar='$_POST[jum]' WHERE id_kamar='$_GET[idt]'");  
            }else{
                 $sqli = $con->query("UPDATE tb_kamar SET nama_kamar='$_POST[nama]', tipe_kamar='$_POST[tipe]', harga_kamar='$_POST[harga]', desk_singkat='$_POST[desksingkat]', desk_singkat='$_POST[desk]', gambar_kamar='$name',jumlah_kamar='$_POST[jum]' WHERE id_kamar='$_GET[idt]'");
            }
           
            if ($sqli) {
                echo "<script>alert('Data Berhasil di Edit');document.location.href='?page=kamar'</script>";
            }else{
                echo "<script>alert('Data Gagal di Edit');</script>";
            }
        }

         ?>
</form>
</div>
<div class="col-md-6">
  <h4>DATA KAMAR</h4>
<br>
  <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%; font-size: 14px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Id kamar</th>
                <th>Jumlah Kamar</th>
                <th>Nama Kamar</th>
                <th>Harga Kamar</th>
                <th>Deskripsi singkat</th>
                <th>Deskripsi</th>
                <th>Gambar kamar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
             <?php 
            $no = 0;
            $sql = $con->query("SELECT*FROM tb_kamar");
            while ($tampil = $sql->fetch_array()) {
            ?>
            <tr>
                <td><?=$no=$no+1?></td>
                <td><?=$tampil['id_kamar']?></td>
                <td><?=$tampil['nama_kamar']?></td>
                <td><?=$tampil['tipe_kamar']?></td>
                <td><?=$tampil['harga_kamar']?></td>
                <td><?=$tampil['desk_singkat']?></td>
                <td class="text-center"><?=$tampil['desk_kamar']?></td>
                <td><img src="../gambar/<?=$tampil['gambar_kamar']?>" class="img-fluid" width="100"></td>
                <td style="text-align: center; font-size: 16px; margin: auto;"><a href="?page=kamar&ubah=ubah-kamar&idt=<?=$tampil['id_kamar']?>"><i class="fa-solid fa-pen-to-square text-warning"></i></a> | <a href="?page=kamar&hapus=hapus-kamar&idt=<?=$tampil['id_kamar']?>"><i class="fa-solid fa-trash-can text-danger"></i></a></td>
            </tr>
        <?php 
            }
            if ($_GET['hapus']=='hapus-kamar') {
                $sqlh = $con->query("DELETE FROM tb_kamar WHERE id_kamar='$_GET[idt]'");
            if ($sqlh) {
                echo "<script>document.location.href='?page=kamar';</script>";
            }else{
                echo "GAGAL MENGHAPUS";
            }
            }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Id kamar</th>
                <th>Jumlah Kamar</th>
                <th>Nama Kamar</th>
                <th>Harga Kamar</th>
                <th>Deskripsi</th>
                <th>Gambar kamar</th>
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
         <form action="" class="was-validated" method="POST" enctype="multipart/form-data">   
                  <div class="form-group">
                    <label for="pwd">Nama Kamar</label>
                    <input type="text" class="form-control" required name="nama">
                  </div>               
                  <div class="form-group">
                    <label for="pwd">Tipe Kamar</label>
                    <select type="text" class="form-control" required name="tipe">
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
                  <div class="form-group">
                    <label for="pwd">Harga Kamar</label>
                    <input type="number" class="form-control" required name="harga">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Gambar Kamar</label>
                    <input type="file" class="form-control" required name="gbr">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Desk singkat</label>
                    <textarea type="text" class="form-control" required name="desksingkat"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="pwd">Desk Kamar</label>
                    <textarea type="text" class="form-control" required name="desk"></textarea>
                  </div>
                   <div class="form-group">
                    <label for="pwd">Jumlah Kamar</label>
                    <input type="number" class="form-control" required name="jum">
                  </div>
                  <input type="submit" class="btn btn-primary" name="btn"></input>
              
        <?php
        if (isset($_POST['btn'])) {
            $name = $_FILES['gbr']['name'];
            $file = $_FILES['gbr']['tmp_name'];
            move_uploaded_file($file,"../gambar/$name");
            $sqli = $con->query("INSERT INTO tb_kamar VALUES('','$_POST[nama]','$_POST[tipe]','$_POST[harga]',desk_singkat='$_POST[desksingkat]','$_POST[desk]','$name','$_POST[jum]')");
            if ($sqli) {
                echo "Data masuk";
            }else{
                echo "data tidak masuk";
            }
        }

         ?>
    </form>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</div>
</div>
<div class="col-md-12">
  <br>
  <h4>DATA KAMAR</h4>
<br>
  <table id="example" class="table table-striped table-bordered" style="width:100%; font-size: 14px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Id kamar</th>
                <th>Jumlah Kamar</th>
                <th>Nama Kamar</th>
                <th>Harga Kamar</th>
                <th>Deskripsi singkat</th>
                <th>Deskripsi</th>
                <th>Gambar kamar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
             <?php 
            $no = 0;
            $sql = $con->query("SELECT*FROM tb_kamar");
            while ($tampil = $sql->fetch_array()) {
            ?>
            <tr>
                <td><?=$no=$no+1?></td>
                <td><?=$tampil['id_kamar']?></td>
                <td><?=$tampil['nama_kamar']?></td>
                <td><?=$tampil['tipe_kamar']?></td>
                <td><?=$tampil['harga_kamar']?></td>
                <td><?=$tampil['desk_singkat']?></td>
                <td class="text-center"><?=$tampil['desk_kamar']?></td>
                <td><img src="../gambar/<?=$tampil['gambar_kamar']?>" class="img-fluid" width="100"></td>
                <td style="text-align: center; font-size: 16px; margin: auto;"><a href="?page=kamar&ubah=ubah-kamar&idt=<?=$tampil['id_kamar']?>"><i class="fa-solid fa-pen-to-square text-warning"></i></a> | <a href="?page=kamar&hapus=hapus-kamar&idt=<?=$tampil['id_kamar']?>"><i class="fa-solid fa-trash-can text-danger"></i></a></td>
            </tr>
        <?php 
            }
            if (isset($_GET['hapus'])=='hapus-kamar') {
                $sqlh = $con->query("DELETE FROM tb_kamar WHERE id_kamar='$_GET[idt]'");
            if ($sqlh) {
                echo "<script>document.location.href='?page=kamar';</script>";
            }else{
                echo "GAGAL MENGHAPUS";
            }
            }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Id kamar</th>
                <th>Jumlah Kamar</th>
                <th>Nama Kamar</th>
                <th>Harga Kamar</th>
                <th>Deskripsi</th>
                <th>Gambar kamar</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
</div>
</div>
<?php } ?>