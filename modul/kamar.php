<div class="container-kamar" style="margin-top: 80px;">
  <div class="container">
      <h3 style="font-weight: bold;">Rekomendasi Kamar</h3>
      <div class="line" style="background-color: yellow; height: 2px; width: 25%; margin-top: 20px; margin-bottom: 20px;"></div>
      <div class="col-md-6 p-0">
      <p  style="font-size: 14px; margin-top: 10px; color: grey;">Beberapa pilihan kamar spesial untuk anda. Tipe kamar yang beragam fasilitas kamar yang lengkap dan sesuai dengan yang tertera</p>
      </div>
  <div class="row">
    <?php 
      $kamar = $con->query("SELECT*FROM tb_kamar");
      while ($tkamar = $kamar->fetch_array()) {
    ?>
    <div class="col-xl-3 col-6 p-2">
      <div class="card p-0" style="height: 310px; background: url(gambar/<?=$tkamar['gambar_kamar'];?>); background-size: cover; background-repeat: no-repeat; position: relative; background-position: center;">
        <a class="text-white" href="?page=detail&id_kamar=<?=$tkamar['id_kamar'];?>">
        <div class="col-lg-12 text-white" style="">
          <h6 class="judul-kamar"><?=$tkamar["nama_kamar"];?></h6>
          <span class="badge badge-danger"><?=$tkamar["tipe_kamar"];?></span>
          <p class="desk-kamar"><?=$tkamar["desk_singkat"];?></p>
            <h6 class="harga-kamar">Rp.<?=number_format($tkamar['harga_kamar'],0,".",".")?></h6>
            <!-- <button class="btn btn-primary">learn more</button> -->
            </a>
        </div>
      </div>
    </div>
    <?php
      }
     ?>  
  </div>
</div>