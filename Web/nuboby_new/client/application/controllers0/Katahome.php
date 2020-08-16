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
    $atlit['data'] = array(
      'id_turnamen' => $this->session->userdata('turnamen')['id']
    );
    // 'id'          => 2
    $data['atlit'] = json_decode($this->curl->simple_get($this->API.'/Atlit', $atlit, array(CURLOPT_BUFFERSIZE => 10)));
    $data['jenis'] = json_decode($this->curl->simple_get($this->API.'/Jenis', $atlit, array(CURLOPT_BUFFERSIZE => 10)));
    // print_r($data);
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
    $this->session->set_userdata($data);
    $update['data'] = array(
      'id_atlit'  => $id
    );
    $update['where'] = array(
      'id_turnamen' => $this->session->userdata('turnamen')['id'],
      'tatami'      => $data['atlit']['tatanami']
    );
    $up =  $this->curl->simple_put($this->API.'/Juri', $update, array(CURLOPT_BUFFERSIZE => 10), true);
    // print_r($up);
    redirect('Kata');
  }

  public function keluar(){
    $this->session->sess_destroy();
    redirect('c_login');
  }
}

 ?>
