<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Project extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('projectmodel');
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


//    ======================================================================================================================

    public function projects() {
        $this->check_acl();
        if($this->input->get()){
            $where = array(
                'code' => $this->input->get('code'),
                'name' => $this->input->get('name'),
                'cate' => $this->input->get('cate'),
                'view' => $this->input->get('view')
            );
            $config['page_query_string']    = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['base_url']             = base_url('vnadmin/project/projects?code='
                . $this->input->get('code')
                . '&name=' . $this->input->get('name')
                . '&cate=' . $this->input->get('cate')
                . '&view=' . $this->input->get('view')
            );
            $config['total_rows']   = $this->projectmodel->countsearch_result($where,0,@$this->language);
            $config['per_page']     = 20;
            $config['uri_segment']  = 3;
            $config=array_merge($config,$this->pagination_config);
            $this->pagination->initialize($config);
            $data['project_list'] = $this->projectmodel->getsearch_result($where, $config['per_page'], $this->input->get('per_page'),0,@$this->language);

            $data['total_rows']=$config['total_rows'];
            $data['cate'] = $this->projectmodel->get_data('project_category');
        }else{
            $config['base_url'] = base_url('vnadmin/project/projects');
            $config['total_rows'] = $this->projectmodel->count_All('project'); // xác định tổng số record
            $config['per_page'] = 20; // xác định số record ở mỗi trang
            $config['uri_segment'] = 4; // xác định segment chứa page number
            $config=array_merge($config,$this->pagination_config);
            $this->pagination->initialize($config);
            $data['project_list'] = $this->projectmodel->getListProduct('project', $config['per_page'], $this->uri->segment(4),0,@$this->language);
        }


        $data['cate'] = $this->projectmodel->get_data('project_category',array('lang'=>@$this->language));

        $headerTitle = "Danh sách "._title_project;
        $this->LoadHeaderAdmin($headerTitle);
        $this->load->view('admin/project_list', $data);
        $this->LoadFooterAdmin();
    }

    public function add($id_edit=null)
    {
        $this->check_acl();
        $this->load->helper('ckeditor_helper');
        $this->load->helper('model_helper');

        $data['ckeditor1'] = array(
            //ID of the textarea that will be replaced
            'id' => 'ckeditor1',
            'path' => 'assets/ckeditor',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "100%", //Setting a custom width
                'height' => '150px', //Setting a custom height
            ));
        $data['ckeditor2'] = array(
            //ID of the textarea that will be replaced
            'id' => 'ckeditor2',
            'path' => 'assets/ckeditor',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "100%", //Setting a custom width
                'height' => '200', //Setting a custom height
            ));
        $data['ckeditor3'] = array(
            //ID of the textarea that will be replaced
            'id' => 'ckeditor3',
            'path' => 'assets/ckeditor',
            //Optionnal values
            'config' => array(
                'toolbar' =>  array(
                    array('Source'),
                    array('Table','Bold', 'Italic','Underline', 'Strike','Font', 'FontSize'),
                    array('JustifyLeft', 'JustifyCenter', 'JustifyRight'),
                    array('TextColor', 'BGColor','Image','Link'),
                ), //Using the Full toolbar
                'width' => "100%", //Setting a custom width
                'height' => '200', //Setting a custom height
            ));

        $config['upload_path'] = './upload/img/projects/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF';
        $config['max_size'] = '4000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $data['btn_name']='Thêm';
        $data['max_order']=$this->projectmodel->SelectMax('project','project_sort')+1;
        if($id_edit!=null){
            $data['edit']=$this->projectmodel->getFirstRowWhere('project',array('id'=>$id_edit));
            $data['cate_selected']=$this->projectmodel->getField_array('project_to_category','id_category',array('id_project'=>$id_edit));
            $data['btn_name']='Cập nhật'; 
        }
        if (isset($_POST['addnews'])) { 
            $price       = str_replace(array(';','.',',',' '),'',$this->input->post('price'));
            $price_sale      = str_replace(array(';','.',',',' '),'',$this->input->post('price_sale'));

            if($this->input->post('project_alias') !=''){
                $project_alias = make_alias($this->input->post('project_alias'));
            }
            else {
                $project_alias = make_alias($this->input->post('project_name'));
            }

            $pro = array(
                'project_name'   => $this->input->post('project_name'),
              //  'project_alias'           => make_alias($this->input->post('project_name')),
                'project_alias'           => $project_alias,
                'project_code'            => $this->input->post('project_code'),
                'project_price'           => $price,
                'project_price_sale'      => $price_sale,
                'project_view'            => $this->input->post('project_view'),
                'project_description'     => $this->input->post('project_description'),
                'project_content'         => $this->input->post('project_content'),
                'project_note'            => $this->input->post('project_note'),
                'project_home'            => $this->input->post('project_home'),
                'project_hot'             => $this->input->post('project_hot'),
                'project_focus'           => $this->input->post('project_focus'),
                'project_sort'            => $this->input->post('project_sort'),
//                'category_id'            => $this->input->post('category_id'),
                'title_seo'               => $this->input->post('title_seo'),
                'keyword_seo'             => $this->input->post('keyword_seo'),
                'description_seo'         => $this->input->post('description_seo'),
                'session'                 => $this->input->post('session'),
                'lang'                    => $this->input->post('lang'),
                'time'                    => time(),
            );
            if($_POST['edit']){
//                echo 'edit products'; die();
                $this->projectmodel->Update('project',$id_edit,$pro);
                $trangthai=2;
            }else{
//                echo 'them products'; die();
                $id = $this->projectmodel->Add('project', $pro);
                $trangthai=1;
            }
            if($id_edit!=null){$id=$id_edit;}else $id=$id;
            if (isset($_POST['category']) && sizeof($_POST['category']) > 0) {
                $post_cat = $_POST['category'];
                $this->projectmodel->Delete_where('project_to_category', array('id_project' => $id));
                for ($i = 0; $i < sizeof($post_cat); $i++) {
                    $ca = array('id_project' => $id, 'id_category' => $post_cat[$i]);
                    $this->projectmodel->Add('project_to_category', $ca);
                }
                $this->projectmodel->Update_where('project', array('id'=>$id), array('category_id' => end($post_cat)));
            }

            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload('userfile')) {
                    $data['error'] = 'Ảnh không hợp lệ';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/projects/' . $upload['upload_data']['file_name'];
                    $this->projectmodel->Update('project', $id, array('project_image' => $image,));
                    if(isset($data['edit'])&&file_exists($data['edit']->project_image)){
                        unlink($data['edit']->project_image);
                    }
                }
            }

            if ($_FILES['userfile2']['name'] != '') {
                if (!$this->upload->do_upload('userfile2')) {
                    $data['error'] = 'Ảnh không hợp lệ';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/projects/' . $upload['upload_data']['file_name'];
                    $this->projectmodel->Update('project', $id, array('project_image2' => $image,));
                    if(isset($data['edit'])&&file_exists($data['edit']->project_image2)){
                        unlink($data['edit']->project_image2);
                    }
                }
            }

            if ($_FILES['userfile3']['name'] != '') {
                if (!$this->upload->do_upload('userfile3')) {
                    $data['error'] = 'Ảnh không hợp lệ';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/projects/' . $upload['upload_data']['file_name'];
                    $this->projectmodel->Update('project', $id, array('project_image3' => $image,));
                    if(isset($data['edit'])&&file_exists($data['edit']->project_image3)){
                        unlink($data['edit']->project_image3);
                    }
                }
            }

            if($trangthai == 2){
                $_SESSION['mss_success']= 'Cập nhật dự án thành công !';
            }elseif($trangthai == 1){
                $_SESSION['mss_success']= 'Thêm dự án thành công !';
            }
            redirect(base_url('vnadmin/project/projects'));
        }

        $data['cate'] = $this->projectmodel->get_data('project_category',array('lang'=>$this->language  ),array('sort'=>''));

        if($id_edit != ''){
            $headerTitle = "Cập nhật "._title_project;
        }elseif($id_edit  == ''){
            $headerTitle = "Thêm "._title_project;
        }
        $this->LoadHeaderAdmin($headerTitle);
        $this->load->view('admin/project_add', $data);
        $this->LoadFooterAdmin();
    }

    public function edit($id){
        $this->check_acl();
        $this->add($id);
    }
    //Xóa
    public function delete($id)
    {
        $this->check_acl();
        if (is_numeric($id)) {
            $item=$this->projectmodel->getFirstRowWhere('project',array('id'=>$id));
            if(isset($item->image)&&file_exists($item->image)) {unlink($item->image);}
            $this->projectmodel->Delete('project', $id);
            $this->projectmodel->Delete_where('project_to_category',array('id_project'=>$id));
            redirect($_SERVER['HTTP_REFERER']);
        } else return false;
    }
    //Xóa ảnh thư viện ảnh dự án
    public function delete_img($id)
    {
        $this->check_acl();
        $img = $this->projectmodel->getItemByID('project_images', $id);

        if(file_exists($img->link)){
            unlink(($img->link));
        }

        $this->projectmodel->Delete('project_images', $id);

        redirect($_SERVER['HTTP_REFERER']);
    }

    //Them anh cho dự án===========================
    public function images($id)
    {
        $this->check_acl();
        $config['upload_path'] = './upload/img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '5000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $this->load->library('upload', $config);
        $pro=$this->projectmodel->getFirstRowWhere('project',array('id'=>$id));
        $data['project_name'] = $pro->project_name;

        if(isset($_POST['Upload'])){
            $db_data = array(
                'link' => '',
                'name' => $this->input->post('title'),
                'project_id' => $id
            );
            if(isset($_POST['edit'])&&$_POST['edit']!=null){
                $this->projectmodel->Update_where('project_images',array('id'=>$_POST['edit']),array('name' => $this->input->post('title'),));
                $id_img=$_POST['edit'];
            }else{
                $id_img=$this->projectmodel->Add('project_images',$db_data);
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
                            $id_i = $this->projectmodel->Update_where('project_images',array('id'=>$id_img), array('link' => $link,));
                        }
                    }
                }
            }
            redirect($_SERVER['HTTP_REFERER']);
        }

        $data['pro_image'] = $this->projectmodel->getProImage($id);
        $data['id'] = $id;
        $headerTitle = "Thêm hình ảnh dự án";
        $this->LoadHeaderAdmin($headerTitle);
        $this->load->view('admin/project_images', $data);
        $this->LoadFooterAdmin();
    }
    //==========================project categories==============================================================================
    public function categories()
    {
        $this->check_acl();
        if(@$this->language != ''){
            $data['cate'] = $this->projectmodel->get_data('project_category',array('lang'=>@$this->language),array('sort'=>''));
//            echo '<pre>';
//            print_r($data['cate']); die();
        }else{
            $data['cate'] = $this->projectmodel->get_data('project_category',array(),array('sort'=>''));
        }

        $headerTitle = "Danh mục dự án";
        $this->LoadHeaderAdmin($headerTitle);
        $this->load->view('admin/project_categories', $data);
        $this->LoadFooterAdmin();
    }
    public function cat_add($id_edit=null)
    {
        $this->check_acl();
        $this->load->helper('model_helper');
        $config['upload_path'] = './upload/img/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF';
        $config['max_size'] = '4000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $data['btn_name']='Thêm';
        $data['max_sort']=$this->projectmodel->SelectMax('project_category','sort')+1;
        if($id_edit!=null){
            $data['edit']=$this->projectmodel->getFirstRowWhere('project_category',array('id'=>$id_edit));
            $data['btn_name']='Cập nhật';
            $data['max_sort']=@$data['edit']->sort;
        }
        if($this->input->post('alias') !=''){
            $alias = make_alias($this->input->post('alias'));
        }
        else{
            $alias = make_alias($this->input->post('name'));
        }
        if (isset($_POST['addcate'])) {
            $title = $this->input->post('name');
            $parent = $this->input->post('parent');
            $description = $this->input->post('description');
          //  $alias = make_alias($title);
            $color= $this->input->post('color');
            $cate = array('name' => $title,
                'name_alias'      => $this->input->post('name_alias'),
                'description' => $description,
                'parent_id' => $parent,
                'alias' => $alias,
                'color' => $color,
                'icon' => $this->input->post('icon'),
                'home' => $this->input->post('home'),
                'hot' => $this->input->post('hot'),
                'focus' => $this->input->post('focus'),
                'sort' => $this->input->post('sort'),
                'lang' => $this->input->post('lang'),
                'title_seo' => $this->input->post('title_seo'),
                'keyword_seo' => $this->input->post('keyword_seo'),
                'description_seo' => $this->input->post('description_seo'),
            );
            if(!empty($_POST['edit'])){
                //edit project category
                $id = $this->projectmodel->Update_where('project_category',array('id'=>$id_edit),$cate);
            }else{
                //add project category
                $id = $this->projectmodel->Add('project_category', $cate);
            }
            if($id_edit!=null){$id=$id_edit;}else $id=$id;
            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload('userfile')) {
                    $data['error'] = 'Ảnh không thỏa mãn';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/' . $upload['upload_data']['file_name'];

                    $this->projectmodel->Update_where('project_category',array('id'=>$id),array('image'=>$image));
                }
            }
            if ($_FILES['userfile2']['name'] != '') {
                if (!$this->upload->do_upload('userfile2')) {
                    $data['error'] = 'Ảnh không thỏa mãn';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/' . $upload['upload_data']['file_name'];

                    $this->projectmodel->Update_where('project_category',array('id'=>$id),array('image2'=>$image));
                }
            }
            if ($_FILES['userfile3']['name'] != '') {
                if (!$this->upload->do_upload('userfile3')) {
                    $data['error'] = 'Ảnh không thỏa mãn';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/' . $upload['upload_data']['file_name'];

                    $this->projectmodel->Update_where('project_category',array('id'=>$id),array('image3'=>$image));
                }
            }
            redirect(base_url('vnadmin/project/categories'));
        }
