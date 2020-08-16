<div class="jumbotron container" style="background-color:rgb(74,74,74);">
  <div class="row">
    <div class="col">
      <label for="exampleSelect1" style="color:white;">Tatami</label>
      <select class="form-control" id="listTatami" onchange="filterTabel()">
        <option>Semua</option>
        <?php for ($c=0;$c<$turnamen['jumlah_tatami'];$c++){
          ?><option><?=$c+1?></option><?php
        } ?>
      </select>
    </div>
    <div class="col">
      <label for="exampleSelect1" style="color:white;">Kelas</label>
      <select class="form-control" id="listKelas" onchange="filterTabel()">
        <option>Semua</option>
        <?php foreach ($jenis as $key) {
          ?><option><?=$key['kelas']?></option><?php
        } ?>
      </select>
    </div>
    <div class="col">
      <label for="exampleSelect1" style="color:white;">Gender</label>
      <select id="listGender" onchange="filterTabel()" class="form-control">
        <option>Semua</option>
        <option>Male</option>
        <option>Female</option>
      </select>
    </div>
    <div class="col">
      <label for="exampleSelect1" style="color:white;">Bagan</label>
      <select class="form-control" id="listBagan" onchange="filterTabel()">
        <option>Semua</option>
        <?php for ($c=0;$c<$turnamen['jumlah_bagan'];$c++){
          ?><option><?=$c+1?></option><?php
        } ?>
      </select>
    </div>
    <button type="button" name="button" onclick="selanjutnya()" style="background-color:green; color:white;">Ronde Selanjutnya</button>
    <button type="button" name="button" onclick="keluar()" style="background-color:red; color:white; margin-left:10px;">Keluar</button>
  </div>
  <br>
  <table id="myTable" class="table table-striped table-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Kontingen</th>
      <th scope="col">Kelas</th>
      <th scope="col">Gender</th>
      <th scope="col">Tatami</th>
      <th scope="col">Poin</th>
      <th scope="col">Aksi</th>
    </tr>
    <!-- <thead>
    </thead>
    <tbody>
    </tbody> -->
    <?php
    $i=1;
    if (is_array($atlit) || is_object($atlit)){
      foreach ($atlit as $key) {
        ?>
        <tr>
          <td hidden><?=$key['bagan']?></td>
          <td>
            <?=$i?>
          </td>
          <td><?=$key['nama_atlit']?></td>
          <td><?=$key['kontingen']?></td>
          <?php
          foreach ($jenis as $js) {
            if ($js['id'] == $key['id_jenis']) {
              ?>
              <td><?=$js['kelas']?></td>
              <?php
            }
          }
          ?>
          <td><?=$key['gender']?></td>
          <td><?=$key['tatami']?></td>
          <td><?=$key['poin_akhir']?></td>
          <td>
            <a href="<?=base_url('katahome').'/set_data/'.$key['id']?>" style="color:rgb(0, 255, 255);">Mulai</a>
            <a href="<?=base_url('katahome').'/set_menang/'.$key['id'].'/'.$key['hasil_menang'].'/'.$key['bagan']?>" style="color:rgb(251, 255, 0); margin-left:10px;">Lolos</a>
          </td>
        </tr>
        <?php
        $i++;
      }
    }
    ?>
  </table>
</div>
