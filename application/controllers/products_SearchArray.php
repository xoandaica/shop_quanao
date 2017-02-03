<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Products extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('f_productmodel');
        $this->load->library('pagination');
    }
    public function index($alias,$id){
        $this->pro_bycategory($alias,$id);
    }



    public function pro_by_like(){

        $data = array();


        $seo=array('title'=>'Sản phẩm yêu thích',
            'description'=>'Sản phẩm yêu thích',
            'keyword'=>'Sản phẩm yêu thích',
            'type'=>'products');


        $this->LoadHeader();
        $this->Loadsubheader();
        $this->load->view('pro_by_like',$data);
        $this->LoadFooter();
    }
    public function pro_by_priview(){

        $data = array();

        $seo=array('title'=>'Sản phẩm đã xem',
            'description'=>'Sản phẩm  đã xem',
            'keyword'=>'Sản phẩm  đã xem',
            'type'=>'products');

        $this->LoadHeader();
        $this->Loadsubheader();
        $this->load->view('pro_by_priview',$data);
        $this->LoadFooter();
    }
    public function pro_bycategory($alias,$id){

            $config['base_url'] = base_url($alias.'-pc' . $id);
            $config['total_rows'] = $this->f_productmodel->CountProByCategory($id); // xác ??nh t?ng s? record
            $config['per_page'] = 20; // xác ??nh s? record ? m?i trang
            $config['uri_segment'] = 2; // xác ??nh segment ch?a page number
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] ="</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";
            $this->pagination->initialize($config);
            $data = array();

            $data['list'] = $this->f_productmodel->ProductBycategory($id,$config['per_page'], $this->uri->segment(2));

//        print_r( $data['list']); die('??');
        $data['cate_curent']=$this->f_productmodel->get_data('product_category',array('id'=>$id),array(),true);
        $data['cate_sub']=$this->f_productmodel->Get_where('product_category',array('parent_id'=>$data['cate_curent']->id));
        $data['cate_all']=$this->f_productmodel->getList('product_category');


        $data['count_trademark']  = $this->f_productmodel->count_trademark();
        $data['trademark']  = $this->f_productmodel->trademark($data['cate_curent']->id);
        $data['brands']    = $this->f_productmodel->brands($data['cate_curent']->id);

