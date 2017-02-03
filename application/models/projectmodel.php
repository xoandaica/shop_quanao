<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projectmodel extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
        $this->load->database();
    }  
    function lookup($keyword)
    {
        $this->db->select('*')->from('project');
        $this->db->like('name', $keyword);
        $query = $this->db->get();
        return $query->result();
    }

    public function getArrayChildCate($id,$recursive=false)
    {
        $arr[]=$id;

        $q1 = $this->db->query("SELECT id FROM project_category where parent_id = '" . $id . "'")->result();
        if (isset($q1) && !empty($q1)) {
            foreach ($q1 as $v) {
                $arr[] = $v->id;
                if($recursive=true){
                    $arr=array_unique(array_merge($arr,$this->getArrayChildCate($v->id,true)));
                }

            }
        }
        return $arr;
    }


    public function getsearch_result($data,$limit = 0, $offset = 0,$recycle,$lang)
    {
        if(!empty($data))
        {
            if($data['name']==null&&$data['cate']==null&&$data['view']==null&&$data['code']==null&&$data['lang']==null){
                return array();
            }
            $this->db->select('project.*,project_category.name as cat_name,project_to_category.id_project,project_to_category.id_category');
            $this->db->from('project');
            $this->db->join('project_to_category', 'project.id=project_to_category.id_project','left');
            $this->db->join('project_category', 'project_category.id=project_to_category.id_category','left');

            if($data['name'] !=''){
                $this->db->like('project.project_name',$data['name']);
            }
            if($data['view'] !=''){
                $this->db->where('project.'.$data['view'],'1');
            }
            if($data['code'] !=''){
                $this->db->where('project.project_code',$data['code']);
            }
            if($data['cate'] !=''){
                $this->db->where('project_category.alias',$data['cate']);
            }
            if(@$lang !=''){
                $this->db->where('project.lang',$lang);
            }
            if(@$recycle !=''){
                $this->db->where('project.recycle',$recycle);
            }

            if($limit||$offset){
                $this->db->limit($limit, $offset);
            }
            $this->db->group_by('project.id');
            $this->db->order_by('project.id', 'desc');
            $q = $this->db->get();

            return $q->result();
        }
    }
    public function countsearch_result($data,$recycle,$lang)
    {
        if(!empty($data))
        {
            if($data['name']==null&&$data['cate']==null&&$data['view']==null&&$data['code']==null&&$data['lang']==null){
                return 0;
            }
            $this->db->select('project.*,project_category.name as cat_name,project_to_category.id_project,project_to_category.id_category');
            $this->db->from('project');
            $this->db->join('project_to_category', 'project.id=project_to_category.id_project','left');
            $this->db->join('project_category', 'project_category.id=project_to_category.id_category','left');

            if($data['name'] !=''){
                $this->db->like('project.project_name',$data['name']);
            }
            if($data['view'] !=''){
                $this->db->where('project.'.$data['view'],'1');
            }
            if($data['code'] !=''){
                $this->db->where('project.project_code',$data['code']);
            }
            if($data['cate'] !=''){
                $this->db->where('project_category.alias',$data['cate']);
            }

            if(@$lang !=''){
                $this->db->where('project.lang',$lang);
            }
            if(@$recycle !=''){
                $this->db->where('project.recycle',$recycle);
            }

            $this->db->group_by('project.id');
            $this->db->order_by('project.id', 'desc');
            $q = $this->db->get();
            return $q->num_rows();
        }
        else{
            return 0;
        }
    }


    public function getsearch_result_test_ajax($data,$limit = 0, $offset = 0)
    {
        if(!empty($data))
        {
            if($data['name']==null&&$data['cat']==null){
                return array();
            }
            $this->db->select('project.*,project_category.name as cat_name,project_to_category.id_project,project_to_category.id_category');
            $this->db->from('project');
            $this->db->join('project_to_category', 'project.id=project_to_category.id_project','left');
            $this->db->join('project_category', 'project_category.id=project_to_category.id_category','left');

            if($data['name'] !=''){
                $this->db->like('project.project_name',$data['name']);
            }

            if($data['cat'] !=''){
                $this->db->where('project.id_category',$data['cat']);
            }
            if($limit||$offset){
                $this->db->limit($limit, $offset);
            }
            $this->db->group_by('project.id');
            $this->db->order_by('project.id', 'desc');
            $q = $this->db->get();

            return $q->result_array();
        }
    }
    public function countsearch_result_test_ajax($data)
    {
        if(!empty($data))
        {
            if($data['name']==null&&$data['cat']==null){
                return 0;
            }
            $this->db->select('project.*,project_category.name as cat_name,project_to_category.id_project,project_to_category.id_category');
            $this->db->from('project');
            $this->db->join('project_to_category', 'project.id=project_to_category.id_project','left');
            $this->db->join('project_category', 'project_category.id=project_to_category.id_category','left');

            if($data['name'] !=''){
                $this->db->like('project.name',$data['name']);
            }

            if($data['cat'] !=''){
                $this->db->where('project.code',$data['code']);
            }
            $this->db->group_by('project.id');
            $this->db->order_by('project.id', 'desc');
            $q = $this->db->get();
            return $q->num_rows();
        }
        else{
            return 0;
        }
    }


        //====================================================================================================================
    public function getListProduct($table,$limit,$offset,$recycle,$lang){

        $this->db->select('project.*,
        project_category.id as cat_id,
        project_category.name as cat_name,
        project_category.alias as cat_alias,
        project_to_category.id_project,
        project_to_category.id_category');
        $this->db->from('project');
        $this->db->join('project_to_category', 'project.id=project_to_category.id_project','left');
        $this->db->join('project_category', 'project_category.id=project_to_category.id_category','left');

        if(@$lang !=''){
            $this->db->where('project.lang',$lang);
        }
        if(@$recycle !=''){
            $this->db->where('project.recycle',$recycle);
        }
            if($limit||$offset){
                $this->db->limit($limit, $offset);
            }
            $this->db->order_by('project.id', 'desc');
            $this->db->group_by('project.id');
            $q = $this->db->get();
            return $q->result();


    }
    public function getProImage($id){
        $this->db->select('project.*,
        project_images.*,
        project_images.id as img_id ');
        $this->db->join('project','project.id=project_images.project_id','left');
        $this->db->where('project.id',$id);
        $q=$this->db->get('project_images');
        return $q->result();
    }

    public function ProductBycategory($id,$limit,$offset){
        $q= $this->db->select('project.id as pro_id, project.name as pro_name,project.category_id, project.alias as pro_alias,
        project.home,project.image as pro_img,project.hot,project.focus,project_category.id as cate_id,
        project_category.name as cate_name, project_category.alias as cate_alias,
       project_to_category.id_project,project_to_category.id_category')
            ->join('project_to_category','project_to_category.id_project=project.id')
            ->join('project_category','project_to_category.id_category=project_category.id','left')
            ->where('project_to_category.id_category',$id)
            ->order_by('project.id','desc')
            ->group_by('project.id')
            ->limit($limit,$offset)
            ->get('project');
//        echo $q->last_query();

        return $q->result();
    }

    /*count  news by category*/
    public function countProByCategory($id){

        $q= $this->db->select('project.id as pro_id, project.name as pro_name,project.category_id, project.alias as pro_alias,
        project.home,project.image as pro_img,project.hot,project.focus,project_category.id as cate_id,
        project_category.name as cate_name, project_category.alias as cate_alias,
        project_to_category.id_project,project_to_category.id_category')
            ->join('project_to_category','project_to_category.id_project=project.id')
            ->join('project_category','project_to_category.id_category=project_category.id','left')
            ->where('project_to_category.id_category',$id)
            ->group_by('project.id')
            ->get('project');
        return $q->num_rows();
    }

    public function getListRoot(){
        $this->db->select('*');
        $this->db->where('parent_id =',0);
        $q=$this->db->get('project_category');
        return $q->result();
    }
    public function getListChil(){
        $this->db->select('*');
        $this->db->where('parent_id !=',0);
        $q=$this->db->get('project_category');
        return $q->result();
    }
    public function Deltete_cate($id_pro){
        if(is_numeric($id_pro)){
            $this->db->where('id_project',$id_pro);
            $this->db->delete('project_to_category');
        }else return false;
    }

    public function Getdata_search($table,$where = null,$order=null, $limit = null, $offset = null)
    {
        $this->db->select(' project.*,project.id as pro_id,  project_category.id as cate_id, project_category.name as cate_name');
        $this->db->join('project_category','project.category_id=project_category.id','left');

        if (is_array($where)||$where!=null) {
            $this->db->like($where);
        }

        if ($limit || $offset) {
            $this->db->limit($limit, $offset);
        }
        if (is_array($order)) {
            $this->db->order_by($order[0],$order[1]);
        }

        $q = $this->db->get($table);
        return $q->result();
    }
    public function Count_search($table,$where= null)
    {
        $this->db->select(' project.*,project.id as pro_id,  project_category.id as cate_id, project_category.name as cate_name');
        $this->db->join('project_category','project.category_id=project_category.id','left');

        if (is_array($where)||$where!=null) {
            $this->db->like($where);
        }
        $q= $this->db->get($table);
        return $q->num_rows();
    }

    public function get_producttags($productid){
        $this->db->select('product_tags.id,product_tags.tagname');
        $this->db->join('product_tags','product_tags.id=product_to_tags.tagid');
        $this->db->where('product_to_tags.productid',$productid);
        $q=$this->db->get('product_to_tags');
        return $q->result();
    }
    public function search_producttags($name){
        $this->db->select('id,tagname');
        $this->db->from('product_tags');
        $this->db->like('tagname',$name);
        $q=$this->db->get('',20);
        return $q->result();
    }
    public function search_trademark($name){
        $this->db->select('id,name');
        $this->db->from('trademark_category');
        $this->db->like('name',$name);
        $q=$this->db->get('',20);
        return $q->result();
    }
    /*=++++++++++++++++++++++++++++++++*/
    public function jQuerypagination_countriesdata($per_page,$offset) {
        $sdata = array();
        $this->db->select('id,name')->from('project');
        $this->db->limit($per_page,$offset);
        $query_result = $this->db->get();
        //echo $this->db->last_query(); // shows last executed query


        /*echo '<pre>';
        print_r($query_result->result_array());die();
        echo '</pre>';*/
        return $query_result->result_array();
    }
}