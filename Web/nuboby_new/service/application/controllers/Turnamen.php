<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Turnamen extends REST_Controller {

  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $data = $this->get('data');
    $turnamen = $this->db->get_where('tb_turnamen', $data)->result();
    if ($turnamen) {
      $this->response($turnamen, 200);
    } else {
      $this->response(array('status' => 'fail', 401));
    }
  }

  function index_post() {
    $data = array(
      'nama_turnamen'   =>  $this->post('nama_turnamen'),
      'lokasi'          =>  $this->post('lokasi'),
      'token'           =>  $this->post('token'),
      'password'        =>  $this->post('password'),
      'status'          =>  0,
      'terisi'          =>  0,
      'jumlah_tatanami' =>  0,
      'jumlah_bagan'    =>  0
    );
    $insert = $this->db->insert('tb_turnamen', $data);
    if ($insert) {
      $this->response($data, 200);
    } else {
      $this->response(array('status' => 'fail', 502));
    }
  }

  function index_put() {
    $id = $this->put('id');
    $update = $this->put('update');
    if ($update == ''){
      $data = array(
      'nama_turnamen'   =>  $this->put('nama_turnamen'),
      'lokasi'          =>  $this->put('lokasi'),
      'token'           =>  $this->put('token'),
      'password'        =>  $this->put('password'),
      'status'          =>  $this->put('status'),
      'terisi'          =>  $this->put('terisi'),
      'jumlah_tatanami' =>  $this->put('jumlah_tatanami'),
      'jumlah_bagan'    =>  $this->put('jumlah_bagan')
      );
    }else{
      $data = array(
      $update => $this->put($update)
      );
    }
    $this->db->where('id', $id);
    $update = $this->db->update('tb_turnamen', $data);
    if ($update) {
      $this->response($data, 200);
    } else {
      $this->response(array('status' => 'fail', 502));
    }
  }

  function index_delete() {
    $id = $this->delete('id');
    $this->db->where('id', $id);
    $delete = $this->db->delete('tb_turnamen');
    if ($delete) {
      $this->response(array('status' => 'success'), 201);
    } else {
      $this->response(array('status' => 'fail', 502));
    }
  }
}
?>
