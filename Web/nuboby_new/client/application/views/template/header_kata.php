<!doctype html>
<html lang="en" id="layar_penuh">
  <head>
    <title>Nuboby</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="<?php //echo base_url().'assets/css/bootstrap.min.css'; ?>"> -->
    <script type="text/javascript">
    var start = false;
    var timer;

    function changeColor(){
      var kotak = document.getElementById('kotak_warna');
      // alert(kotak);
      if (kotak.style.backgroundColor=='red'){
        kotak.style.backgroundColor = 'blue';
      }else{
        kotak.style.backgroundColor = 'red';
      }
    }

    function selesai(){
      var link = "<?=base_url('kata')?>"+"/setNull/"+document.getElementById('poin_akhir').innerHTML;
      $.ajax({
        url:link,
        success:function(){
          location.replace("<?=base_url('katahome')?>");
        }
      });
    }

    function startTimer(){
      if (!start){
        start = true;
        timer = 60*5;
      }
    }

    function update_auto(){
      // banyak();
      document.getElementById('garis_kotak').setAttribute("style","margin-bottom: "+ (window.innerHeight)/3 +"px;");
      window.test = setInterval(function(){ulang();}, 1000);

      // for (c=1 ; c <= 7 ; c++){
      //   // var cek = -3;
      // }
    }

    document.addEventListener('keydown', function(event) {
      if (event.keyCode == 70) {
        document.getElementById('countdown').style.display = "";
      }
    }, true);

    function ulang(){
      if(start){
        var minutes, seconds;
        var display = document.querySelector('#count_time');
        var warna = document.getElementById('countdown');
        if (timer > 15){
          warna.style.backgroundColor = "yellow";
        }else{
          warna.style.backgroundColor = "red";
        }
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
          timer = duration;
        }
      }
      var txt = "test";
      var link = "<?=base_url('kata')?>"+"/getPoin/";
      $.ajax({
        type:"GET",
        url:link,
        async:false,
        success:function(isi){
          txt = isi;
        }
      });
      var obj = JSON.parse(txt);
      // var tec = [obj[0].poinTec,obj[1].poinTec,obj[2].poinTec,obj[3].poinTec,obj[4].poinTec,obj[5].poinTec,obj[6].poinTec];
      // var ath = [obj[0].poinAth,obj[1].poinAth,obj[2].poinAth,obj[3].poinAth,obj[4].poinAth,obj[5].poinAth,obj[6].poinAth];
      var tec = [obj[0].poinTec,obj[1].poinTec,obj[2].poinTec,obj[3].poinTec,obj[4].poinTec];
      var ath = [obj[0].poinAth,obj[1].poinAth,obj[2].poinAth,obj[3].poinAth,obj[4].poinAth];
      tec = tec.sort();
      ath = ath.sort();

      // TEC
      ///
      if ((obj[0].poinTec == tec[0] || obj[0].poinTec == tec[4]) && (tec[0] != 0 || tec[1] != 0)){
        document.getElementById('TEC1').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[0].poinTec+"</span>";
      }else{
        document.getElementById('TEC1').innerHTML = obj[0].poinTec;
      }
      ///
      if ((obj[1].poinTec == tec[0] || obj[1].poinTec == tec[4]) && (tec[0] != 0 || tec[1] != 0)){
        document.getElementById('TEC2').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[1].poinTec+"</span>";
      }else{
        document.getElementById('TEC2').innerHTML = obj[1].poinTec;
      }
      ///
      if ((obj[2].poinTec == tec[0] || obj[2].poinTec == tec[4]) && (tec[0] != 0 || tec[1] != 0)){
        document.getElementById('TEC3').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[2].poinTec+"</span>";
      }else{
        document.getElementById('TEC3').innerHTML = obj[2].poinTec;
      }
      ///
      if ((obj[3].poinTec == tec[0] || obj[3].poinTec == tec[4]) && (tec[0] != 0 || tec[1] != 0)){
        document.getElementById('TEC4').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[3].poinTec+"</span>";
      }else{
        document.getElementById('TEC4').innerHTML = obj[3].poinTec;
      }
      ///
      if ((obj[4].poinTec == tec[0] || obj[4].poinTec == tec[4]) && (tec[0] != 0 || tec[1] != 0)){
        document.getElementById('TEC5').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[4].poinTec+"</span>";
      }else{
        document.getElementById('TEC5').innerHTML = obj[4].poinTec;
      }
      // if ((obj[0].poinTec == tec[0] || obj[0].poinTec == tec[1] || obj[0].poinTec == tec[5] || obj[0].poinTec == tec[6]) && (tec[0] != 0 || tec[1] != 0)){
      //   document.getElementById('TEC1').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[0].poinTec+"</span>";
      // }else{
      //   document.getElementById('TEC1').innerHTML = obj[0].poinTec;
      // }
      // ///
      // if ((obj[1].poinTec == tec[0] || obj[1].poinTec == tec[1] || obj[1].poinTec == tec[5] || obj[1].poinTec == tec[6]) && (tec[0] != 0 || tec[1] != 0)){
      //   document.getElementById('TEC2').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[1].poinTec+"</span>";
      // }else{
      //   document.getElementById('TEC2').innerHTML = obj[1].poinTec;
      // }
      // ///
      // if ((obj[2].poinTec == tec[0] || obj[2].poinTec == tec[1] || obj[2].poinTec == tec[5] || obj[2].poinTec == tec[6]) && (tec[0] != 0 || tec[1] != 0)){
      //   document.getElementById('TEC3').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[2].poinTec+"</span>";
      // }else{
      //   document.getElementById('TEC3').innerHTML = obj[2].poinTec;
      // }
      // ///
      // if ((obj[3].poinTec == tec[0] || obj[3].poinTec == tec[1] || obj[3].poinTec == tec[5] || obj[3].poinTec == tec[6]) && (tec[0] != 0 || tec[1] != 0)){
      //   document.getElementById('TEC4').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[3].poinTec+"</span>";
      // }else{
      //   document.getElementById('TEC4').innerHTML = obj[3].poinTec;
      // }
      // ///
      // if ((obj[4].poinTec == tec[0] || obj[4].poinTec == tec[1] || obj[4].poinTec == tec[5] || obj[4].poinTec == tec[6]) && (tec[0] != 0 || tec[1] != 0)){
      //   document.getElementById('TEC5').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[4].poinTec+"</span>";
      // }else{
      //   document.getElementById('TEC5').innerHTML = obj[4].poinTec;
      // }
      ///
      // if ((obj[5].poinTec == tec[0] || obj[5].poinTec == tec[1] || obj[5].poinTec == tec[5] || obj[5].poinTec == tec[6]) && (tec[0] != 0 || tec[1] != 0)){
      //   document.getElementById('TEC6').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[5].poinTec+"</span>";
      // }else{
      //   document.getElementById('TEC6').innerHTML = obj[5].poinTec;
      // }
      // ///
      // if ((obj[6].poinTec == tec[0] || obj[6].poinTec == tec[1] || obj[6].poinTec == tec[5] || obj[6].poinTec == tec[6]) && (tec[0] != 0 || tec[1] != 0)){
      //   document.getElementById('TEC7').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[6].poinTec+"</span>";
      // }else{
      //   document.getElementById('TEC7').innerHTML = obj[6].poinTec;
      // }

      // var totTec = ((Number(tec[2])+Number(tec[3])+Number(tec[4])))*0.7;
      var totTec = ((Number(tec[1])+Number(tec[2])+Number(tec[3])))*0.7;
      document.getElementById('TECTOTAL').innerHTML = totTec.toFixed(2);

      // ATH
      ///
      if ((obj[0].poinAth == ath[0] || obj[0].poinAth == ath[4]) && (ath[0] != 0 || ath[1] != 0)){
        document.getElementById('ATH1').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[0].poinAth+"</span>";
      }else{
        document.getElementById('ATH1').innerHTML = obj[0].poinAth;
      }
      ///
      if ((obj[1].poinAth == ath[0] || obj[1].poinAth == ath[4]) && (ath[0] != 0 || ath[1] != 0)){
        document.getElementById('ATH2').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[1].poinAth+"</span>";
      }else{
        document.getElementById('ATH2').innerHTML = obj[1].poinAth;
      }
      ///
      if ((obj[2].poinAth == ath[0] || obj[2].poinAth == ath[4]) && (ath[0] != 0 || ath[1] != 0)){
        document.getElementById('ATH3').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[2].poinAth+"</span>";
      }else{
        document.getElementById('ATH3').innerHTML = obj[2].poinAth;
      }
      ///
      if ((obj[3].poinAth == ath[0] || obj[3].poinAth == ath[4]) && (ath[0] != 0 || ath[1] != 0)){
        document.getElementById('ATH4').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[3].poinAth+"</span>";
      }else{
        document.getElementById('ATH4').innerHTML = obj[3].poinAth;
      }
      ///
      if ((obj[4].poinAth == ath[0] || obj[4].poinAth == ath[4]) && (ath[0] != 0 || ath[1] != 0)){
        document.getElementById('ATH5').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[4].poinAth+"</span>";
      }else{
        document.getElementById('ATH5').innerHTML = obj[4].poinAth;
      }
      // if ((obj[0].poinAth == ath[0] || obj[0].poinAth == ath[1] || obj[0].poinAth == ath[5] || obj[0].poinAth == ath[6]) && (ath[0] != 0 || ath[1] != 0)){
      //   document.getElementById('ATH1').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[0].poinAth+"</span>";
      // }else{
      //   document.getElementById('ATH1').innerHTML = obj[0].poinAth;
      // }
      // ///
      // if ((obj[1].poinAth == ath[0] || obj[1].poinAth == ath[1] || obj[1].poinAth == ath[5] || obj[1].poinAth == ath[6]) && (ath[0] != 0 || ath[1] != 0)){
      //   document.getElementById('ATH2').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[1].poinAth+"</span>";
      // }else{
      //   document.getElementById('ATH2').innerHTML = obj[1].poinAth;
      // }
      // ///
      // if ((obj[2].poinAth == ath[0] || obj[2].poinAth == ath[1] || obj[2].poinAth == ath[5] || obj[2].poinAth == ath[6]) && (ath[0] != 0 || ath[1] != 0)){
      //   document.getElementById('ATH3').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[2].poinAth+"</span>";
      // }else{
      //   document.getElementById('ATH3').innerHTML = obj[2].poinAth;
      // }
      // ///
      // if ((obj[3].poinAth == ath[0] || obj[3].poinAth == ath[1] || obj[3].poinAth == ath[5] || obj[3].poinAth == ath[6]) && (ath[0] != 0 || ath[1] != 0)){
      //   document.getElementById('ATH4').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[3].poinAth+"</span>";
      // }else{
      //   document.getElementById('ATH4').innerHTML = obj[3].poinAth;
      // }
      // ///
      // if ((obj[4].poinAth == ath[0] || obj[4].poinAth == ath[1] || obj[4].poinAth == ath[5] || obj[4].poinAth == ath[6]) && (ath[0] != 0 || ath[1] != 0)){
      //   document.getElementById('ATH5').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[4].poinAth+"</span>";
      // }else{
      //   document.getElementById('ATH5').innerHTML = obj[4].poinAth;
      // }
      ///
      // if ((obj[5].poinAth == ath[0] || obj[5].poinAth == ath[1] || obj[5].poinAth == ath[5] || obj[5].poinAth == ath[6]) && (ath[0] != 0 || ath[1] != 0)){
      //   document.getElementById('ATH6').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[5].poinAth+"</span>";
      // }else{
      //   document.getElementById('ATH6').innerHTML = obj[5].poinAth;
      // }
      // ///
      // if ((obj[6].poinAth == ath[0] || obj[6].poinAth == ath[1] || obj[6].poinAth == ath[5] || obj[6].poinAth == ath[6]) && (ath[0] != 0 || ath[1] != 0)){
      //   document.getElementById('ATH7').innerHTML = "<span style='text-decoration: line-through red;'>"+obj[6].poinAth+"</span>";
      // }else{
      //   document.getElementById('ATH7').innerHTML = obj[6].poinAth;
      // }

      // var totAth = ((Number(ath[2])+Number(ath[3])+Number(ath[4])))*0.3;
      var totAth = ((Number(ath[1])+Number(ath[2])+Number(ath[3])))*0.3;
      document.getElementById('ATHTOTAL').innerHTML = totAth.toFixed(2);

      document.getElementById('poin_akhir').innerHTML = (totAth+totTec).toFixed(2);

      clearInterval(window.test);
      update_auto();
    }
    </script>
  </head>
  <body style="background-color:black;" onload="update_auto()">
