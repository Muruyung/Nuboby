<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller{

  function __construct(){
    parent::__construct();
  }

  public function index(){
    $data['page'] = "kata";
    // $this->session->set_userdata(array());
    // print_r($this->API);
    $this->load->view('template/header',$data);
    $this->load->view('frontend/login');
    $this->load->view('template/footer');
  }

  public function set($link){
    $this->session->set_userdata(['api'=>$link]);
  }
}

 ?>
