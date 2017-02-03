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


        $this->LoadHeader($seo);
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
        $config['per_page'] = 9; // xác ??nh s? record ? m?i trang
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


        $data['id_lay'] = $id;
        $data['list'] = $this->f_productmodel->ProductBycategory($id,$config['per_page'], $this->uri->segment(2));
        $data['cate_curent']=$this->f_productmodel->get_data('product_category',array('id'=>$id),array(),true);

      //  $data['cate_sub']=$this->f_productmodel->Get_where('product_category',array('parent_id'=>$data['cate_curent']->id));
        $data['cate'] = $this->f_productmodel->get_data('product_category');

        $seo=array('title'=>@$data['cate_curent']->title_seo==''?@$data['cate_curent']->name:@$data['cate_curent']->title_seo,
            'description'=>@$data['cate_curent']->description_seo,
            'keyword'=>@$data['cate_curent']->keyword_seo,
            'type'=>'products');


        $this->LoadHeader($seo);
        $this->load->view('pro_bycategory',$data);
        $this->LoadFooter();
    }

    public function All_product(){

        $config['base_url'] = base_url(_title_product_link);
        $config['total_rows'] = $this->f_productmodel->CountProByCategory_all(); // xác ??nh t?ng s? record
        $config['per_page'] = 16; // xác ??nh s? record ? m?i trang
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

        $data['list'] = $this->f_productmodel->ProductBycategory_all($config['per_page'], $this->uri->segment(2));
        $seo=array('title'=>_title_product,
                   'description'=>_title_product,
                   'keyword'=>_title_product,
                   'type'=>'products');
        $this->LoadHeader($seo);
        $this->load->view('all_product',$data);
        $this->LoadFooter();
    }
    //product detail
    public function productdetail($calias,$palias,$cid,$pid){

        $data['product_image']=$this->f_productmodel->get_data('product_images',array('product_id'=>$pid));
        $data['pro_first']=$this->f_productmodel->get_data('product',array('id'=>$pid,'alias'=>$palias),array(),true);
        $data['product_lq']=$this->f_productmodel->ProductLienQuan($cid,9,0);
        $data['cate_current']=$this->f_productmodel->get_data('product_category',array('id'=>$cid),array(),true);
        $data['cate']=$this->f_productmodel->get_data('product_category');
        // @$data['product_img']=$this->f_productmodel->GetData('product_images',array('product_id'=>$pid),array('id','desc'));


        $data['link_share']=base_url($calias.'/'.$palias.'-c'.$cid.'p'.$pid.'.html');
        $tags=$this->f_productmodel->get_data('product_to_tags',array('productid'=>$data['pro_first']->id),array());
        $data['tags_cate'] =$this->f_productmodel->tags_cate();
        


        $tagsid=array(0);
        if($tags != null){
            foreach($tags as $v){
                $tagsid[]=$v->tagid;
            }
        }
        //   $data['productsbytags']=$this->f_productmodel->products_by_tags($tagsid);

        $review = array(
            'id'=>$data['pro_first']->id,
            'url'=>$data['pro_first']->alias,
            'name'=>$data['pro_first']->name,
            'image'=>$data['pro_first']->image,
            'price'=>$data['pro_first']->price,
//            'cate'=>$data['cate']->alias,
            // 'cate_id'=>$data['cate']->id,
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

        $this->LoadHeader($seo);
        $this->load->view('productdetail',$data);
        $this->LoadFooter();
    }
    public function productdetail_like($alias,$cid,$pid){

        $data['product_image']=$this->f_productmodel->get_data('product_images',array('product_id'=>$pid));
        $data['pro_first']=$this->f_productmodel->get_data('product',array('id'=>$pid,'alias'=>$alias),array(),true);
        $data['product_lq']=$this->f_productmodel->ProductLienQuan($cid,9,0);
        $data['cate_current']=$this->f_productmodel->get_data('product_category',array('id'=>$cid),array(),true);
        $data['cate']=$this->f_productmodel->get_data('product_category');
        // @$data['product_img']=$this->f_productmodel->GetData('product_images',array('product_id'=>$pid),array('id','desc'));


        $data['link_share']=base_url($alias.'-c'.$cid.'p'.$pid.'.html');
        $tags=$this->f_productmodel->get_data('product_to_tags',array('productid'=>$data['pro_first']->id),array());
        $data['tags_cate'] =$this->f_productmodel->tags_cate();


        $tagsid=array(0);
        if($tags != null){
            foreach($tags as $v){
                $tagsid[]=$v->tagid;
            }
        }
        //   $data['productsbytags']=$this->f_productmodel->products_by_tags($tagsid);

        $review = array(
            'id'=>$data['pro_first']->id,
            'url'=>$data['pro_first']->alias,
            'name'=>$data['pro_first']->name,
            'image'=>$data['pro_first']->image,
            'price'=>$data['pro_first']->price,
//            'cate'=>$data['cate']->alias,
            // 'cate_id'=>$data['cate']->id,
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

        $this->LoadHeader($seo);
        $this->load->view('productdetail',$data);
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
            $config['per_page'] = 16; // xác ??nh s? record ? m?i trang
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
            $data['cate']=$this->f_productmodel->getList('product_category');
            $data['right_product']     =$this->widget('right_product');
            $seo=array(
                'title'=>'Tìm kiếm',
                'description'=>'Tìm kiếm',
                'keyword'=>'Tìm kiếm',
                'type'=>'products');


            $this->LoadHeader($seo);
            // $this->Loadsubheader();
            $this->load->view('pro_search',$data);
            $this->LoadFooter();
        }
    }

    public function product_home(){
        $config['base_url'] = base_url(_title_view_link);
        $config['total_rows'] = $this->f_homemodel->CountProView('home'); // xác ??nh t?ng s? record
        $config['per_page'] = 15; // xác ??nh s? record ? m?i trang
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
        $data['list']            = $this->f_homemodel->Get_product('home',$config['per_page'], $this->uri->segment(2));



        $data['function']=$this;
        $seo=array('title'=>_title_view,
            'description'=>_title_view,
            'keyword'=>_title_view,
            'type'=>'products');

        $this->LoadHeader($seo);
        $this->load->view('product_home',$data);
        $this->LoadFooter();
    }
    // ajax nang cao
    public function Tim_danhmuc(){

        $id = $_POST['id'];
        $data['danhmuc'] = $this->f_productmodel->get_data('product_category',array('parent_id'=>$id),array('sort'=>''));

        $this->load->view('Tim_danhmuc',$data);
    }


    public function Tim_sanpham(){

        @$id = $_POST['id'];
        $page= $_POST['page'];
        $number_per_page= $_POST['number_per_page'];

        $timkiem_nangcao = 'product_category.id = '.intval($id);

        $offset = ($page - 1) * $number_per_page;
        $data['total_rows'] = $this->f_productmodel->CountProByCategory2($timkiem_nangcao);

        $data['list_products'] = $this->f_productmodel->ProductBycategory2($timkiem_nangcao,$offset,$number_per_page);
//       echo '<pre>';
//        echo $data['list_products'] ;die();
        $data['phantrang'] = $this->f_productmodel->pagination_ajax_sub($data['total_rows'], $number_per_page, $page);
        $data['cate_curent']=$this->f_productmodel->get_data('product_category',array('id'=>$id),array(),true);
        @$data['cate_sub']=$this->f_productmodel->Get_where('product_category',array('parent_id'=>$data['cate_curent']->id));
        $data['cate_all']=$this->f_productmodel->getList('product_category');

        $this->load->view('Tim_sanpham',$data);
    }
    public function Tim_mau(){

        $id = $_POST['id'];
        $data['danhmuc'] = $this->f_productmodel->getFirstRowWhere('product_category',array('id'=>$id),array('sort'=>''));
        $mau = $data['danhmuc']->color;
        echo $mau;
    }
    public function Tim_mau_duan(){
        $id = $_POST['id'];
        $data['danhmuc'] = $this->f_productmodel->getFirstRowWhere('product_category',array('id'=>$id),array('sort'=>''));
        $mau = $data['danhmuc']->image3;
        echo $mau;
    }
    public function Tim_sanpham_cha(){
        @$id = $_POST['id'];
//        echo 'ádasdad';
//        print_r($id); die();
        $page= $_POST['page'];
        $number_per_page= $_POST['number_per_page'];
        $arr_dk = '';

        if($id != '' ){
            $arr_id_cha = explode(",",$id);
            $array_id_cha = '';
            for($i=0;$i<count($arr_id_cha);$i++){
                $arr_dk .= "product_category.id = '".intval($arr_id_cha[$i])."' or ";
            }
            $timkiem_nangcao = $arr_dk;
            $timkiem_nangcao = rtrim($timkiem_nangcao,"or ");
        }


        $offset = ($page - 1) * $number_per_page;
        $data['total_rows'] = $this->f_productmodel->CountProByCategory2($timkiem_nangcao);

        $data['list_products'] = $this->f_productmodel->ProductBycategory2($timkiem_nangcao,$offset,$number_per_page);
//        echo '<pre>';
//        print_r($data['list_products']); die();
//        echo $data['list_products'] ;die();
        $data['phantrang'] = $this->f_productmodel->pagination_ajax($data['total_rows'], $number_per_page, $page);
        $data['cate_curent']=$this->f_productmodel->get_data('product_category',array('id'=>$id),array(),true);
        @$data['cate_sub']=$this->f_productmodel->Get_where('product_category',array('parent_id'=>$data['cate_curent']->id));
        $data['cate_all']=$this->f_productmodel->getList('product_category');
        $data['script_jquery']=$this->widget('script_jquery');
        $data['san_pham'] = 2;

        $this->load->view('Tim_sanpham',$data);


    }



    public function searchcategory(){

        if($this->input->get()){

            $where = array(
                'key' => $this->input->get('key'),
                'price_form' => $this->input->get('price_form'),
                'price_to' => $this->input->get('price_to'),
            );

            $config['page_query_string']    = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['base_url'] = base_url('searchcategory?key=' . $this->input->get('key')
                .'&price_form='.$this->input->get('price_form')
                .'&price_to='.$this->input->get('price_to')
           );
            $config['total_rows'] = $this->f_productmodel->countsearch_result2($where); // xác ??nh t?ng s? record
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


  //index
    public function send_contact(){
        if(isset($_POST['sendcontact'])){

            $arr=array('full_name' => $this->input->post('full_name'),
              
                'email' => $this->input->post('email'),
                  'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),

                'country' => $this->input->post('country'), // :> tiêu để 
                'comment' => $this->input->post('comment'),

                'time' => time(),
            );
            $id=$this->contact_model->Add('contact',$arr);

            if($id){
                $_SESSION['message']="Bạn đã gửi thông tin thành công!!!";
            }
        }
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
        $this->load->view('trademark_bycategory_pd',$data);
        $this->LoadFooter();
    }


}
