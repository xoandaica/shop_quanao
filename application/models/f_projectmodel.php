<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class F_projectmodel extends MY_Model
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
        $q=$this->db->get('project_category');
        return $q->result();
    }
    public function getCateChild(){
        $this->db->select('*');
        $this->db->where('parent_id !=',0);
        $this->db->order_by('sort','esc');
        $q=$this->db->get('project_category');
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

/*    public function getProjectSimilar($project_id, $limit, $offset)
    {
        $arr_in=$this->getarr_idcategory($project_id);
        $query = $this->db->select('project.id,project_category.id,project_alias as pro_alias,project.image as pro_image,project.caption_1,
                                project.category_id, project.price,project.price_sale,project_category.name as cate_name,project.name as project_name,project.description,project.price as pro_price,
                                project_category.alias,project_category.alias as cate_alias,project_category.parent_id,
                                project_to_category.id as project_to_category_id ')
            ->from('project')
            ->join('project_to_category', 'project_to_category.id_project = project.id')
            ->join('project_category', 'project_to_category.id_category = project_category.id')
            ->where_in('project_category.id',$arr_in)
            ->where('project.id !=', $project_id)
            ->group_by('project.id')
            ->get('', $limit, $offset);
        return $query->result();
    } */


    public function getarr_idcategory($project_id){
        $q2 = $this->db->query("SELECT category_id FROM project where id = '" . $project_id . "'")->first_row();
        $q1 = $this->db->query("SELECT id_category FROM project_to_category where id_project = '" . $project_id . "' and id_category <>$q2->category_id")->result();
        $arr=array();
        foreach($q1 as $v){
            $arr[]=$v->id_category;
        }
        return $arr;
    }

    public function getarr_idtags($project_id){
        $q2 = $this->db->query("SELECT id FROM project where id = '" . $project_id . "'")->first_row();
        $q1 = $this->db->query("SELECT tagid FROM project_to_tags where projectid = '" . $project_id . "' and tagid <>$q2->id")->result();
        $arr=array();
        foreach($q1 as $v){
            $arr[]=$v->tagid;
        }
        return $arr;
    }
    //projects tags
    public function getProduct_Tags($tagid, $limit, $offset) {
        $this->db->select(
            'project.id as pro_id,
             project.alias  as pro_alias,
             project.price,
             project.description,
             project.price_sale,
             project.name,
             project.image,
             project.category_id,
             project.view,
             project.bought,
             project.caption_1,
             project_tags.id as tag_id,
             project_to_tags.*');
        $this->db->join('project_to_tags','project_to_tags.projectid=project.id');
        $this->db->join('project_tags','project_to_tags.tagid=project_tags.id','left');
        $this->db->where_in('project_to_tags.tagid', $tagid);
        $this->db->limit($limit,$offset);
        $q = $this->db->get('project');
        return $q->result();
    }



    public function getProductSimilar2($cid,$pid,$limit,$offset)
    {
        $this->db->select(
         'project.id as pro_id,
		  project.*,
		  project_category.id as cat_id,
		  project_category.name as cat_name,
		  project_category.alias as cat_alias,
		  project_to_category.id_project,
		  project_to_category.id_category
        ');
        $this->db->join('project_to_category','project_to_category.id_project=project.id');
        $this->db->join('project_category','project_to_category.id_category=project_category.id');

        $this->db->where('project_category.id',$cid);
        $this->db->where('project.id !=',$pid);
        $this->db->limit($limit,$offset);

        $this->db->group_by('project.id');
        $this->db->order_by('project.id','desc');
        $q=$this->db->get('project'); 
        return $q->result();
    }

    public function getProbyCate($alias, $limit, $offset)
    {
        $q1 = $this->db->query("SELECT id,alias FROM project_category where alias = '" . $alias . "'");
        $query = $this->db->select('project.id,project.name as pro_name,project_category.id,project.alias as pro_alias,
        project.image as pro_image,project.price as pro_price,project_category.alias,project_category.alias as cate_alias,project_category.parent_id ')
            ->from('project')
            ->join('project_category', 'project_category.id=project.category_id', 'left')
            ->where('project_category.alias', $alias)
            ->or_where('project_category.parent_id', @$q1->first_row()->id)
            ->limit($limit, $offset)
            ->order_by('project.id', 'desc')
            ->get();
        return $query->result();
    }

    public function count_ProbyCate($alias)
    {
        $q1 = $this->db->query("SELECT id,alias FROM project_category where alias = '" . $alias . "'");
        $query = $this->db->select('project.id,project.name as pro_name,project.price as pro_price,project_category.id,project.alias as pro_alias,
        project.image as pro_image,project_category.alias,project_category.alias as cate_alias,project_category.parent_id ')
            ->from('project')
            ->join('project_category', 'project_category.id=project.category_id', 'left')
            ->where('project_category.alias', $alias)
            ->or_where('project_category.parent_id', @$q1->first_row()->id)

            ->order_by('project.id', 'desc')
            ->get();

        return $query->num_rows();
    }
    /********projects show home *************/
    public function Products_cate_home(){
        $this->db->select('project.id as pro_id,project.alias  as pro_alias,project_category.alias,
        project.price,project.price_sale,project.name,project.image,project.category_id,project_category.id,
        project_category.home, project_category.name as cate_name');
        $this->db->join('project_category','project.category_id=project_category.id');
        $this->db->where('project.home','1');
        $this->db->limit(12);
        $this->db->order_by('id','random');
        $q=$this->db->get('project');
        return $q->result();
    }

    public function getArrayChildCate($id){

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

    public function ProjecttBycategory($id,$limit,$offset){
        $this->db->select('project.*,
                            project_category.id as cate_id,
                            project_category.name as cate_name,
                            project_category.alias as cate_alias,
                            project_to_category.id_project,
                            project_to_category.id_category');

        $this->db->join('project_to_category','project_to_category.id_project=project.id');
        $this->db->join('project_category','project_to_category.id_category=project_category.id');

        $this->db->where('project_to_category.id_category',$id);
//        $this->db->where_in('project.category_id', $this->getArrayChildCate($q1->id,true));
        $this->db->order_by('project.id','desc');
        $this->db->group_by('project.id');
        $this->db->limit($limit,$offset);
        $q=$this->db->get('project');
        return $q->result();
    }
    /*count  news by category*/
    public function CountProByCategory($id){
        $this->db->select('project.*,
                            project_category.id as cate_id,
                            project_to_category.id_category');

        $this->db->join('project_to_category','project_to_category.id_project=project.id');
        $this->db->join('project_category','project_to_category.id_category=project_category.id');

        $this->db->where('project_to_category.id_category',$id);
        $this->db->order_by('project.id','desc');
        $this->db->group_by('project.id');
        $q=$this->db->get('project');
        return $q->num_rows();
    }


    public function getproject_detail($pid,$alias){
        $query = $this->db->select('project.*')
            ->from('project')
            ->join('project_category', 'project_category.id=project.category_id','left')
            ->where('project.id', $pid)
            ->where('project.project_alias', $alias)
            ->get();
        return $query->first_row();
    }

    public function tags_cate(){
        $this->db->select('project_tags.*');
        $this->db->where('tagname !=','');
        $q=$this->db->get('project_tags');
        return $q->result();
    }

    public function projects_by_tags($tagsid){
//        print_r($tagsid);die();
        $this->db->select('project.id as pro_id,
                            project.project_alias as pro_alias,
                            project.caption_1,
                            project.price as pro_price,
                            project.price_sale as pro_price_sale,
                            project.name as pro_name,
                            project.category_id,
                            project.project_alias as pro_alias,
                            project.view,project.bought,
                            project.home,
                            project.image as pro_img,
                            project.hot,
                            project.focus,
                            project_category.id as cate_id,
                            project_category.name as cate_name,
                            project_category.alias as cate_alias,
                            project_to_category.id_project,
                            project_to_category.id_category,
                            project_to_tags.tagid');

        $this->db->join('project_to_category','project_to_category.id_project=project.id');
        $this->db->join('project_category','project_to_category.id_category=project_category.id');
        $this->db->join('project_to_tags','project_to_tags.projectid=project.id');

        $this->db->where_in('project_to_tags.tagid',$tagsid);
        $this->db->order_by('project.id','desc');
        $this->db->group_by('project.id');
        $q=$this->db->get('project');
        return $q->result();
    }

    //=============================Location

    public function ProductByLocation($alias,$limit,$offset){
        $cate=$this->getFirstRowWhere('tinhthanh',array('alias'=>$alias));

        $q= $this->db->select('project.id as pro_id, project.name as pro_name,project.project_alias,
        project.price as pro_price,project.price_sale as pro_price_sale,
        project.category_id, project.image as pro_img,
        tinhthanh.region_id as cate_id, tinhthanh.region_name as cate_name, tinhthanh.alias as cate_alias')

            ->where('tinhthanh.region_id',$cate->region_id)
            ->order_by('project.id','desc')
            ->group_by('project.id')
            ->limit($limit,$offset)
            ->get('project');

        return $q->result();
    }

    /*count  news by category*/
    public function CountProByLocation($alias){

        $cate=$this->getFirstRowWhere('tinhthanh',array('alias'=>$alias));

        $q= $this->db->select('project.id as pro_id,project.price as pro_price,
        project.price_sale as pro_price_sale, project.name as pro_name,project.category_id,
        project.project_alias,project.image as pro_img,
        tinhthanh.region_id as cate_id, tinhthanh.region_name as cate_name, tinhthanh.alias as cate_alias,')

            ->where('tinhthanh.region_id',$cate->region_id)
            ->group_by('project.id')
            ->get('project');
        return $q->num_rows();
    }

    //=============================end Location

    public function getProductImages($alias)
    {
        $this->db->select('project.id, project.alias, project.image, images.id as image_id,images.id_item ,images.link ');
        $this->db->join('project', 'images.id_item=project.id', 'left');
        $this->db->where('alias', $alias);
        $q = $this->db->get('images');
        return $q->result();
    }

    public function new_Product()
    {
        $this->db->select('*');
        $this->db->limit(10, 0);
        $q = $this->db->get('project');
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

        $this->db->select('project.id as pro_id,project.alias as pro_alias,project.price as pro_price,project.caption_1,
        project.price_sale as pro_price_sale, project.name as pro_name,project.category_id,
        project.alias as pro_alias,project.view,project.bought,
        project.home,project.image as pro_img,project.hot,project.focus,project_category.id as cate_id,
        project_category.name as cate_name, project_category.alias as cate_alias,
        project_to_category.*')
        ->join('project_to_category','project_to_category.id_project=project.id')
        ->join('project_category','project_to_category.id_category=project_category.id','left');

        $this->db->limit($limit,$offset);
        if($ma_hang!='null'){
            $this->db->like('project.name',rawurldecode($ma_hang));
        }
        $this->db->order_by('project.id','desc');
        $this->db->group_by('project.id');
        $q=$this->db->get('project');
        return $q->result();
    }

    public function Count_search_rs($ma_hang){

        $this->db->select('project.id as pro_id,project.alias as pro_alias,project.price as pro_price,project.price_sale as pro_price_sale, project.name as pro_name,project.category_id, project.alias as pro_alias,
        project.home,project.image as pro_img,project.hot,project.focus,project_category.id as cate_id,
        project_category.name as cate_name, project_category.alias as cate_alias,
        project_to_category.*')
            ->join('project_to_category','project_to_category.id_project=project.id')
            ->join('project_category','project_to_category.id_category=project_category.id','left');

        if($ma_hang!='null'){
            $this->db->like('project.name',rawurldecode($ma_hang));
        }
        $this->db->order_by('project.id','desc');
        $this->db->group_by('project.id');
        $q=$this->db->get('project');
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
    public function getComments($project_id,$limit){
        $this->db->select('comments.*, users.name,users.avatar,users.fullname');
        $this->db->join('users','users.id=comments.user');
        $this->db->where('comments.item_id',$project_id);
        $this->db->order_by('comments.id','desc');
        $n=$this->db->get('comments',$limit);
        return $n->result();
    }
    public function getComments_desc($project_id){
        $this->db->select('comments.*, users.fullname, users.avatar,users.fullname');
        $this->db->join('users','users.id=comments.user');
        $this->db->where('comments.item_id',$project_id);
        $n=$this->db->get('comments');
        return $n->result();
    }
    public function getProSale()
    {
        $this->db->select('*');
        $this->db->order_by('bought','desc');
        $this->db->limit(20);
        $q = $this->db->get('project');
        return $q->result();
    }


    public function get_pro_vip(){
        $this->db->select('project.id as pro_id,
                            project.alias  as pro_alias,
                            project.price,
                            project.description,
                            project.price_sale,
                            project.name,
                            project.image,
                            project.category_id,
                            project.view,
                            project.vip,
                            project.bought,
                            project.caption_1,
                            project_category.home,
                            project_category.id as cat_id,
                            project_category.alias as cat_alias,
                            project_category.name as cate_name');
        $this->db->join('project_category','project.category_id=project_category.id');
        $this->db->where('project.vip',1);
//        $this->db->where('project.home',0);
        $this->db->order_by('project.sort');
        $q = $this->db->get('project');
        return $q->result();
    }

    public function get_pro_simlar($category_id,$limit,$offset){
        $this->db->select('project.id as pro_id,
                            project.alias  as pro_alias,
                            project.price,
                            project.description,
                            project.price_sale,
                            project.name,
                            project.image,
                            project.category_id,
                            project.view,
                            project.bought,
                            project.caption_1,
                            project_category.home,
                            project_category.id as cat_id,
                            project_category.alias as cat_alias,
                            project_category.name as cate_name');
        $this->db->join('project_category','project.category_id=project_category.id');
        $this->db->where('project.home',1);
        $this->db->where('project.category_id',$category_id);
        $this->db->limit($limit,$offset);
        $this->db->order_by('project.sort');
        $q = $this->db->get('project');
        return $q->result();
    }

    public function getData_pro_hot()
    {
        $this->db->select('project.id as pro_id,
                            project.alias  as pro_alias,
                            project.price,
                            project.description,
                            project.price_sale,
                            project.name,
                            project.image,
                            project.category_id,
                            project.view,
                            project.bought,
                            project.caption_1,
                            project_category.home,
                            project_category.id as cat_id,
                            project_category.alias as cat_alias,
                            project_category.name as cate_name');
        $this->db->join('project_category','project.category_id=project_category.id');
        $this->db->where('project.hot',1);
        $this->db->limit(6,0);
        $this->db->order_by('project.sort');
        $q = $this->db->get('project');
        return $q->result();
    }


    public function get_projects_priview()
    {
        $this->db->select('project.id as pro_id,
                            project.alias  as pro_alias,
                            project.price,
                            project.description,
                            project.price_sale,
                            project.name,
                            project.image,
                            project.category_id,
                            project.view,
                            project.bought,
                            project.caption_1,
                            project_category.home,
                            project_category.id as cat_id,
                            project_category.alias as cat_alias,
                            project_category.name as cate_name');
        $this->db->join('project_category','project.category_id=project_category.id');
        $this->db->order_by('project.sort');
        $this->db->group_by('project.id');
        $q = $this->db->get('project');
        return $q->result();
    }

    public function getsearch_result($data,$limit = 0, $offset = 0)
    {
        if(!empty($data))
        {
            if($data['key']==null&&$data['id_cate_search']==null){
                return 0;
            }
            $this->db->select('project.id as pro_id,
                            project.location,
                            project.alias as pro_alias,
                            project.location,
                            project.caption_1,
                            project.price as pro_price,
                            project.price_sale as pro_price_sale,
                            project.name as pro_name,
                            project.category_id,
                            project.alias as pro_alias,
                            project.view,project.bought,
                            project.home,
                            project.image as pro_img,
                            project.hot,
                            project.focus,
                            project_category.id as cate_id,
                            project_category.name as cate_name,
                            project_category.alias as cate_alias,
                            project_to_category.id_project,
                            project_to_category.id_category');
            $this->db->from('project');
            $this->db->join('project_to_category','project_to_category.id_project=project.id');
            $this->db->join('project_category','project_to_category.id_category=project_category.id');
            $this->db->group_by('project.id');
            if($data['key'] !=''){
                $this->db->like('project.name',$data['key']);
            }
            if($data['id_cate_search'] !=''){
                $this->db->where('project_category.alias',$data['id_cate_search']);
            }

            if($limit||$offset){
                $this->db->limit($limit, $offset);
            }
            $this->db->order_by('project.id', 'desc');
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
            $this->db->select('project.id as pro_id,
                            project.location,
                            project.alias as pro_alias,
                            project.location,
                            project.caption_1,
                            project.price as pro_price,
                            project.price_sale as pro_price_sale,
                            project.name as pro_name,
                            project.category_id,
                            project.alias as pro_alias,
                            project.view,project.bought,
                            project.home,
                            project.image as pro_img,
                            project.hot,
                            project.focus,
                            project_category.id as cate_id,
                            project_category.name as cate_name,
                            project_category.alias as cate_alias,
                            project_to_category.id_project,
                            project_to_category.id_category');
            $this->db->from('project');
            $this->db->join('project_to_category','project_to_category.id_project=project.id');
            $this->db->join('project_category','project_to_category.id_category=project_category.id');
            $this->db->group_by('project.id');
            if($data['key'] !=''){
                $this->db->like('project.name',$data['key']);
            }
            if($data['id_cate_search'] !=''){
                $this->db->where('project_category.alias',$data['id_cate_search']);
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
            $this->db->select('project.id as pro_id,
                            project.location,
                            project.alias as pro_alias,
                            project.location,
                            project.caption_1,
                            project.price as pro_price,
                            project.price_sale as pro_price_sale,
                            project.name as pro_name,
                            project.category_id,
                            project.alias as pro_alias,
                            project.view,project.bought,
                            project.home,
                            project.image as pro_img,
                            project.hot,
                            project.focus,
                            project.trademark_id,
                            project_category.id as cate_id,
                            project_category.name as cate_name,
                            project_category.alias as cate_alias,
                            project_to_category.id_project,
                            project_to_category.id_category');
            $this->db->from('project');
            $this->db->join('project_to_category','project_to_category.id_project=project.id');
            $this->db->join('project_category','project_to_category.id_category=project_category.id');
            $this->db->group_by('project.id');
            if($data['key'] !=''){
                $this->db->where('project.trademark_id',$data['key']);
            }
            if($data['price_form'] !=''){
                $this->db->where('project.price_sale >=',$data['price_form']);
            }

            if($data['price_to'] !=''){
                $this->db->where('project.price_sale <=',$data['price_to']);
            }

            if($limit||$offset){
                $this->db->limit($limit, $offset);
            }
            $this->db->order_by('project.id', 'desc');
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
            $this->db->select('project.id as pro_id,
                            project.location,
                            project.alias as pro_alias,
                            project.location,
                            project.caption_1,
                            project.price as pro_price,
                            project.price_sale as pro_price_sale,
                            project.name as pro_name,
                            project.category_id,
                            project.alias as pro_alias,
                            project.view,project.bought,
                            project.home,
                            project.image as pro_img,
                            project.hot,
                            project.focus,
                            project.trademark_id,
                            project_category.id as cate_id,
                            project_category.name as cate_name,
                            project_category.alias as cate_alias,
                            project_to_category.id_project,
                            project_to_category.id_category');
            $this->db->from('project');
            $this->db->join('project_to_category','project_to_category.id_project=project.id');
            $this->db->join('project_category','project_to_category.id_category=project_category.id');
            $this->db->group_by('project.id');
            if($data['key'] !=''){
                $this->db->where('project.trademark_id',$data['key']);
            }

            if($data['price_form'] !=''){
                $this->db->where('project.price_sale >=',$data['price_form']);
            }

            if($data['price_to'] !=''){
                $this->db->where('project.price_sale <=',$data['price_to']);
            }

            $q = $this->db->get();
            return $q->num_rows();
        }
        else{
            return 0;
        }
    }


    /*+++++++++++++++++++++++++++++++++++++ ajax search +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    public function CountProByCategory2($timkiem_nangcao){
        $q=$this->db->query("SELECT
         `project`.`id` as pro_id,
         `project_category`.`id` as cate_id,
         `project_to_category`.`id_category`
         FROM (`project`)
         JOIN `project_to_category` ON `project_to_category`.`id_project`=`project`.`id`
         JOIN `project_category` ON `project_to_category`.`id_category`=`project_category`.`id`
         WHERE $timkiem_nangcao GROUP BY `project`.`id`
         ");

        //echo $this->db->last_query();
        return $q->num_rows();
    }
    public function ProductBycategory2($timkiem_nangcao,$limit,$offset){
//        echo $timkiem_nangcao; die();
        $this->db->select('project.id as project_id,
                            project.*,
                            project_category.id as cat_id,
                            project_category.name as cat_name,
                            project_category.alias as cat_alias,
                            project_to_category.id_project,
                            project_to_category.id_category');

        $this->db->join('project_to_category','project_to_category.id_project=project.id');
        $this->db->join('project_category','project_to_category.id_category=project_category.id');

        $this->db->where($timkiem_nangcao);

        $this->db->limit($offset,$limit);


        $this->db->group_by('project.id');
        $this->db->order_by('project.id','desc');
        $q=$this->db->get('project');

//        echo $this->db->last_query(); die();
        return $q->result();
    }

    function pagination_ajax($total, $number_per_page, $current_page = 1, $class='paginate_button', $classCurrent = 'paginate_active'){
        $pagination_system = '';
        $pagination_stages = 2;
        //echo $current_page;
        $start_page = ($current_page - 1) * $number_per_page;

        //This initializes the page setup
        $previous_page = $current_page - 1;
        $next_page = $current_page + 1;
        $last_page = ceil($total/$number_per_page);
        $last_paged = $last_page - 1;
        // Start
        if($last_page > 1){
            $pagination_system .='<div class="dataTable_length">';
            $pagination_system .= '<span> <input type="hidden" class="paginate_length"  id="paginate_length" value="21"> </span>';

            $pagination_system .= '<div class="pagination">';
            $pagination_system.= '<ul>';
            // Trang trước
            if($current_page > 1){
                $pagination_system.= "<li><a class=\"first paginate_button\"  page='".$previous_page."' onclick=\"tieptheo(".$previous_page.")\">Trước</a></li>"; }
            else{
                $pagination_system.= "<li><a class=\"first paginate_button disabled paginate_button_disabled\" >Trước</a></li>";
            }
            // Nếu không đủ trang tới điểm ngắt
            if ($last_page < 7 + ($pagination_stages * 2)){
                $pagination_system .='<span>';
                for ($page_counter = 1; $page_counter <= $last_page; $page_counter++){
                    if ($page_counter == $current_page) {
                        $pagination_system.= "<li><a class='paginate_active'>$page_counter</a></li>";
                    }else {
                        $pagination_system.= "<li><a class='paginate_button' page=".$page_counter." onclick=\"tieptheo(".$page_counter.")\">$page_counter</a></li>";
                    }
                }
                $pagination_system .='</span>';
            }elseif($last_page > 5 + ($pagination_stages * 2)){
                if($current_page < 1 + ($pagination_stages * 2)){
                    $pagination_system .='<span>';
                    for ($page_counter = 1; $page_counter < 4 + ($pagination_stages * 2); $page_counter++){
                        if ($page_counter == $current_page) {
                            $pagination_system.= "<li><a class=\"paginate_active\" >$page_counter</a></li>";
                        }else {
                            $pagination_system.= "<li><a class=\"paginate_button\"  page=".$page_counter." onclick=\"tieptheo(".$page_counter.")\">$page_counter</a></li>";
                        }
                    }
                    $pagination_system.= "<li><a class=\"paginate_button disabled\" >...</a></li>";
                    $pagination_system.= "<li><a class=\"paginate_button\" page=".$last_paged." onclick=\"tieptheo(".$last_paged.")\">$last_paged</a></li>";
                    $pagination_system.= "<li><a class=\"paginate_button\"  page=".$last_page." onclick=\"tieptheo(".$last_paged.")\">$last_page</a></li>";
                    $pagination_system .='</span>';
                }elseif($last_page-($pagination_stages*2) > $current_page && $current_page > ($pagination_stages*2)){
                    $pagination_system .='<span>';
                    $pagination_system .= "<li><a class=\"paginate_button\"  page=\"1\" onclick=\"tieptheo(1)\">1</a></li>";
                    $pagination_system .= "<li><a class=\"paginate_button\"  page=\"2\" onclick=\"tieptheo(2)\">2</a></li>";
                    $pagination_system .= "<li><a class=\"paginate_button disabled\" >...</a></li>";
                    for ($page_counter =($current_page-$pagination_stages);$page_counter<=($current_page+$pagination_stages); $page_counter++){
                        if ($page_counter == $current_page) {
                            $pagination_system.= "<li><a class=\"paginate_active\" >$page_counter</a></li>";
                        }else {
                            $pagination_system.= "<li><a class=\"paginate_button\"  page=".$page_counter." onclick=\"tieptheo(".$page_counter.")\">$page_counter</a></li>";
                        }
                    }
                    $pagination_system.= "<li><a class=\"paginate_button disabled\" >...</a></li>";
                    $pagination_system.= "<li><a class=\"paginate_button\"  page=".$last_paged." onclick=\"tieptheo(".$last_paged.")\">$last_paged</a></li>";
                    $pagination_system.= "<li><a class=\"paginate_button\" page=".$last_page." onclick=\"tieptheo(".$last_paged.")\">$last_page</a></li>";
                    $pagination_system .='</span>';
                }else{
                    $pagination_system .='<span>';
                    $pagination_system.= "<li><a class=\"paginate_button\"  page=\"1\" onclick=\"tieptheo(1)\">1</a></li>";
                    $pagination_system.= "<li><a class=\"paginate_button\"  page=\"2\" onclick=\"tieptheo(2)\">2</a></li>";
                    $pagination_system.= "<li><a class=\"paginate_button disabled\">...</a></li>";
                    for($page_counter = $last_page - (2+($pagination_stages*2)); $page_counter <= $last_page; $page_counter++){
                        if ($page_counter == $current_page) {
                            $pagination_system.= "<li><a class=\"paginate_active\" >$page_counter</a></li>";
                        }else {
                            $pagination_system.= "<li><a class=\"paginate_button\"  page='".$page_counter."'>$page_counter</a></li>";
                        }
                    }
                    $pagination_system .='</span>';
                }
            }
            //Trang tiếp
            if ($current_page < $page_counter - 1) {
                $pagination_system.= "<li><a class=\"next paginate_button\"  page=".$next_page." onclick=\"tieptheo(".$next_page.")\">Tiếp theo</a></li>";
            }else{
                $pagination_system.= "<li><a class=\"next paginate_button paginate_button_disabled\" >Tiếp theo</a></li>";
            }
            $pagination_system .='<input type="hidden" value="'.$current_page.'" name="paginate_current_page" class="paginate_current_page">';
            $pagination_system .= '</ul></div>';
        }
        return $pagination_system;
    }

    function pagination_ajax_sub($total, $number_per_page, $current_page = 1, $class='paginate_button', $classCurrent = 'paginate_active'){
        $pagination_system = '';
        $pagination_stages = 2;
        //echo $current_page;
        $start_page = ($current_page - 1) * $number_per_page;

        //This initializes the page setup
        $previous_page = $current_page - 1;
        $next_page = $current_page + 1;
        $last_page = ceil($total/$number_per_page);
        $last_paged = $last_page - 1;
        // Start
        if($last_page > 1){
            $pagination_system .='<div class="dataTable_length">';
            $pagination_system .= '<span> <input type="hidden" class="paginate_length"  id="paginate_length" value="21"> </span>';

            $pagination_system .= '<div class="pagination">';
            $pagination_system.= '<ul>';
            // Trang trước
            if($current_page > 1){
                $pagination_system.= "<li><a class=\"first paginate_button\"  page='".$previous_page."' onclick=\"tieptheo_catsub(".$previous_page.")\">Trước</a></li>"; }
            else{
                $pagination_system.= "<li><a class=\"first paginate_button disabled paginate_button_disabled\" >Trước</a></li>";
            }
            // Nếu không đủ trang tới điểm ngắt
            if ($last_page < 7 + ($pagination_stages * 2)){
                $pagination_system .='<span>';
                for ($page_counter = 1; $page_counter <= $last_page; $page_counter++){
                    if ($page_counter == $current_page) {
                        $pagination_system.= "<li><a class='paginate_active'>$page_counter</a></li>";
                    }else {
                        $pagination_system.= "<li><a class='paginate_button' page=".$page_counter." onclick=\"tieptheo_catsub(".$page_counter.")\">$page_counter</a></li>";
                    }
                }
                $pagination_system .='</span>';
            }elseif($last_page > 5 + ($pagination_stages * 2)){
                if($current_page < 1 + ($pagination_stages * 2)){
                    $pagination_system .='<span>';
                    for ($page_counter = 1; $page_counter < 4 + ($pagination_stages * 2); $page_counter++){
                        if ($page_counter == $current_page) {
                            $pagination_system.= "<li><a class=\"paginate_active\" >$page_counter</a></li>";
                        }else {
                            $pagination_system.= "<li><a class=\"paginate_button\"  page=".$page_counter." onclick=\"tieptheo_catsub(".$page_counter.")\">$page_counter</a></li>";
                        }
                    }
                    $pagination_system.= "<li><a class=\"paginate_button disabled\" >...</a></li>";
                    $pagination_system.= "<li><a class=\"paginate_button\" page=".$last_paged." onclick=\"tieptheo_catsub(".$last_paged.")\">$last_paged</a></li>";
                    $pagination_system.= "<li><a class=\"paginate_button\"  page=".$last_page." onclick=\"tieptheo_catsub(".$last_paged.")\">$last_page</a></li>";
                    $pagination_system .='</span>';
                }elseif($last_page-($pagination_stages*2) > $current_page && $current_page > ($pagination_stages*2)){
                    $pagination_system .='<span>';
                    $pagination_system .= "<li><a class=\"paginate_button\"  page=\"1\" onclick=\"tieptheo_catsub(1)\">1</a></li>";
                    $pagination_system .= "<li><a class=\"paginate_button\"  page=\"2\" onclick=\"tieptheo_catsub(2)\">2</a></li>";
                    $pagination_system .= "<li><a class=\"paginate_button disabled\" >...</a></li>";
                    for ($page_counter =($current_page-$pagination_stages);$page_counter<=($current_page+$pagination_stages); $page_counter++){
                        if ($page_counter == $current_page) {
                            $pagination_system.= "<li><a class=\"paginate_active\" >$page_counter</a></li>";
                        }else {
                            $pagination_system.= "<li><a class=\"paginate_button\"  page=".$page_counter." onclick=\"tieptheo_catsub(".$page_counter.")\">$page_counter</a></li>";
                        }
                    }
                    $pagination_system.= "<li><a class=\"paginate_button disabled\" >...</a></li>";
                    $pagination_system.= "<li><a class=\"paginate_button\"  page=".$last_paged." onclick=\"tieptheo_catsub(".$last_paged.")\">$last_paged</a></li>";
                    $pagination_system.= "<li><a class=\"paginate_button\" page=".$last_page." onclick=\"tieptheo_catsub(".$last_paged.")\">$last_page</a></li>";
                    $pagination_system .='</span>';
                }else{
                    $pagination_system .='<span>';
                    $pagination_system.= "<li><a class=\"paginate_button\"  page=\"1\" onclick=\"tieptheo_catsub(1)\">1</a></li>";
                    $pagination_system.= "<li><a class=\"paginate_button\"  page=\"2\" onclick=\"tieptheo_catsub(2)\">2</a></li>";
                    $pagination_system.= "<li><a class=\"paginate_button disabled\">...</a></li>";
                    for($page_counter = $last_page - (2+($pagination_stages*2)); $page_counter <= $last_page; $page_counter++){
                        if ($page_counter == $current_page) {
                            $pagination_system.= "<li><a class=\"paginate_active\" >$page_counter</a></li>";
                        }else {
                            $pagination_system.= "<li><a class=\"paginate_button\"  page='".$page_counter."'>$page_counter</a></li>";
                        }
                    }
                    $pagination_system .='</span>';
                }
            }
            //Trang tiếp
            if ($current_page < $page_counter - 1) {
                $pagination_system.= "<li><a class=\"next paginate_button\"  page=".$next_page." onclick=\"tieptheo_catsub(".$next_page.")\">Tiếp theo</a></li>";
            }else{
                $pagination_system.= "<li><a class=\"next paginate_button paginate_button_disabled\" >Tiếp theo</a></li>";
            }
            $pagination_system .='<input type="hidden" value="'.$current_page.'" name="paginate_current_page" class="paginate_current_page">';
            $pagination_system .= '</ul></div>';
        }
        return $pagination_system;
    }


}