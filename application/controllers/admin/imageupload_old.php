<?php
class Imageupload extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('imagemodel');
        $this->load->library('pagination');
        $this->auth->check();

        $this->date_session_products = $this->imagemodel->GetData('session_products');
    }
    protected $type=array(
        'banner'=>'Slide ảnh',
        'accons'=>'Banner Accons Việt',
        'doitac'=>'Đối tác chiến lược',
//        'banner_cat'=>'Banner Trang Dự án',
//        'banner_cat_news'=>'Banner Trang Tin tức',
     //   'banner_page'=>'Banner Trang Giới thiệu',


//        'ads_left'=>'Quảng cáo trái',

      //  'ads_right'=>'Quảng cáo phải',
       // 'brand'=>'Thương hiệu chân trang',
       // 'pupup'=>'Pupup',
        //'banner_cate_pro'=>'Banner danh mục Sản phẩm',
        //'banner_cate_pj'=>'Banner danh mục Dự án',
        //'banner_left'=>'Baner quảng cáo trái',
       // 'banner_sub'=>'Banner Hỗ trợ trục tuyến',


    );
    function index()
    {
        $this->check_acl();
        $config['base_url'] = base_url('vnadmin/imageupload');
        $config['total_rows'] = $this->imagemodel->count_All('images'); // xác ??nh t?ng s? record
        $config['per_page'] = 15; // xác ??nh s? record ? m?i trang
        $config['uri_segment'] = 3; // xác ??nh segment ch?a page number
        $this->pagination->initialize($config);
        $data = array();
        $data['imagelist'] = $this->imagemodel->listAll('images', $config['per_page'], $this->uri->segment(3));


        $data['headerTitle'] = "Quản lý ảnh";

        $this->load->view('admin/header', $data);
        $this->load->view('admin/imageupload_form', $data);
        $this->load->view('admin/footer');
    }

    function doupload(){
        $this->load->helper('model_helper');
        $name_array = array();
        $count = count($_FILES['userfile']['size']);

        foreach ($_FILES as $key => $value) {
            // print_r($value);die();
            for ($s = 0; $s <= $count - 1; $s++) {
                $_FILES['userfile']['name'] = $value['name'][$s];
                $_FILES['userfile']['type'] = $value['type'][$s];
                $_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
                $_FILES['userfile']['error'] = $value['error'][$s];
                $_FILES['userfile']['size'] = $value['size'][$s];
                $config['upload_path'] = './upload/img/';
                $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF';
                $config['max_size'] = '4000';
                $config['max_width'] = '3500';
                $config['max_height'] = '3000';

                $this->load->library('upload', $config);

                $this->upload->do_upload();
                $data = $this->upload->data();
                $name_array[] = $data['file_name'];
                if ($data['file_name'] != null && $this->upload->do_upload()) {
                    $this->load->database();
                    //$name=make_alias($data['file_name']);
                    $link = 'upload/img/' . $data['file_name'];
                    $db_data = array('id' => NULL,
                        'name' => $data['file_name'],
                        'link' => $link
                    );
                    $id_i = $this->db->insert('images', $db_data);

                } else {
                    echo "<script>alert('Anh lon hon kich thuoc cho phep');
                    var base_url = window.location.origin;
                    window.location.href = base_url+'/vnadmin/imageupload'</script>";
                }
            }
            redirect(base_url('vnadmin/imageupload/'));
        }

        /* $names = implode(',', $name_array);
          $this->load->database();
         $db_data = array('id'=> NULL,
                         'name'=> $names);
         $this->db->insert('images',$db_data) ;

         print_r($names);*/
    }

    //Delete Image
    public function delete($id)
    {
        $this->check_acl();
        $img = $this->imagemodel->getItemByID('images', $id);

        if(file_exists($img->link)){
            unlink(($img->link));
        }

        $this->imagemodel->Delete('images', $id);

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function banners()
    {
        $this->check_acl();
        if($this->input->get()){

            $where = array(
                'title' => $this->input->get('title'),
                'p' => $this->input->get('p'),
                'lang' => $this->input->get('lang'),
            );

            //var_dump($where);die();
            $config['page_query_string']    = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['base_url']             = base_url('vnadmin/imageupload/banners?title='
                . $this->input->get('title')
                . '&p=' . $this->input->get('p')
                . '&lang=' . $this->input->get('lang')
            );
            $config['total_rows']           = $this->imagemodel->countBanner($where);
            $config['per_page']             = 50;
            $config['uri_segment'] = 4;

            $this->pagination->initialize($config);
            $data['list'] = $this->imagemodel->getBannerList($where, $config['per_page'], $this->input->get('per_page'));
            $data['total_rows']=$config['total_rows'];

        }else{

            $config['base_url'] = base_url('vnadmin/imageupload/banners');
            $config['total_rows'] = $this->imagemodel->countBanner(null); // xác định tổng số record
            $config['per_page'] = 50; // xác định số record ở mỗi trang
            $config['uri_segment'] = 4; // xác định segment chứa page number
            $this->pagination->initialize($config);

            $data['list'] = $this->imagemodel->getBannerList(null,$config['per_page'], $this->uri->segment(4));
        }


        $data['type'] = $this->type;
        $data['datalang'] = $this->imagemodel->get_data('language');

        $data['headerTitle'] = 'Quản lý Banner';
        $this->load->view('admin/header', $data);
        $this->load->view('admin/banner', $data);
        $this->load->view('admin/footer');
    }

    //add banner
    public function banner_add($id=null)
    {
        $this->check_acl();
        $config['upload_path'] = './upload/img/banner/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '5000';
        $config['max_width'] = '4000';
        $config['max_height'] = '4000';
        $this->load->library('upload', $config);


        $data['btn_name']='Thêm';
        if($id>0){
            $data['edit']=$this->imagemodel->getFirstRowWhere('images',array('id'=>$id));
            $data['btn_name']='Cập nhật';
        }
        if (isset($_POST['upload'])) {
            $title = $this->input->post('title');
            $type = $this->input->post('type');
            $url = $this->input->post('url');
            $target = $this->input->post('target');
            $session = $this->input->post('session');


            if(($_POST['edit_id'])){

                $item = array('type' => $type,
                              'url' => $url,
                              'target' => $target,
                              'title' => $title,
                              'session' => $session,
                              'cate' => $this->input->post('cate'),
                              'idcat_project' => $this->input->post('idcat_project')
                );
                $this->imagemodel->Update_where('images',array('id'=>$_POST['edit_id']), $item);
            }else{

                $item = array('type' => $type,
                              'url' => $url,
                              'target' => $target,
                              'title' => $title,
                              'session' => $session,
                              'cate' => $this->input->post('cate'),
                              'idcat_project' => $this->input->post('idcat_project')
                );
                $id = $this->imagemodel->Add('images', $item);
            }

            if ($_FILES['userfile']['size'] >0) {

                if (!$this->upload->do_upload()) {
                    $data['error'] = 'Ảnh không hợp lệ!';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/banner/' . $upload['upload_data']['file_name'];
                    if(file_exists($image)){
                        if(file_exists(@$data['edit']->link)){
                            unlink($data['edit']->link);
                        }
                    }
                    $item = array(
                        'link' => $image,
                    );
                    $this->imagemodel->Update_where('images',array('id'=>$id), $item);
                }
            }
            redirect(base_url('vnadmin/imageupload/banners'));
        }
//        $cate = $this->imagemodel->getList('news_category');
        $data['procate'] = $this->imagemodel->get_data('product_category',array('parent_id'=>0),array('sort'=>''));
        $data['project_category'] = $this->imagemodel->get_data('project_category',array(),array('sort'=>''));
        $data['type'] = $this->type;
        $data['session_products'] = $this->date_session_products;

        $data['headerTitle'] = "Cập nhật banner";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/banner_add', $data);
        $this->load->view('admin/footer');
    }
    public function banner_edit($id){
        $this->check_acl();
        $this->banner_add($id);
    }

    public function edit($id)
    {
        $data['images'] = $this->imagemodel->getFirstRowWhere('images',array('id'=>$id));
//        print_r($data['images']);

        $config['upload_path'] = './upload/img/banner/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '5000';
        $config['max_width'] = '3000';
        $config['max_height'] = '1000';
        $this->load->library('upload', $config);


        if (isset($_POST['upload'])) {
            $title = $this->input->post('title');
            $type = $this->input->post('type');
            $url = $this->input->post('url');
            $target = $this->input->post('target');

            $item = array('type' => $type,
                          'url' => $url,
                          'target' => $target,
                          'title' => $title,
                          'cate' => $this->input->post('cate')
            );
             $this->imagemodel->Update_where('images', array('id'=>$id),$item);

            if ($_FILES['userfile']['size'] >0) {
                if (!$this->upload->do_upload('userfile')) {
                    $data['error'] = 'Ảnh không hợp lệ!';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/banner/' . $upload['upload_data']['file_name'];

                    $arr=array('link' => $image);

                    $this->imagemodel->Update_where('images', array('id'=>$id),$arr);
                }
            }
            redirect(base_url('vnadmin/imageupload/banners'));
        }
        $data['procate'] = $this->imagemodel->getList('product_category');
        $data['error'] = @$error;

        $data['headerTitle'] = "Cập nhật banner";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/banner_edit', $data);
        $this->load->view('admin/footer');
    }

    //ajax
    public function banner_sort()
    {
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $sort=$this->input->post('sort');

            $item        = $this->imagemodel->get_data('images', array('id' => $id),array(),true);

            if($item){
                $this->imagemodel->Update_where('images',array('id'=>$id),array('sort'=>$sort,));
            }
        }
    }

}

?>