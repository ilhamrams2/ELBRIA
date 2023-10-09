<div class="container">
  <br>
<div class="row">
<?php 
    if (isset($_GET['ubah'])=='ubah-fasilitas')  {
        $sqle = $con->query("SELECT*FROM fasilitas_hotel WHERE id_fasilitas='$_GET[id]'");
        $edit = $sqle->fetch_array();
?>
<div class="col-md-4">
  <h4 style="text-transform: uppercase;">Ubah Data Fasilitas Hotel</h4>
<br>
<form action="" class="was-validated" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="uname">UBAH Fasilitas Hotel</label>
                    <input type="text" class="form-control" id="uname" name="fasi" required value="<?=$edit['fasilitas_hotel']?>">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Keterangan</label>
                    <input type="text" class="form-control" id="pwd" name="keter" required value="<?=$edit['keterangan']?>">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Gambar</label>
                    <input type="file" class="form-control" id="pwd" name="gbr" required>
                  </div>
                  <div class="form-group">
                      <img src="../gambar/<?=$edit['gambar']?>" class="img-fluid">
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
<div class="col-md-8">
  <h4 style="text-transform: uppercase;">Data Fasilitas Hotel</h4>
<br>
<table id="example" class="table table-striped table-bordered" style="width:100%; font-size: 12px;">
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
                <td style="text-align: center; font-size: 16px; margin: auto;"><a href="?page=fasilitas-hotel&ubah=ubah-fasilitas&id=<?=$tampil['id_fasilitas']?>"><i class="fa-solid fa-pen-to-square text-warning"></i></a> | <a href="?page=fasilitas-hotel&hapus=hapus-fasilitas&id=<?=$tampil['id_fasilitas']?>"><i class="fa-solid fa-trash-can text-danger"></i></a></td>
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
<?php  
    }else{
 ?>
<div class="col-md-12">
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
                    <label for="uname">Fasilitas Hotel</label>
                    <input type="text" class="form-control" id="uname"  name="fasi" required>
                  </div>
                  <div class="form-group">
                    <label for="pwd">Keterangan</label>
                    <input type="text" class="form-control" id="pwd"  name="keter" required>
                  </div>
                  <div class="form-group">
                    <label for="pwd">Gambar</label>
                    <input type="file" class="form-control" id="pwd"  name="gbr" required>
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

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</div>
<div class="col-md-12">
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
                <td style="text-align: center; font-size: 16px; margin: auto;"><a href="?page=fasilitas-hotel&ubah=ubah-fasilitas&id=<?=$tampil['id_fasilitas']?>"><i class="fa-solid fa-pen-to-square text-warning"></i></a> | <a href="?page=fasilitas-hotel&hapus=hapus-fasilitas&id=<?=$tampil['id_fasilitas']?>"><i class="fa-solid fa-trash-can text-danger"></i></a></td>
            </tr>
        <?php 
            }
             if(isset($_GET['hapus'])=='hapus-fasilitas'){
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
<?php } ?>