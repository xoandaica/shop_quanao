<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class F_usersmodel extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
    }
    public function getPage($alias){
        $this->db->select('*');
        $this->db->where('alias',$alias);
        $q=$this->db->get('staticpage');
        return $q->first_row();
    }
    public function loginUser($username,$password){
        if($username==null || $password==null)
            return false;
        $this->db->where('email',$username);
        $user = $this->db->get('users');
        if($user->num_rows<=0|| $user->num_rows>1)
            return false;
        $user=$user->first_row();

        for($i =1; $i <=5; $i++)
            $password = md5($password);

        if($user->password === $password){
            $datauser = array(
                'last_login' => time()
            );
            $this->db->where('id',$user->id);
            $this->db->update('users',$datauser);

            return $user;
        }
    }
    public function update_pass_user($id,$array){
        if(isset($id)&&is_array($array)){
            $this->db->where('id',$id);
            $this->db->update('users', $array);
            return $id;
        }else return false;
    }
    public function getMenuRightRoot(){
        $this->db->select('*');
        $this->db->where('position','right');
        $this->db->where('parent_id',0);
        $q=$this->db->get('menu');
        return $q->result();
    }

    public function getUserListOrder($where,$limit,$offset)
    {
        $this->db->select('*');
        $this->db->where('user_id',$where);
        $this->db->where('view','1');
        $this->db->limit($limit,$offset);
        $this->db->order_by('id','desc');
        $q=$this->db->get('order');
        return $q->result();
    }
    public function countUserListOrder($where)
    {
        $this->db->select('*');
        $this->db->where('user_id',$where);
        $this->db->where('view','1');
        //$this->db->limit($limit,$offset);
        $this->db->order_by('id','desc');
        $q=$this->db->get('order');
        return $q->num_rows();
    }
    public function UserOderDetail($where)
    {
        $this->db->select('product.id as product_id,product.name,order_item.*');
        $this->db->join('product','product.id=order_item.item_id');
        $this->db->join('order','order.id=order_item.order_id');
        $this->db->where('order.user_id',$where);
        $this->db->order_by('product.id','desc');
        $q=$this->db->get('order_item');
        return $q->result();
    }

    public function getListProLike($where,$limit,$offset)
    {
        if(is_array($where)&&!empty($where))
        {
            $this->db->select('id,name,alias,image,price');
            $this->db->where_in('id',$where);
            $this->db->order_by('name');
            $this->db->limit($limit,$offset);
            $q = $this->db->get('product');
            return $q->result();
        }else{
            return array();
        }
    }

    public function countListProLike($where)
    {
        if(is_array($where)&&!empty($where))
        {
            $this->db->select('id');
            $this->db->where_in('id',$where);
            $q = $this->db->get('product');
            return $q->num_rows();
        }else{
            return 0;
        }
    }




    //oder cate list

    public function Getlist_oder(){
        $this->db->select('order.*,province.name as provin_name,district.name as distric_name,ward.name as ward_name');
        $this->db->join('province','order.province=province.provinceid','left');
        $this->db->join('district','order.district=district.districtid','left');
        $this->db->join('ward','order.ward=ward.wardid','left');
//        $this->db->limit($limit,$offset);
        $this->db->order_by('id','desc');
        $q=$this->db->get('order');
        return $q->result();
    }
    public function order_detail($order_id){
        $this->db->select('product.id as product_id,product.name,product.image,order_item.*,order.id as or_id,order.price_ship');
        $this->db->join('product','product.id=order_item.item_id');
        $this->db->join('order','order.id=order_item.order_id');
        $this->db->where_in('order_item.order_id',$order_id);
        $this->db->order_by('product.id','desc');
        $q=$this->db->get('order_item');
        return $q->result();
    }

    public function getsearch_result($data,$limit = 0, $offset = 0)
    {
        if(!empty($data))
        {
            if($data['code']==null&&$data['cutommer']==null&&$data['email']==null&&$data['phone']==null){
                return array();
            }$this->db->select('order.*,province.name as provin_name,district.name as distric_name,ward.name as ward_name');
            $this->db->join('province','order.province=province.provinceid','left');
            $this->db->join('district','order.district=district.districtid','left');
            $this->db->join('ward','order.ward=ward.wardid','left');

            if($data['code'] !=''){
                $this->db->like('order.code',$data['code']);
            }
            if($data['cutommer'] !=''){
                $this->db->like('order.fullname',$data['cutommer']);
            }
            if($data['phone'] !=''){
                $this->db->like('order.phone',$data['phone']);
            }
            if($data['email'] !=''){
                $this->db->like('order.email',$data['email']);
            }

            if($limit||$offset){
                $this->db->limit($limit, $offset);
            }
            $this->db->order_by('order.id', 'desc');
            $q = $this->db->get('order');
            return $q->result();
        }
    }

    public function countsearch_result($data)
    {
        if(!empty($data))
        {
            if($data['code']==null&&$data['cutommer']==null&&$data['email']==null&&$data['phone']==null){
                return 0;
            }$this->db->select('order.*');


            if($data['code'] !=''){
                $this->db->like('order.code',$data['code']);
            }
            if($data['cutommer'] !=''){
                $this->db->like('order.fullname',$data['cutommer']);
            }
            if($data['phone'] !=''){
                $this->db->like('order.phone',$data['phone']);
            }
            if($data['email'] !=''){
                $this->db->like('order.email',$data['email']);
            }

            $q = $this->db->get('order');
            return $q->num_rows();
        }
    }
}