<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Juri extends REST_Controller {

  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $data = $this->get('data');
    // $juri = $this->mongo_db->get_where('tb_juri',$data)->result();
    $juri = $this->db->get_where('tb_juri',$data)->result();
    $this->response($juri, 200);
  }

  function index_post() {
    $data = array(
      'id_turnamen' =>  $this->post('id_turnamen'),
      'id_atlit'    =>  $this->post('id_atlit'),
      'nomor_juri'  =>  $this->post('nomor_juri'),
      'tatami'      =>  $this->post('tatami'),
      'status'      =>  0,
      'poinTec'     =>  0,
      'poinAth'     =>  0
    );
    $insert = $this->db->insert('tb_juri', $data);
    if ($insert) {
      $this->response($data, 200);
    } else {
      $this->response(array('status' => 'fail', 502));
    }
  }

  function index_put() {
    // $jenis = $this->put('jenis');
    // $id = $this->put($jenis);
    $where = $this->put('where');
    $data = $this->put('data');
    $this->db->where($where);
    // $update = $this->mongo_db->update('tb_juri', $data);
    $update = $this->db->update('tb_juri', $data);
    if ($update) {
      $this->response($data, 200);
    } else {
      $this->response(array('status' => 'fail', 502));
    }
  }

  function index_delete() {
    $id = $this->delete('id');
    $this->db->where('id', $id);
    $delete = $this->db->delete('tb_juri');
    if ($delete) {
      $this->response(array('status' => 'success'), 201);
    } else {
      $this->response(array('status' => 'fail', 502));
    }
  }
}
?>
