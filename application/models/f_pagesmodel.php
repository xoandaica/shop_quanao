<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class F_pagesmodel extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
    }
    public function PageView($view,$limit,$offset){
        // $q1 =  $this->db->query("SELECT id FROM product_category where parent_id = '" . $id . "'")->result();
        $this->db->select('staticpage.*,
                           ');


        $this->db->where('staticpage.'.$view,1);
        $this->db->order_by('staticpage.id','desc');
        $this->db->group_by('staticpage.id');
        $this->db->where('staticpage.lang',$this->language);
        $this->db->limit($limit,$offset);
        $q=$this->db->get('staticpage');
        return $q->result();
//            echo '<pre>';
//     echo $data['$this->getArrayChildCate_edit2($id)'] ;die();
    }
    public function CountPageHome($view){
        $this->db->select('staticpage.*,
                           ');
        $this->db->where('staticpage.'.$view,1);
        $this->db->order_by('staticpage.id','desc');
        $this->db->where('staticpage.home',1);
        $this->db->where('staticpage.lang',$this->language);
        $this->db->group_by('staticpage.id');
        $q=$this->db->get('staticpage');
        return $q->num_rows();
    }
    public function getPage($alias){
        $this->db->select('*');
        $this->db->where('alias',$alias);
        $q=$this->db->get('staticpage');
        return $q->first_row();
    }
    public function Home_support(){
        $this->db->select('support_online.name,support_online.phone,support_online.skype,support_online.yahoo');
        $this->db->where('support_online.active',1);
        $this->db->limit(3,0);
        $n=$this->db->get('support_online');
        return $n->result();
    }
   /* public function News_stand_out_focus_1(){
        $this->db->select('news.*');
        $this->db->where('news.focus',1);
        $this->db->where('news.home',1);
        $this->db->order_by('news.id','desc');
        $this->db->limit(8,3);
        $q=$this->db->get('news');
        return $q->result();
    }*/
    public function LastNews(){
        $this->db->select('id,title,description,image,alias,category_id');
        $this->db->limit(10,0);
        $this->db->order_by('id','desc');
        $q=$this->db->get('news');
        return $q->result();
    }
    /*menu right*/
    public function getMenuRightRoot(){
        $this->db->select('*');
        $this->db->where('position','right');
        $this->db->where('parent_id',0);
        $q=$this->db->get('menu');
        return $q->result();
    }
}