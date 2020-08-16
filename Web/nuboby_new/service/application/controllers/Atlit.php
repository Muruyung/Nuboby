<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Atlit extends REST_Controller {

  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $data = $this->get('data');
    // $data['gender'] = 'Female';
    $atlit = $this->db->order_by("peringkat", "asc")->get_where('tb_atlit', $data)->result();
    // print_r($data);
    $this->response($atlit, 200);
    // $this->response($data, 200);
  }
  
  function index_post() {
    $data = array(
      'nama_atlit'  =>  $this->post('nama'),
      'kontingen'   =>  $this->post('kontingen'),
      'gender'      =>  $this->post('gender'),
      'hasil_menang'=>  1,
      'id_jenis'    =>  $this->post('id_jenis'),
      'id_turnamen' =>  $this->post('id_turnamen'),
      'tatanami'    =>  $this->post('tatanami'),
      'bagan'       =>  $this->post('bagan'),
      'peringkat'   =>  1,
      'poin_akhir1' =>  0,
      'poin_akhir2' =>  0,
      'poin_akhir3' =>  0,
      'poin_akhir4' =>  0
    );
    $insert = $this->db->insert('tb_atlit', $data);
    if ($insert) {
      $this->response($data, 200);
    } else {
      $this->response(array('status' => 'fail', 502));
    }
  }

  function index_put() {
    $where = $this->put('where');
    $data = $this->put('data');
    $this->db->where($where);
    $update = $this->db->update('tb_atlit', $data);
    if ($update) {
      $this->response($data, 200);
    } else {
      $this->response(array('status' => 'fail', 502));
    }
  }

  function index_delete() {
    $id = $this->delete('id');
    $this->db->where('id', $id);
    $delete = $this->db->delete('tb_atlit');
    if ($delete) {
      $this->response(array('status' => 'success'), 201);
    } else {
      $this->response(array('status' => 'fail', 502));
    }
  }
}
?>
