<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Raovat extends MY_Controller
{
    protected $module_name="Raovat";
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('f_raovat_model');
        $this->load->library('pagination');
    }

    public function index($tinh='toan-quoc'){
        $_SESSION['tinh_raovat']=$tinh;
        $config['base_url'] = base_url('rao-vat');
        $config['total_rows'] = $this->f_raovat_model->countuser_post($tinh); // xác định tổng số record
        $config['per_page'] = 20; // xác định số record ở mỗi trang
        $config['uri_segment'] = 2; // xác định segment chứa page number

        $config['full_tag_open'] = "<ul class='pagination pagination-sm '>";
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
        $data['list'] = $this->f_raovat_model->getuser_post($tinh,$config['per_page'], $this->uri->segment(2));
        $data['banner_right'] = $this->f_raovat_model->Get_where('images',array('type'=>'ads_right'));
        $data['cate'] = $this->f_raovat_model->getList('post_cate');
        $data['tinhthanh'] = $this->f_raovat_model->getList('province');
        $arr=array();
        foreach($data['list'] as $v){
            $arr[]=$v->id;
        }
        $data['post_image'] = $this->f_raovat_model->getpost_image($arr);
        $this->LoadHeader('Rao vặt');
        $this->load->view('raovat_index',$data);
        $this->LoadFooter();
    }

    public function danhmuc_raovat($alias,$tinh='toan-quoc'){

        isset($_SESSION['tinh_thanh'])?$tinh=$_SESSION['tinh_thanh']:$tinh=$tinh;
        $config['base_url'] = base_url('rao-vat-'.$tinh.'/'.$alias);
        $config['total_rows'] = $this->f_raovat_model->countuser_post_bycate($alias,$tinh); // xác định tổng số record
        $config['per_page'] = 20; // xác định số record ở mỗi trang
        $config['uri_segment'] = 3; // xác định segment chứa page number

        $config['full_tag_open'] = "<ul class='pagination pagination-sm '>";
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
        $data['list'] = $this->f_raovat_model->getuser_post_bycate($alias,$tinh,$config['per_page'], $this->uri->segment(3));
        $data['cate'] = $this->f_raovat_model->getList('post_cate');
        $data['curent_cate'] = $alias;
        $data['tinhthanh'] = $this->f_raovat_model->getList('province');
        $arr=array();
        foreach($data['list'] as $v){
            $arr[]=$v->id;
        }
        $data['post_image'] = $this->f_raovat_model->getpost_image($arr);
        $this->LoadHeader('Rao vặt');
        $this->load->view('raovat_index',$data);
        $this->LoadFooter();
    }

    public function chitiet_raovat($alias){

        $data['item'] = $this->f_raovat_model->getDetail($alias);
        $this->f_raovat_model->Update_where('user_post',array('id'=>$data['item']->id),array('dientich'=>$data['item']->dientich+1));
        $data['banner_right'] = $this->f_raovat_model->Get_where('images',array('type'=>'ads_right'));
//        $data['menu_right'] = $this->f_raovat_model->getMenuRightRoot();
        $data['images'] = $this->f_raovat_model->Get_where('user_post_images',array('id_item'=>$data['item']->id));
        $this->LoadHeader();
        $this->load->view('raovat_chitiet',$data);
        $this->LoadFooter();
    }


    public function raovat_list(){
        $this->auth->checkUserLogin();
        $config['base_url'] = base_url('trang-ca-nhan');
        $config['total_rows'] = $this->f_raovat_model->count_user_post('user_post'); // xác định tổng số record
        $config['per_page'] = 20; // xác định số record ở mỗi trang
        $config['uri_segment'] = 2; // xác định segment chứa page number
        $this->pagination->initialize($config);
        $data = array();
        $data['userslist'] = $this->f_raovat_model->User_post($config['per_page'], $this->uri->segment(2));
        $data['cate'] = $this->f_raovat_model->getList('post_cate');

        $this->LoadHeader();
        $this->load->view('raovat_list',$data);
        $this->LoadFooter();
    }


    public function raovat_bycate($alias){
        $this->auth->checkUserLogin();
        $config['base_url'] = base_url('ds-rao-vat/'.$alias);
        $config['total_rows'] = $this->f_raovat_model->countuser_post_bycate_manager($alias); // xác định tổng số record
        $config['per_page'] = 20; // xác định số record ở mỗi trang
        $config['uri_segment'] = 3; // xác định segment chứa page number
        $this->pagination->initialize($config);
        $data = array();
        $data['userslist'] = $this->f_raovat_model->getuser_post_bycate_manager($alias,$config['per_page'], $this->uri->segment(3));
        $data['cate'] = $this->f_raovat_model->getList('post_cate');
        $data['curent_cate'] = $alias;

        $this->LoadHeader();
        $this->load->view('raovat_list',$data);
        $this->LoadFooter();
    }


    public function add_raovat($id = null)
    {
        $this->auth->checkUserLogin();
        if($this->session->userdata('userid') != null){
            $_SESSION['quyenhan']='post';
            $_SESSION['ck_access']=true;
        }
        $this->load->helper('ckeditor_helper');
        $this->load->helper('model_helper');

        $data['ckeditor']        = array(
            //ID of the textarea that will be replaced
            'id'     => 'ckeditor',
            'path'   => 'assets/ckeditor',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width'   => "100%", //Setting a custom width
                'height'  => '300px', //Setting a custom height
            ));

        $config['upload_path'] = './upload/img/products/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF';
        $config['max_size'] = '4000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $data['btn_name'] = 'Thêm';
        if ($id != null) {
            $edit = $this->f_raovat_model->Getdata_old('product', array('id' => $id), array(), true);
            $data['images'] = $this->f_raovat_model->Getdata_old('product_images', array('id_item' => $id));
            $data['cate_selected']=$this->f_raovat_model->get_field_array('product_to_category','id_category',array('id_product'=>$id));
            $data['edit'] = $edit;
            $data['btn_name'] = 'Cập nhật';
        }

        if (isset($_POST['addnews'])) {
            if($this->input->post('product_image')!=null){
                $image = str_replace(array('/yanonet/'), '', $this->input->post('product_image'));
            }else{
                $image='';
            }

            $product_price_sale = str_replace(array(',', '.', ';',), '', $this->input->post('price_sale'));
            $arr = array(
                'category_id'   => $this->input->post('category_id'),
                'provinceid'    => $this->input->post('provinceid'),
                'name'          => $this->input->post('name'),
                'alias'         => make_alias($this->input->post('name')),
                'image'         => $image,
                'detail'        => $this->input->post('detail'),
                'counter'        => $this->input->post('counter'),
                'session'        => $this->input->post('session'),
                'price_sale'    => $product_price_sale,
                'tinhtrang'     => $this->input->post('tinhtrang'),
                'name_rv'       => $this->input->post('name_rv'),
                'email'         => $this->input->post('email'),
                'phone'         => $this->input->post('phone'),
                'address'       => $this->input->post('address')
            );


            if ($this->input->post('edit')) { // edit product
                $this->f_raovat_model->Delete2('product_images',array('id_item' => $id));
                $u = $this->f_raovat_model->Update('product', $arr, array('id' => $id));
                if ($u) {
                    $this->creat_mess('success', 'Cập nhật rao vặt thành công');
                }
                $this->f_raovat_model->Update('product', array('alias' => make_alias($this->input->post('name')) . '-' . @$edit->id),
                    array('id' => $id));
            } else { // add product
                $id = $this->f_raovat_model->Add('product', $arr);
            }

            if($this->input->post('more_file')){
                $this->f_raovat_model->Delete2('product_images', array('id_item'=>$id));
                foreach($this->input->post('more_file') as $v){
                    $image_link = str_replace(array('/yanonet/'), '', $v);
                    $db_data = array(
                        'link'    => $image_link,
                        'id_item' => $id
                    );
                    $this->f_raovat_model->Add('product_images', $db_data);
                }
            }
            redirect(base_url('dang-tin'));
        }
        $data['cate']     = $this->f_raovat_model->Getdata_old('product_category',array(),array('sort'=>''));

        $this->LoadHeader();
        $this->load->view('raovat/raovat_add',$data);
        $this->LoadFooter();
    }



    //Edit rao vat
    public function edit($id)
    {
        $this->auth->checkUserLogin();
        $this->load->helper('ckeditor_helper');
        $this->load->helper('model_helper');
        $data['ckeditor'] = array(
            //ID of the textarea that will be replaced
            'id' => 'ckeditor',
            'path' => 'assets/ckeditor',
            //Optionnal values
            'config' => array(
                'toolbar' =>  array(
                    array( 'Source','NumberedList','BulletedList', '-', 'Bold', 'Italic', 'Underline', 'Strike' ,'-', 'Link', 'Unlink', 'Anchor','Image')
                ), //Using the Full toolbar
                'width' => "100%", //Setting a custom width
                'height' => '300px', //Setting a custom height
            ));
        $config['upload_path']   = './upload/img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '1000';
        $config['max_width']     = '1500';
        $config['max_height']    = '1000';
        $this->load->library('upload', $config);

        $raovat = $this->f_raovat_model->getNewsByID($id);

        if($raovat->view==1) redirect(base_url('trang-ca-nhan'));
        
        if (isset($_POST['editraovat'])) {
            $tieude        = $this->input->post('tieude');
            $ma            = $this->input->post('ma');
            $loai_giaodich = $this->input->post('loai_giaodich');
            $loai_nhatdat  = $this->input->post('loai_nhatdat');
            $ngay_batdau   = strtotime(date_fomat_en($this->input->post('ngay_batdau')));
            $ngay_ketthuc  = strtotime(date_fomat_en($this->input->post('ngay_ketthuc')));
            $tinh_thanh    = $this->input->post('tinh_thanh');
            $quan_huyen    = $this->input->post('quan_huyen');
            $dientich     = $this->input->post('dientich');
            $gia_m     = $this->input->post('gia_m');
            $diachi     = $this->input->post('diachi');
            $sophong     = $this->input->post('sophong');
            $sotang    = $this->input->post('sotang');
            $mattien   = $this->input->post('mattien');
            $noidung  = $this->input->post('noidung');
            $ten_lienhe  = $this->input->post('ten_lienhe');
            $diachi_lienhe  = $this->input->post('diachi_lienhe');
            $dienthoai_lienhe  = $this->input->post('dienthoai_lienhe');
            $email_lienhe  = $this->input->post('email_lienhe');
            $userid  = $this->session->userdata('userid');
            $alias       = make_alias($tieude) . '-' . $raovat->id;

            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload()) {
                    $data['error'] = 'Ảnh không thỏa mãn';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image  = 'upload/img/' . $upload['upload_data']['file_name'];
                    $raovat = array('tieude' => $tieude,
                        'ma' => $ma,
                        'alias' => $alias ,
                        'loai_giaodich' => $loai_giaodich,
                        'loai_nhatdat' => $loai_nhatdat,
                        'ngay_batdau' => $ngay_batdau,
                        'ngay_ketthuc' => $ngay_ketthuc,
                        'tinh_thanh' => $tinh_thanh,
                        'quan_huyen' =>$quan_huyen ,
                        'dientich' => $dientich,
                        'gia_m' => str_replace(',','',$gia_m),
                        'diachi' => $diachi,
                        'sophong' => $sophong,
                        'sotang' => $sotang,
                        'mattien' => $mattien,
                        'noidung' => $noidung,
                        'ten_lienhe' => $ten_lienhe,
                        'diachi_lienhe' => $diachi_lienhe,
                        'dienthoai_lienhe' => $dienthoai_lienhe,
                        'email_lienhe' => $email_lienhe,
                        'userid' => $userid, );
                    $this->f_raovat_model->Update('user_post', $id, $raovat);

                    redirect( base_url('quan-ly-rao-vat'));
                }
            } else {
                $raovat = array('tieude' => $tieude,
                    'ma' => $ma,
                    'alias' => $alias ,
                    'loai_giaodich' => $loai_giaodich,
                    'loai_nhatdat' => $loai_nhatdat,
                    'ngay_batdau' => $ngay_batdau,
                    'ngay_ketthuc' => $ngay_ketthuc,
                    'tinh_thanh' => $tinh_thanh,
                    'quan_huyen' =>$quan_huyen ,
                    'dientich' => $dientich,
                    'gia_m' => str_replace(',','',$gia_m),
                    'diachi' => $diachi,
                    'sophong' => $sophong,
                    'sotang' => $sotang,
                    'mattien' => $mattien,
                    'noidung' => $noidung,
                    'ten_lienhe' => $ten_lienhe,
                    'diachi_lienhe' => $diachi_lienhe,
                    'dienthoai_lienhe' => $dienthoai_lienhe,
                    'email_lienhe' => $email_lienhe,
                    'userid' => $userid, );

                $this->f_raovat_model->Update('user_post', $id, $raovat);

                redirect( base_url('quan-ly-rao-vat'));
            }
        }
        $data['raovat']   = $raovat;

        $data['district'] = $this->f_raovat_model->Get_where('district',array('provinceid'=>$raovat->tinh_thanh));

        $data['pro_image'] = $this->f_raovat_model->getProImage($id);

        $data['province'] = $this->f_raovat_model->getList('province');

        $this->LoadHeader();
        $this->load->view('raovat_edit',$data);
        $this->LoadFooter();
    }

    //Delete rao vat
    public function delete($id){
        $this->f_raovat_model->Delete('user_post',$id);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function active_item(){
        //$this->auth->check();
        $u=$this->f_raovat_model->getFirstRowWhere('user_post',array('id'=>$_POST['id']));

        if($u->view==1){
            $this->f_raovat_model->Update_where('user_post', array('id' => $_POST['id']), array('view'=>0));

        }else if($u->view==0){
            $this->f_raovat_model->Update_where('user_post', array('id' => $_POST['id']), array('view'=>1));
        }
        echo 1;
    }

    public function getdistric()
    {
        if (isset($_POST['id'])) {
            $list        = $this->f_raovat_model->Get_where('district', array('provinceid' => $_POST['id']));
            echo json_encode($list);
        }
    }

}