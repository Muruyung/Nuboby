<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_daftar extends CI_Controller{
  var $API = "";

  function __construct(){
    parent::__construct();
    // $this->API="https://nuboby.000webhostapp.com/service";
    $this->API="http://localhost/nuboby_new/service";
  }

  public function index(){
    // $turnamen = json_decode($this->curl->simple_get($this->API.'/Turnamen', $this->session->userdata('id'), array(CURLOPT_BUFFERSIZE => 10)), true);
    if ($this->session->userdata('terisi') == 0){
      print_r($_SESSION);
    }else
    if ($this->session->userdata('terisi') == 1) {
      $data['page'] = "kata";
      $this->load->view('template/header',$data);
      $this->load->view('frontend/login');
      $this->load->view('template/footer');
    }else {
      redirect(base_url());
    }
  }

  public function get($token,$password){
    $data = array(
      'token'     => $token,
      'password'  => $password
    );
    $turnamen = json_decode($this->curl->simple_get($this->API.'/Turnamen', $data, array(CURLOPT_BUFFERSIZE => 10)), true);
    if (!is_null($turnamen)){
      echo $turnamen['status'];
    }else{
      echo -1;
    }
  }
}

 ?>
