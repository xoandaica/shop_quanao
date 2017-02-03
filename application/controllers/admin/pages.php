<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('staticpagemodel');
        $this->load->library('pagination');
        $this->auth = new Auth();
        $this->auth->check();
    }

    public function pagelist(){
        $this->check_acl();
        $config['base_url'] = base_url('vnadmin/pages/pages');
        $config['total_rows'] = $this->staticpagemodel->count_All('staticpage'); // xác ??nh t?ng s? record
        $config['per_page'] = 20; // xác ??nh s? record ? m?i trang
        $config['uri_segment'] = 4; // xác ??nh segment ch?a page number
        $this->pagination->initialize($config);
        $data = array();
        $data['pagelist'] = $this->staticpagemodel->pageListAll($config['per_page'], $this->uri->segment(4),@$this->language);

        $headerTitle = "Pages";
        $this->LoadHeaderAdmin($headerTitle);
        $this->load->view('admin/page_list',$data);
        $this->LoadFooterAdmin();
    }

    public function add($id=null){
        $this->check_acl();

        $this->load->helper('ckeditor_helper');
        $this->load->helper('model_helper');
        $data['ckeditor'] = array(
            //ID of the textarea that will be replaced
            'id' => 'ckeditor',
            'path' => 'assets/ckeditor',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "100%", //Setting a custom width
                'height' => '300px', //Setting a custom height
            ));
        $config['upload_path'] = './upload/img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '5000';
        $config['max_width']  = '5000';
        $config['max_height']  = '4000';
        $this->load->library('upload', $config);
        $data['btn_name']='Thêm';
        if($id){
            //get news item
            $item=$this->staticpagemodel->get_data('staticpage',array('id'=>$id),array(),true);
            $data['edit']=$item;
            $data['btn_name']='Cập nhật';
        }

        if($this->input->post('alias') !=''){
            $alias = make_alias($this->input->post('alias'));
        }
        else{
            $alias = make_alias($this->input->post('name'));
        }

        if (isset($_POST['addnews'])) {
            $arr=array(
                'name'=>$this->input->post('name'),
                'alias'           => $alias,
                'lang'            => $this->input->post('lang'),
                'description'=>$this->input->post('description'),
                'home'=>$this->input->post('home'),
                'hot'=>$this->input->post('hot'),
                'focus'=>$this->input->post('focus'),
                'content'=>$this->input->post('content'),
                'time'=>time(),
                'title_seo'=>$this->input->post('title_seo'),
                'keyword_seo'=>$this->input->post('keyword_seo'),
                'description_seo'=>$this->input->post('description_seo'),
            );

            if($this->input->post('edit')){
                //update news
                $this->staticpagemodel->Update_where('staticpage', array('id'=>$id),$arr);
            }else{
                //add news
                $rs = $this->staticpagemodel->Add('staticpage', $arr);
            }
            isset($rs)?$id=$rs:$id=$id;

            //update news alias
            $this->staticpagemodel->Update_where('staticpage', array(
                'id'=>$id), $arr);

            //update news image
            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload('userfile')) {
                    $data['error'] = '?nh không h?p l?!';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image  = 'upload/img/' . $upload['upload_data']['file_name'];
                    $this->staticpagemodel->Update_where('staticpage', array('id'=>$id), array('icon'=>$image));
                }
            }
            //end
            //update news image 2
            if ($_FILES['userfile2']['name'] != '') {
                if (!$this->upload->do_upload('userfile2')) {
                    $data['error'] = '?nh không h?p l?!';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image  = 'upload/img/' . $upload['upload_data']['file_name'];
                    $this->staticpagemodel->Update_where('staticpage', array('id'=>$id), array('icon2'=>$image));
                }
            }
            //end
            //update news image 3
            if ($_FILES['userfile3']['name'] != '') {
                if (!$this->upload->do_upload('userfile3')) {
                    $data['error'] = '?nh không h?p l?!';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image  = 'upload/img/' . $upload['upload_data']['file_name'];
                    $this->staticpagemodel->Update_where('staticpage', array('id'=>$id), array('icon3'=>$image));
                }
            }
            //end
            //update news image 4
            if ($_FILES['userfile4']['name'] != '') {
                if (!$this->upload->do_upload('userfile4')) {
                    $data['error'] = '?nh không h?p l?!';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image  = 'upload/img/' . $upload['upload_data']['file_name'];
                    $this->staticpagemodel->Update_where('staticpage', array('id'=>$id), array('icon4'=>$image));
                }
            }
            //end
            //update news image 5
            if ($_FILES['userfile5']['name'] != '') {
                if (!$this->upload->do_upload('userfile5')) {
                    $data['error'] = '?nh không h?p l?!';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image  = 'upload/img/' . $upload['upload_data']['file_name'];
                    $this->staticpagemodel->Update_where('staticpage', array('id'=>$id), array('icon5'=>$image));
                }
            }
            //end
            redirect(base_url('vnadmin/pages/pagelist'));
        }
        $headerTitle = "Add  Pages";
        $this->LoadHeaderAdmin($headerTitle);
        $this->load->view('admin/page_add',$data);
        $this->LoadFooterAdmin();
    }
    public function edit($id){
        $this->check_acl();

        $this->add($id);
    }
    public function delete($id){
        $this->check_acl();
        $this->staticpagemodel->Delete('staticpage',$id);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function update_view()
    {
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $view=$this->input->post('view');

            $item        = $this->staticpagemodel->getFirstRowWhere('staticpage', array('id' => $id));

            if($item->$view==0){
                $this->staticpagemodel->Update_where('staticpage',array('id'=>$id),array($view=>1,));
            }
            if($item->$view==1){
                $this->staticpagemodel->Update_where('staticpage',array('id'=>$id),array($view=>0,));
            }
        }
    }


    //Them anh cho san pham===========================
    public function images($id)
    {
        $this->check_acl();
        $config['upload_path'] = './upload/img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '5000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $this->load->library('upload', $config);
        $pro=$this->staticpagemodel->getFirstRowWhere('staticpage',array('id'=>$id));
        $data['page_name'] = $pro->name;
        if(isset($_POST['Upload'])){
            $db_data = array(
                'link' => '',
                'name' => $this->input->post('title'),
                'page_id' => $id
            );
            if(isset($_POST['edit'])&&$_POST['edit']!=null){
                $this->staticpagemodel->Update_where('images',array('id'=>$_POST['edit']),array('name' => $this->input->post('title'),));
                $id_img=$_POST['edit'];
            }else{
                $id_img=$this->staticpagemodel->Add('images',$db_data);
            }
            if(!empty($_FILES['userfile'])){
                $name_array = array();
                $count = count(@$_FILES['userfile']['size']);
                foreach ($_FILES as $key => $value) {

                    for ($s = 0; $s <= $count - 1; $s++) {
                        $_FILES['userfile']['name'] = $value['name'][$s];
                        $_FILES['userfile']['type'] = $value['type'][$s];
                        $_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
                        $_FILES['userfile']['error'] = $value['error'][$s];
                        $_FILES['userfile']['size'] = $value['size'][$s];

                        $this->upload->do_upload();

                        $data = $this->upload->data();
                        $name_array[] = $data['file_name'];
                        if ($data['file_name'] != null) {
                            //$name=make_alias($data['file_name']);
                            $link = 'upload/img/' . $data['file_name'];
                            $id_i = $this->staticpagemodel->Update_where('images',array('id'=>$id_img), array('link' => $link,));
                        }
                    }
                }
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['pro_image'] = $this->staticpagemodel->getProImage($id);
        $data['id'] = $id;

        $headerTitle = "Thêm hình ảnh pages";
        $this->LoadHeaderAdmin($headerTitle);
        $this->load->view('admin/page_images', $data);
        $this->LoadFooterAdmin();
    }

    //ajax
    public function popupdata()
    {
        if (isset($_POST['id'])) {
            $item        = $this->staticpagemodel->getFirstRowWhere('images', array('id' => $_POST['id']));
            $arr         = (array)$item;
        }
        echo json_encode(@$arr);

    }
}