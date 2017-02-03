<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Imagemodel extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('model');
        $this->load->database();
    }
    public function getBannerList($where,$limit,$offset,$lang=null){
        $this->db->where('type !=','');

        if($where['title']){
            $this->db->like('title',$where['title']);
        }
        if($where['p']){
            $this->db->where('type',$where['p']);
        }
        $this->db->where('lang',$lang);

        $this->db->order_by('id','desc');
        if($limit||$offset){
            $this->db->limit($limit,$offset);
        }
        $this->db->order_by('id','desc');
        echo $this->db->last_query();
        $q=$this->db->get('images');
        return $q->result();
    }
    public function countBanner($where){
        $this->db->where('type !=','');
        if($where['title']){
            $this->db->like('title',$where['title']);
        }
        if($where['p']){
            $this->db->where('type',$where['p']);
        }
        if($where['lang']){
            $this->db->where('lang',$where['lang']);
        }
        $q=$this->db->get('images');
        return $q->num_rows();
    }


}