<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller{
  var $API = "";

  function __construct(){
    parent::__construct();
    // $this->API="https://nuboby.000webhostapp.com/service";
    // $this->API='https://svc-mc1.ppdb-man-1-cianjur.com/';
    // $this->API = "http://servicenuboby.epizy.com";
    // $this->API = 'http://nuboby.hostingerapp.com/service';
    $this->API="http://localhost/nuboby_new/service";

    // $this->session->set_userdata(array('api'=>$_GET['api']));
    // $this->API = $this->session->userdata('api');
  }

  public function index(){
    $data['page'] = "kata";
    // $this->session->set_userdata(array());
    // print_r($this->API);
    $this->load->view('template/header',$data);
    $this->load->view('frontend/login');
    $this->load->view('template/footer');
  }

  public function get($token,$password,$api){
    $data['data'] = array(
      'token'     => $token,
      'password'  => $password
    );
    $this->API = "http://localhost/nuboby_new/service";
    // $this->API = 'http://'.$api.'.ngrok.io/nuboby_new/service';
    $this->session->set_userdata(['api'=>$this->API]);
    $turnamen['turnamen'] = json_decode($this->curl->simple_get($this->API.'/Turnamen', $data, array(CURLOPT_BUFFERSIZE => 10)), true)[0];
    // print_r($turnamen);
    if ($turnamen['turnamen'] != 401){
      $this->session->set_userdata($turnamen);
      // session_destroy();
      // print_r($_SESSION);
      echo $turnamen['turnamen']['status'];
    }else{
      echo -1;
    }
  }
}

 ?>
