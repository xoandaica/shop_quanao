<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Project extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('f_projectmodel');
        $this->load->library('pagination');
    }
    public function index($alias,$id){
        $this->pro_bycategory($alias,$id);
    }

    public function project_bycategory($alias,$id){
            $config['base_url'] = base_url($alias.'-pj' . $id);
            $config['total_rows'] = $this->f_projectmodel->CountProByCategory($id); // xác ??nh t?ng s? record
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

            $data['id_lay'] = $id;
            $data['list'] = $this->f_projectmodel->ProjecttBycategory($id,$config['per_page'], $this->uri->segment(2));
//             $data['list'] = $this->f_projectmodel->get_data('project');

        $data['banner_cate_project']=$this->f_homemodel->get_data('images',array('type'=>'banner_cate_pj','idcat_project'=>$id),array());
        $data['cate_curent']=$this->f_projectmodel->get_data('project_category',array('id'=>$id),array(),true);
        $data['cate_sub']=$this->f_projectmodel->Get_where('project_category',array('parent_id'=>$data['cate_curent']->id));
        $data['cate']=$this->f_projectmodel->getList('project_category');



        $seo=array('title'=>@$data['cate_curent']->title_seo==''?@$data['cate_curent']->name:@$data['cate_curent']->title_seo,
            'description'=>@$data['cate_curent']->description_seo,
            'keyword'=>@$data['cate_curent']->keyword_seo,
            'type'=>'projects');

        $this->LoadHeader($seo);
        $this->load->view('project_bycategory',$data);
        $this->LoadFooter();
    }
    // ajax nang cao
    public function Tim_cate_duan(){
        $id = $_POST['id'];
        $data['danhmuc'] = $this->f_projectmodel->get_data('project_category',array('parent_id'=>$id),array('sort'=>''));

        $this->load->view('Tim_cate_duan',$data);
    }
    public function Tim_mau_duan(){
    $id = $_POST['id'];
    $data['danhmuc'] = $this->f_projectmodel->getFirstRowWhere('project_category',array('id'=>$id),array('sort'=>''));
    $mau = $data['danhmuc']->image3;
    echo $mau;
    }
    public function Tim_mau(){

        $id = $_POST['id'];
        $data['danhmuc'] = $this->f_projectmodel->getFirstRowWhere('project_category',array('id'=>$id),array('sort'=>''));
        $mau = $data['danhmuc']->color;
        echo $mau;
    }
    public function Tim_duan_cha(){
        @$id = $_POST['id']; 
        $page= $_POST['page'];
        $number_per_page= $_POST['number_per_page'];
        $arr_dk = '';

        if($id != '' ){
            $arr_id_cha = explode(",",$id);
            $array_id_cha = '';
            for($i=0;$i<count($arr_id_cha);$i++){
                $arr_dk .= "project_category.id = '".intval($arr_id_cha[$i])."' or ";
            }
            $timkiem_nangcao = $arr_dk;
            $timkiem_nangcao = rtrim($timkiem_nangcao,"or ");
        }


        $offset = ($page - 1) * $number_per_page;
        $data['total_rows'] = $this->f_projectmodel->CountProByCategory2($timkiem_nangcao);
//        echo $timkiem_nangcao.'</br>';
//        echo $offset.'</br>';
//        echo $number_per_page; die();

        $data['list'] = $this->f_projectmodel->ProductBycategory2($timkiem_nangcao,$offset,$number_per_page);

//        print_r($data['list']); die();

        $data['phantrang'] = $this->f_projectmodel->pagination_ajax($data['total_rows'], $number_per_page, $page);
        $data['cate_curent']=$this->f_projectmodel->get_data('product_category',array('id'=>$id),array(),true);
        @$data['cate_sub']=$this->f_projectmodel->Get_where('product_category',array('parent_id'=>$data['cate_curent']->id));
        $data['cate_all']=$this->f_projectmodel->getList('product_category');
        $data['script_jquery']=$this->widget('script_jquery');
        $data['san_pham'] = 2;

        $this->load->view('Tim_duan',$data);


    }

    public function Tim_duan(){

        @$id = $_POST['id'];
        $page= $_POST['page'];
        $number_per_page= $_POST['number_per_page'];

        $timkiem_nangcao = 'project_category.id = '.intval($id);

        $offset = ($page - 1) * $number_per_page;
        $data['total_rows'] = $this->f_projectmodel->CountProByCategory2($timkiem_nangcao);

        $data['list'] = $this->f_projectmodel->ProductBycategory2($timkiem_nangcao,$offset,$number_per_page);

        $data['phantrang'] = $this->f_projectmodel->pagination_ajax_sub($data['total_rows'], $number_per_page, $page);
        $data['cate_curent']=$this->f_projectmodel->get_data('product_category',array('id'=>$id),array(),true);
        @$data['cate_sub']=$this->f_projectmodel->Get_where('product_category',array('parent_id'=>$data['cate_curent']->id));
        $data['cate_all']=$this->f_projectmodel->getList('product_category');

        $this->load->view('Tim_duan',$data);
    }

    //project detail
    public function projectdetail($calias,$palias,$cid,$pid){
       $data['pro_first']=$this->f_projectmodel->get_data('project',array('id'=>$pid,'project_alias'=>$palias),array(),true);

       $data['project_lienquan']=$this->f_projectmodel->getProductSimilar2($cid,$pid,8,0);
       $data['duan_focus']=$this->f_projectmodel->get_data('project_category',array('focus' => 1));
       $data['project_simaler']=$this->f_projectmodel->get_data('project');
       $data['project_image']=$this->f_projectmodel->get_data('project_images');
       $data['right_project']=$this->widget('right_project');

        $data['cate_current']=$this->f_projectmodel->get_data('project_category',array('id'=>$cid),array(),true);

       $data['cate']=$this->f_projectmodel->get_data('project_category',array('parent_id'=>$cid),array(),true);
//        echo '<pre>';
//        print_r($data['cate']); die();
       @$data['cate_sub']=$this->f_projectmodel->Get_where('project_category',array('parent_id'=>$data['cate']->id));
       $data['cate_all']=$this->f_projectmodel->get_data('project_category',array());
       $data['link_share']=base_url($calias.'/'.$palias.'-c'.$cid.'pj'.$pid.'.html');

       if(isset($_POST['sendcontact'])){
                $arr=array('full_name' => $this->input->post('full_name'),
                    'name_project' => $this->input->post('name_project'),
                    'link_project' => $this->input->post('link_project'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'address' => $this->input->post('address'),
                    'city' => $this->input->post('city'),
                    'country' => $this->input->post('country'),
                    'comment' => $this->input->post('comment'),

                    'time' => time(),
                );
                $this->f_projectmodel->Add('contact',$arr);
                $_SESSION['mss_success'] = 'Gửi thông tin báo giá thành công !';
        }

        @$seo=array('title'=>@$data['pro_first']->title_seo==''||@$data['pro_first']->title_seo=='0'?$data['pro_first']->project_name:$data['pro_first']->title_seo,
            'description'=>@$data['pro_first']->description_seo,
            'keyword'=>@$data['pro_first']->keyword_seo,
            'image'=>(@$data['pro_first']->image),
            'type'=>'projects');

        $this->LoadHeader($seo);
        $this->load->view('projectdetail',$data);
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
            $config['total_rows'] = $this->f_projectmodel->countsearch_result($where); // xác ??nh t?ng s? record
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

            $data['list'] = $this->f_projectmodel->getsearch_result($where,$config['per_page'], $this->input->get('per_page'));
            $data['partner']=$this->f_projectmodel->getSlider_partners();
            //        print_r( $data['list']); die('??');
            $data['cate_curent']=$this->f_projectmodel->get_data('project_category',array(),array(),true);

            $data['cate_sub']=$this->f_projectmodel->Get_where('project_category',array('parent_id'=>$data['cate_curent']->id));
            $data['cate_all']=$this->f_projectmodel->getList('project_category');

            $seo=array(
                'title'=>'Tìm kiếm',
                'description'=>'Tìm kiếm',
                'keyword'=>'Tìm kiếm',
                'type'=>'projects');


            $this->LoadHeader($seo);
            $this->Loadsubheader();
            $this->load->view('pro_search',$data);
            $this->LoadFooter();
        }
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
            $config['total_rows'] = $this->f_projectmodel->countsearch_result2($where); // xác ??nh t?ng s? record
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

            $data['list'] = $this->f_projectmodel->getsearch_result2($where,$config['per_page'], $this->input->get('per_page'));
            $data['partner']=$this->f_projectmodel->getSlider_partners();
            //        print_r( $data['list']); die('??');
            $data['cate_curent']=$this->f_projectmodel->get_data('project_category',array(),array(),true);

            $data['cate_sub']=$this->f_projectmodel->Get_where('project_category',array('parent_id'=>$data['cate_curent']->id));
            $data['cate_all']=$this->f_projectmodel->getList('project_category');

            $seo=array(
                'title'=>'Tìm kiếm',
                'description'=>'Tìm kiếm',
                'keyword'=>'Tìm kiếm',
                'type'=>'projects');


            $this->LoadHeader($seo);
            $this->Loadsubheader();
            $this->load->view('pro_search',$data);
            $this->LoadFooter();
        }
    }





}
