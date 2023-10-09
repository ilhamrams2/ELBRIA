<?php 
include '../../lib/koneksi.php';
 ?>
<div class="container">
        <div class="row">
            <div class="col-md-6">
<?php 
    if ($_GET['ubah']=='ubah-fasilitas')  {
        $sqle = $con->query("SELECT*FROM fasilitas_hotel WHERE id_fasilitas='$_GET[id]'");
        $edit = $sqle->fetch_array();
?>
                
                <div class="container">
                  <br>
<h4 style="text-transform: uppercase;">ubah Fasilitas hotel</h4>
<br>
                  <form action="" class="was-validated" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="uname">UBAH Fasilitas Hotel</label>
                    <input type="text" class="form-control" id="uname" placeholder="Enter " name="fasi" required value="<?=$edit['fasilitas_hotel']?>">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Keterangan</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="keter" value="<?=$edit['keterangan']?>">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Gambar</label>
                    <input type="file" class="form-control" id="pwd" placeholder="Enter password" name="gbr">
                  </div>
                  <div class="form-group">
                      <img src="../gambar/<?=$edit['gambar']?>" class="img-fluid">
                  </div>
                  <div class="form-group form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="remember" required> I agree on blabla.
                    </label>
                  </div>
                  <input type="submit" class="btn btn-primary" name="btnedit"></input>
                </form>
                <br>
<?php
    if (isset($_POST['btnedit'])) {
        $name = $_FILES['gbr']['name'];
        $file = $_FILES['gbr']['tmp_name'];
        $a = $_POST['fasi'];
        $b = $_POST['keter'];
        move_uploaded_file($file,"../gambar/$name");
        if (empty($_FILES['gbr']['name'])) {
            $sqledit = $con->query("UPDATE fasilitas_hotel set fasilitas_hotel='$a', keterangan='$b' WHERE id_fasilitas='$_GET[id]'");
        }else{
            $sqledit = $con->query("UPDATE fasilitas_hotel set fasilitas_hotel='$a', keterangan='$b', gambar='$name' WHERE id_fasilitas='$_GET[id]'");  
        }
        if ($sqledit) {
            echo "<script>document.location.href='?page=fasilitas-hotel';</script>";
        }else{
            echo "edot kaga berhasil";
        }

    } 
?>
</div>
<?php  
    }else{
 ?>
                <div class="container">
<br>
<h4 style="text-transform: uppercase;">Input Fasilitas Hotel</h4>
<br>
                <form action="" class="was-validated" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="uname">Fasilitas Hotel</label>
                    <input type="text" class="form-control" id="uname" placeholder="Enter username" name="fasi" required>
                  </div>
                  <div class="form-group">
                    <label for="pwd">Keterangan</label>
                    <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="keter" required>
                  </div>
                  <div class="form-group">
                    <label for="pwd">Gambar</label>
                    <input type="file" class="form-control" id="pwd" placeholder="Enter password" name="gbr" required>
                  </div>
                  <div class="form-group form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="remember" required> I agree on blabla.
                    </label>
                  </div>
                  <input type="submit" class="btn btn-primary" name="btn"></input>
                </form>
                <br>
                <?php
                if (isset($_POST['btn'])) {
                    $name    = $_FILES['gbr']['name'];
                    $file    = $_FILES['gbr']['tmp_name'];
                    move_uploaded_file($file,"../gambar/$name");
                    $sqli = $con->query("INSERT INTO fasilitas_hotel VALUES('','$_POST[fasi]','$_POST[keter]','$name')");
                    if ($sqli) {
                       echo "kamu masukin data";
                    }else{
                        echo "awdkowakdoawdk";
                    }
                };    
                ?>
                </div>
<?php 
}
?>
    
</div>
            <div class="col-md-6">
        <div class="container">
<br>
<h4 style="text-transform: uppercase;">Data Fasilitas Hotel</h4>
<br>
        <table id="example" class="table table-striped table-bordered" style="width:100%; font-size: 14px;">
        <thead>
            <tr>
                <th>No</th>
                <th>Fasilitas</th>
                <th>Keterangan</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
             <?php 
            $no = 0;
            $sql = $con->query("SELECT*FROM fasilitas_hotel");
            while ($tampil = $sql->fetch_array()) {
            ?>
            <tr>
                <td><?=$no=$no+1?></td>
                <td><?=$tampil['fasilitas_hotel']?></td>
                <td><?=$tampil['keterangan']?></td>
                <td><img src="../gambar/<?=$tampil['gambar']?>" class="img-fluid" width="100" heigth="100"></td>
                <td style="text-align: center; font-size: 16px; margin: auto;"><a href="?page=fasilitas-hotel&ubah=ubah-fasilitas&id=<?=$tampil['id_fasilitas']?>"><i class="fa-solid fa-pen-to-square"></i></a> | <a href="?page=fasilitas-hotel&hapus=hapus-fasilitas&id=<?=$tampil['id_fasilitas']?>"><i class="fa-solid fa-trash-can"></i></a></td>
            </tr>
        <?php 
            }
             if($_GET['hapus']=='hapus-fasilitas'){
            $sqlhapus =$con->query("DELETE FROM fasilitas_hotel WHERE id_fasilitas ='$_GET[id]'");
            if ($sqlhapus){
                echo "<script>document.location.href='?page=fasilitas-hotel';</script>";
              }else{
                echo "<script>document.location.href='?page=fasilitas-hotel';</script>";
              }
            }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Fasilitas</th>
                <th>Keterangan</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
     </div>
    </div>