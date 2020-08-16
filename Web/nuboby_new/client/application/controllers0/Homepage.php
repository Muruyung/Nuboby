<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homepage extends CI_Controller{

  function __construct(){
    parent::__construct();
  }

  public function index(){
    $data['page'] = 'homepage';
    $this->load->view('template/header',$data);
    $this->load->view('frontend/homepage');
    $this->load->view('template/footer');
  }
}

 ?>
