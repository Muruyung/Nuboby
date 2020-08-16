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
    function selesai(){
      var link = "<?=base_url('kata')?>"+"/setNull/"+document.getElementById('poin_akhir').innerHTML;
      $.ajax({
        url:link,
        success:function(){
          location.replace("<?=base_url('katahome')?>");
        }
      });
    }

    function update_auto(){
      // banyak();
      document.getElementById('garis_kotak').setAttribute("style","margin-bottom: "+ (window.innerHeight)/3 +"px;");
      window.test = setInterval(function(){ulang();}, 100);

      // for (c=1 ; c <= 7 ; c++){
      //   // var cek = -3;
      // }
    }

    function ulang(){
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
      var tec = [obj[0].poinTec,obj[1].poinTec,obj[2].poinTec,obj[3].poinTec,obj[4].poinTec,obj[5].poinTec,obj[6].poinTec];
      var ath = [obj[0].poinAth,obj[1].poinAth,obj[2].poinAth,obj[3].poinAth,obj[4].poinAth,obj[5].poinAth,obj[6].poinAth];
      tec = tec.sort();
      ath = ath.sort();

      var totTec = ((Number(tec[2])+Number(tec[3])+Number(tec[4])))*0.7;
      var totAth = ((Number(ath[2])+Number(ath[3])+Number(ath[4])))*0.3;
      // TEC
      document.getElementById('TEC1').innerHTML = obj[0].poinTec;
      document.getElementById('TEC2').innerHTML = obj[1].poinTec;
      document.getElementById('TEC3').innerHTML = obj[2].poinTec;
      document.getElementById('TEC4').innerHTML = obj[3].poinTec;
      document.getElementById('TEC5').innerHTML = obj[4].poinTec;
      document.getElementById('TEC6').innerHTML = obj[5].poinTec;
      document.getElementById('TEC7').innerHTML = obj[6].poinTec;
      document.getElementById('TECTOTAL').innerHTML = totTec;

      // ATH
      document.getElementById('ATH1').innerHTML = obj[0].poinAth;
      document.getElementById('ATH2').innerHTML = obj[1].poinAth;
      document.getElementById('ATH3').innerHTML = obj[2].poinAth;
      document.getElementById('ATH4').innerHTML = obj[3].poinAth;
      document.getElementById('ATH5').innerHTML = obj[4].poinAth;
      document.getElementById('ATH6').innerHTML = obj[5].poinAth;
      document.getElementById('ATH7').innerHTML = obj[6].poinAth;
      document.getElementById('ATHTOTAL').innerHTML = totAth;

      document.getElementById('poin_akhir').innerHTML = totAth+totTec;

      clearInterval(window.test);
      update_auto();
    }
    </script>
  </head>
  <body style="background-color:black;" onload="update_auto()">
