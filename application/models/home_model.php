<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
        $this->load->database();
    }
    public function get_order_dashboard(){
        $this->db->select('order.*,province.name as provin_name,district.name as distric_name,ward.name as ward_name');
        $this->db->join('province','order.province=province.provinceid','left');
        $this->db->join('district','order.district=district.districtid','left');
        $this->db->join('ward','order.ward=ward.wardid','left');
        $this->db->where('order.status','0');
        $this->db->order_by('id','desc');
        $q=$this->db->get('order');
        return $q->result();
    }
    public function order_detail($order_id){
        $this->db->select('product.id as product_id,product.name,order_item.*');
        $this->db->join('product','product.id=order_item.item_id');
        $this->db->where_in('order_item.order_id',$order_id);
        $this->db->order_by('product.id','desc');
        $q=$this->db->get('order_item');
        return $q->result();
    }
    public function contact_dashboard(){
        $this->db->where('show','0');
        $this->db->order_by('id','desc');
        $q=$this->db->get('contact');
        return $q->result();
    }
}
