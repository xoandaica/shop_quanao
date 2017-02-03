<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class F_newsmodel extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
    }

    public function Tinlienquan($cat_id,$limit,$offset){
        $query = $this->db->select('news.*,
                                    news_category.id as cat_id,
                                    news_category.name,
                                    news_category.alias as cat_alias,
                                    news_category.parent_id')
            ->from('news')
            ->join('news_category', 'news.category_id = news_category.id')
         //  ->where('news.'.$cat_id,1)
        //  ->where('news.lang',$this->language)
            ->where('news.category_id',$cat_id)
            ->limit($limit,$offset)
            ->order_by('news.id','desc')
            ->group_by('news.id')
            ->group_by('news.category_id')
            ->get('');

        return $query->result();
    }


    public function getNewsByCategory($id,$limit,$offset){

        $query = $this->db->select('news.*,
                                    news_category.id as cat_id,
                                    news_category.name,
                                    news_category.alias as cat_alias,
                                    news_category.parent_id,
                                    news_to_category.id_category,
                                    news_to_category.id_news')
            ->from('news')
            ->join('news_to_category', 'news.id = news_to_category.id_news')
            ->join('news_category', 'news_category.id = news_to_category.id_category')
            ->order_by('news.id','desc')
            ->where('news.lang',$this->language)
            ->where('news_to_category.id_category',$id)
            ->group_by('news.id')
            ->get('', $limit, $offset);

        return $query->result();
    }

    /*count  news by category*/
    public function countNewsByCategory($id){
        $query = $this->db->select('news.id,
                                    news_category.id as cat_id,
                                    news_to_category.id_news')
            ->from('news')
            ->join('news_to_category', 'news.id = news_to_category.id_news')
            ->join('news_category', 'news_category.id = news_to_category.id_category')
            ->where('news_to_category.id_category',$id)
            ->group_by('news.id')
            ->get('');
        return $query->num_rows();
    }
    public function countNewsByCategory_full(){
        $query = $this->db->select('news.id,
                                    news_category.id as cat_id,
                                    news_to_category.id_news')
            ->from('news')
            ->join('news_to_category', 'news.id = news_to_category.id_news')
            ->join('news_category', 'news_category.id = news_to_category.id_category')
            //->where('news_to_category.id_category',$id)
            ->group_by('news.id')
            ->get('');
        return $query->num_rows();
    }


    public function get_news_content($id,$alias){
        $query = $this->db->select('news.*')
            ->from('news')
            ->join('news_category', 'news_category.id=news.category_id','left')
            ->where('news.id', $id)
            ->where('news.alias', $alias)
            ->get();
        return $query->first_row();
    }

    /*++++++++++++++++++++++++++++++++++++++*/


    public function getMenuRightRoot(){
        $this->db->select('*');
        $this->db->where('position','right');
        $this->db->where('parent_id',0);
        $q=$this->db->get('menu');
        return $q->result();
    }


    public function NewsFull($limit, $offset){

        $query = $this->db->select('news.*,
                                    news_category.id as cat_id,
                                    news_category.name,
                                    news_category.alias as cat_alias,
                                    news_category.parent_id,
                                    news_to_category.id_category,
                                    news_to_category.id_news')
            ->from('news')
            ->join('news_to_category', 'news.id = news_to_category.id_news')
            ->join('news_category', 'news_category.id = news_to_category.id_category')
            ->group_by('news.id')
            ->where('news.lang',$this->language)
            ->get('', $limit, $offset);
//          ->get('');

        return $query->result();
    }
    public function getSimilar($alias,$limit,$offset){

        $q1=$this->db->query("SELECT id,alias,category_id FROM news where alias='".$alias."'");

        $query = $this->db->select('news.id as news_id, news.title, news.description,news.alias ,news.category_id,news.image,
                            news_category.id as cate_id, news_category.name,  news_category.parent_id')
            ->from('news')
            ->join('news_category', 'news_category.id = news.category_id')
            ->where('news_category.id',$q1->first_row()->category_id)
            ->where('news.alias !=',$alias)
            ->get('', $limit, $offset);

        return $query->result();
    }

    public function News_view_detail($view,$limit,$offset){
        $this->db->select('news.*');
        $this->db->where('news.'.$view,1);
        $this->db->order_by('news.id','desc');
        $this->db->limit($limit,$offset);
        $q=$this->db->get('news');
        return $q->result();
    }




    public function News_stand_out_focus(){
        $this->db->select('news.*');
        $this->db->where('news.focus',1);
        $this->db->order_by('news.id','desc');
        $this->db->limit(7,0);
        $q=$this->db->get('news');
        return $q->result();
    }
    public function getNewsDetail($category,$alias){
        $this->db->select('news.id as news_id, news.title, news.description,news.image,news.alias as news_alias,news.category_id,news.content,
                            news_category.id as cate_id, news_category.name, news_category.alias as cate_alias');
        $this->db->join('news_category','news.category_id=news_category.id','left');

        $this->db->where('news_category.alias',$category);
        $this->db->where('news.alias',$alias);
        $q=$this->db->get('news');
        return $q->first_row();
    }
    /*httt*/
    public function Home_support(){
        $this->db->select('*');
        $this->db->limit(3,0);
        $n=$this->db->get('support_online');
        return $n->result();
    }

}