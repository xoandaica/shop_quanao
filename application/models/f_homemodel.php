<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class F_homemodel extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
    }
//    viêt thêm

    public function CountProView($view){
        $this->db->select('product.id as pro_id,
                            product_category.id as cate_id,
                            product_to_category.id_category');

        $this->db->join('product_to_category','product_to_category.id_product=product.id');
        $this->db->join('product_category','product_to_category.id_category=product_category.id');

        // $this->db->where('product_to_category.id_category',$id);
        $this->db->order_by('product.id','desc');
        $this->db->where('product.'.$view,1);
        $this->db->where('product.lang',$this->language);
        $this->db->group_by('product.id');
        $q=$this->db->get('product');
        return $q->num_rows();
    }
    public function NewsFullTD($limit, $offset){

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
           ->order_by('news.id','desc')
            ->where('news.lang',$this->language)
            ->get('', $limit, $offset);
//          ->get('');

        return $query->result();
    }

    public function Get_product_home($catid,$limit,$offset)
    {
        $this->db->select('product.*,
                            product_category.home,
                            product_category.id as cat_id,
                            product_category.alias as cat_alias,
                            product_category.name as cate_name');
        $this->db->join('product_category','product.category_id=product_category.id');
        $this->db->where('product.home',1);
        $this->db->where('product.category_id',$catid);
        $this->db->limit($limit,$offset);
        $this->db->order_by('product.id','desc');
        $this->db->group_by('product.id');
        $this->db->group_by('product.category_id');
        $q = $this->db->get('product');
        return $q->result();
    }


    /*++++++++++++++++++++ Products +++++++++++++++++++++++++++++++++++++++++*/
    public function Get_product_category($view,$limit,$offset){
        $this->db->select('product_category.*
                          ');
        $this->db->where($view,1);
        $this->db->limit($limit,$offset);
        $this->db->where('lang',$this->language);
        $this->db->group_by('id');
        $this->db->order_by('sort','esc');
        $q=$this->db->get('product_category');
        return $q->result();
    }
    public function Get_product($view,$limit,$offset)
    {
        $this->db->select('product.*,
                            product_category.home,
                            product_category.id as cat_id,
                            product_category.alias as cat_alias,
                            product_category.name as cate_name');
        $this->db->join('product_category','product.category_id=product_category.id');
        $this->db->where('product.'.$view,1);
        $this->db->where('product.lang',$this->language);
        $this->db->limit($limit,$offset);
        $this->db->order_by('product.id','desc');
        $this->db->group_by('product.id');
        $this->db->group_by('product.category_id');
        $q = $this->db->get('product');
        return $q->result();
    }
    /*++++++++++++++++++++Menu+++++++++++++++++++++++++++++++++++++++++*/
    //menu parent
    public function GetMenu_Parent($position,$limit,$offset){
        $this->db->select('menu.*');
        $this->db->where('position',$position);
        $this->db->where('lang',$this->language);
        $this->db->where('parent_id',0);
        $this->db->order_by('sort','esc');
        $this->db->limit($limit,$offset);
        $q = $this->db->get('menu');
        return $q->result();
    }
    //menu children
    public function GetMenu_Children($position,$limit,$offset){
        $this->db->select('menu.*');
        $this->db->where('position',$position);
        $this->db->where('lang',$this->language);
        $this->db->where('parent_id !=',0);
        $this->db->order_by('sort','esc');
        $this->db->limit($limit,$offset);
        $q = $this->db->get('menu');
        return $q->result();
    }
    //menu all
    public function GetMenu_All($limit,$offset){
        $this->db->select('menu.*');
        $this->db->where('lang',$this->language);
        $this->db->order_by('sort','esc');
        $this->db->limit($limit,$offset);
        $q = $this->db->get('menu');
        return $q->result();
    }
    /*++++++++++++++++++++ News +++++++++++++++++++++++++++++++++++++++++*/
    public function Get_news($view,$limit,$offset){
        $query = $this->db->select('news.*,
                                    news_category.id as cat_id,
                                    news_category.name,
                                    news_category.alias as cat_alias,
                                    news_category.parent_id')
            ->from('news')
            ->join('news_category', 'news.category_id = news_category.id')
            ->where('news.'.$view,1)
          ->where('news.lang',$this->language)
          //  ->where('news.category_id'.$cat_id)
           ->limit($limit,$offset)
            ->order_by('news.id','desc')
            ->group_by('news.id')
            ->group_by('news.category_id')
            ->get('');

        return $query->result();
    }
    public function Get_news_category($view,$limit,$offset){
        $query = $this->db->select('news_category.*                                   ')
            ->from('news_category')
            ->where('news_category.'.$view,1)
              ->where('news_category.lang',$this->language)
            //  ->where('news.category_id'.$cat_id)
            ->limit($limit,$offset)
            ->order_by('news_category.id','esc')
            ->group_by('news_category.id')
            ->get('');
        return $query->result();
    }
    /*++++++++++++++++++++ Project +++++++++++++++++++++++++++++++++++++++++*/
    public function Get_project($view,$limit,$offset){
        $query = $this->db->select('project.*,
        project.id as project_id,
        project_category.*')
            ->from('project')
            ->join('project_category', 'project.category_id = project_category.id')
            ->where('project.project_'.$view,1)
           ->where('project.lang',$this->language)
            ->limit($limit,$offset)
            ->order_by('project.id','desc')
            ->group_by('project.id')
            ->group_by('project.category_id')
            ->get('');

        return $query->result();
    }
    public function Get_project_category($view,$limit,$offset){
        $this->db->select('project_category.*,
                          ');
        $this->db->where($view,1);
        $this->db->limit($limit,$offset);
        $this->db->where('project_category.lang',$this->language);
        $this->db->group_by('id');
        $this->db->order_by('sort','esc');
        $q=$this->db->get('project_category');
        return $q->result();
    }

    /*++++++++++++++++++++ Pages +++++++++++++++++++++++++++++++++++++++++*/
    public function Get_pages($view,$limit,$offset){
        $this->db->select('staticpage.*');
        $this->db->where($view,1);
        $this->db->where('lang',$this->language);
        $this->db->order_by('staticpage.id','esc');
      //  $this->db->order_by('id','esc');
        $this->db->limit($limit,$offset);
        $q = $this->db->get('staticpage');
        return $q->result();
    }

    /*banner */
    public function Get_images($type,$limit,$offset){
        $this->db->select('images.*');
        $this->db->where('type',$type);
        $this->db->order_by('images.id','esc');
        $this->db->limit($limit,$offset);
        $q = $this->db->get('images');
        return $q->result();
    }
    /*banner 1*/
    public function array_cate($id_product){
        $this->db->select('product_to_category.id_category');
        $this->db->where('product_to_category.id_product',$id_product);
        $q=$this->db->get('product_to_category');
        $b=array();
         $rs=$q->result();
        foreach($rs as $v){
            $b[]=$v->id_category;
        }
        return $b;
    }
    /*deal noi bat*/
    public function ProductBycategory_0ld($alias,$limit,$offset){
        $cate=$this->getFirstRowWhere('product_category',array('alias'=>$alias));
//        print_r($cate);
        $q= $this->db->select('*,
                                product_category.id as cat_id,
                                product_category.name as cat_name,
                                product_category.alias as cat_alias,
                                product_to_category.*')
            ->join('product_to_category','product_to_category.id_product=product.id')
            ->join('product_category','product_to_category.id_category=product_category.id','left')
            ->where('product_to_category.id_category',$cate->id)
            ->order_by('product.id','desc')
            ->group_by('product.id')
            ->limit($limit,$offset)
            ->get('product');
//        echo $q->last_query();
        return $q->result();
    }

    /*count  news by category*/
    public function CountProByCategory_old($alias=null){
        if($alias){
            $cate=$this->getFirstRowWhere('product_category',array('alias'=>$alias));
        }
        $q= $this->db->select('product.id as pro_id,product.location,product.price as pro_price,product.price_sale as pro_price_sale, product.name as pro_name,product.category_id, product.alias as pro_alias,
        product.home,product.image as pro_img,product.hot,product.focus,product_category.id as cate_id,
        product_category.name as cate_name, product_category.alias as cate_alias,
        product_to_category.*')
            ->join('product_to_category','product_to_category.id_product=product.id')
            ->join('product_category','product_to_category.id_category=product_category.id','left')
            ->where('product_to_category.id_category',@$cate->id)
            ->group_by('product.id')
            ->get('product');
        return $q->num_rows();
    }


    public function getCate($alias){
        $q1=$this->db->select('*')
            ->from('news_category')
            ->where(array('alias'=>$alias))
            ->get()
            ->first_row();
        return $q1;
    }
    public function getArrayChildCate2($id){
        $arr=array();
        $arr[]=$id;
        $q1 = $this->db->query("SELECT id FROM product_category where parent_id = '" . $id . "'")->result();
        if (isset($q1) && !empty($q1)) {
            foreach ($q1 as $v) {
                $arr[] = $v->id;
                $q1 = $this->db->query("SELECT id FROM product_category where parent_id = '" . $v->id . "'")->result();
                foreach ($q1 as $v2) {
                    $arr[] = $v2->id;
                    $q1 = $this->db->query("SELECT id FROM product_category where parent_id = '" . $v2->id . "'")->result();
                    foreach ($q1 as $v3) {
                        $arr[] = $v3->id;
                        $q1 = $this->db->query("SELECT id FROM product_category where parent_id = '" . $v3->id . "'")->result();
                        foreach ($q1 as $v4) {
                            $arr[] = $v4->id;
                            $q1 = $this->db->query("SELECT id FROM product_category where parent_id = '" . $v4->id . "'")->result();
                            foreach ($q1 as $v5) {
                                $arr[] = $v5->id;
                            }
                        }
                    }
                }
            }
        }
        return $arr;
    }

    public function getArrayChildCate3($id){
        $arr=array();
        $arr[]=$id;
        $q1 = $this->db->query("SELECT id FROM project_category where parent_id = '" . $id . "'")->result();
        if (isset($q1) && !empty($q1)) {
            foreach ($q1 as $v) {
                $arr[] = $v->id;
                $q1 = $this->db->query("SELECT id FROM project_category where parent_id = '" . $v->id . "'")->result();
                foreach ($q1 as $v2) {
                    $arr[] = $v2->id;
                    $q1 = $this->db->query("SELECT id FROM project_category where parent_id = '" . $v2->id . "'")->result();
                    foreach ($q1 as $v3) {
                        $arr[] = $v3->id;
                        $q1 = $this->db->query("SELECT id FROM project_category where parent_id = '" . $v3->id . "'")->result();
                        foreach ($q1 as $v4) {
                            $arr[] = $v4->id;
                            $q1 = $this->db->query("SELECT id FROM project_category where parent_id = '" . $v4->id . "'")->result();
                            foreach ($q1 as $v5) {
                                $arr[] = $v5->id;
                            }
                        }
                    }
                }
            }
        }
        return $arr;
    }


}