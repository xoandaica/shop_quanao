<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class News extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('news_model');
            $this->load->library('pagination');
            $this->auth = new Auth();
            $this->auth->check();
            $this->datalang  = $this->news_model->get_data('language');
//            $this->check_acl();
        }
        protected $pagination_config= array(
            'full_tag_open'=>"<ul class='pagination'>",
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

        public function newslist()
        {
            $this->check_acl();
            if($this->input->get()){
                $where = array(
                    'name' => $this->input->get('name'),
                    'cate' => $this->input->get('cate'),
                    'view' => $this->input->get('view'),
                );
                $config['page_query_string']    = TRUE;
                $config['enable_query_strings'] = TRUE;
                $config['base_url']             = base_url('vnadmin/news/newslist?name='
                                                    . $this->input->get('name')
                                                    . '&cate=' . $this->input->get('cate')
                                                    . '&view=' . $this->input->get('view')
                                                    );
                $config['total_rows']           = $this->news_model->countsearch_result($where,0,@$this->language);
                $config['per_page']             = 20;
                $config['uri_segment'] = 4;
                $config=array_merge($config,$this->pagination_config);
                $this->pagination->initialize($config);
                $data['newslist'] = $this->news_model->getsearch_result($where, $config['per_page'], $this->input->get('per_page'),0,@$this->language);
            }else{
                $config['base_url']    = base_url('vnadmin/news/newslist');
                $config['total_rows']  = $this->news_model->count_All('news'); // xác định tổng số record
                $config['per_page']    = 20; // xác định số record ở mỗi trang
                $config['uri_segment'] = 4; // xác định segment chứa page number
                $this->pagination->initialize($config);
                $data              = array();
                $data['newslist']  = $this->news_model->newsListAll($config['per_page'], $this->uri->segment(4),0,@$this->language);
            }
            $data['datalang'] = $this->datalang;
            $data['cate'] = $this->news_model->get_data('news_category',array('lang'=>@$this->language));

            $headerTitle = "Danh sách Tin tức";

            $this->LoadHeaderAdmin($headerTitle);
            $this->load->view('admin/news_list', $data);
            $this->LoadFooterAdmin();
        }

        public function newslist_recycle()
        {
            $this->check_acl();
            if($this->input->get()){
                $where = array(
                    'name' => $this->input->get('name'),
                    'cate' => $this->input->get('cate'),
                    'view' => $this->input->get('view')
                );
                $config['page_query_string']    = TRUE;
                $config['enable_query_strings'] = TRUE;
                $config['base_url']             = base_url('vnadmin/news/newslist?name='
                                                    . $this->input->get('name')
                                                    . '&cate=' . $this->input->get('cate')
                                                    . '&view=' . $this->input->get('view')
                                                    );
                $config['total_rows']           = $this->news_model->countsearch_result($where,1,@$this->language);
                $config['per_page']             = 20;
                $config['uri_segment'] = 4;
                $config=array_merge($config,$this->pagination_config);
                $this->pagination->initialize($config);
                $data['newslist'] = $this->news_model->getsearch_result($where, $config['per_page'], $this->input->get('per_page'),1,@$this->language);
            }else{
                $config['base_url']    = base_url('vnadmin/news/newslist');
                $config['total_rows']  = $this->news_model->count_All('news'); // xác định tổng số record
                $config['per_page']    = 20; // xác định số record ở mỗi trang
                $config['uri_segment'] = 4; // xác định segment chứa page number
                $this->pagination->initialize($config);
                $data              = array();
                $data['newslist']  = $this->news_model->newsListAll($config['per_page'], $this->uri->segment(4),1,@$this->language);
            }
            $data['datalang'] = $this->datalang;
            $data['cate'] = $this->news_model->get_data('news_category');

            $headerTitle = "Thùng rác tin";

            $this->LoadHeaderAdmin($headerTitle);
            $this->load->view('admin/news_recycle', $data);
            $this->LoadFooterAdmin();
        }

        //add News
        public function add($id=null)
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
            $config['upload_path']   = './upload/img/news/';
            $config['allowed_types'] = 'gif|jpg|png|PNG|JPG|GIF';
            $config['max_size']      = '5000';
            $config['max_width']     = '3000';
            $config['max_height']    = '2000';
            $this->load->library('upload', $config);
            $data['btn_name']='Thêm';
            if($id){
                //get news item
                $item=$this->news_model->get_data('news',array('id'=>$id),array(),true);
                $data['edit']=$item;
                $data['btn_name']='Cập nhật';
                $data['cate_selected']=$this->news_model->getField_array('news_to_category','id_category',array('id_news'=>$id));
            }

            if($this->input->post('alias') !=''){
                $alias = make_alias($this->input->post('alias'));
            }
            else{
                $alias = make_alias($this->input->post('title'));
            }

            if (isset($_POST['addnews'])) {
                $arr = array(
                    'title'           => $this->input->post('title'),
                    'alias'           => $alias,
                    'description'     => $this->input->post('description'),
                    'hot'             => $this->input->post('hot'),
                    'home'            => $this->input->post('home'),
                    'focus'           => $this->input->post('focus'),
                    'content'         => $this->input->post('content'),
                    'lang'            => $this->input->post('lang'),
                    'tag'             => $this->input->post('tag'),
                    'session'         => $this->input->post('session'),
                    'time'            => time(),
                    'category_id'     => $this->input->post('category_id'),
                    'title_seo'       => $this->input->post('title_seo'),
                    'keyword_seo'     => $this->input->post('keyword_seo'),
                    'description_seo' => $this->input->post('description_seo'),
                    'date' => $this->input->post('date'),
                );
                if($this->input->post('edit')){
                    //update news
                    $this->news_model->Update_where('news', array('id'=>$id),$arr);
                    $trangthai=2;
                }else{
                    //add news
                    $rs = $this->news_model->Add('news', $arr);
                    $trangthai=1;
                }
                isset($rs)?$id=$rs:$id=$id;
                if ($this->input->post('category') && sizeof($this->input->post('category')) > 0) {

                    $post_cat = $this->input->post('category');

                    $this->news_model->Delete_where('news_to_category', array('id_news' => $id));
                    for ($i = 0; $i < sizeof($post_cat); $i++) {
                        $ca = array('id_news' => $id, 'id_category' => $post_cat[$i]);
                        $this->news_model->Add('news_to_category', $ca);
                    }
                    $this->news_model->Update_where('news', array('id'=>$id), array('category_id' => end($post_cat)));
                }

                //update news image
                if ($_FILES['userfile']['name'] != '') {
                    if (!$this->upload->do_upload('userfile')) {
                        $data['error'] = 'Ảnh không hợp lệ!';
                    } else {
                        $upload = array('upload_data' => $this->upload->data());
                        $image  = 'upload/img/news/' . $upload['upload_data']['file_name'];
                        $this->news_model->Update_where('news', array('id'=>$id), array('image'=>$image));
                    }
                }
              //end
                if($this->input->post('more_file')){
                    $this->news_model->Delete2('news_images', array('news_id'=>$id));
                    foreach($this->input->post('more_file') as $v){
                        $image_link = str_replace(array('/upload/'), 'upload/', $v);
                        $db_data = array(
                            'link'    => $image_link,
                            'news_id' => $id
                        );
                        $this->news_model->Add('news_images', $db_data);
                    }
                }


                if($trangthai == 2){
                    $_SESSION['mss_success']= 'Cập nhật tin thành công !';
                }elseif($trangthai == 1){
                    $_SESSION['mss_success']= 'Thêm tin thành công !';
                }
                redirect(base_url('vnadmin/news/newslist'));
            }
            $data['cate'] = $this->news_model->get_data('news_category',array('lang'=>$this->language));
            $data['news_images'] = $this->news_model->get_data('news_images');
//            print_r($data['news_images']);die();

            if($id != ''){
                $headerTitle = "Cập nhật Tin tức";
            }elseif($id == ''){
                $headerTitle = "Thêm Tin tức";
            }
            $this->LoadHeaderAdmin($headerTitle);
            $this->load->view('admin/news_add', $data);
            $this->load->view('admin/footer');
        }

        //Them anh cho tin tức===========================
        public function images($id)
        {
            $this->check_acl();
            $config['upload_path'] = './upload/files/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '5000';
            $config['max_width'] = '3000';
            $config['max_height'] = '3000';

            $this->load->library('upload', $config);

            $pro=$this->news_model->getFirstRowWhere('news',array('id'=>$id));
            $data['news_title'] = $pro->title;

            if(isset($_POST['Upload'])){

                $db_data = array(
                    'link' => '',
                    'name' => $this->input->post('name'),
                    'news_id' => $id
                );
                if(isset($_POST['edit'])&&$_POST['edit']!=null){
                    $this->news_model->Update_where('news_images',array('id'=>$_POST['edit']),array('name' => $this->input->post('name'),));
                    $id_img=$_POST['edit'];
                }else{
                    $id_img=$this->news_model->Add('news_images',$db_data);
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
                                $link = 'upload/files/' . $data['file_name'];
                                $id_i = $this->news_model->Update_where('news_images',array('id'=>$id_img),array('link' => $link,));

                            }
                        }
                    }
                }
                redirect($_SERVER['HTTP_REFERER']);
            }
            $data['news_images'] = $this->news_model->getNewsImage($id);
            $data['id'] = $id;
            $headerTitle = "Thêm hình ảnh Tin tức";
            $this->LoadHeaderAdmin($headerTitle);
            $this->load->view('admin/news_images', $data);
            $this->LoadFooterAdmin();
        }
        //ajax
        public function popupdata()
        {
            if (isset($_POST['id'])) {
                $item        = $this->news_model->getFirstRowWhere('news_images', array('id' => $_POST['id']));
                $arr         = (array)$item;
            }
            echo json_encode(@$arr);

        }
        public function edit($id){
            $this->check_acl();
            $this->add($id);
        }
        // recycle News
        public function recycle_an($id)
        {
            $this->check_acl();
            $news=$this->news_model->get_data('news',array('id'=>$id),array(),true);
            $this->news_model->Update_where('news',array('id'=>$id),array('recycle'=>1));
            $_SESSION['mss_success']= 'Tin tức bạn chọn đã được chuyển vào thùng rác ! </br>
            Nếu bạn muốn sử dụng lại tin vui lòng kiểm tra thùng rác !';
            redirect($_SERVER['HTTP_REFERER']);
        }
        public function recycle_hien($id)
        {
            $this->check_acl();
            $news=$this->news_model->get_data('news',array('id'=>$id),array(),true);
            $this->news_model->Update_where('news',array('id'=>$id),array('recycle'=>0));
            $_SESSION['mss_success']= 'Tin tức bạn chọn đã được khôi phục !</br>
            Bạn vui lòng kiểm tra ngoài danh sách tin tức !';
            redirect($_SERVER['HTTP_REFERER']);
        }

        //Delete News
        public function delete($id)
        {
            $this->check_acl();
            $news=$this->news_model->get_data('news',array('id'=>$id),array(),true);
            if(file_exists($news->image));
            $this->news_model->Delete('news', $id);
            $_SESSION['mss_success']= 'Bạn đã xóa tin thành công !';
            redirect($_SERVER['HTTP_REFERER']);
        }
        public function delete_check()
        {
            $this->check_acl();
            $count=0;
            foreach($this->input->post('news_check') as $v){
                $count ++;
            }
            if($this->input->post('news_check')){
                foreach($this->input->post('news_check') as $v){
                    $this->news_model->Delete('news',$v);
                }
            }
            $_SESSION['mss_success']= 'Bạn đã xóa  thành công '.$count.' tin !';
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function delete_news_images($id)
        {
            $this->check_acl();
            $img = $this->news_model->getItemByID('news_images', $id);

            if(file_exists($img->link)){
                unlink(($img->link));
            }

            $this->news_model->Delete('news_images', $id);

            redirect($_SERVER['HTTP_REFERER']);
        }
        //ajax
        public function update_view()
        {
            if ($this->input->post('id')) {
                $id=$this->input->post('id');
                $view=$this->input->post('view');

                $item        = $this->news_model->getFirstRowWhere('news', array('id' => $id));

                if($item->$view==0){
                    $this->news_model->Update_where('news',array('id'=>$id),array($view=>1,));
                }
                if($item->$view==1){
                    $this->news_model->Update_where('news',array('id'=>$id),array($view=>0,));
                }
            }
        }
        public function show_news(){
            //$this->auth->check();
            $u=$this->news_model->getFirstRowWhere('news',array('id'=>$_POST['id']));

            if($u->show==1){
                $this->news_model->Update_where('news', array('id' => $_POST['id']), array('show'=>0));

            }else if($u->show==0){
                $this->news_model->Update_where('news', array('id' => $_POST['id']), array('show'=>1));
            }
            echo 1;
        }

        // Category News ====================================================================================
        public function categories()
        {
            $this->check_acl();
            if(@$this->language != ''){
                $data['news_cate'] = $this->news_model->get_data('news_category',array('lang'=>@$this->language),array('sort'=>''));
            }else{
                $data['news_cate'] = $this->news_model->get_data('news_category',array(),array('sort'=>''));
            }
            $headerTitle = "Danh mục "._title_news;
            $this->LoadHeaderAdmin($headerTitle);
            $this->load->view('admin/news_cat', $data);
            $this->load->view('admin/footer');
        }
        //Add Category
        public function cat_add($id=null)
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
            $config['upload_path']   = './upload/img/news/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '5000';
            $config['max_width']     = '5000';
            $config['max_height']    = '5000';
            $this->load->library('upload', $config);



            $data['btn_name']='Thêm';
            if($id!=null){
                $data['edit']=$this->news_model->get_data('news_category',array('id'=>$id),array(),true);
                $data['btn_name']='Cập nhật';
            }

            if($this->input->post('alias') !=''){
                $alias = make_alias($this->input->post('alias'));
            }
            else{
                $alias = make_alias($this->input->post('name'));
            }

            if (isset($_POST['addcate'])) {
                $cate    = array(
                     'name'            => $this->input->post('name'),
                    'alias' => $alias,
                    // 'alias'           => make_alias($this->input->post('name')),
                     'description'     => $this->input->post('description'),
                     'parent_id'       => $this->input->post('parent'),
                     'icon'            => $this->input->post('icon'),
                     'home'            => $this->input->post('home'),
                     'focus'           => $this->input->post('focus'),
                     'hot'             => $this->input->post('hot'),
                     'lang'             => $this->input->post('lang'),
                     'title_seo'       => $this->input->post('title_seo'),
                     'keyword_seo'     => $this->input->post('keyword_seo'),
                     'description_seo' => $this->input->post('description_seo'),
                );
                if(!empty($_POST['edit'])){
                    //edit product category
                     $this->news_model->Update_where('news_category',array('id'=>$id),$cate);
                    $trangthai =2;
                }else{
                    //add product category
                    $rs = $this->news_model->Add('news_category', $cate);
                    $trangthai=1;
                }
                if($id!=null){$id=$id;}else $id=$rs;
                if ($_FILES['userfile']['size'] >0) {
                    if (!$this->upload->do_upload('userfile')) {
                        $data['error'] = 'Ảnh không hợp lệ!';
                    } else {
                        $upload = array('upload_data' => $this->upload->data());
                        $image = 'upload/img/news/' . $upload['upload_data']['file_name'];

                        $this->news_model->Update_where('news_category',array('id'=>$id),array('image'=>$image));
                    }
                }
                if($trangthai == 2){
                    $_SESSION['mss_success']= 'Cập nhật danh mục tin thành công !';
                }elseif($trangthai == 1){
                    $_SESSION['mss_success']= 'Thêm tin danh mục thành công !';
                }
                redirect(base_url('vnadmin/news/categories'));
            }
            $data['category'] = $this->news_model->get_data('news_category',array('lang'=>@$this->language),array('sort'=>'s'));
            $data['iconmodal'] = $this->widget('admin_showicon');
            $headerTitle = "Thêm danh mục Tin tức";
            $this->LoadHeaderAdmin($headerTitle);
            $this->load->view('admin/news_cat_add', $data);
            $this->load->view('admin/footer');
        }

        public function cat_edit($id){
            $this->check_acl();
            $this->cat_add($id);
        }

        //Delete News
        public function delete_cat($id)
        {
            $this->check_acl();
            $this->news_model->Delete('news_category', $id);
            redirect($_SERVER['HTTP_REFERER']);
        }

        //--------------------Quan ly Tags---------------------------
        public function taglist()
        {
            if (isset($_POST['addtags'])) {
                if ($this->input->post('hidden-tags') != '') {
                    $tag   = $this->input->post('hidden-tags');
                    $array = explode(",", $tag);
                    foreach ($array as $v) {
                        $alias  = make_alias($v);
                        $tags   = array('tagname' => $v, 'tags_alias' => $alias);
                        $id_tag = $this->news_model->Add('tags', $tags);
                    }

                    if ($id_tag)
                        redirect($_SERVER['HTTP_REFERER']);
                } else $error = "Chưa có tag được thêm";
            }

            $data['error'] = @$error;

            $config['base_url']    = base_url('vnadmin/quan-ly-tags');
            $config['total_rows']  = $this->news_model->count_All('tags'); // xác định tổng số record
            $config['per_page']    = 10; // xác định số record ở mỗi trang
            $config['uri_segment'] = 3; // xác định segment chứa page number
            $this->pagination->initialize($config);
            $data                = array();
            $data['tagslist']    = $this->news_model->listAll('tags', $config['per_page'], $this->uri->segment(3));
            $data['headerTitle'] = "Quản lý Tags";
            $this->load->view('admin/header', $data);
            $this->load->view('admin/tags_list', $data);
            $this->load->view('admin/footer');
        }

        public function addtags()
        {
            if (isset($_POST['addtags'])) {
                if ($this->input->post('hidden-tags') != '') {
                    $tag   = $this->input->post('hidden-tags');
                    $array = explode(",", $tag);
                    foreach ($array as $v) {
                        $alias  = make_alias($v);
                        $tags   = array('tagname' => $v, 'tags_alias' => $alias);
                        $id_tag = $this->news_model->Add('tags', $tags);
                    }

                    if ($id_tag)
                        redirect($_SERVER['HTTP_REFERER']);
                } else $error = "Chưa có tag được thêm";
            }

            $data['error']       = @$error;
            $data['headerTitle'] = "Thêm Tags";
            $this->load->view('admin/header', $data);
            $this->load->view('admin/tags_add', $data);
            $this->load->view('admin/footer');
        }

        public function deletetags($id)
        {
            $this->news_model->Delete('tags', $id);
            redirect($_SERVER['HTTP_REFERER']);
        }
        //ajax
        public function update_cat_view()
        {
            if ($this->input->post('id')) {
                $id=$this->input->post('id');
                $view=$this->input->post('view');

                $item        = $this->news_model->getFirstRowWhere('news_category', array('id' => $id));

                if($item->$view==0){
                    $this->news_model->Update_where('news_category',array('id'=>$id),array($view=>1,));
                }
                if($item->$view==1){
                    $this->news_model->Update_where('news_category',array('id'=>$id),array($view=>0,));
                }
            }
        }
        //ajax
        public function cat_sort()
        {
            if ($this->input->post('id')) {
                $id=$this->input->post('id');
                $sort=$this->input->post('sort');

                $item        = $this->news_model->get_data('news_category', array('id' => $id),array(),true);

                if($item){
                    $this->news_model->Update_where('news_category',array('id'=>$id),array('sort'=>$sort,));
                }
            }
        }


        public function test()
        {
            $t     = "fsfs,gdgdg,uutu,fg";
            $array = explode(",", $t);
            foreach ($array as $v) {
                echo $v . ' -';
            }
        }



    }