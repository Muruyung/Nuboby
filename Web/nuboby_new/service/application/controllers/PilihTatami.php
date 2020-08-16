<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class PilihTatami extends REST_Controller {

  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->database();
  }

  function index_get() {
    $data = $this->get('data');
    $turnamen = $this->db->get_where('tb_juri', $data)->result();
    $this->response($turnamen, 200);
  }

  function index_post() {
    $data = array(
      'id_turnamen'=>  $this->post('id_turnamen'),
      'tatami'     =>  $this->post('tatami'),
      'nomor_juri' =>  $this->post('nomor_juri')
    );
    $insert = $this->db->get_where('tb_juri', $data)->result()[0];
    $this->response($insert, 200);
    // if ($insert) {
    // } else {
    //   $this->response(array('status' => 'fail', 502));
    // }
  }
}
?>