//        print_r($data['trademark']);

        $seo=array('title'=>@$data['cate_curent']->name==''?@$data['cate_curent']->name:@$data['cate_curent']->name,
            'description'=>@$data['cate_curent']->description_seo,
            'keyword'=>@$data['cate_curent']->keyword_seo,
            'type'=>'products');


        $this->LoadHeader($seo);
        $this->Loadsubheader_cate();

        if ($this->agent->is_mobile('iphone'))
        {
            $this->load->view('pro_bycategory_mobile',$data);
        }
        else if ($this->agent->is_mobile())
        {
            $this->load->view('pro_bycategory',$data);
        }
        else
        {

            $this->load->view('pro_bycategory',$data);
        }
        $this->LoadFooter();
    }

    public function search(){

        if($this->input->get()){

            $where = array(
                'key' => $this->input->get('key'),
                'id_cate_search' => $this->input->get('id_cate_search'),
            );


            $config['page_query_string']    = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['base_url'] = base_url('tim-kiem?key=' . $this->input->get('key'). $this->input->get('id_cate_search'));
            $config['total_rows'] = $this->f_productmodel->countsearch_result($where); // xác ??nh t?ng s? record
            $config['per_page'] = 20; // xác ??nh s? record ? m?i trang
            $config['uri_segment'] = 3; // xác ??nh segment ch?a page number
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] ="</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";
            $this->pagination->initialize($config);
            $data = array();

            $data['list'] = $this->f_productmodel->getsearch_result($where,$config['per_page'], $this->input->get('per_page'));
            $data['partner']=$this->f_productmodel->getSlider_partners();
            //        print_r( $data['list']); die('??');
            $data['cate_curent']=$this->f_productmodel->get_data('product_category',array(),array(),true);

            $data['cate_sub']=$this->f_productmodel->Get_where('product_category',array('parent_id'=>$data['cate_curent']->id));
            $data['cate_all']=$this->f_productmodel->getList('product_category');

            $seo=array(
                'title'=>'Tìm kiếm',
                'description'=>'Tìm kiếm',
                'keyword'=>'Tìm kiếm',
                'type'=>'products');


            $this->LoadHeader($seo);
            $this->Loadsubheader();
            $this->load->view('pro_search',$data);
            $this->LoadFooter();
        }
    }

    public function searchcategory(){
        $key =  $this->input->get('string_key');
        if($key){
            $string_where =explode("_",$key);
            $string ="";
            foreach($string_where as $value){
                $string.="product.trademark_id = ".$value." or ";
            }
            $string= substr($string,0,-3);
        }
        else{
            $string="";
        }

        //echo $string;
        //exit;

        if($this->input->get()){

            $where = array(
                //'key' => $this->input->get('key'),
                'key' => $string,
                'price_form' => $this->input->get('price_form'),
                'price_to' => $this->input->get('price_to'),
            );

            $config['page_query_string']    = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['base_url'] = base_url('searchcategory?string_key=' . $key
                .'&price_form='.$this->input->get('price_form')
                .'&price_to='.$this->input->get('price_to')
           );
            $config['total_rows'] = $this->f_productmodel->countsearch_result2($where); // xác ??nh t?ng s? record
            $config['per_page'] = 20; // xác ??nh s? record ? m?i trang
            $config['uri_segment'] = 4; // xác ??nh segment ch?a page number
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] ="</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";
            $this->pagination->initialize($config);
            $data = array();

            print_r( $config['total_rows']);
            $data['list'] = $this->f_productmodel->getsearch_result2($where,$config['per_page'], $this->input->get('per_page'));
            $data['partner']=$this->f_productmodel->getSlider_partners();
            //        print_r( $data['list']); die('??');
            $data['cate_curent']=$this->f_productmodel->get_data('product_category',array(),array(),true);

            $data['cate_sub']=$this->f_productmodel->Get_where('product_category',array('parent_id'=>$data['cate_curent']->id));
            $data['cate_all']=$this->f_productmodel->getList('product_category');

            $seo=array(
                'title'=>'Tìm kiếm',
                'description'=>'Tìm kiếm',
                'keyword'=>'Tìm kiếm',
                'type'=>'products');


            $this->LoadHeader($seo);
            $this->Loadsubheader();
            $this->load->view('pro_search',$data);
            $this->LoadFooter();
        }
    }

    //product detail
    public function productdetail($calias,$palias,$cid,$pid){

        $data['pro_first']=$this->f_productmodel->get_data('product',array('id'=>$pid,'alias'=>$palias),array(),true);
        $data['product_lq']=$this->f_productmodel->get_data('product',array(
                'category_id'=>$data['pro_first']->category_id),array('id'=>'RANDOM' )
        );
//        echo'<pre>';
//        print_r($data['pro_first']);
        $data['pro_vip']=$this->f_productmodel->get_pro_vip();
        $data['list_pro_left']=$this->f_productmodel->get_data('product',array('category_id'=>$data['pro_first']->category_id),array(
            'id'=>'RANDOM'
        ));
        $data['pro_hot']=$this->f_productmodel->getData_pro_hot();
        $data['cate']=$this->f_productmodel->get_data('product_category',array('id'=>$cid),array(),true);
        @$data['cate_sub']=$this->f_productmodel->Get_where('product_category',array('parent_id'=>$data['cate']->id));
        $data['cate_all']=$this->f_productmodel->get_data('product_category',array());

        @$data['banner_qc']=$this->f_productmodel->GetData('images',array('type'=>'ads_right'),array('id','desc'));
        $data['comments']=$this->f_productmodel->getComments($data['pro_first']->id,10);
        $data['products_cate_home']=$this->f_productmodel->Products_cate_home('home');
        @$data['product_img']=$this->f_productmodel->GetData('images',array('id_item'=>$pid),array('id','desc'));

//        base_url($cate->alias.'/'.$n->alias.'-c'.$cate->id.'p'.$n->id)
        $data['link_share']=base_url($calias.'/'.$palias.'-c'.$cid.'p'.$pid.'.html');
//        echo '<pre>';
//        print_r($data['link_share']);
        $tags=$this->f_productmodel->get_data('product_to_tags',array('productid'=>$data['pro_first']->id),array());
        $data['tags_cate'] =$this->f_productmodel->tags_cate();

        $tagsid=array(0);
        if($tags != null){
            foreach($tags as $v){
                $tagsid[]=$v->tagid;
            }
        }
        $data['productsbytags']=$this->f_productmodel->products_by_tags($tagsid);
//        echo'<pre>';
//        print_r($data['tags_cate']);die();
        $review = array(
            'id'=>$data['pro_first']->id,
            'url'=>$data['pro_first']->alias,
            'name'=>$data['pro_first']->name,
            'image'=>$data['pro_first']->image,
            'price'=>$data['pro_first']->price,
            'cate'=>$data['cate']->alias,
            'cate_id'=>$data['cate']->id,
        );
        if (!array_key_exists($data['pro_first']->id,$review)) {
            $_SESSION['review'][$data['pro_first']->id]=$review;
        }
        $data['review_pro']=$_SESSION['review'];

        $seo=array('title'=>@$data['pro_first']->title_seo==''||@$data['pro_first']->title_seo=='0'?$data['pro_first']->name:$data['pro_first']->title_seo,
            'description'=>@$data['pro_first']->description_seo,
            'keyword'=>@$data['pro_first']->keyword_seo,
            'image'=>(@$data['pro_first']->image),
            'type'=>'products');
        $data['trademark_category_all']=$this->f_productmodel->getList('trademark_category');
        $this->LoadHeader($seo);
        $this->Loadsubheader();

        if ($this->agent->is_mobile('iphone'))
        {
            $this->load->view('productdetail2_mobile',$data);
        }
        else if ($this->agent->is_mobile())
        {
            $this->load->view('productdetail2',$data);
        }
        else
        {

            $this->load->view('productdetail',$data);
        }

        $this->LoadFooter();
    }

    public function like(){
        if(isset($_POST['id'])){
            $product=$this->f_productmodel->get_data('product',array('id'=>$_POST['id']),array(),true);
            $data_cate=$this->f_productmodel->get_data('product_category',array('id'=>$product->category_id),array(),true);
            $liked=$this->session->userdata('liked');

            if(!array_key_exists ($product->id,$liked)){
                $liked[$_POST['id']]=array(
                    'pro_id'=>$product->id,
                    'name'=>$product->name,
                    'image'=>$product->image,
                    'alias'=>$product->alias,
                    'price'=>$product->price,
                    'price_sale'=>$product->price_sale,
                    'cate_id'=>$product->category_id,
                    'cate_alias'=>$data_cate->alias,
                );
                $this->session->set_userdata('liked',$liked);
                echo 1;
            }
//            $data['like_view']=$this->session->set_userdata('liked');

        }
    }

    public function un_like(){
        if (isset($_POST['id'])) {
            $liked = $this->session->userdata('liked');
            unset($liked[$_POST['id']]);
            $this->session->set_userdata('liked', $liked);
            echo 1;
        }
    }

    public function like2(){
        if(isset($_POST['id'])){

            $id=$this->input->post('id');
            $user=$this->f_productmodel->getFirstRowWhere('users',array('id'=>$this->session->userdata('userid')));

            if($user->liked !=null){
                $liked=(array)json_decode($user->liked);
            }else  $liked=array();
            $rs['status']=false;
            if(!in_array($id,$liked)){
                $liked[]=$id;
                $rs['status']=true;
            }

            $this->f_productmodel->Update_Where('users',array('id'=>$this->session->userdata('userid')),
                array('liked'=>json_encode($liked)));
            echo json_encode($rs);
        }
    }
    public function un_like2(){
        if(isset($_POST['id'])){

            $id=$this->input->post('id');
            $user=$this->f_productmodel->getFirstRowWhere('users',array('id'=>$this->session->userdata('userid')));

            if($user->liked !=null){
                $liked=(array)json_decode($user->liked);
            }else $liked=array();
            $rs['status']=false;
            $new=array();
            foreach($liked as  $val){
                if($id!=$val){
                    $new[]=$val;
                    $rs['status']=true;
                }
            }


            $this->f_productmodel->Update_Where('users',array('id'=>$this->session->userdata('userid')),
                array('liked'=>json_encode($new)));
            echo json_encode($rs);
        }
    }
    public function liked_product(){
        $data=array();
        if($this->session->userdata('userid')){
            $u=$this->f_productmodel->getFirstRowWhere('users',array('id'=>$this->session->userdata('userid')));

            $liked_id=(array)json_decode($u->liked);

            if(!empty($liked_id))
                $data['liked']=$this->f_productmodel->getLikedPro($liked_id);
        }


        $this->load->view('liked_product', $data);
    }
    public function send_comment(){
        if($this->input->post('id_pro')){
            if($this->input->post('comment')!=null){
                $rs= $this->f_productmodel->Add('comments',array('item_id'=>$this->input->post('id_pro'),
                    'comment'=>$this->input->post('comment'),
                    'reply'=>$this->input->post('id_reply'),
                    'user'=>$this->session->userdata('userid'),
                    'time'=>time(),
                ));
            }

        }
        echo 1;
    }
    public function countview()
    {
        if($this->input->post('id')){
            $item = $this->f_productmodel->getItemByID('product',$this->input->post('id'));
            $view = $item->view + 1;
            $this->f_productmodel->Update('product',$this->input->post('id'),array(
                'view' => $view
            ));
        }
        echo '1';
    }
    public function productcoments($product_id,$limit=10){
        $data['comments']=$this->f_productmodel->getComments($product_id,$limit);
        $data['comments_sub']=$this->f_productmodel->getComments_desc($product_id);
        $data['product_id']=$product_id;
        $this->load->view('productcoments', $data);
    }


    public function pro_bycategory_p($alias,$id,$ps=null){

        $config['base_url'] = base_url($alias.'-ps' . $id.'-ps');
        $config['total_rows'] = $this->f_productmodel->CountProByCategory_p($id); // xác ??nh t?ng s? record
        $config['per_page'] = 20; // xác ??nh s? record ? m?i trang
        $config['uri_segment'] = 2; // xác ??nh segment ch?a page number
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
        $data = array();

        $data['list'] = $this->f_productmodel->ProductBycategory_p($id,$config['per_page'], $this->uri->segment(2));
//        print_r( $data['list']); die('??');
        $data['cate_curent']=$this->f_productmodel->get_data('product_category',array('id'=>$id),array(),true);
        $data['cate_sub']=$this->f_productmodel->Get_where('product_category',array('parent_id'=>$data['cate_curent']->id));
        $data['cate_all']=$this->f_productmodel->getList('product_category');

        $data['count_trademark']  = $this->f_productmodel->count_trademark();
        $data['trademark']  = $this->f_productmodel->trademark($data['cate_curent']->id);
        $data['brands']    = $this->f_productmodel->brands($data['cate_curent']->id);

        $seo=array('title'=>@$data['cate_curent']->name==''?@$data['cate_curent']->name:@$data['cate_curent']->name,
            'description'=>@$data['cate_curent']->description_seo,
            'keyword'=>@$data['cate_curent']->keyword_seo,
            'type'=>'products');


        $this->LoadHeader($seo);
        $this->Loadsubheader_cate();
        $this->load->view('pro_bycategory_p',$data);
        $this->LoadFooter();
    }

    public function pro_bycategory_pd($alias,$id,$pd=null){

        $config['base_url'] = base_url($alias.'-pd' . $id.'-pd');
        $config['total_rows'] = $this->f_productmodel->CountProByCategory_pd($id); // xác ??nh t?ng s? record
        $config['per_page'] = 20; // xác ??nh s? record ? m?i trang
        $config['uri_segment'] = 2; // xác ??nh segment ch?a page number
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
        $data = array();

        $data['list'] = $this->f_productmodel->ProductBycategory_pd($id,$config['per_page'], $this->uri->segment(2));
//        print_r( $data['list']); die('??');
        $data['cate_curent']=$this->f_productmodel->get_data('product_category',array('id'=>$id),array(),true);
        $data['cate_sub']=$this->f_productmodel->Get_where('product_category',array('parent_id'=>$data['cate_curent']->id));
        $data['cate_all']=$this->f_productmodel->getList('product_category');
        $data['count_trademark']  = $this->f_productmodel->count_trademark();
        $data['trademark']  = $this->f_productmodel->trademark($data['cate_curent']->id);

        $data['brands']    = $this->f_productmodel->brands($data['cate_curent']->id);
        $seo=array('title'=>@$data['cate_curent']->name==''?@$data['cate_curent']->name:@$data['cate_curent']->name,
            'description'=>@$data['cate_curent']->description_seo,
            'keyword'=>@$data['cate_curent']->keyword_seo,
            'type'=>'products');


        $this->LoadHeader($seo);
        $this->Loadsubheader_cate();
        $this->load->view('pro_bycategory_pd',$data);
        $this->LoadFooter();
    }

    public function trademark_bycategory($alias,$id){

        $config['base_url'] = base_url($alias.'-th'. $id);
        $config['total_rows'] = $this->f_productmodel->Counttrademark_ByCategory($id); // xác ??nh t?ng s? record
        $config['per_page'] =20 ; // xác ??nh s? record ? m?i trang
        $config['uri_segment'] = 2; // xác ??nh segment ch?a page number
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
        $data = array();

        $data['list'] = $this->f_productmodel->trademark_Bycategory($id,$config['per_page'], $this->uri->segment(2));
//        echo '<pre>';
//        print_r( $data['list']); die('??');
        $data['cate_curent']=$this->f_productmodel->get_data('trademark_category',array('id'=>$id),array(),true);
        $data['cate_sub']=$this->f_productmodel->Get_where('trademark_category',array('parent_id'=>$data['cate_curent']->id));
        $data['cate_all']=$this->f_productmodel->getList('trademark_category');
        $data['count_trademark']  = $this->f_productmodel->count_trademark();
        $data['trademark']  = $this->f_productmodel->trademark($data['cate_curent']->id);
        $data['brands']    = $this->f_productmodel->brands($data['cate_curent']->id);

        $seo=array('title'=>@$data['cate_curent']->name==''?@$data['cate_curent']->name:@$data['cate_curent']->name,
            'description'=>@$data['cate_curent']->description_seo,
            'keyword'=>@$data['cate_curent']->keyword_seo,
            'type'=>'products');


        $this->LoadHeader($seo);
        $this->Loadsubheader_cate();
        $this->load->view('trademark_bycategory',$data);
        $this->LoadFooter();
    }

    public function trademark_bycategory_p($alias,$id,$ts=null){

        $config['base_url'] = base_url($alias.'-ts' . $id.'-ts');
        $config['total_rows'] = $this->f_productmodel->Counttrademark_ByCategory_p($id); // xác ??nh t?ng s? record
        $config['per_page'] = 20; // xác ??nh s? record ? m?i trang
        $config['uri_segment'] = 2; // xác ??nh segment ch?a page number
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
        $data = array();

        $data['list'] = $this->f_productmodel->trademark_Bycategory_p($id,$config['per_page'], $this->uri->segment(2));
//        print_r( $data['list']); die('??');
        $data['cate_curent']=$this->f_productmodel->get_data('trademark_category',array('id'=>$id),array(),true);
        $data['cate_sub']=$this->f_productmodel->Get_where('trademark_category',array('parent_id'=>$data['cate_curent']->id));
        $data['cate_all']=$this->f_productmodel->getList('trademark_category');
        $data['count_trademark']  = $this->f_productmodel->count_trademark();
        $data['trademark']  = $this->f_productmodel->trademark($data['cate_curent']->id);
        $data['brands']    = $this->f_productmodel->brands($data['cate_curent']->id);

        $seo=array('title'=>@$data['cate_curent']->name==''?@$data['cate_curent']->name:@$data['cate_curent']->name,
            'description'=>@$data['cate_curent']->description_seo,
            'keyword'=>@$data['cate_curent']->keyword_seo,
            'type'=>'products');


        $this->LoadHeader($seo);
        $this->Loadsubheader_cate();
        $this->load->view('trademark_bycategory_p',$data);
        $this->LoadFooter();
    }

    public function trademark_bycategory_pd($alias,$id,$td=null){

        $config['base_url'] = base_url($alias.'-td' . $id.'-td');
        $config['total_rows'] = $this->f_productmodel->Counttrademark_ByCategory_pd($id); // xác ??nh t?ng s? record
        $config['per_page'] = 20; // xác ??nh s? record ? m?i trang
        $config['uri_segment'] = 2; // xác ??nh segment ch?a page number
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
        $data = array();

        $data['list'] = $this->f_productmodel->trademark_Bycategory_pd($id,$config['per_page'], $this->uri->segment(2));
//        print_r( $data['list']); die('??');
        $data['cate_curent']=$this->f_productmodel->get_data('trademark_category',array('id'=>$id),array(),true);
        $data['cate_sub']=$this->f_productmodel->Get_where('trademark_category',array('parent_id'=>$data['cate_curent']->id));
        $data['cate_all']=$this->f_productmodel->getList('trademark_category');
        $data['count_trademark']  = $this->f_productmodel->count_trademark();
        $data['trademark']  = $this->f_productmodel->trademark($data['cate_curent']->id);
        $data['brands']    = $this->f_productmodel->brands($data['cate_curent']->id);

        $seo=array('title'=>@$data['cate_curent']->name==''?@$data['cate_curent']->name:@$data['cate_curent']->name,
            'description'=>@$data['cate_curent']->description_seo,
            'keyword'=>@$data['cate_curent']->keyword_seo,
            'type'=>'products');


        $this->LoadHeader($seo);
        $this->Loadsubheader_cate();
        $this->load->view('trademark_bycategory_pd',$data);
        $this->LoadFooter();
    }


}
