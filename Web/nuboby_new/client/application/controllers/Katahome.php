<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class katahome extends CI_Controller{
  var $API = "";

  function __construct(){
    parent::__construct();
    // $this->API="https://nuboby.000webhostapp.com/service";
    // $this->API="http://localhost/nuboby_new/service";
    $this->API=$this->session->userdata('api');
  }

  public function index(){
    $jenis['data'] = array(
      'id_turnamen' => $this->session->userdata('turnamen')['id']
    );
    $data['jenis'] = json_decode($this->curl->simple_get($this->API.'/Jenis', $jenis, array(CURLOPT_BUFFERSIZE => 10)),true);

    $data['atlit'] = [];
    $i = 0;

    // print_r($data['jenis']);
    foreach ($data['jenis'] as $key) {
      $atlit['ronde'] = $key['ronde'];
      if ($atlit['ronde'] > 1 && $key['jumlah_bagan'] != 0){
        $atlit['ronde']--;
      }
      $atlit['data'] = array(
        'id_turnamen' => $this->session->userdata('turnamen')['id'],
        'hasil_menang'=> $key['ronde'],
        'id_jenis'    => $key['id']
      );
      $data['atlit'] = array_merge($data['atlit'], json_decode($this->curl->simple_get($this->API.'/GetSortAtlit', $atlit, array(CURLOPT_BUFFERSIZE => 10)),true));
    }
    // print_r($data['atlit']);

    for ($c = 0 ; $c < count($data['atlit']) ; $c++){
      $data['atlit'][$c]['poin_akhir'] = $data['atlit'][$c]['poin_akhir'.$data['atlit'][$c]['hasil_menang']];
    }

    $tur['data'] = array(
      'id' => $this->session->userdata('turnamen')['id']
    );
    // 'id'          => 2
    $data['turnamen'] = json_decode($this->curl->simple_get($this->API.'/Turnamen', $tur, array(CURLOPT_BUFFERSIZE => 10)),true)[0];
    // print_r($this->session->userdata());
    // print_r($data['atlit'][0]);
    $this->load->view('template/header_home_kata');
    $this->load->view('frontend/kata_home', $data);
    $this->load->view('template/footer_home_kata');
  }

  public function set_data($id){
    $atlit['data'] = array(
      'id' => $id
    );
    $data['atlit'] = json_decode($this->curl->simple_get($this->API.'/Atlit', $atlit, array(CURLOPT_BUFFERSIZE => 10)), true)[0];
    // print_r($data);

    $jenis['data'] = array(
      'id' => $data['atlit']['id_jenis']
    );
    $data['jenis'] = json_decode($this->curl->simple_get($this->API.'/Jenis', $jenis, array(CURLOPT_BUFFERSIZE => 10)), true)[0];
    $data['jenis']['match'] += 1;
    $this->session->set_userdata($data);
    // Data update for tb_juri
    $update['data'] = array(
      'id_atlit'  => $id
    );
    $update['where'] = array(
      'id_turnamen' => $this->session->userdata('turnamen')['id'],
      'tatami'      => $data['atlit']['tatami']
    );
    // Data update for tb_jenis
    $update_jenis['data'] = array(
      'match' => $data['jenis']['match']
    );
    $update_jenis['where'] = array(
      'id' => $data['atlit']['id_jenis']
    );
    $up = $this->curl->simple_put($this->API.'/Jenis', $update_jenis, array(CURLOPT_BUFFERSIZE => 10), true);
    $up = $this->curl->simple_put($this->API.'/Juri', $update, array(CURLOPT_BUFFERSIZE => 10), true);
    // print_r($up);
    redirect('Kata');
  }

  public function set_menang($id, $menang, $bagan){
    $atlit['where'] = array(
      'id' => $id
    );
    $data['data'] = array(
      'id' => $id
    );
    $data['atlit'] = json_decode($this->curl->simple_get($this->API.'/Atlit', $data, array(CURLOPT_BUFFERSIZE => 10)), true)[0];

    $data['data'] = array(
      'id' => $data['atlit']['id_jenis']
    );
    $data['jenis'] = json_decode($this->curl->simple_get($this->API.'/Jenis', $data, array(CURLOPT_BUFFERSIZE => 10)), true)[0];

    if ($data['jenis']['jumlah_bagan'] > 4){
      if ($bagan == 1 || $bagan == 2){
        $bagan = 1;
      }else{
        $bagan = 2;
      }
    }

    $atlit['data'] = array(
      'hasil_menang' => $menang+1,
      'bagan'        => $bagan
    );
    $up = $this->curl->simple_put($this->API.'/Atlit', $atlit, array(CURLOPT_BUFFERSIZE => 10), true);
    redirect('Katahome');
  }

  public function selanjutnya($kelas){
    if ($kelas != 'Semua'){
      $data['data'] = array(
        'id_turnamen' => $this->session->userdata('turnamen')['id'],
        'kelas'       => urldecode($kelas)
      );
      $data['jenis'] = json_decode($this->curl->simple_get($this->API.'/Jenis', $data, array(CURLOPT_BUFFERSIZE => 10)), true)[0];

      $jenis['where'] = array(
        'id_turnamen' => $this->session->userdata('turnamen')['id'],
        'kelas'       => urldecode($kelas)
      );
      // Untuk per jenis atau kelas
      if ($data['jenis']['jumlah_bagan'] > 1){
        $data['jenis']['jumlah_bagan']/=2;
        $data['jenis']['ronde']++;
      }else
      if ($data['jenis']['jumlah_bagan'] == 1){
        $data['jenis']['jumlah_bagan']--;
      }
      $jenis['data'] = array(
        'ronde'        => $data['jenis']['ronde'],
        'jumlah_bagan' => $data['jenis']['jumlah_bagan']
      );
      $up = $this->curl->simple_put($this->API.'/Jenis', $jenis, array(CURLOPT_BUFFERSIZE => 10));
      // print_r($up);
    }
    redirect('Katahome');
  }

  public function set_filter(){
    $data['where'] = array(
      'id' => $this->session->userdata('turnamen')['id']
    );
    $data['data'] = array(
      'select_kelas'  => $_POST["kelas"],
      'select_gender' => $_POST["gender"],
      'select_bagan'  => $_POST["bagan"]
    );
    $up = $this->curl->simple_put($this->API.'/Turnamen', $data, array(CURLOPT_BUFFERSIZE => 10));
    // redirect('katahome');
    echo $up;
  }

  public function keluar(){
    $this->session->sess_destroy();
    redirect('c_login');
  }
}

 ?>
