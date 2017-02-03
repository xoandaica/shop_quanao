<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personnel_model extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
        $this->load->database();
    }
}