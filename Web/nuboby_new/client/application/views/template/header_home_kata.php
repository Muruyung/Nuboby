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
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script> -->
    <!-- <link rel="stylesheet" href="<?php //echo base_url().'assets/css/bootstrap.min.css'; ?>"> -->
    <script type="text/javascript">
      function keluar(){
        location.replace("<?=base_url('katahome/keluar')?>");
      }

      function selanjutnya(){
        var select = document.getElementById("listKelas");
        var filter = select.value;
        // alert(test);
        location.href='<?=base_url('katahome/selanjutnya/')?>'+document.getElementById('listKelas').value;
      }



      function filterTabel(){
        var select,table,tbody,tr,c;
        var td1,td2,td3,td4;
        var filter1,filter2,filter3,filter4;

        select = document.getElementById("listTatami");
        filter1 = select.value;

        select = document.getElementById("listKelas");
        filter2 = select.value;

        select = document.getElementById("listGender");
        filter3 = select.value;

        select = document.getElementById("listBagan");
        filter4 = select.value;

        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        for (c = 0 ; c < tr.length ; c++){
          td1 = tr[c].getElementsByTagName("td")[6];
          td2 = tr[c].getElementsByTagName("td")[4];
          td3 = tr[c].getElementsByTagName("td")[5];
          td4 = tr[c].getElementsByTagName("td")[0];
          if(td1 && td2 && td3 && td4){
            tr[c].style.display = "none";
            if (filter1.indexOf("Semua") > -1 || td1.innerHTML.indexOf(filter1) > -1){
              if (filter2.indexOf("Semua") > -1 || td2.innerHTML.indexOf(filter2) > -1){
                if (filter3.indexOf("Semua") > -1 || td3.innerHTML.indexOf(filter3) > -1){
                  if (filter4.indexOf("Semua") > -1 || td4.innerHTML.indexOf(filter4) > -1){
                    tr[c].style.display = "";
                  }
                }
              }
            }
          }
        }
        // var txt = "test";
        // $.ajax({
        //   type: "POST",
        //   url:"http://localhost/nuboby_new/client/Katahome/set_filter",
        //   dataType:"json",
        //   data: {kelas:'Semua', gender:'Male', bagan:'2'},
        //   success:function(data){
        //     alert(data);
        //   }
        // });
        // alert(link);
      }
    </script>
  </head>
  <body style="background-color:black;">
