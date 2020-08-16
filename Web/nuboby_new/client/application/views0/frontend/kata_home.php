<div class="jumbotron container" style="background-color:rgb(74,74,74);">
  <div class="row">
    <div class="col">
      <label for="exampleSelect1" style="color:white;">Tatanami</label>
      <select class="form-control" id="exampleSelect1">
        <option value="all">Semua</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>
    <div class="col">
      <label for="exampleSelect1" style="color:white;">Kelas</label>
      <select class="form-control" id="exampleSelect1">
        <option value="all">Semua</option>
        <?php foreach ($jenis as $key) {
          ?><option value="<?=$key->kelas?>"><?=$key->kelas?></option><?php
        } ?>
      </select>
    </div>
    <div class="col">
      <label for="exampleSelect1" style="color:white;">Gender</label>
      <select class="form-control" id="exampleSelect1">
        <option value="all">Semua</option>
        <option value="Male">Laki-laki</option>
        <option value="Female">Perempuan</option>
      </select>
    </div>
    <div class="col">
      <label for="exampleSelect1" style="color:white;">Bagan</label>
      <select class="form-control" id="exampleSelect1">
        <option value="all">Semua</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>
    <button type="button" name="button" onclick="keluar()" style="background-color:red; color:white;">Log Out</button>
  </div>
  <br>
  <table class="table table-striped table-dark">
    <thead>
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
    </thead>
    <tbody>
      <?php
      $i=1;
      foreach ($atlit as $key) {
        ?>
        <tr>
          <td>
            <?=$i?>
          </td>
          <td><?=$key->nama_atlit?></td>
          <td><?=$key->kontingen?></td>
          <?php
          foreach ($jenis as $js) {
            if ($js->id == $key->id_jenis) {
              ?>
              <td><?=$js->kelas?></td>
              <?php
            }
          }
           ?>
          <td><?=$key->gender?></td>
          <td><?=$key->tatami?></td>
          <td><?=$key->poin_akhir1?></td>
          <td><a href="<?=base_url('katahome').'/set_data/'.$key->id?>" style="color:rgb(39, 150, 194);">Mulai</a> <a href="#" style="color:rgb(255, 71, 81); margin-left:10px;">Hapus</a></td>
        </tr>
        <?php
        $i++;
      }
       ?>
    </tbody>
  </table>
</div>
