<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class F_productmodel extends MY_Model
{
    function __construct()
    {
        parent::__construct();
    }


    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    public function getCateRoot()
    {
        $this->db->select('*');
        $this->db->where('parent_id',0);
        $this->db->order_by('sort','esc');
        $q=$this->db->get('product_category');
        return $q->result();
    }
    public function getCateChild(){
        $this->db->select('*');
        $this->db->where('parent_id !=',0);
        $this->db->order_by('sort','esc');
        $q=$this->db->get('product_category');
        return $q->result();
    }
    public function getMenu_Center(){
        $this->db->select('*');
        $this->db->where('parent_id !=',0);
        $this->db->where('position','top');
        $this->db->order_by('sort','esc');
        $q=$this->db->get('menu');
        return $q->result();
    }
    public function getMenuTopRoot(){
        $this->db->select('*');
        $this->db->where('position','top');
        $this->db->where('parent_id',0);
        $this->db->order_by('sort','esc');
        $q=$this->db->get('menu');
        return $q->result();
    }




    public function getProductSimilar($product_id, $limit, $offset)
    {
        $arr_in=$this->getarr_idcategory($product_id);
        $query = $this->db->select('product.id,product_category.id,product.alias as pro_alias,product.image as pro_image,product.caption_1,
                                product.category_id, product.price,product.price_sale,product_category.name as cate_name,product.name as product_name,product.description,product.price as pro_price,
                                product_category.alias,product_category.alias as cate_alias,product_category.parent_id,
                                product_to_category.id as product_to_category_id ')
            ->from('product')
            ->join('product_to_category', 'product_to_category.id_product = product.id')
            ->join('product_category', 'product_to_category.id_category = product_category.id')
            /*->where_in('product_category.id',$arr_in)*/
            ->where('product.id !=', $product_id)
            ->group_by('product.id')
            ->get('', $limit, $offset);
        return $query->result();
    }


    public function getarr_idcategory($product_id){
        $q2 = $this->db->query("SELECT category_id FROM product where id = '" . $product_id . "'")->first_row();
        $q1 = $this->db->query("SELECT id_category FROM product_to_category where id_product = '" . $product_id . "' and id_category <>$q2->category_id")->result();
        $arr=array();
        foreach($q1 as $v){
            $arr[]=$v->id_category;
        }
        return $arr;
    }

    public function getarr_idtags($product_id){
        $q2 = $this->db->query("SELECT id FROM product where id = '" . $product_id . "'")->first_row();
        $q1 = $this->db->query("SELECT tagid FROM product_to_tags where productid = '" . $product_id . "' and tagid <>$q2->id")->result();
        $arr=array();
        foreach($q1 as $v){
            $arr[]=$v->tagid;
        }
        return $arr;
    }
    //products tags
    public function getProduct_Tags($tagid, $limit, $offset) {
        $this->db->select(
            'product.id as pro_id,
             product.alias  as pro_alias,
             product.price,
             product.description,
             product.price_sale,
             product.name,
             product.image,
             product.category_id,
             product.view,
             product.bought,
             product.caption_1,
             product_tags.id as tag_id,
             product_to_tags.*');
        $this->db->join('product_to_tags','product_to_tags.productid=product.id');
        $this->db->join('product_tags','product_to_tags.tagid=product_tags.id','left');
        $this->db->where_in('product_to_tags.tagid', $tagid);
        $this->db->limit($limit,$offset);
        $q = $this->db->get('product');
        return $q->result();
    }



    public function getProductSimilar2($category_id, $limit, $offset)
    {
        $query = $this->db->select('product.id,product_category.id,product.alias as pro_alias,product.image as pro_image,product.caption_1,
                                product.category_id, product.price,product.price_sale,product_category.name as cate_name,product.name as product_name,product.description,product.price as pro_price,
                                product_category.alias,product_category.alias as cate_alias,product_category.parent_id')
            ->from('product')
            ->join('product_category', 'product.category_id = product_category.id')
            ->where(array('product_category.id'=>$category_id,))
            ->group_by('product.id')
            ->get('', $limit, $offset);
        return $query->result();
    }

    public function getProbyCate($alias, $limit, $offset)
    {
        $q1 = $this->db->query("SELECT id,alias FROM product_category where alias = '" . $alias . "'");
        $query = $this->db->select('product.id,product.name as pro_name,product_category.id,product.alias as pro_alias,
        product.image as pro_image,product.price as pro_price,product_category.alias,product_category.alias as cate_alias,product_category.parent_id ')
            ->from('product')
            ->join('product_category', 'product_category.id=product.category_id', 'left')
            ->where('product_category.alias', $alias)

            ->or_where('product_category.parent_id', @$q1->first_row()->id)

            ->limit($limit, $offset)
            ->order_by('product.id', 'desc')
            ->get();

        return $query->result();
    }

    public function count_ProbyCate($alias)
    {
        $q1 = $this->db->query("SELECT id,alias FROM product_category where alias = '" . $alias . "'");

        $query = $this->db->select('product.id,product.name as pro_name,product.price as pro_price,product_category.id,product.alias as pro_alias,
        product.image as pro_image,product_category.alias,product_category.alias as cate_alias,product_category.parent_id ')
            ->from('product')
            ->join('product_category', 'product_category.id=product.category_id', 'left')
            ->where('product_category.alias', $alias)
            ->or_where('product_category.parent_id', @$q1->first_row()->id)

            ->order_by('product.id', 'desc')
            ->get();

        return $query->num_rows();
    }
    /********products show home *************/
    public function Products_cate_home(){
        $this->db->select('product.id as pro_id,product.alias  as pro_alias,product_category.alias,
        product.price,product.price_sale,product.name,product.image,product.category_id,product_category.id,
        product_category.home, product_category.name as cate_name');
        $this->db->join('product_category','product.category_id=product_category.id');
        $this->db->where('product.home','1');
        $this->db->limit(12);
        $this->db->order_by('id','random');
        $q=$this->db->get('product');
        return $q->result();
    }


    public function getArrayChildCate($id){

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

    public function ProductBycategory($id,$limit,$offset){
        $this->db->select('product.id as pro_id,
                            product.location,
                            product.alias as pro_alias,
                            product.location,
                            product.caption_1,
                            product.price as pro_price,
                            product.price_sale as pro_price_sale,
                            product.name as pro_name,
                            product.category_id,
                            product.alias as pro_alias,
                            product.view,product.bought,
                            product.home,
                            product.image as pro_img,
                            product.hot,
                            product.focus,
                            product_category.id as cate_id,
                            product_category.name as cate_name,
                            product_category.alias as cate_alias,
                            product_to_category.id_product,
                            product_to_category.id_category');

        $this->db->join('product_to_category','product_to_category.id_product=product.id');
        $this->db->join('product_category','product_to_category.id_category=product_category.id');

        $this->db->where('product_to_category.id_category',$id);
//        $this->db->where_in('product.category_id', $this->getArrayChildCate($q1->id,true));
        $this->db->order_by('product.id','desc');
        $this->db->group_by('product.id');
        $this->db->limit($limit,$offset);
        $q=$this->db->get('product');
        return $q->result();
    }
    /*count  news by category*/
    public function CountProByCategory($id){
        $this->db->select('product.id as pro_id,
                            product_category.id as cate_id,
                            product_to_category.id_category');

        $this->db->join('product_to_category','product_to_category.id_product=product.id');
        $this->db->join('product_category','product_to_category.id_category=product_category.id');

        $this->db->where('product_to_category.id_category',$id);
        $this->db->order_by('product.id','desc');
        $this->db->group_by('product.id');
        $q=$this->db->get('product');
        return $q->num_rows();
    }


    public function getproduct_detail($pid,$alias){
        $query = $this->db->select('product.*')
            ->from('product')
            ->join('product_category', 'product_category.id=product.category_id','left')
            ->where('product.id', $pid)
            ->where('product.alias', $alias)
            ->get();
        return $query->first_row();
    }

    public function tags_cate(){
        $this->db->select('product_tags.*');
        $this->db->where('tagname !=','');
        $q=$this->db->get('product_tags');
        return $q->result();
    }

    public function products_by_tags($tagsid){
//        print_r($tagsid);die();
        $this->db->select('product.id as pro_id,
                            product.location,
                            product.alias as pro_alias,
                            product.location,
                            product.caption_1,
                            product.price as pro_price,
                            product.price_sale as pro_price_sale,
                            product.name as pro_name,
                            product.category_id,
                            product.alias as pro_alias,
                            product.view,product.bought,
                            product.home,
                            product.image as pro_img,
                            product.hot,
                            product.focus,
                            product_category.id as cate_id,
                            product_category.name as cate_name,
                            product_category.alias as cate_alias,
                            product_to_category.id_product,
                            product_to_category.id_category,
                            product_to_tags.tagid');

        $this->db->join('product_to_category','product_to_category.id_product=product.id');
        $this->db->join('product_category','product_to_category.id_category=product_category.id');
        $this->db->join('product_to_tags','product_to_tags.productid=product.id');

        $this->db->where_in('product_to_tags.tagid',$tagsid);
        $this->db->order_by('product.id','desc');
        $this->db->group_by('product.id');
        $q=$this->db->get('product');
        return $q->result();
    }

    //=============================Location

    public function ProductByLocation($alias,$limit,$offset){
        $cate=$this->getFirstRowWhere('tinhthanh',array('alias'=>$alias));

        $q= $this->db->select('product.id as pro_id, product.name as pro_name,product.location,product.alias as pro_alias,
        product.price as pro_price,product.price_sale as pro_price_sale,
        product.category_id, product.alias as pro_alias, product.image as pro_img,
        tinhthanh.region_id as cate_id, tinhthanh.region_name as cate_name, tinhthanh.alias as cate_alias')

            ->join('tinhthanh','product.location=tinhthanh.region_id')
            ->where('tinhthanh.region_id',$cate->region_id)
            ->order_by('product.id','desc')
            ->group_by('product.id')
            ->limit($limit,$offset)
            ->get('product');

        return $q->result();
    }

    /*count  news by category*/
    public function CountProByLocation($alias){

        $cate=$this->getFirstRowWhere('tinhthanh',array('alias'=>$alias));

        $q= $this->db->select('product.id as pro_id,product.location,product.price as pro_price,
        product.price_sale as pro_price_sale, product.name as pro_name,product.category_id,
        product.alias as pro_alias,product.image as pro_img,
        tinhthanh.region_id as cate_id, tinhthanh.region_name as cate_name, tinhthanh.alias as cate_alias,')

           ->join('tinhthanh','tinhthanh.region_id=product.location','left')
            ->where('tinhthanh.region_id',$cate->region_id)
            ->group_by('product.id')
            ->get('product');
        return $q->num_rows();
    }

    //=============================end Location

    public function getProductImages($alias)
    {
        $this->db->select('product.id, product.alias, product.image, images.id as image_id,images.id_item ,images.link ');
        $this->db->join('product', 'images.id_item=product.id', 'left');
        $this->db->where('alias', $alias);
        $q = $this->db->get('images');
        return $q->result();
    }

    public function new_Product()
    {
        $this->db->select('*');
        $this->db->limit(10, 0);
        $q = $this->db->get('product');
        return $q->result();
    }

    public function NewsCate_focus()
    {
        $this->db->select('news.id as news_id, news.title,news.category_id,news.home,news.hot,news.focus,news.image, news_category.id as cate_id,
         news_category.name as cate_name,news_category.alias as cate_alias,news.alias as news_alias');
        $this->db->where('news_category.focus', 1);
        $this->db->where('news.home', 1);
        $this->db->join('news_category', 'news.category_id=news_category.id', 'left');
        $this->db->order_by('news.id', 'desc');
        $this->db->limit(4, 0);
        $q = $this->db->get('news');
        return $q->result();
    }


    public function Search_rs($ma_hang,$limit,$offset){

        $this->db->select('product.id as pro_id,product.alias as pro_alias,product.price as pro_price,product.caption_1,
        product.price_sale as pro_price_sale, product.name as pro_name,product.category_id,
        product.alias as pro_alias,product.view,product.bought,
        product.home,product.image as pro_img,product.hot,product.focus,product_category.id as cate_id,
        product_category.name as cate_name, product_category.alias as cate_alias,
        product_to_category.*')
        ->join('product_to_category','product_to_category.id_product=product.id')
        ->join('product_category','product_to_category.id_category=product_category.id','left');

        $this->db->limit($limit,$offset);
        if($ma_hang!='null'){
            $this->db->like('product.name',rawurldecode($ma_hang));
        }
        $this->db->order_by('product.id','desc');
        $this->db->group_by('product.id');
        $q=$this->db->get('product');
        return $q->result();
    }

    public function Count_search_rs($ma_hang){

        $this->db->select('product.id as pro_id,product.alias as pro_alias,product.price as pro_price,product.price_sale as pro_price_sale, product.name as pro_name,product.category_id, product.alias as pro_alias,
        product.home,product.image as pro_img,product.hot,product.focus,product_category.id as cate_id,
        product_category.name as cate_name, product_category.alias as cate_alias,
        product_to_category.*')
            ->join('product_to_category','product_to_category.id_product=product.id')
            ->join('product_category','product_to_category.id_category=product_category.id','left');

        if($ma_hang!='null'){
            $this->db->like('product.name',rawurldecode($ma_hang));
        }
        $this->db->order_by('product.id','desc');
        $this->db->group_by('product.id');
        $q=$this->db->get('product');
        return $q->num_rows();
    }


    public function getListRoot(){
        $this->db->select('*');
        $this->db->where('parent_id =',0);
        $q=$this->db->get('product_category');
        return $q->result();
    }
    public function getListChil(){
        $this->db->select('*');
        $this->db->where('parent_id !=',0);
        $q=$this->db->get('product_category');
        return $q->result();
    }
    public function count_ByNetwork($alias)
    {
        $this->db->select('id');
        $this->db->where('network', $alias);
        $q = $this->db->get('sim');
        return $q->num_rows();
    }

    public function getSlider_partners(){
        $this->db->where('type','partners');
        $q=$this->db->get('images');
        return $q->result();
    }

    public function count_ByType($alias)
    {
        $this->db->select('id');
        $this->db->where('type', $alias);
        $q = $this->db->get('sim');
        return $q->num_rows();
    }


    /*httt*/
    public function Home_support(){
        $this->db->select('support_online.name,support_online.phone,support_online.skype,support_online.yahoo');
        $this->db->where('support_online.active',1);
        $this->db->limit(3,0);
        $n=$this->db->get('support_online');
        return $n->result();
    }
    public function getComments($product_id,$limit){
        $this->db->select('comments.*, users.name,users.avatar,users.fullname');
        $this->db->join('users','users.id=comments.user');
        $this->db->where('comments.item_id',$product_id);
        $this->db->order_by('comments.id','desc');
        $n=$this->db->get('comments',$limit);
        return $n->result();
    }
    public function getComments_desc($product_id){
        $this->db->select('comments.*, users.fullname, users.avatar,users.fullname');
        $this->db->join('users','users.id=comments.user');
        $this->db->where('comments.item_id',$product_id);
        $n=$this->db->get('comments');
        return $n->result();
    }
    public function getProSale()
    {
        $this->db->select('*');
        $this->db->order_by('bought','desc');
        $this->db->limit(20);
        $q = $this->db->get('product');
        return $q->result();
    }


    public function get_pro_vip(){
        $this->db->select('product.id as pro_id,
                            product.alias  as pro_alias,
                            product.price,
                            product.description,
                            product.price_sale,
                            product.name,
                            product.image,
                            product.category_id,
                            product.view,
                            product.vip,
                            product.bought,
                            product.caption_1,
                            product_category.home,
                            product_category.id as cat_id,
                            product_category.alias as cat_alias,
                            product_category.name as cate_name');
        $this->db->join('product_category','product.category_id=product_category.id');
        $this->db->where('product.vip',1);
//        $this->db->where('product.home',0);
        $this->db->order_by('product.sort');
        $q = $this->db->get('product');
        return $q->result();
    }

    public function get_pro_simlar($category_id,$limit,$offset){
        $this->db->select('product.id as pro_id,
                            product.alias  as pro_alias,
                            product.price,
                            product.description,
                            product.price_sale,
                            product.name,
                            product.image,
                            product.category_id,
                            product.view,
                            product.bought,
                            product.caption_1,
                            product_category.home,
                            product_category.id as cat_id,
                            product_category.alias as cat_alias,
                            product_category.name as cate_name');
        $this->db->join('product_category','product.category_id=product_category.id');
        $this->db->where('product.home',1);
        $this->db->where('product.category_id',$category_id);
        $this->db->limit($limit,$offset);
        $this->db->order_by('product.sort');
        $q = $this->db->get('product');
        return $q->result();
    }

    public function getData_pro_hot()
    {
        $this->db->select('product.id as pro_id,
                            product.alias  as pro_alias,
                            product.price,
                            product.description,
                            product.price_sale,
                            product.name,
                            product.image,
                            product.category_id,
                            product.view,
                            product.bought,
                            product.caption_1,
                            product_category.home,
                            product_category.id as cat_id,
                            product_category.alias as cat_alias,
                            product_category.name as cate_name');
        $this->db->join('product_category','product.category_id=product_category.id');
        $this->db->where('product.hot',1);
        $this->db->limit(6,0);
        $this->db->order_by('product.sort');
        $q = $this->db->get('product');
        return $q->result();
    }


    public function get_products_priview()
    {
        $this->db->select('product.id as pro_id,
                            product.alias  as pro_alias,
                            product.price,
                            product.description,
                            product.price_sale,
                            product.name,
                            product.image,
                            product.category_id,
                            product.view,
                            product.bought,
                            product.caption_1,
                            product_category.home,
                            product_category.id as cat_id,
                            product_category.alias as cat_alias,
                            product_category.name as cate_name');
        $this->db->join('product_category','product.category_id=product_category.id');
        $this->db->order_by('product.sort');
        $this->db->group_by('product.id');
        $q = $this->db->get('product');
        return $q->result();
    }

    public function getsearch_result($data,$limit = 0, $offset = 0)
    {
        if(!empty($data))
        {
            if($data['key']==null&&$data['id_cate_search']==null){
                return 0;
            }
            $this->db->select('product.id as pro_id,
                            product.location,
                            product.alias as pro_alias,
                            product.location,
                            product.caption_1,
                            product.price as pro_price,
                            product.price_sale as pro_price_sale,
                            product.name as pro_name,
                            product.category_id,
                            product.alias as pro_alias,
                            product.view,product.bought,
                            product.home,
                            product.image as pro_img,
                            product.hot,
                            product.focus,
                            product_category.id as cate_id,
                            product_category.name as cate_name,
                            product_category.alias as cate_alias,
                            product_to_category.id_product,
                            product_to_category.id_category');
            $this->db->from('product');
            $this->db->join('product_to_category','product_to_category.id_product=product.id');
            $this->db->join('product_category','product_to_category.id_category=product_category.id');
            $this->db->group_by('product.id');
            if($data['key'] !=''){
                $this->db->like('product.name',$data['key']);
            }
            if($data['id_cate_search'] !=''){
                $this->db->where('product_category.alias',$data['id_cate_search']);
            }

            if($limit||$offset){
                $this->db->limit($limit, $offset);
            }
            $this->db->order_by('product.id', 'desc');
            $q = $this->db->get();
            return $q->result();
        }
    }
    public function countsearch_result($data)
    {
        if(!empty($data))
        {
            if($data['key']==null&&$data['id_cate_search']==null){
                return 0;
            }
            $this->db->select('product.id as pro_id,
                            product.location,
                            product.alias as pro_alias,
                            product.location,
                            product.caption_1,
                            product.price as pro_price,
                            product.price_sale as pro_price_sale,
                            product.name as pro_name,
                            product.category_id,
                            product.alias as pro_alias,
                            product.view,product.bought,
                            product.home,
                            product.image as pro_img,
                            product.hot,
                            product.focus,
                            product_category.id as cate_id,
                            product_category.name as cate_name,
                            product_category.alias as cate_alias,
                            product_to_category.id_product,
                            product_to_category.id_category');
            $this->db->from('product');
            $this->db->join('product_to_category','product_to_category.id_product=product.id');
            $this->db->join('product_category','product_to_category.id_category=product_category.id');
            $this->db->group_by('product.id');
            if($data['key'] !=''){
                $this->db->like('product.name',$data['key']);
            }
            if($data['id_cate_search'] !=''){
                $this->db->where('product_category.alias',$data['id_cate_search']);
            }

            $q = $this->db->get();
            return $q->num_rows();
        }
        else{
            return 0;
        }
    }

    public function getsearch_result2($data,$limit = 0, $offset = 0)
    {

        if(!empty($data))
        {
            if($data['key']==null&&$data['price_form']==null&&$data['price_to']==null){
                return 0;
            }
            $this->db->select('product.id as pro_id,
                            product.location,
                            product.alias as pro_alias,
                            product.location,
                            product.caption_1,
                            product.price as pro_price,
                            product.price_sale as pro_price_sale,
                            product.name as pro_name,
                            product.category_id,
                            product.alias as pro_alias,
                            product.view,product.bought,
                            product.home,
                            product.image as pro_img,
                            product.hot,
                            product.focus,
                            product_category.id as cate_id,
                            product_category.name as cate_name,
                            product_category.alias as cate_alias,
                            product_to_category.id_product,
                            product_to_category.id_category');
            $this->db->from('product');
            $this->db->join('product_to_category','product_to_category.id_product=product.id');
            $this->db->join('product_category','product_to_category.id_category=product_category.id');
            $this->db->group_by('product.id');
            if($data['key'] !=''){
                $this->db->where($data['key'],NULL, FALSE);
            }

            if($data['price_form'] !=''){
                $this->db->where('product.price_sale >=',$data['price_form']);
            }

            if($data['price_to'] !=''){
                $this->db->where('product.price_sale <=',$data['price_to']);
            }

            if($limit||$offset){
                $this->db->limit($limit, $offset);
            }
            $this->db->order_by('product.id', 'desc');
            $q = $this->db->get();
            return $q->result();
        }
    }
    public function countsearch_result2($data)
    {
        if(!empty($data))
        {
            if($data['key']==null&&$data['price_form']==null&&$data['price_to']==null){
                return 0;
            }
            $this->db->select('product.id as pro_id,
                            product.location,
                            product.alias as pro_alias,
                            product.location,
                            product.caption_1,
                            product.price as pro_price,
                            product.price_sale as pro_price_sale,
                            product.name as pro_name,
                            product.category_id,
                            product.alias as pro_alias,
                            product.view,product.bought,
                            product.home,
                            product.image as pro_img,
                            product.hot,
                            product.focus,
                            product_category.id as cate_id,
                            product_category.name as cate_name,
                            product_category.alias as cate_alias,
                            product_to_category.id_product,
                            product_to_category.id_category');
            $this->db->from('product');
            $this->db->join('product_to_category','product_to_category.id_product=product.id');
            $this->db->join('product_category','product_to_category.id_category=product_category.id');
            $this->db->group_by('product.id');
            if($data['key'] !=''){
                $this->db->where($data['key'],NULL, FALSE);
            }

            if($data['price_form'] !=''){
                $this->db->where('product.price_sale >=',$data['price_form']);
            }

            if($data['price_to'] !=''){
                $this->db->where('product.price_sale <=',$data['price_to']);
            }

            $q = $this->db->get();
            return $q->num_rows();
        }
        else{
            return 0;
        }
    }



    //order by products


    public function ProductBycategory_p($id,$limit,$offset){
        $this->db->select('product.id as pro_id,
                            product.location,
                            product.alias as pro_alias,
                            product.location,
                            product.caption_1,
                            product.price as pro_price,
                            product.price_sale as pro_price_sale,
                            product.name as pro_name,
                            product.category_id,
                            product.alias as pro_alias,
                            product.view,product.bought,
                            product.home,
                            product.image as pro_img,
                            product.hot,
                            product.focus,
                            product_category.id as cate_id,
                            product_category.name as cate_name,
                            product_category.alias as cate_alias,
                            product_to_category.id_product,
                            product_to_category.id_category');

        $this->db->join('product_to_category','product_to_category.id_product=product.id');
        $this->db->join('product_category','product_to_category.id_category=product_category.id');

        $this->db->where('product_to_category.id_category',$id);
//        $this->db->where_in('product.category_id', $this->getArrayChildCate($q1->id,true));
        $this->db->order_by('product.price_sale','esc');
        $this->db->order_by('product.price','esc');
        $this->db->group_by('product.id');
        $this->db->limit($limit,$offset);
        $q=$this->db->get('product');
        return $q->result();
    }
    /*count  news by category*/
    public function CountProByCategory_p($id){
        $this->db->select('product.id as pro_id,
                            product_category.id as cate_id,
                            product_to_category.id_category');

        $this->db->join('product_to_category','product_to_category.id_product=product.id');
        $this->db->join('product_category','product_to_category.id_category=product_category.id');

        $this->db->where('product_to_category.id_category',$id);
        $this->db->order_by('product.price_sale','esc');
        $this->db->order_by('product.price','esc');
        $this->db->group_by('product.id');
        $q=$this->db->get('product');
        return $q->num_rows();
    }

    public function ProductBycategory_pd($id,$limit,$offset){
        $this->db->select('product.id as pro_id,
                            product.location,
                            product.alias as pro_alias,
                            product.location,
                            product.caption_1,
                            product.price as pro_price,
                            product.price_sale as pro_price_sale,
                            product.name as pro_name,
                            product.category_id,
                            product.alias as pro_alias,
                            product.view,product.bought,
                            product.home,
                            product.image as pro_img,
                            product.hot,
                            product.focus,
                            product_category.id as cate_id,
                            product_category.name as cate_name,
                            product_category.alias as cate_alias,
                            product_to_category.id_product,
                            product_to_category.id_category');

        $this->db->join('product_to_category','product_to_category.id_product=product.id');
        $this->db->join('product_category','product_to_category.id_category=product_category.id');

        $this->db->where('product_to_category.id_category',$id);
//        $this->db->where_in('product.category_id', $this->getArrayChildCate($q1->id,true));
        $this->db->order_by('product.price_sale','desc');
        $this->db->group_by('product.id');
        $this->db->limit($limit,$offset);
        $q=$this->db->get('product');
        return $q->result();
    }
    /*count  news by category*/
    public function CountProByCategory_pd($id){
        $this->db->select('product.id as pro_id,
                            product_category.id as cate_id,
                            product_to_category.id_category');

        $this->db->join('product_to_category','product_to_category.id_product=product.id');
        $this->db->join('product_category','product_to_category.id_category=product_category.id');

        $this->db->where('product_to_category.id_category',$id);
        $this->db->order_by('product.price_sale','desc');
        $this->db->group_by('product.id');
        $q=$this->db->get('product');
        return $q->num_rows();
    }


    public function count_trademark()
    {
        $this->db->select('product.id as pro_id,
                            product_category.id as cate_id');
        $this->db->join('product_category','product_category.id=product.category_id');
        $this->db->where('product_category.is_cat',0);
        $this->db->group_by('product.id');
        $q=$this->db->get('product');
        return $q->num_rows();
    }


    public function trademark($id_cate)
    {
        $this->db->select(' product_category.id as cate_id,product_category.name,product_category.is_cat,product_category.alias');
        $this->db->where('product_category.parent_id',$id_cate);
        $this->db->where('product_category.is_cat',0);
        $this->db->where('product_category.name !=','');
        $this->db->group_by('product_category.id');
        $q=$this->db->get('product_category');
        return $q->result();
    }

    public function brands($id_cate)
    {
        $this->db->select(' trademark_category.*');
        $this->db->where('trademark_category.category_id',$id_cate);
        $this->db->group_by('trademark_category.id','desc');
        $q=$this->db->get('trademark_category');
        return $q->result();
    }

    /*================================ trademark =======================================*/

    public function trademark_Bycategory($id,$limit,$offset){
        $this->db->select('product.id as pro_id,
                            product.location,
                            product.alias as pro_alias,
                            product.location,
                            product.caption_1,
                            product.price as pro_price,
                            product.price_sale as pro_price_sale,
                            product.name as pro_name,
                            product.category_id,
                            product.alias as pro_alias,
                            product.view,product.bought,
                            product.home,
                            product.image as pro_img,
                            product.hot,
                            product.focus,
                            product_category.id as cate_id,
                            product_category.name as cate_name,
                            product_category.alias as cate_alias');

        $this->db->join('trademark_category','trademark_category.name=product.trademark_name');
        $this->db->join('product_category','product_category.id=product.category_id');
        $this->db->where('product.trademark_id',$id);
        $this->db->order_by('product.id','desc');
        $this->db->group_by('product.id');
        $this->db->limit($limit,$offset);
        $q=$this->db->get('product');
        return $q->result();
    }

    public function Counttrademark_ByCategory($id){
        $this->db->select('product.id as pro_id, trademark_category.id as cate_id');

        $this->db->join('trademark_category','trademark_category.name=product.trademark_name');
        $this->db->where('trademark_category.id',$id);
        $this->db->order_by('product.id','desc');
        $this->db->group_by('product.id');
        $q=$this->db->get('product');
        return $q->num_rows();
    }

    public function trademark_Bycategory_p($id,$limit,$offset){
        $this->db->select('product.id as pro_id,
                            product.location,
                            product.alias as pro_alias,
                            product.location,
                            product.caption_1,
                            product.price as pro_price,
                            product.price_sale as pro_price_sale,
                            product.name as pro_name,
                            product.category_id,
                            product.alias as pro_alias,
                            product.view,product.bought,
                            product.home,
                            product.image as pro_img,
                            product.hot,
                            product.focus,
                    product_category.id as cate_id,
                            product_category.name as cate_name,
                            product_category.alias as cate_alias');

        $this->db->join('trademark_category','trademark_category.name=product.trademark_name');
        $this->db->join('product_category','product_category.id=product.category_id');
        $this->db->where('product.trademark_id',$id);
        $this->db->order_by('product.price','esc');
        $this->db->group_by('product.id');
        $this->db->limit($limit,$offset);
        $q=$this->db->get('product');
        return $q->result();
    }

    public function Counttrademark_ByCategory_p($id){
        $this->db->select('product.id as pro_id,
                            trademark_category.id as cate_id');

        $this->db->join('trademark_category','trademark_category.name=product.trademark_name');
        $this->db->where('product.trademark_id',$id);
        $this->db->order_by('product.price','esc');
        $this->db->group_by('product.id');
        $q=$this->db->get('product');
        return $q->num_rows();
    }

    public function trademark_Bycategory_pd($id,$limit,$offset){
        $this->db->select('product.id as pro_id,
                            product.location,
                            product.alias as pro_alias,
                            product.location,
                            product.caption_1,
                            product.price as pro_price,
                            product.price_sale as pro_price_sale,
                            product.name as pro_name,
                            product.category_id,
                            product.alias as pro_alias,
                            product.view,product.bought,
                            product.home,
                            product.image as pro_img,
                            product.hot,
                            product.focus,
                            product_category.id as cate_id,
                            product_category.name as cate_name,
                            product_category.alias as cate_alias');

        $this->db->join('trademark_category','trademark_category.name=product.trademark_name');
        $this->db->join('product_category','product_category.id=product.category_id');
        $this->db->where('product.trademark_id',$id);
        $this->db->order_by('product.price','desc');
        $this->db->group_by('product.id');
        $this->db->limit($limit,$offset);
        $q=$this->db->get('product');
        return $q->result();
    }

    public function Counttrademark_ByCategory_pd($id){
        $this->db->select('product.id as pro_id,
                            trademark_category.id as cate_id');

        $this->db->join('trademark_category','trademark_category.name=product.trademark_name');
        $this->db->where('product.trademark_id',$id);
        $this->db->order_by('product.price','desc');
        $this->db->group_by('product.id');
        $q=$this->db->get('product');
        return $q->num_rows();
    }


}