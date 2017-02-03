<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
        $this->load->database();
    }
    public function getArrayChildCate($id,$recursive=false)
    {
        $arr[]=$id;
        $q1 = $this->db->query("SELECT id FROM news_category where parent_id = '" . $id . "'")->result();
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
            if($data['name']==null&&$data['cate']==null&&$data['view']==null&&$data['lang']==null){
                return array();
            }
            $this->db->select('news.*,news_category.name as cat_name,news_to_category.id_news,news_to_category.id_category');
            $this->db->from('news');
            $this->db->join('news_to_category', 'news.id=news_to_category.id_news','left');
            $this->db->join('news_category', 'news_category.id=news_to_category.id_category','left');

            if($data['name'] !=''){
                $this->db->like('news.title',$data['name']);
            }
            if($data['view'] !=''){
                $this->db->where('news.'.$data['view'],'1');
            }
            if($data['lang'] !=''){
                $this->db->where('news.lang',$data['lang']);
            }
            if($data['cate'] !=''){
                $this->db->where('news_category.alias',$data['cate']);
            }
            if(@$lang !=''){
                $this->db->where('news.lang',$lang);
            }
            if($limit||$offset){
                $this->db->limit($limit, $offset);
            }

            $this->db->where('news.recycle',$recycle);
            $this->db->group_by('news.id');
            $this->db->order_by('news.id', 'desc');
            $q = $this->db->get();
            return $q->result();
        }
    }
    public function countsearch_result($data,$recycle,$lang)
    {
        if(!empty($data))
        {
            if($data['name']==null&&$data['cate']==null&&$data['view']==null&&$data['lang']==null){
                return 0;
            }
            $this->db->select('news.*,news_category.name as cat_name,news_to_category.id_news,news_to_category.id_category');
            $this->db->from('news');
            $this->db->join('news_to_category', 'news.id=news_to_category.id_news','left');
            $this->db->join('news_category', 'news_category.id=news_to_category.id_category','left');

            if($data['name'] !=''){
                $this->db->like('news.title',$data['name']);
            }
            if($data['view'] !=''){
                $this->db->where('news.'.$data['view'],'1');
            }
            if($data['lang'] !=''){
                $this->db->where('news.lang',$data['lang']);
            }
            if($data['cate'] !=''){
                $this->db->where('news_category.alias',$data['cate']);
            }
            if(@$lang !=''){
                $this->db->where('news.lang',$lang);
            }

            $this->db->where('news.recycle',$recycle);
            $this->db->group_by('news.id');
            $q = $this->db->get();
            //echo  $this->db->last_query();
            return $q->num_rows();
        }
        else{
            return 0;
        }
    }
    public function getList($table){
        $this->db->select('*');
        $q=$this->db->get($table);
        return $q->result();
    }
    public function newsListAll($limit,$offset,$recycle,$lang){
        $this->db->select('news.*, news_category.id as cate_id, news_category.name as cat_name ');
        $this->db->join('news_category','news.category_id=news_category.id','left');
        $this->db->limit($limit,$offset);
        if(@$lang !=''){
            $this->db->where('news.lang',@$lang);
        }
        $this->db->where('news.recycle',$recycle);
        $this->db->order_by('news.id','desc');
        $q=$this->db->get('news');
        return $q->result();
    }

    public function newsBycategory($alias,$limit,$offset){
        $this->db->select('news.id as news_id, news.title, news.alias,news.category_id,news.home,news.hot,news.focus,news.image, news_category.id as cate_id,
         news_category.name as cate_name,news_category.alias as cate_alias');
        $this->db->join('news_category','news.category_id=news_category.id','left');
        $this->db->where('news_category.alias',$alias);

        $this->db->limit($limit,$offset);

        $q=$this->db->get('news');
        return $q->result();
    }
    /*count  news by category*/
    public function countNewsByCategory($alias){
        $this->db->select('news.id as news_id, news.category_id,news.home,news.hot,news.focus,news.image, news_category.id as cate_id,
         news_category.name as cate_name,news_category.alias as cate_alias');
        $this->db->join('news_category','news.category_id=news_category.id','left');
        $this->db->where('news_category.alias',$alias);;
        $q=$this->db->get('news');
        return $q->num_rows();
    }
    public function getNewsByID($id){
        $this->db->where('id',$id);
        $q=$this->db->get('news');
        return $q->first_row();
    }

    public function getListRoot(){
        $this->db->select('*');
        $this->db->where('parent_id =',0);
        $q=$this->db->get('news_category');
        return $q->result();
    }
    public function getListChil(){
        $this->db->select('*');
        $this->db->where('parent_id !=',0);
        $q=$this->db->get('news_category');
        return $q->result();
    }
    public function getNewsImage($id){
        $this->db->select('news.*,
        news_images.link,
        news_images.id as img_id ,
        news_images.name as img_name ');
        $this->db->join('news','news.id=news_images.news_id','left');
        $this->db->where('news_images.news_id',$id);
        $q=$this->db->get('news_images');
        return $q->result();
    }
}
