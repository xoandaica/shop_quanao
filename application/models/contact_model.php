<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Contact_model extends MY_Model{
        function __construct() {
            parent::__construct();
            $this->load->helper('model');
        }


        public function AddContact(){

        }
        public function listcontact($table, $limit=null, $offset=null)
        {
            $this->db->select('*');
            if($limit&&$offset){
                $this->db->limit($limit, $offset);
            }
            $this->db->where('dk', 0);
            $this->db->order_by('id', 'desc');
            $q = $this->db->get($table);
            return $q->result();
        }
        public function listcontact1($table, $limit=null, $offset=null)
        {
            $this->db->select('*');
            if($limit&&$offset){
                $this->db->limit($limit, $offset);
            }
            $this->db->where('dk', 1);
            $this->db->order_by('id', 'desc');
            $q = $this->db->get($table);
            return $q->result();
        }


    }