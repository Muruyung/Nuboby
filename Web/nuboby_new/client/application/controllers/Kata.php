<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kata extends CI_Controller{
  var $API = "";

  function __construct(){
    parent::__construct();
    // $this->API="http://localhost/nuboby_new/service";
    $this->API=$this->session->userdata('api');
    // $this->API="https://nuboby.000webhostapp.com/service";
    // $this->API = "http://servicenuboby.epizy.com";
  }

  public function index(){
    $data['page'] = "kata";
    $data = $this->session->userdata();
    // print_r($data);
    $this->load->view('template/header_kata',$data);
    $this->load->view('frontend/kata_scoring_system');
    $this->load->view('template/footer_kata');
  }

  public function getPoin(){
    $data['data'] = array(
      'id_turnamen' => $this->session->userdata('turnamen')['id'],
      'tatami'      => $this->session->userdata('atlit')['tatami']
    );
    $juri = $this->curl->simple_get($this->API.'/Juri', $data, array(CURLOPT_BUFFERSIZE => 10));
    print_r($juri);
  }

  public function setNull($poin_akhir){
    // $data['data'] = array(
    //   'id_atlit' => $id_atlit
    // );
    // $juri = json_decode($this->curl->simple_get($this->API.'/Juri', $data, array(CURLOPT_BUFFERSIZE => 10)), true)[0];
    // print_r($juri);
    $update['data'] = array(
      'poinTec'  => 0,
      'poinAth'  => 0,
      'id_atlit' => 0
    );
    $update['where'] = array(
      'id_turnamen' => $this->session->userdata('turnamen')['id'],
      'tatami'      => $this->session->userdata('atlit')['tatami']
    );
    $up = $this->curl->simple_put($this->API.'/Juri', $update, array(CURLOPT_BUFFERSIZE => 10), true);

    $update['data'] = array(
      'poin_akhir'.$this->session->userdata('atlit')['hasil_menang'] => $poin_akhir
    );
    $update['where'] = array(
      'id' => $this->session->userdata('atlit')['id']
    );
    $up = $this->curl->simple_put($this->API.'/Atlit', $update, array(CURLOPT_BUFFERSIZE => 10), true);
    // print_r($update);
  }
}

 ?>
