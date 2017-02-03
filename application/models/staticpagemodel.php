<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staticpagemodel extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
        $this->load->database();
    }
    public function getProImage($id){
        $this->db->select('staticpage.*,
        images.*, images.id as img_id ');
        $this->db->join('staticpage','staticpage.id=images.page_id','left');
        $this->db->where('images.page_id',$id);
        $q=$this->db->get('images');
        return $q->result();
    }
    public function pageListAll($limit,$offset,$lang)
    {
        $this->db->select('staticpage.*');
       // $this->db->join('news_category','news.category_id=news_category.id','left');
        $this->db->limit($limit,$offset);
        if(@$lang !=''){
            $this->db->where('staticpage.lang',@$lang);
        }
   //     $this->db->where('news.recycle',$recycle);
        $this->db->order_by('staticpage.id','desc');
        $q=$this->db->get('staticpage');
        return $q->result();
    }
}