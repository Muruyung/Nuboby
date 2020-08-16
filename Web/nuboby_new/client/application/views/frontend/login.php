<br>
<br>
<br>
<br>
<div align="center">
  <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
    <div class="card-header">Log In</div>
    <div class="card-body">
      <!-- <h1 class="display-1">Hello, world!</h1> -->
      <!-- <img src="<?php echo base_url().'assets/img/logo.png'; ?>" alt="Nuboby Logo.png" style="margin-top:-7%;"> -->
      <div style="margin-top:-3%;" align="left">
        <form class="" action="<?=base_url('katahome')?>" method="post">
          <!-- <div class="form-group">
            <label for="exampleInputEmail1">Token</label>
            <input type="text" class="form-control" id="api" placeholder="Enter Token">
          </div> -->
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" id="token" placeholder="Enter Username">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password">
          </div>
          <p class="lead">
            <button type="submit" class="btn btn-primary btn-lg" href="#" onclick="return cek_login()" role="button">Log In</button>
          </p>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function cek_login(){
    var api = "test";
    // var api = document.getElementById('api').value;
    var token = document.getElementById('token').value;
    var password = document.getElementById('password').value;
    if (token == '' || password == ''){
      alert("Tidak boleh ada kolom yang kosong");
      return false;
    }else{
      var link = "<?=base_url('c_login')?>"+"/get/"+token+"/"+password+"/"+api;
      var cek = -3;
      $.ajax({
        type:"GET",
        url:link,
        async:false,
        success:function(isi){
          cek = isi;
        }
      });
      // alert(cek);
      if (cek == 0){
        return true;
      }else{
        if (cek == 1){
          alert("Pertandingan telah selesai");
        }else{
          alert("Token atau password salah");
        }
        return false;
      }
    }
  }
</script>
