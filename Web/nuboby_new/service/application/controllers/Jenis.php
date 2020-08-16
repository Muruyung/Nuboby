<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Jenis extends REST_Controller {

  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $data = $this->get('data');
    $jenis = $this->db->get_where('tb_jenis', $data)->result();
    $this->response($jenis, 200);
  }

  function index_post() {
    $data = array(
      'id_turnamen' =>  $this->post('id_turnamen'),
      'kelas'       =>  $this->post('kelas'),
      'ronde'       =>  $this->post('ronde')
    );
    $insert = $this->db->insert('tb_jenis', $data);
    if ($insert) {
      $this->response($data, 200);
    } else {
      $this->response(array('status' => 'fail', 502));
    }
  }

  function index_put() {
    $where = $this->put('where');
    // $where['kelas'] = urldecode($where['kelas']);
    $data = $this->put('data');
    $this->db->where($where);
    $update = $this->db->update('tb_jenis', $data);
    if ($update) {
      $this->response($data, 200);
    } else {
      $this->response(array('status' => 'fail', 502));
    }
  }

    function index_delete() {
      $id = $this->delete('id');
      $this->db->where('id', $id);
      $delete = $this->db->delete('tb_jenis');
      if ($delete) {
        $this->response(array('status' => 'success'), 201);
      } else {
        $this->response(array('status' => 'fail', 502));
      }
    }
  }
  ?>
