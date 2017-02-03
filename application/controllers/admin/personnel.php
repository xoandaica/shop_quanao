<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Personnel extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');

        $this->load->model('personnel_model');
        $this->load->library('pagination');
        $this->auth = new Auth();
        $this->auth->check();
        $this->load->library('Ajax_pagination');
    }

    protected $pagination_config= array(
        'full_tag_open'=>"<ul class='pagination pagination-sm'>",
        'full_tag_close'=>"</ul>",
        'num_tag_open'=>'<li>',
        'num_tag_close'=>'</li>',
        'cur_tag_open'=>"<li class='disabled'><li class='active'><a href='#'>",
        'cur_tag_close'=>"<span class='sr-only'></span></a></li>",
        'next_tag_open'=>"<li>",
        'next_tagl_close'=>"</li>",
        'prev_tag_open'=>"<li>",
        'prev_tagl_close'=>"</li>",
        'first_tag_open'=>"<li>",
        'first_tagl_close'=>"</li>",
        'last_tag_open'=>"<li>",
        'last_tagl_close'=>"</li>",
    );


//    =====================personnel=================================================================================================


    //product categories
    public function personnels()
    {
        $this->check_acl();
        $data['cate'] = $this->personnel_model->get_data('personnel',array('lang' => $this->language));
        $headerTitle = "Danh sách nhân sự";
        $this->LoadHeaderAdmin($headerTitle);
        $this->load->view('admin/personnel', $data);
        $this->LoadFooterAdmin();
    }

    public function add($id_edit=null)
    {
        $this->check_acl();
        $this->load->helper('ckeditor_helper');
        $this->load->helper('model_helper');
        $data['ckeditor']        = array(
            //ID of the textarea that will be replaced
            'id'     => 'ckeditor',
            'path'   => 'assets/ckeditor',
            //Optionnal values
            'config' => array(
//                    'toolbar' =>  array(
//                    array( 'Source','NumberedList','BulletedList', '-', 'Bold', 'Italic', 'Underline', 'Strike' ,'-', 'Link', 'Unlink', 'Anchor'),
//                        array('Source'),
//                        array('Table','Bold', 'Italic','Underline', 'Strike','Font', 'FontSize'),
//                        array('JustifyLeft', 'JustifyCenter', 'JustifyRight'),
//                        array('TextColor', 'BGColor','Image','Link'),
//                    ),
                'toolbar' => "Full", //Using the Full toolbar
                'width'   => "100%", //Setting a custom width
                'height'  => '300px', //Setting a custom height
            ));
        $config['upload_path'] = './upload/img/personnel/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF';
        $config['max_size'] = '4000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        $data['btn_name']='Thêm';
        $data['max_sort']=$this->personnel_model->SelectMax('personnel','sort')+1;

        if($id_edit!=null){
            $data['edit']=$this->personnel_model->getFirstRowWhere('personnel',array('id'=>$id_edit));
            $data['btn_name']='Cập nhật';
            $data['max_sort']=@$data['edit']->sort;
        }

        if (isset($_POST['addcate'])) {

            $title = $this->input->post('name');
            $description = $this->input->post('description');
            $alias = make_alias($title);

            $cate = array('name' => $title,
                'description' => $description,
                'alias' => $alias,
                'home' => $this->input->post('home'),
                'sort' => $this->input->post('sort'),
                'desc' => $this->input->post('desc'),
                'lang' => $this->input->post('lang')
            );

            if(!empty($_POST['edit'])){
                //edit product category
                $id = $this->personnel_model->Update_where('personnel',array('id'=>$id_edit),$cate);
            }else{
                //add product category
                $id = $this->personnel_model->Add('personnel', $cate);
            }

            if($id_edit!=null){$id=$id_edit;}else $id=$id;
            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload('userfile')) {
                    $data['error'] = 'Ảnh không thỏa mãn';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/personnel/' . $upload['upload_data']['file_name'];

                    $this->personnel_model->Update_where('personnel',array('id'=>$id),array('image'=>$image));
                }
            }
            redirect(base_url('vnadmin/personnel/personnels'));
        }
        $data['cate'] = $this->personnel_model->getList('personnel');
        $data['iconmodal'] = $this->widget('admin_showicon');

        $headerTitle = "Thêm  nhân sự";
        $this->LoadHeaderAdmin($headerTitle);
        $this->load->view('admin/personnel_add', $data);
        $this->LoadFooterAdmin();
    }

    public function edit($id){
        $this->check_acl();
        $this->add($id);
    }

    public function delete($id)
    {
        $this->check_acl();
        if (is_numeric($id)&&$id>1) {
            $cat=$this->personnel_model->get_data('personnel',array('id'=>$id),array(),true);
            if($cat){
                if(file_exists($cat->image)) {unlink($cat->image);}
                $this->personnel_model->Delete_Where('personnel', array('id'=>$id));
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

     //ajax
    public function update_view()
    {
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $view=$this->input->post('view');

            $item        = $this->personnel_model->getFirstRowWhere('product', array('id' => $id));

            if($item->$view==0){
                $this->personnel_model->Update_where('product',array('id'=>$id),array($view=>1,));
            }
            if($item->$view==1){
                $this->personnel_model->Update_where('product',array('id'=>$id),array($view=>0,));
            }
        }
    }
    //ajax
    public function update_cat_view()
    {
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $view=$this->input->post('view');

            $item        = $this->personnel_model->getFirstRowWhere('personnel', array('id' => $id));

            if($item->$view==0){
                $this->personnel_model->Update_where('personnel',array('id'=>$id),array($view=>1,));
            }
            if($item->$view==1){
                $this->personnel_model->Update_where('personnel',array('id'=>$id),array($view=>0,));
            }
        }
    }

    //ajax
    public function cat_sort()
    {
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $sort=$this->input->post('sort');

            $item        = $this->personnel_model->get_data('personnel', array('id' => $id),array(),true);

            if($item){
                $this->personnel_model->Update_where('personnel',array('id'=>$id),array('sort'=>$sort,));
            }
        }
    }


}