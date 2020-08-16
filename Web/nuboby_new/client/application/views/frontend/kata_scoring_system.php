<h4 class="text-white"><b>Tatami <span id="tatami"><?=$atlit['tatami']?></span></b></h4>
<div class="" style="border:5px solid #ebeaec;" align="center">
  <!-- <h1 class="display-1">Hello, world!</h1> -->
  <br>
  <br>
  <div class="d-flex p-2 bg-secondary">
    <h3 style="color:black;">
      <b><span id="kelas"><?=$jenis['kelas']?></span> <span id="nomor_tanding">Kata</span> <span id="gender"><?=$atlit['gender']?></span> Ronde <span id="ronde"><?=$jenis['ronde']?></span> Bagan <span id="bagan"><?=$atlit['bagan']?></span></b>
    </h3>
  </div>

  <div class="container-fluid" style="margin-left:0px;">
    <div class="row">
      <div class="border border-danger col col-lg-3" id="kotak_warna" onclick="changeColor()" style="background-color:red">
        <h1 class="text-white" style="font-size:350%">Poin Akhir</h1>
        <h1 class="text-white" style="font-size:750%">(<span id="poin_akhir"></span>)</h1>
      </div>
      <div class="col-md-4" align="left">
        <br>
        <h2 class="text-white" id="nama_atlit" style="text-transform:uppercase; font-size:500%"><?=$atlit['nama_atlit']?></h2>
        <h2 class="text-white" id="kontingen" style="font-size:300%"><?=$atlit['kontingen']?></h2>
        <h2 class="text-white" id="match">Pertandingan ke-<?=$jenis['match']?></h2>
        <br>
      </div>
      <div class="border col col-lg-5" id="countdown" onclick="startTimer()" style="display:none;background-color:white;">
        <h1 style="font-size:1500%; color:black;"><span id="count_time">05.00</span></h1>
      </div>
    </div>
    <br>
    <br>
    <div class="container">
    </div>
    <div class="row">
      <div class="col bg-dark col-lg-1" style="border:2px solid black;">
        <h2 class="text-white"><b>TEC</b></h2>
      </div>
      <div class="col bg-dark col-lg-1" style="border:2px solid black;">
        <h2 class="text-white" id="TEC1" name="juri1"></h2>
      </div>
      <div class="col bg-dark col-lg-1" style="border:2px solid black;">
        <h2 class="text-white" id="TEC2" name="juri2"></h2>
      </div>
      <div class="col bg-dark col-lg-1" style="border:2px solid black;">
        <h2 class="text-white" id="TEC3" name="juri3"></h2>
      </div>
      <div class="col bg-dark col-lg-1" style="border:2px solid black;">
        <h2 class="text-white" id="TEC4" name="juri4"></h2>
      </div>
      <div class="col bg-dark col-lg-1" style="border:2px solid black;">
        <h2 class="text-white" id="TEC5" name="juri5"></h2>
      </div>
      <!-- <div class="col bg-dark col-lg-1" style="border:2px solid black;">
        <h2 class="text-white" id="TEC6" name="juri6"></h2>
      </div>
      <div class="col bg-dark col-lg-1" style="border:2px solid black;">
        <h2 class="text-white" id="TEC7" name="juri7"></h2>
      </div> -->
      <div class="col bg-dark col-lg-2" style="border-left:2px solid black;border-top:2px solid black;border-bottom:2px solid black;">
        <h2 class="text-white">Total x 70%</h2>
      </div>
      <div class="col bg-dark col-lg-auto" style="border-top:2px solid black;border-bottom:2px solid black;">
        <h2 class="text-white">:</h2>
      </div>
      <div class="col bg-dark col-lg-1" style="border-top:2px solid black;border-bottom:2px solid black;">
        <h2 class="text-white" id="TECTOTAL"></h2>
      </div>
    </div>
    <div class="row">
      <div class="col bg-dark col-lg-1" style="border:2px solid black;">
        <h2 class="text-white"><b>ATH</b></h2>
      </div>
      <div class="col bg-dark col-lg-1" style="border:2px solid black;">
        <h2 class="text-white" id="ATH1" name="juri1"></h2>
      </div>
      <div class="col bg-dark col-lg-1" style="border:2px solid black;">
        <h2 class="text-white" id="ATH2" name="juri2"></h2>
      </div>
      <div class="col bg-dark col-lg-1" style="border:2px solid black;">
        <h2 class="text-white" id="ATH3" name="juri3"></h2>
      </div>
      <div class="col bg-dark col-lg-1" style="border:2px solid black;">
        <h2 class="text-white" id="ATH4" name="juri4"></h2>
      </div>
      <div class="col bg-dark col-lg-1" style="border:2px solid black;">
        <h2 class="text-white" id="ATH5" name="juri5"></h2>
      </div>
      <!-- <div class="col bg-dark col-lg-1" style="border:2px solid black;">
        <h2 class="text-white" id="ATH6" name="juri6"></h2>
      </div>
      <div class="col bg-dark col-lg-1" style="border:2px solid black;">
        <h2 class="text-white" id="ATH7" name="juri7"></h2>
      </div> -->
      <div class="col bg-dark col-lg-2" style="border-left:2px solid black;border-top:2px solid black;border-bottom:2px solid black;">
        <h2 class="text-white">total x 30%</h2>
      </div>
      <div class="col bg-dark col-lg-auto" style="border-top:2px solid black;border-bottom:2px solid black;">
        <h2 class="text-white">:</h2>
      </div>
      <div class="col bg-dark col-lg-1" style="border-top:2px solid black;border-bottom:2px solid black;">
        <h2 class="text-white" id="ATHTOTAL"></h2>
      </div>
    </div>
    <br>
    <br>
    <br>
    <button type="button" name="button" onclick="selesai()">Selesai</button>
    <div id="garis_kotak">
    </div>
  </div>
</div>