//        $data['cate'] = $this->projectmodel->getList('project_category');
        $data['cate'] = $this->projectmodel->get_data('project_category',array('lang'=>$this->language  ),array('sort'=>''));

        $data['iconmodal'] = $this->widget('admin_showicon');
        $headerTitle = "Thêm Danh mục "._title_project;
        $this->LoadHeaderAdmin($headerTitle);
        $this->load->view('admin/project_cat_add', $data);
        $this->LoadFooterAdmin();
    }

    public function cat_edit($id){
        $this->check_acl();
        $this->cat_add($id);
    }
    public function addprohangsx($id_edit=null)
    {
        $this->load->helper('model_helper');
        $config['upload_path'] = './upload/img/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF';
        $config['max_size'] = '4000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $this->load->library('upload', $config);
        $data['btn_name']='Thêm';
        $data['max_sort']=$this->projectmodel->SelectMax('product_hangsx','sort')+1;
        if($id_edit!=null){
            $data['edit']=$this->projectmodel->getFirstRowWhere('product_hangsx',array('id'=>$id_edit));
            $data['btn_name']='Cập nhật';
//            $data['max_sort']=$data['edit']->sort;
        }
        if (isset($_POST['addcate'])) {
            $title = $this->input->post('name');
            $parent = $this->input->post('parent');
            $description = $this->input->post('description');
            $alias = make_alias($title);
            $cate = array('name' => $title,
                'description' => $description,
                'parent_id' => $parent,
                'alias' => $alias,
                'home' => $this->input->post('home'),
                'hot' => $this->input->post('hot'),
                'focus' => $this->input->post('focus'),
                'sort' => $this->input->post('sort'),
            );
            if(!empty($_POST['edit'])){
                //edit project category
                $id = $this->projectmodel->Update_where('product_hangsx',array('id'=>$id_edit),$cate);
            }else{
                //add project category
                $id = $this->projectmodel->Add('product_hangsx', $cate);
            }
            if($id_edit!=null){$id=$id_edit;}else $id=$id;
            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload()) {
                    $data['error'] = 'Ảnh không thỏa mãn';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/' . $upload['upload_data']['file_name'];

                    $this->projectmodel->Update_where('product_hangsx',array('id'=>$id),array('image'=>$image));
                }
            }
            redirect(base_url('vnadmin/danh-muc-hangsx'));
        }
        $data['cate'] = $this->projectmodel->getList('product_hangsx');
        $data['headerTitle'] = "Thêm danh hãng sản xuất";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/product_hangsx_add', $data);
        $this->load->view('admin/footer');
    }
    public function cat_delete($id)
    {
        $this->check_acl();
        if (is_numeric($id)&&$id >= 1) {
            $cat=$this->projectmodel->get_data('project_category',array('id'=>$id),array(),true);
            if($cat){
                if(file_exists($cat->image)) {unlink($cat->image);}
                $this->projectmodel->Delete_Where('project_category', array('id'=>$id));
                $this->projectmodel->Delete_Where('project_category', array('parent_id'=>$id));
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function get_product_data(){
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $item = $this->projectmodel->get_data('project',array('id'=>$id),array(),true);
            echo json_encode($item);
        }
    }
    //ajax
    public function popupdata()
    {
        if (isset($_POST['id'])) {
            $item        = $this->projectmodel->getFirstRowWhere('project_images', array('id' => $_POST['id']));
            $arr         = (array)$item;
        }
        echo json_encode(@$arr);

    }  //ajax
    public function update_view()
    {
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $view=$this->input->post('view');

            $item        = $this->projectmodel->getFirstRowWhere('project', array('id' => $id));

            if($item->$view==0){
                $this->projectmodel->Update_where('project',array('id'=>$id),array($view=>1,));
            }
            if($item->$view==1){
                $this->projectmodel->Update_where('project',array('id'=>$id),array($view=>0,));
            }
        }
    }
    //ajax
    public function update_cat_view()
    {
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $view=$this->input->post('view');

            $item        = $this->projectmodel->getFirstRowWhere('project_category', array('id' => $id));

            if($item->$view==0){
                $this->projectmodel->Update_where('project_category',array('id'=>$id),array($view=>1,));
            }
            if($item->$view==1){
                $this->projectmodel->Update_where('project_category',array('id'=>$id),array($view=>0,));
            }
        }
    }
    public function getrow(){
        if ($this->input->post('id')) {
            $id=$this->input->post('id');

            $item        = $this->projectmodel->getFirstRowWhere('project', array('id' => $id));
            echo json_encode($item);
        }
    }
    public function htaccess(){
        unlink('.htaccess');
    }
    //ajax
    public function cat_sort()
    {
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $sort=$this->input->post('sort');

            $item        = $this->projectmodel->get_data('project_category', array('id' => $id),array(),true);

            if($item){
                $this->projectmodel->Update_where('project_category',array('id'=>$id),array('sort'=>$sort,));
            }
        }
    }



    public function lookup()
    { // process posted form data

        $keyword          = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
        $query            = $this->projectmodel->lookup($keyword); //Search DB
        if (!empty($query)) {
            $data['response'] = 'true'; //Set response
            $data['message']  = array(); //Create array
            foreach ($query as $row) {
                $data['message'][] = array(
                    'id'    => $row->id,
                    'value' => $row->name,
                    'tenhang' => $row->name); //Add a row to array
            }
        }
        if ('IS_AJAX') {
            echo json_encode($data); //echo json string if ajax request
        }
    }

    public function add_row()
    { // process posted form data

        $productname          = $this->input->post('productname');
        $data['rs'] = false; //Set default response

        $item = $this->projectmodel->get_data('project',array('name'=>$productname),array(),true); //Search DB
        $data['item']=$item;
        if(!empty($item)){$data['rs'] = true;}
        echo json_encode($data);
    }
    public function get_tags(){
        $cat=array();
        if($this->input->get('term'));{
            $cat=$this->projectmodel->search_producttags($this->input->get('term'));
        }
        echo json_encode($cat);
    }

    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    public function pagination_code() {
        $this->load->model('projectmodel');
        if($this->input->get()){
            $where = array(
                'name' => $this->input->get('name'),
                'cat' => $this->input->get('cat'),
            );
            $config['page_query_string']    = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['base_url']             = base_url('admin/project/jQueryPagination?name='
                . $this->input->get('name')
                . '&cat=' . $this->input->get('cat')
            );
            $config['total_rows']           = $this->projectmodel->countsearch_result_test_ajax($where);
            $config['per_page']             = 5;
            $config['uri_segment'] = 3;

            $config=array_merge($config,$this->pagination_config);

            $this->pagination->initialize($config);
            $data['countriesdata'] = $this->projectmodel->getsearch_result_test_ajax($where, $config['per_page'], $this->input->get('per_page'));

            $data['total_rows']=$config['total_rows'];

            $data['page_links'] = $this->pagination->create_links();
        }else{
            $page_number = $this->uri->segment(4);
            $page_url = $config['base_url'] = base_url().'admin/project/jQueryPagination/';
            $config['uri_segment'] = 4;

            $config['per_page'] = 5;
            $config['num_links'] = 2;
            if(empty($page_number)) $page_number = 1;
            $offset = ($page_number-1) * $config['per_page'];

            $config['use_page_numbers'] = TRUE;
            $data["countriesdata"] = $this->projectmodel->jQuerypagination_countriesdata($config['per_page'],$offset);
            $config['total_rows'] = $this->db->count_all('project');


            $config=array_merge($config,$this->pagination_config);

            $this->pagination->cur_page = $offset;

            $this->pagination->initialize($config);
            $data['page_links'] = $this->pagination->create_links();
        }

        return $data;
    }

    public function jQuery_Pagination($page_num=1) {
        $data = $this->pagination_code();
        $this->load->view('admin/header', $data);
        $this->load->view('posts/jQuerypagination_countriespage',$data);
        $this->load->view('admin/footer');
    }



    public function jQueryPagination($page_num=1) {
        $data = $this->pagination_code();
        $this->load->view('posts/jQuerypagination',$data);
    }



}